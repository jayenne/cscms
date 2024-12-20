<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UserProfile;

class DemoUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $authorRole = Role::where('name', 'author')->first();
        $memberRole = Role::where('name', 'member')->first();

        $admin = User::create([
            'username' => 'Bob',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret')
        ]);

        $editor = User::create([
            'username' => 'Auður',
            'email' => 'editor@example.com',
            'password' => bcrypt('secret')
        ]);

        $author = User::create([
            'username' => 'Joe',
            'email' => 'author@example.com',
            'password' => bcrypt('secret')
        ]);

        $member = User::create([
            'username' => 'Sally',
            'email' => 'member@example.com',
            'password' => bcrypt('secret')
        ]);

        $admin->roles()->attach($adminRole);
        $editor->roles()->attach($editorRole);
        $author->roles()->attach($authorRole);
        $member->roles()->attach($memberRole);

        $admin->profile()->save(UserProfile::create(['user_id' => $admin->id, 'forename' => 'Bob', 'surname' => 'Buttons']));
        $editor->profile()->save(UserProfile::create(['user_id' => $editor->id, 'forename' => 'Auður', 'surname' => 'Ólafsdótti']));
        $author->profile()->save(UserProfile::create(['user_id' => $author->id, 'forename' => 'Joe', 'surname' => 'Josephson']));
        $member->profile()->save(UserProfile::create(['user_id' => $member->id, 'forename' => 'Sally', 'surname' => 'Sallevic']));
    }
}
