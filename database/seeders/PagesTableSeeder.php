<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;

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
            'redirect' => null
        ]);

        $admin->pages()->save($home);
    }
}
