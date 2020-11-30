<?php

namespace App;

use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
//    public function getComments($page_id)
//    {
//        return $this->query()
//            ->where('page_id', $page_id)
//            ->orderBy('created_at', 'desc')
//            ->get();
//
//    }

    public function getCommentsWithNameUsers($page_id) {
        return $this->query()
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->orderBy('comments.created_at', 'desc')
            ->where('page_id', $page_id)
            ->get();
    }

    public function getCountComment($page_id) {
        return $this->query()
            ->select(DB::raw('COUNT(page_id) as count'))
            ->where('page_id', $page_id)
            ->first();
    }
}
