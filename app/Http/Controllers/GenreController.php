<?php

namespace App\Http\Controllers;

use App\BookAuthorGenre;
use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showGenres(Genre $genreM) {
        $genres = $genreM->getGenres();
        return view('genres.index', compact('genres'));
    }

    public  function showGenre(BookAuthorGenre $bookAuthorGenre, Genre $genreM, $genreId) {
        $genreName = $genreM->getNameById($genreId);
        if(!empty($genreName)) {
            $books = $bookAuthorGenre->getBooksByGenreId($genreId);
            return view('genres.show_books', compact('books','genreName'));
        }
        return redirect('404');

    }
}
