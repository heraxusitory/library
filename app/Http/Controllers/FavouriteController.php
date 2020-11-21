<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function showFavourites() {
        return view('favourites.index');
    }
}
