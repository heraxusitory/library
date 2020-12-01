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
//protected $dateFormat = 'd/m/Y';
//date('d-m-Y', strtotime($comments->created_at));

    public function getCommentsWithNameUsers($page_id) {
        return $this->query()
            ->select(DB::raw('comments.id, user_id, users.name, page_id,
             message, comments.created_at,
              comments.updated_at as update_comment,
               DATE_FORMAT(CURRENT_TIMESTAMP, "%d %M %y, %H:%i") as date_comment'))
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

    public function getCommentById($idComment) {
        return $this->query()
            ->where('id', $idComment)
            ->first();

    }
}
