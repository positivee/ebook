<?php

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



//widoki bez logowania:
Route::get('/home', 'HomeController@index');
Route::get('/welcome', 'HomeController@showNews');
Route::get('/article/{id}', 'HomeController@showNewsDetail');


Route::get('/offers', 'HomeController@offers');
Route::get('/offer/{id}', 'HomeController@showOffersToBook');

Route::get('/search', 'HomeController@search');
Route::post('/search/find', 'HomeController@find');



Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


//widoki dla uzytkownka zalogowanego
Route::get('/user', 'UserController@show');
Route::patch('/user/update','UserController@update');

Route::get('/user/search', 'UserController@search');
Route::get('/user/welcome', 'UserController@showNews');

Route::get('/user/offers', 'UserController@offers');
Route::post('/user/search/find', 'UserController@findOffer');

Route::get('/user/quotes', 'UserController@showAllQuotes');

Route::get('/user/add_quote', 'UserController@addQuote');
Route::post('/user/quote', 'UserController@storeQuote');

Route::post('/user/evaluation', 'UserController@addEvaluation');


//widoki dla zalogowanej ksiegarni

Route::get('/bookstore/welcome', 'BookstoreController@welcome');
Route::get('/bookstore/addarticle', 'BookstoreController@addArticle');
Route::post('/bookstore/a', 'BookstoreController@storeArticle');


//dodawanie ofert i książek
Route::post('/bookstore/b', 'BookstoreController@storeBook');
Route::post('/bookstore/o', 'BookstoreController@storeOffer');

Route::get('/bookstore/addoffer', 'BookstoreController@addOffer');
Route::get('/bookstore/addbook', 'BookstoreController@addBook');

//widok całej bazy książek
Route::get('/bookstore/books', 'BookstoreController@showBooks');

//widok dodanych ofert dla danej ksiegarni
Route::get('/bookstore/offers', 'BookstoreController@showOffers');

Route::get('/bookstore/book/{id}', 'BookstoreController@showDetailOfBook');


