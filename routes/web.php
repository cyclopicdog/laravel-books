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



 
Route::get('/', 'IndexController@index');

Route::get('/test', 'IndexController@index');

Route::get('/about-us', 'AboutController@aboutUs');

Route::get('/terms-and-conditions', 'AboutController@termsAndConditions');

Route::get('/contact-us', 'ContactController@form');

Route::post('/contact-us', 'ContactController@store');

Route::get('/faq', 'FAQController@index');

Route::get( '/books', 'BookController@index');

// routes for the creation and storing of books
Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');

// edit book
Route::get('/books/{id}/edit', 'BookController@edit');
Route::put('/books/{id}', 'BookController@update');


// route for search
Route::get('/books/search', 'BookController@search');
Route::post('/books/search', 'BookController@handleSearch');



// retrieving a book

//    get    {some user defined vaiable} (single brackets)
//        !! Be careful that this doesn't override another link above
Route::get('/books/{id}', 'BookController@show');

// routes for the authors
Route::get('/authors', 'AuthorController@index');
Route::get('/authors/create', 'AuthorController@create');
Route::post('/authors', 'AuthorController@store');
Route::get('/authors/{id}/edit', 'AuthorController@edit');
Route::put('/authors/{id}', 'AuthorController@update');

// routes for the search

Route::post('/', 'SearchController@handleSearch');

// routes for categories

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');