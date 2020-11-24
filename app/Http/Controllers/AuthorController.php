<?php

namespace App\Http\Controllers;
use App\Author;
use App\BookAuthorGenre;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function showAuthors(BookAuthorGenre $bookAuthorGenre, Author $authorM)
    {
        $authors = $authorM->getAuthors();
        $authorsWithBookCount = $bookAuthorGenre->getAuthorsWithBookCount();
        return view('authors.index', compact('authors', 'authorsWithBookCount'));
    }

    public function showAuthor(BookAuthorGenre $bookAuthorGenre, Author $authorM, $authorId)
    {
        $authorName = $authorM->getNameById($authorId);
        if (!empty($authorName)) {
            $books = $bookAuthorGenre->getBooksByAuthorId($authorId);
            return view('authors.show_books', compact('books', 'authorName'));
        }
        return redirect('404');
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

        Author::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return response()->json(['status' => 'ok', 'url' => route('authors')]);
    }

    public function create(Request $request, Author $authorM)
    {
        if (empty($request->name)) {
            $arrResponse = [];
            $arrResponse['status'] = 'error';
            $arrResponse['typeName'] = 'name';
            $arrResponse['messageName'] = 'Field "name" is empty';
            return response()->json($arrResponse);
        }
        $authorM->name = $request->name;
        $authorM->save();
        return response()->json([
            'status' => 'ok',
            'message' => 'created',
            'url' => route('authors'),
        ]);
    }

    public function dropAuthor(Request $request, Author $authorM, $authorId)
    {
        $author = $authorM->getById($authorId);
        if (!empty($author)) {
            $author->delete();
            return response()->json([
                'result' => true,
                'status' => 'ok',
                'message' => 'Droped',
            ]);
        }
        return response()->json([
            'result' => false,
            'status' => 'error',
            'message' => 'Author not found',
        ]);

    }
}
