<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookAuthorGenre;
use Illuminate\Http\Request;

class BookController extends Controller
{
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
