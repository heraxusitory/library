<?php

namespace App\Http\Controllers;
use App\Author;
use App\BookAuthorGenre;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function showAuthors(BookAuthorGenre $bookAuthorGenre, Author $authorM) {
//        $authors = $authorM->getAuthors();
        $authors = $bookAuthorGenre->getAuthorsWithBookCount();
        return view('authors.index', compact('authors'));
    }

    public  function showAuthor(BookAuthorGenre $bookAuthorGenre,Author $authorM, $authorId) {
        $authorName = $authorM->getNameById($authorId);
        if(!empty($authorName)) {
            $books = $bookAuthorGenre->getBooksByAuthorId($authorId);
           return view('authors.show_books', compact('books', 'authorName'));
       }
       return redirect('404');
    }
}
