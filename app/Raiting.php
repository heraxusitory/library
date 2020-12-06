<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raiting extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'mark'
    ];

    public static function getAll($bookId)
    {
        return self::query()
            ->where('book_id', $bookId)
            ->get();

    }
}
