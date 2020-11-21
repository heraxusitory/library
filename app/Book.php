<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
   public static function getBooks() {
       return self::all();
   }

   public function getBookById($bookId) {
       $select = [
           'books.id as book_id',
           'books.name as book_name',
           'books.desc as book_desc',
           'authors.id as author_id',
           'authors.name as author_name',
           'genres.id as genre_id',
           'genres.name as genre_name',
       ];
       return DB::table('book_author_genres')
           ->select($select)
           ->leftJoin('books', 'book_author_genres.book_id', '=', 'books.id')
           ->leftJoin('genres', 'book_author_genres.genre_id', '=', 'genres.id')
           ->leftJoin('authors', 'book_author_genres.author_id', '=', 'authors.id')
           ->where('book_id', $bookId)
           ->first();
   }
}
