<?php

namespace App\Http\Controllers;


use App\Bookstore;


use App\Dto\CreateArticleFactory;
use App\Model\BookstoreAddArticle;
use App\Model\BookstoreShowArticle;
use App\Dto\CreateBookFactory;
use App\Dto\CreateOfferFactory;
use App\Dto\OfferFetchInputFactory;
use App\Model\BookstoreAddBook;
use App\Model\BookstoreAddOffer;

use App\Model\BookstoreSearchBook;
use App\Model\BookstoreSearchOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookstoreController extends Controller
{

    //ograniczenie dostępu za pomocą middleware

    public function __construct() {
        $this->middleware('checkBookstoreId');
        $this->middleware('auth');
    }

    public function showOffers(Request $request) {
        //wyswietla oferty dodane przez zalogowaną ksiegarnie
        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, Bookstore::findOrFail(Auth::user()->bookstore_id));
        $allOffers = new BookstoreSearchOffer();
        return view('bookstore.offers')->with('offers', $allOffers->showBookstoreOffer($offerFetchInput));
    }

    public function showBooks()
    {
        $allBooks = new BookstoreSearchBook();
        return view('bookstore.books')->with('books', $allBooks->showAllBooks());
    }


    public function addOffer() {
        //formularz dodawania oferty
        return view('bookstore.add_offers');
    }

    public function addBook() {
        //formularz dodawania książki
        return view('bookstore.add_books');
    }


    public function storeBook(Request $request){
        //metoda do zapisywania nowej książki z fromularza

       /*
        ręczny sposób (to znajduje się w moim modelu BookstoreAddBook.php)

        $book = new Book();
        $book->title = \request('title');
        $book->year = \request('year');
        $book->print = \request('print');
        $book->picture = \request('picture');
        $book->description = \request('description');
        $book->author_name = \request('author_name');
        $book->author_surname = \request('author_surname');
        $book->isbn_number = \request('isbn_number');
        $book->category_id = \request('category_id');

        $book->save();
        */

        $newBook = CreateBookFactory::create($request->all());
        $result = new BookstoreAddBook();
        $result->add($newBook);


        return redirect('/bookstore/books')->with('success', 'Dodano nową książkę!');

    }

    public function storeOffer(Request $request){
        //metoda do zapisywania nowej oferty z formularza

        $newOffer = CreateOfferFactory::create($request->all(), Bookstore::findOrFail(Auth::user()->bookstore_id));
        $result = new BookstoreAddOffer();
        $result->add($newOffer);

        return redirect('/bookstore/offers')->with('success', 'Dodano nową ofertę!');
    }



    public function contact() {
        return view('bookstore.contact');
    }
    public function welcome() {
      /*  return view('bookstore.welcome');*/
        $allArticels = new BookstoreShowArticle();
        return view('bookstore.welcome')->with('articles',$allArticels->showAllArticles());
    }

    public function addArticle(){
        //wyświetla formularz do dodawania agrtykułów
        return view('bookstore.add_article');

    }

    public function storeArticle(Request $request){
        //metoda zapisu nowego artykułu

        $newArticle = CreateArticleFactory::create($request->all(),Bookstore::findOrFail(Auth::user()->bookstore_id));
        $result = new BookstoreAddArticle();
        $result->add($newArticle);

        return redirect('/bookstore/welcome')->with('success', 'Dodano nową ofertę!');

    }



}
