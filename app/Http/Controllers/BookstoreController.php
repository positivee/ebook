<?php

namespace App\Http\Controllers;


use App\Article;
use App\Book;
use App\Bookstore;


use App\Category;
use App\Dto\Article\CreateArticleFactory;
use App\Dto\Quote\QuoteFetchInputFactory;
use App\Dto\User\UserFetchInputFactory;
use App\Model\BookstoreAddArticle;
use App\Model\BookstoreShowArticle;
use App\Dto\Book\CreateBookFactory;
use App\Dto\Offer\CreateOfferFactory;
use App\Dto\Offer\OfferFetchInputFactory;
use App\Model\BookstoreAddBook;
use App\Model\BookstoreAddOffer;

use App\Model\BookstoreSearchBook;
use App\Model\BookstoreSearchOffer;
use App\Model\UserSearchInfo;
use App\Model\UserSearchQuotes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BookstoreController extends Controller
{

    //ograniczenie dostępu za pomocą middleware

    public function __construct() {
        /*$this->middleware('bookstoreUser');*/
        $this->middleware('checkBookstoreId');
        $this->middleware('auth');
    }

    public function showOffers(Request $request) {
        //wyswietla wszystkie oferty

        $allOffers = new BookstoreSearchOffer();
        $offers = $allOffers->showAllOffer();

        $pagination = DB::table('offers')
            ->join('bookstores', 'bookstores.id', '=', 'offers.bookstore_id')
            ->join('books', 'books.id', '=', 'offers.book_id')
            ->select('books.id','books.title', 'books.year', 'books.print', 'books.picture',
                'books.description', 'books.author_name', 'books.author_surname',
                'books.category_id','offers.bookstore_id', 'offers.book_id', 'offers.price',
                'offers.date_from', 'offers.date_to', 'offers.link', 'books.isbn_number')
            ->orderBy('books.title', 'ASC')
            ->paginate(9);

        return view('bookstore.offers')->with(compact('offers', 'pagination'));



        /* //wyswietla oferty tylko zalogowanej ksiegarni
        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, Bookstore::findOrFail(Auth::user()->bookstore_id));
        $allOffers = new BookstoreSearchOffer();
        return view('bookstore.offers')->with('offers', $allOffers->showBookstoreOffer($offerFetchInput)); */
    }
    public function show(Request $request) {
        //metoda zwraca dane o zalogowanym użytkowniku + formularz edycji + widok swoich cytatów

        $user = Auth::user();

        $userFetchInput = UserFetchInputFactory::createFromRequest($request, User::findOrFail(Auth::user()->id));
        $userInfo = new UserSearchInfo();

        //wyswietla cytaty dodane przez zalogowanego użytkownika
        $quoteFetchInput = QuoteFetchInputFactory::createFromRequest($request, User::findOrFail(Auth::user()->id));
        $myQuotes = new UserSearchQuotes();

        return view('bookstore.bookstore_panel', compact('user'))->with('userInfo', $userInfo->showUserInfo($userFetchInput))->with('myQuotes', $myQuotes->showMyQuotes($quoteFetchInput));
    }

    public function showBooks()
    {
        $allBooks = new BookstoreSearchBook();
        $books = $allBooks->showAllBooks();

        $pagination = DB::table('books')
            ->select('id', 'title', 'year', 'print' ,'picture', 'description', 'author_name',
                'author_surname', 'isbn_number', 'category_id')
            ->orderBy('id', 'DESC')
            ->paginate(9);


        return view('bookstore.books')->with(compact('books', 'pagination'));
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

        $allArticels = new BookstoreShowArticle();
        return view('welcome')->with('articles',$allArticels->showAllArticles());
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

        return redirect('/welcome')->with('success', 'Dodano nową ofertę!');

    }

    public function showDetailOfBook($id) {
        $book = Book::findOrFail($id);
        $bookCategory = Category::findOrFail($book->category_id);
        return view('bookstore.book_detail')->with(compact('book', 'bookCategory'));
    }

    public function updateProfile(Request $request)
    {
        //pobranie aktualnego uzytkownika
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        //walidacja wprowadzonych do formularza danych
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //uzupełnienie nowymi danymi
        $user->fill([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);
        //zapis do bazy
        $user->save();
        return redirect('/bookstore');
    }

    public function updatePassword(Request $request)
    {
        //pobranie aktualnego uzytkownika
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed'
        ]);

        //walidacja wprowadzonych do formularza danych
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //uzupełnienie nowymi danymi
        $user->fill([
            'password' => bcrypt($request->password)
        ]);

        //zapis do bazy
        $user->save();

        return redirect('/bookstore');
    }


}
