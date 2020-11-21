<?php

use Illuminate\Database\Seeder;

class Book_Author_Genre extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_author_genres')->insert([
            'id' => 1,
            'book_id' => 1,
            'author_id' => 1,
            'genre_id' => 1,
        ]);
        DB::table('book_author_genres')->insert([
            'id' => 2,
            'book_id' => 4,
            'author_id' => 2,
            'genre_id' => 7,
        ]);
        DB::table('book_author_genres')->insert([
            'id' => 3,
            'book_id' => 5,
            'author_id' => 3,
            'genre_id' => 8,
        ]);
        DB::table('book_author_genres')->insert([
            'id' => 4,
            'book_id' => 2,
            'author_id' => 1,
            'genre_id' => 1,
        ]);
        DB::table('book_author_genres')->insert([
            'id' => 5,
            'book_id' => 3,
            'author_id' => 1,
            'genre_id' => 1,
        ]);
        DB::table('book_author_genres')->insert([
            'id' => 6,
            'book_id' => 6,
            'author_id' => 4,
            'genre_id' => 1,
        ]);
    }
}
