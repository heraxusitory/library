<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookAuthorGenre;
use http\Env\Response;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function  create(Request  $request, Book $bookM, BookAuthorGenre $bookFull) {
        if (empty($request->name) || empty($request->desc)) {
            $arrResponse = [];
            $arrResponse['status'] = 'error';
            if (empty($request->name)) {
                $arrResponse['typeName'] = 'name';
                $arrResponse['messageName'] = 'Field "name" is empty';
            }

            if (empty($request->desc)) {
                $arrResponse['typeDesc'] = 'desc';
                $arrResponse['messageDesc'] = 'Field "description" is empty';
            }

            return response()->json($arrResponse);
        }
        $bookM->name = $request->name;
        $bookM->desc = $request->desc;
        $bookM->save();
        $book = $bookM->getLastCreatedBook();

        $bookFull->author_id = $request->author_id;
        $bookFull->genre_id = $request->genre_id;
        $bookFull->book_id = $book->id;
        $bookFull->save();
        return response()->json([
            'status' => 'ok',
            'message' => 'created',
            'url' => route('books'),
        ]);
    }

    public function update(Request $request, $id)
    {
        if (empty($request->name) || empty($request->desc)) {
            $arrResponse = [];
            $arrResponse['status'] = 'error';
            if (empty($request->name)) {
                $arrResponse['typeName'] = 'name';
                $arrResponse['messageName'] = 'Field "name" is empty';
            }

            if (empty($request->desc)) {
                $arrResponse['typeDesc'] = 'desc';
                    $arrResponse['messageDesc'] = 'Field "description" is empty';
            }

            return response()->json($arrResponse);
        }

        Book::where('id', $id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            ]);
        BookAuthorGenre::where('book_id',  $id)->update([
            'author_id' => $request->author_id,
                'genre_id' => $request->genre_id,
            ]);

        return response()->json(['status' => 'ok', 'url' => route('books')]);
    }

    public function showBooks(BookAuthorGenre $bookM)
    {
        $books = $bookM->getFullBooks();
//        dd($books)
        return view('books.index', compact('books'));
    }

    public function showBook(Book $bookM, $bookId)
    {
        $book = $bookM->getBookById($bookId);
        return view('books.show', compact('book'));
    }

    public function dropBook(Request $request, Book $bookM, $bookId) {
        $book = $bookM->findBookById($bookId);
        if (!empty($book)) {
            $book->delete();
            return response()->json([
                'result' => true,
                'status' => 'ok',
                'message' => 'Droped',
            ]);
        }
        return response()->json([
            'result' => false,
            'status' => 'error',
            'message' => 'Book not found',
        ]);
    }
}
