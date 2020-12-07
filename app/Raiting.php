<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raiting extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'mark',
        'appreciated'
    ];

    public static function getAll($bookId)
    {
        return self::query()
            ->where('book_id', $bookId)
            ->get();

    }

    public function getByBookAndUserId($bookId, $userId) {
        return self::query()
            ->where('book_id', $bookId)
            ->where('user_id', $userId)
            ->first();
    }
}
