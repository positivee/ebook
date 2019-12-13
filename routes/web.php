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
use Illuminate\Http\Request;

Route::get('/home', 'HomeController@index');
Route::get('/welcome', 'HomeController@showNews');
Route::get('/article/{id}', 'HomeController@showNewsDetail');

Route::get('/offer/{id}', 'HomeController@showOffersToBook');

Route::get('/search', 'HomeController@search');
Route::post('/search/find', 'HomeController@find');


//wyszukiwarka ogólna
Route::post('/search', 'HomeController@allSearch')->name('search');



Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


//widoki dla uzytkownka zalogowanego
Route::get('/user', 'UserController@show');

Route::patch('/user/updateProfile','UserController@updateProfile');
Route::patch('/user/updatePassword','UserController@updatePassword');



Route::post('/user/evaluation', 'UserController@addEvaluation');

//cytaty obsługa
Route::get('/user/welcome', 'UserController@showNews');
Route::get('/user/quotes', 'UserController@showAllQuotes');

Route::get('/user/add_quote', 'UserController@addQuote');
Route::post('/user/quote', 'UserController@storeQuote');

Route::get('/user/quote/delete/{id}', 'UserController@deleteQuote');

Route::get('/user/quote/edit/{id}', 'UserController@editQuote');
Route::patch('/user/quote/update/{id}', 'UserController@updateQuote');


//widoki dla zalogowanej ksiegarni
Route::get('/bookstore', 'BookstoreController@show');
Route::patch('/bookstore/updateProfile','BookstoreController@updateProfile');
Route::patch('/bookstore/updatePassword','BookstoreController@updatePassword');

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

//usuwanie oferty
Route::get('/bookstore/offer/delete/{id}', 'BookstoreController@deleteOffer');

//usuwanie artykulu
Route::get('/bookstore/article/delete/{id}', 'BookstoreController@deleteArticle');

//edycja oferty
Route::get('/bookstore/offer/edit/{id}', 'UserController@editOffer');
Route::patch('/bookstore/offer/update/{id}', 'UserController@updateOffer');

//edycja artykułu
Route::get('/bookstore/article/edit/{id}', 'UserController@editArticle');
Route::patch('/bookstore/article/update/{id}', 'UserController@updateArticle');
