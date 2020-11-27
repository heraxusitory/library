<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create() {
        return response()->json(['status' => 'ok']);

    }
}
