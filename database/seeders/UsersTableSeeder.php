<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create([
            'username' => 'Admin',
            'email' => 'dev@example.org',
            'password' => bcrypt('secret'),
        ]);

        $admin->roles()->attach($adminRole);

        $admin->profile()->save(
            UserProfile::create([
                'user_id' => $admin->id,
                'forename' => 'Jayenne',
                'surname' => 'Montana',
                'phone' => '07970555515',
                'position' => 'developer',
                'avatar' => 'jayenne.jpg',
                'links' => 'http://linkedin.com/in/jayenne',
                'picture' => 'jayenne.jpg',
                'biography' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tempus diam. Quisque bibendum velit at magna elementum, vel ultricies ipsum feugiat. Mauris sed orci semper, iaculis felis vel, vestibulum eros. In feugiat arcu libero, et gravida arcu dignissim ac. Fusce maximus accumsan elit. Quisque ultricies accumsan est, in mattis justo consequat sit amet. Praesent eget ornare metus, eget rutrum leo. Aenean mauris erat, aliquam in ipsum ac, vestibulum fermentum mauris.',
            ])
        );
    }
}
