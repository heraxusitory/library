<?php

namespace App\Http\Controllers;

use App\BookAuthorGenre;
use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showGenres(Genre $genreM) {
//        $genres = $genreM->getGenres();
        $genres = Genre::getGenresWithBookCount();
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

    public function create(Request $request, Genre $genreM)
    {
        if (empty($request->name)) {
            $arrResponse = [];
            $arrResponse['status'] = 'error';
            $arrResponse['typeName'] = 'name';
            $arrResponse['messageName'] = 'Field "name" is empty';
            return response()->json($arrResponse);
        }
        $genreM->name = $request->name;
        $genreM->save();
        return response()->json([
            'status' => 'ok',
            'message' => 'created',
            'url' => route('genres'),
        ]);
    }

    public function update(Request $request, $id)
    {
        if (empty($request->name)) {
            $arrResponse = [];
            $arrResponse['status'] = 'error';
            $arrResponse['typeName'] = 'name';
            $arrResponse['messageName'] = 'Field "name" is empty';
            return response()->json($arrResponse);
        }

        Genre::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return response()->json(['status' => 'ok', 'url' => route('genres')]);
    }

    public function dropGenre(Request $request, Genre $genreM, $genreId)
    {
        $genre = $genreM->getById($genreId);
        if (!empty($genre)) {
            $genre->delete();
            return response()->json([
                'result' => true,
                'status' => 'ok',
                'message' => 'Droped',
            ]);
        }
        return response()->json([
            'result' => false,
            'status' => 'error',
            'message' => 'Genre not found',
        ]);

    }
}
