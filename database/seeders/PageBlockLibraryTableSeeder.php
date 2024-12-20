<?php

namespace Database\Seeders;

use App\Models\PageBlockLibrary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PageBlockLibraryTableSeeder extends Seeder
{
    private function makeAttributeValues($arr)
    {

        $results = [];

        foreach ($arr as $key => $val) {
            $results[$val->name] = $val->value;
        }

        return $results;
    }

    private function getFileContents($path, $encode = false)
    {

        if (file_exists($path)) {
            $data = file_get_contents($path, false);
            if ($encode == true) {
                return json_encode($data);
            }

            return $data;
        }

        return null;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = realpath(storage_path('app/public/blocks'));

        $theme_dirs = File::directories($path);

        foreach ($theme_dirs as $theme_dir) {
            $block_dirs = File::directories($theme_dir);

            foreach ($block_dirs as $block_dir) {
                $attr_json = $this->getFileContents($block_dir.'/'.'attributes.json');
                $attributes = json_decode($attr_json);

                if (json_last_error() === 0) {
                    $theme = substr($theme_dir, strrpos($theme_dir, '/') + 1);
                    $template = substr($block_dir, strrpos($block_dir, '/') + 1);

                    $new_block = new PageBlockLibrary([

                        'block_theme' => $theme,
                        'block_template' => $template,
                        'block_lid' => $theme.'.'.$template,

                        'block_name' => $attributes->name,
                        'block_description' => $attributes->description,

                        'block_attribute_fields' => json_encode($attributes->attributes),
                        'block_attribute_values' => json_encode($this->makeAttributeValues($attributes->attributes)),

                        'block_content_fields' => json_encode($attributes->content),
                        'block_content_values' => '',

                        'block_active' => '1',

                    ]);
                    $new_block->save();
                } else {
                    dd('your silly json isn\'t json:', $block_dir);
                }
            }
        }
    }
}
