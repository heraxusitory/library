<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    public function getAuthors()
    {
        return $this->query()
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getNameById($id) {
        return (isset($this->getById($id)->name)) ? $this->getById($id)->name : false;
    }

    public function getById($id) {
        return self::query()
            ->where('id', $id)
            ->first();
    }

    public static function getAuthorsWithBookCount()
    {
        return self::query()
            ->select(DB::raw('COUNT(book_id) as books_count, authors.id as author_id,  ANY_VALUE(authors.name) as author_name'))
            ->leftJoin('book_author_genres', 'authors.author_id', '=', 'book_author_genres.id')
            ->get();
    }
}
