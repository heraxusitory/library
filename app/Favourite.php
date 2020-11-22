<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Favourite extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
    ];

    public function getFavouritesBooksForUser($userId)
    {
        return $this->query()
            ->where('user_id', $userId)
            ->get();


    }

    public function findBook($bookId, $userId) {
        return $this->query()
        ->where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();
    }

}
