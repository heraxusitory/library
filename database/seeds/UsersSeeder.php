<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user1user1'),
            'is_admin' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@yandex.com',
            'password' => Hash::make('user1user1'),
            'is_admin' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
            'is_admin' => true,
        ]);
    }
}
