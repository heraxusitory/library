<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'id' => 1,
            'name' => 'Роман',
        ]);
        DB::table('genres')->insert([
            'id' => 2,
            'name' => 'Повесть',
        ]);
        DB::table('genres')->insert([
            'id' => 3,
            'name' => 'Рассказ',
        ]);
        DB::table('genres')->insert([
            'id' => 4,
            'name' => 'Сказка',
        ]);
        DB::table('genres')->insert([
            'id' => 5,
            'name' => 'Комедия',
        ]);
        DB::table('genres')->insert([
            'id' => 6,
            'name' => 'Драма',
        ]);
        DB::table('genres')->insert([
            'id' => 7,
            'name' => 'Ужасы',
        ]);
        DB::table('genres')->insert([
            'id' => 8,
            'name' => 'Фэнтези',
        ]);
    }
}
