<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'id' => 1,
            'name' => 'Достоевский Ф.М.',
        ]);

        DB::table('authors')->insert([
            'id' => 2,
            'name' => 'Стивен Кинг',
        ]);
        DB::table('authors')->insert([
            'id' => 3,
            'name' => 'Сапковский Анджей',
        ]);
        DB::table('authors')->insert([
            'id' => 4,
            'name' => 'Толстой Л.Н.',
        ]);
    }
}
