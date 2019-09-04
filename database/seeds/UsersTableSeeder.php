<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        
        $admin->assignRole('admin');
        
        $admin = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@gmail.com',
            'password' => Hash::make('moderator'),
        ]);
        
        $admin->assignRole('moderator');
        
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
        ]);
        
        $user->assignRole('user');
    }
}
