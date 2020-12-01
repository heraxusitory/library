<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'BookController@showBooks')->name('books');

Route::prefix('genres')->middleware('admin')->group(function () {
    Route::get('/create/genre', 'ModalController@formGenreCreate')->name('genre.get.create');
    Route::put('/create/', 'GenreController@create')->name('genre.create');
    Route::delete('/drop/{genre_id}', 'GenreController@dropGenre')->name('genre.drop');
    Route::get('/edit/{genre_id}', 'ModalController@formGenreEdit')->name('genre.get.edit');
    Route::put('/edit/{genre_id}', 'GenreController@update')->name('genre.update');
});

Route::prefix('books')->group(function () {

    Route::get('/{book_id}', 'BookController@showBook')->name('book.show');

    Route::middleware('auth')->group(function () {
        Route::post('/create_comment/{book_id}/{user_id}', 'CommentController@create')->name('comment.post.create');
    });

    Route::middleware('admin')->group(function () {
        Route::get('/edit/{book_id}', 'ModalController@formBookEdit')->name('book.get.edit');
        Route::put('/edit/{book_id}', 'BookController@update')->name('book.update');
        Route::get('/create/book', 'ModalController@formBookCreate')->name('book.get.create');
        Route::put('/create', 'BookController@create')->name('book.create');
        Route::delete('/drop/{book_id}', 'BookController@dropBook')->name('book.drop');
        Route::delete('delete_comment/{book_id}/{comment_id}', 'CommentController@delete')->name('comment.delete');
    });

});

Route::prefix('authors')->middleware('admin')->group(function () {
    Route::get('/create/author', 'ModalController@formAuthorCreate')->name('author.get.create');
    Route::put('/create', 'AuthorController@create')->name('author.create');
    Route::get('/edit/{author_id}', 'ModalController@formAuthorEdit')->name('author.get.edit');
    Route::put('/edit/{author_id}', 'AuthorController@update')->name('author.update');
    Route::delete('/drop/{author_id}', 'AuthorController@dropAuthor')->name('author.drop');
});

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', 'ProfileController@showProfile')->name('profile');
    Route::get('/favourites/{user_id}', 'FavouriteController@showFavourites')->name('favourites');
});

Route::prefix('favourites')->middleware('auth')->group(function () {
    Route::post('/add/{book_id}', 'FavouriteController@add')->name('favourites.add');
    Route::delete('/delete/{book_id}', 'FavouriteController@delete')->name('favourites.delete');
});

Route::prefix('authors')->group(function () {
    Route::get('/', 'AuthorController@showAuthors')->name('authors');
    Route::get('/{author_id}', 'AuthorController@showAuthor')->name('author.show');
});

Route::prefix('genres')->group(function () {
    Route::get('/', 'GenreController@showGenres')->name('genres');
    Route::get('/{genre_id}', 'GenreController@showGenre')->name('genre.show');
});

//Route::get('/yablad', function() {
//   return redirect('404');
//});
//Route::get('404', function() {
//    return redirect('page-not-found');
//});

Auth::routes();
