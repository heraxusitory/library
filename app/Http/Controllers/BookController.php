<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\BookAuthorGenre;
use App\Comment;
use App\Genre;
use App\Raiting;
use App\Services\RaitingBooksService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function search(Request $request)
    {
        $searchField = $request->search_field;
        if (!empty($searchField)) {
            $books = Book::getBooks();
            $booksName = [];
            $arrResponse = [];
            $booksId = [];
            foreach ($books as $book) {
                $bookName = $book->name;
                $bookId = $book->id;
                if (mb_stripos($bookName, $searchField) !== false) {
                    $booksName[] = $bookName;
                    $booksId[] = $bookId;
                     $arrResponse[] = [
                         'book_id' => $book->id,
                         'message' => 'Matches found',
                         'strop' => mb_stripos($bookName, $searchField),
                     ];
                }
            }
            return response()->json([
                'books_name' => $booksName,
                'books_id' => $booksId,
                'response' => $arrResponse,
                'result' => true,
                'status' => 'ok',
                'message' => 'Book is not empty!',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'result' => false,
                'books_id' => false,
            ]);
        }

    }


    public function create(Request $request, Book $bookM, BookAuthorGenre $bookFull)
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
        BookAuthorGenre::where('book_id', $id)->update([
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
        ]);

        return response()->json(['status' => 'ok', 'url' => route('books')]);
    }

    public function showBooks(BookAuthorGenre $bookM, Author $authorM, Genre $genreM)
    {
        $books = $bookM->getFullBooks();
        $authors = $authorM->getAuthors();
        $genres = $genreM->getGenres();
        return view('books.index', compact('books', 'genres', 'authors'));
    }

    public function showBook(Book $bookM, $bookId, Comment $commentM, RaitingBooksService $rms, Raiting $raitingM)
    {
        $comments = $commentM->getCommentsWithNameUsers($bookId);
        $count = $commentM->getCountComment($bookId);
        $book = $bookM->getBookById($bookId);
        $appreciated = false;
        $userId = Auth::user()->id ?? false;
        $nameColumnMark = 'mark';

        if (!empty($book->book_id)) {
            $raitingTable = Raiting::getAll($bookId);
            $prepareMiddleSum = $rms->calculateRaiting($raitingTable, $nameColumnMark);
            $middleSum = round($prepareMiddleSum, 1, PHP_ROUND_HALF_UP);
        } else redirect('404');
            if (!empty($userId)) {
                if (!empty($raitingM->getByBookAndUserId($bookId, $userId))) {
                    $raiting = $raitingM->getByBookAndUserId($bookId, $userId);
                    $appreciated = $raiting->appreciated;
                }
            }

        if (!empty($book->book_id)) {
            return view('books.show', compact('book', 'comments', 'count', 'appreciated', 'middleSum', 'bookId'));
        }
        return redirect('404');
    }

    public function dropBook(Request $request, Book $bookM, $bookId)
    {
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
