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
            'name' => 'Владислав',
            'email' => 'vladiksmart@gmail.com',
            'password' => Hash::make('71771234'),
            'is_admin' => false,
        ]);
        DB::table('users')->insert([
            'name' => 'Лейсан',
            'email' => 'leysan@gmail.com',
            'password' => Hash::make('sergeev7'),
            'is_admin' => true,
        ]);
    }
}
