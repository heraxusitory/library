<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookAuthorGenre extends Model
{
    private $select = [
        'books.id as book_id',
        'books.name as book_name',
        'books.desc as book_desc',
        'authors.id as author_id',
        'authors.name as author_name',
        'genres.id as genre_id',
        'genres.name as genre_name',
    ];

    public function getFullBooks() {
        return DB::table('book_author_genres')
            ->select($this->select)
            ->leftJoin('books', 'book_author_genres.book_id', '=', 'books.id')
            ->leftJoin('genres', 'book_author_genres.genre_id', '=', 'genres.id')
            ->leftJoin('authors', 'book_author_genres.author_id', '=', 'authors.id')
            ->get();
    }

    public function getBooksByAuthorId($authorId) {
        return DB::table('book_author_genres')
            ->select($this->select)
            ->leftJoin('books', 'book_author_genres.book_id', '=', 'books.id')
            ->leftJoin('genres', 'book_author_genres.genre_id', '=', 'genres.id')
            ->leftJoin('authors', 'book_author_genres.author_id', '=', 'authors.id')
            ->where('author_id', $authorId)
            ->get();
    }
    public function getBooksByGenreId($genreId) {
        return DB::table('book_author_genres')
            ->select($this->select)
            ->leftJoin('books', 'book_author_genres.book_id', '=', 'books.id')
            ->leftJoin('genres', 'book_author_genres.genre_id', '=', 'genres.id')
            ->leftJoin('authors', 'book_author_genres.author_id', '=', 'authors.id')
            ->where('genre_id', $genreId)
            ->get();
    }
}
