<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create(Request $request, Comment $commentM) {
        $commentM->user_id = $request->user_id;
        $commentM->page_id = $request->book_id;
        $commentM->message = $request->text_comment;
        $commentM->save();
        return response()->json([
            'status' => 'ok',
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'comment' => $request->text_comment,
            ]);

    }
}
