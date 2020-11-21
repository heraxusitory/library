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
Route::get('/books/{book_id}', 'BookController@showBook')->name('book.show');


Route::prefix('profile')->middleware('auth')->group(function() {
    Route::get('/', 'ProfileController@showProfile')->name('profile');
    Route::get('/favourites/{user_id}', 'FavouriteController@showFavourites')->name('favourites');
});

Route::prefix('authors')->group(function () {
    Route::get('/', 'AuthorController@showAuthors')->name('authors');
    Route::get('/{author_id}', 'AuthorController@showAuthor')->name('author.show');
});

Route::prefix('genres')->group(function() {
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
