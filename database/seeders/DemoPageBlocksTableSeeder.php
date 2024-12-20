<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageBlock;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DemoPageBlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::find(1);

        $page = Page::find(1);

        $blocks = [];

        $theme_dirs = File::directories(resource_path('views/blocks/themes/'));

        foreach ($theme_dirs as $theme_dir) {
            $block_dirs = File::directories($theme_dir);

            foreach ($block_dirs as $block_dir) {

                $block = json_decode(file_get_contents($block_dir.'/'.'attributes.json'), false);

                if (json_last_error() === 0) {

                    $theme = substr($theme_dir, strrpos($theme_dir, '/') + 1);
                    $template = substr($block_dir, strrpos($block_dir, '/') + 1);

                    $blocks[] = new PageBlock([

                        'block_uid' => uniqid(),
                        'user_id' => $admin->id,
                        'page_id' => '0',
                        'block_lid' => $theme.'.'.$template,
                        'block_name' => $block->name,

                        'block_attribute_values' => '',
                        'block_content_values' => '',

                        'block_published' => 0,
                        'block_publish_on' => null,

                        'block_order' => '0',
                        'block_offset' => '0',
                        'open' => '',

                    ]);
                }
            }
        }

        $page->blocks()->saveMany($blocks);
    }
}
