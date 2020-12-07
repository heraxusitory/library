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
            $html = view('layouts.components.comments.show_comments', compact('comments', 'count'))->render();
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

    public function delete(Request $request, Comment $commentM, $bookId, $commentId)
    {
        $comment = $commentM->getCommentById($commentId);
        if (!empty($comment)) {
            $comment->delete();
            $comments = $commentM->getCommentsWithNameUsers($bookId);
            $count = $commentM->getCountComment($bookId);
            $html = view('layouts.components.comments.show_comments', compact('comments', 'count'))->render();

            return response()->json([
                'html' => $html,
                'comment_id' => $request->comment_id,
                'result_comment' => true,
                'status' => 'ok',
                'message' => 'comment was droped',
            ]);
        }
        return response()->json([
            'result' => false,
            'status' => 'error',
            'message' => 'comment was not droped',
        ]);

    }
}
