<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    public function getGenres() {
        return self::query()
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

    public static function getGenresWithBookCount()
    {
        return self::query()
            ->select(DB::raw('genres.id,COUNT(book_id) as books_count, genre_id, genres.name'))
            ->leftJoin('book_author_genres', 'genres.id', '=', 'genre_id')
            ->orderBy('genres.id','Desc')
            ->groupBy('genres.id')
            ->get();
    }
}
