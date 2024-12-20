<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
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

        $home = new Page([
            'title' => 'Home',
            'slug' => '/',
            'add_to_nav' => true,
            'title_nav' => '',
            'layout' => null,
            'publish_on' => now(),
            'published' => true,
            'status' => '0',
            'approved_on' => now(),
            'approved_id' => '0',
            'redirect' => null,
        ]);

        $admin->pages()->save($home);
    }
}
