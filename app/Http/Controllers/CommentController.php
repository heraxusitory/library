<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create(Request $request, Comment $commentM) {
        if (strip_tags($request->text_comment)) {
            $commentM->user_id = $request->user_id;
            $commentM->page_id = $request->book_id;
            $commentM->message = ($request->text_comment);
            $commentM->save();
            $comments = $commentM->getCommentsWithNameUsers($request->book_id);
            $count = $commentM->getCountComment($request->book_id);
            $html = view('layouts.comments', compact('comments', 'count'))->render();
            return response()->json([
                'html' => $html,
                'status' => 'ok',
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'comment' => $request->text_comment,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'comment is emty',
        ]);


    }
}
