<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\BookAuthorGenre;
use App\Genre;
use Illuminate\Http\Request;

class ModalController extends Controller
{

    public function formBookEdit( Author $authorM, Genre $genreM, BookAuthorGenre $bookFullM, $bookId) {
//        $book = $bookM->findBookById($bookId);
        $authors = $authorM->getAuthors();
        $genres = $genreM->getGenres();
        $book = $bookFullM->getFullBookById($bookId);
//        return response()->json(['html' => $book]);
        $form = view('modals.books.edit', compact('book', 'authors', 'genres'))->render();
        return response()->json(['html' => $form]);
    }

    public function formAuthorEdit(Author $authorM, $authorId) {
        $author = $authorM->getById($authorId);
        $form = view('modals.authors.edit', compact('author', 'authorId'))->render();
        return response()->json(['html' => $form]);
    }

    public function formBookCreate(Author $authorM, Genre $genreM) {
        $authors = $authorM->getAuthors();
        $genres = $genreM->getGenres();
        $form = view('modals.books.create', compact('authors', 'genres'))->render();
        return response()->json(['html' => $form]);


    }

    public function formAuthorCreate() {
        $form = view('modals.authors.create')->render();
        return response()->json(['html' => $form]);
    }

    public function formGenreCreate() {
        $form = view('modals.genres.create')->render();
        return response()->json(['html' => $form]);
    }
}
