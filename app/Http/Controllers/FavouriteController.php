<?php

namespace App\Http\Controllers;

use App\Book;
use App\Favourite;
use http\Env\Response;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function showFavourites(Favourite $favouriteM, $userId) {
        $favouritesUserData = $favouriteM->getFavouritesBooksForUser($userId);
        $books = $this->buildArrayBooks($favouritesUserData);
//        dd($books);
        return view('favourites.index', compact('books'));
    }

    private function buildArrayBooks($favouriteIds) :array {
        $bookM = new Book;
        $newArrBooks = [];
        if (sizeof($favouriteIds)) {
            foreach ($favouriteIds as $favourite) {
                $newArrBooks[] = $bookM->getBookById($favourite->book_id);
            }
        }
        return $newArrBooks;
    }

    public function add(Request $request, Favourite $favouriteM) {
//        $arrResponse['book_id'] = $request->id;
//        $arrResponse['user_id'] = $request->user()->id;
        $issetBook = $favouriteM->findbook($request->id, $request->user()->id);
        if(empty($issetBook)) {
            Favourite::create([
                'user_id' => $request->user()->id,
                'book_id' => $request->id,
            ]);
            return response()->json([
                'result' => true,
                'status' => 'ok',
                'message' => 'Added',
                'img_src' => asset('assets/img/favourite-fill.svg'),
                'url' => route('favourites.delete', $request->id),
            ]);
        }
        return response()->json([
            'result' => false,
            'status' => 'error',
            'message' => 'already exists',
        ]);
//        return view('books');
    }

    public function delete(Request $request, Favourite $favouriteM) {
        $issetBook = $favouriteM->findbook($request->id, $request->user()->id);
        if (!empty($issetBook)) {
            $issetBook->delete();
            return response()->json([
                'result' => true,
                'status' => 'ok',
                'message' => 'Deleted',
                'img_src' => asset('assets/img/favourite.svg'),
                'url' => route('favourites.add', $request->id),
            ]);
        }
        return response()->json([
            'result' => false,
            'status' => 'error',
            'message' => 'Book not found',
        ]);
    }
}
