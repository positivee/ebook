<?php

namespace App\Http\Controllers;


use App\Article;
use App\Book;
use App\Bookstore;
use App\Category;
use App\Dto\Article\ArticleFetchInputFactory;
use App\Dto\Article\CreateArticleFactory;
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
use App\Offer;
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

    public function welcome() {
        //wyświetlenie wszystkich artykułów

        $allArticels = new BookstoreShowArticle();
        return view('welcome')->with('articles',$allArticels->showAllArticles());
    }

    public function show(Request $request) {
        //metoda zwraca dane o zalogowanym użytkowniku + formularz edycji + widok swoich artykułów

        $user = Auth::user();

        $userFetchInput = UserFetchInputFactory::createFromRequest($request, User::findOrFail(Auth::user()->id));
        $userInfo = new UserSearchInfo();

        //wyswietla artykuły dodane przez zalogowaną księgarnię
        $articleFetchInput = ArticleFetchInputFactory::createFromRequest($request, Bookstore::findOrFail(Auth::user()->bookstore_id));
        $myArticles = new BookstoreShowArticle();

        return view('bookstore.bookstore_panel', compact('user'))
            ->with('userInfo', $userInfo->showUserInfo($userFetchInput))
            //->with('myQuotes', $myQuotes->showMyQuotes($quoteFetchInput))
            ->with('myArticles', $myArticles->showMyArticles($articleFetchInput));
    }


    /*------------------------------KSIĄŻKI - wyświetlanie i dodawanie--------------------------------------------*/

    public function showBooks()
    {
        //wyswietla wszystkie ksiązki z bazy
        $allBooks = new BookstoreSearchBook();
        $books = $allBooks->showAllBooks();

        $pagination = DB::table('books')
            ->select('id', 'title', 'year', 'print' ,'picture', 'description', 'author_name',
                'author_surname', 'isbn_number', 'category_id')
            ->orderBy('id', 'DESC')
            ->paginate(9);

        return view('bookstore.books')->with(compact('books', 'pagination'));
    }

    public function showDetailOfBook($id) {
        $book = Book::findOrFail($id);
        $bookCategory = Category::findOrFail($book->category_id);
        return view('bookstore.book_detail')->with(compact('book', 'bookCategory'));
    }

    public function addBook() {
        //formularz dodawania książki
        $categories = DB::table('categories')->get();

        return view('bookstore.add_books')->with(compact('categories', ));
    }

    public function storeBook(Request $request){
        //metoda do zapisywania nowej książki z fromularza
        /*dd($request->picture);*/
        $newBook = CreateBookFactory::create($request->all());
        $result = new BookstoreAddBook();
        $newBook->setPicture($request->picture->store('book_images','public'));
        $result->add($newBook);

        return redirect('/bookstore/books')->with('success', 'Dodano nową książkę!');
    }


    /*--------------------------------OFERTY - CRUD--------------------------------------------------------*/

    public function showOffers(Request $request) {
        //wyswietla oferty dodane przez zalogowaną księgarnie

        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, Bookstore::findOrFail(Auth::user()->bookstore_id));
        $allOffers = new BookstoreSearchOffer();
        $offers = $allOffers->showBookstoreOffer($offerFetchInput);


     /*   $pag= DB::table('articles')
            ->join('bookstores', 'bookstores.id', '=', 'articles.bookstore_id')
            ->select('articles.id','bookstore_id','articles.title', 'articles.content', 'articles.photo',
                'articles.created_at', 'bookstores.name')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);*/
        $pagination =  DB::table('offers')
            ->join('bookstores', 'bookstores.id', '=', 'offers.bookstore_id')
            ->join('books', 'books.id', '=', 'offers.book_id')
            ->select('offers.id','books.title', 'books.year', 'books.print', 'books.picture',
                'books.description', 'books.author_name', 'books.author_surname',
                'books.category_id','offers.bookstore_id', 'offers.book_id', 'offers.price',
                'offers.date_from', 'offers.date_to', 'offers.link', 'books.isbn_number')
            ->where('offers.bookstore_id', '=' , $offerFetchInput->getBookstore()->id)
            ->orderBy('offers.date_to', 'ASC')
            ->paginate(9);



        return view('bookstore.offers')->with(compact('offers', 'pagination'));
    }

    public function addOffer() {
        //formularz dodawania oferty
        $books = DB::table('books')->get();

        return view('bookstore.add_offers')->with(compact('books', ));
    }

    public function storeOffer(Request $request){
        //metoda do zapisywania nowej oferty z formularza

        $newOffer = CreateOfferFactory::create($request->all(), Bookstore::findOrFail(Auth::user()->bookstore_id));
        $result = new BookstoreAddOffer();
        $result->add($newOffer);

        return redirect('/bookstore/offers')->with('success', 'Dodano nową ofertę!');
    }

    public function editOffer($id) {
        $books = DB::table('books')->get();
        $offer = Offer::findOrFail($id);
        return view('bookstore.edit_offer')->with(compact('offer', 'books'));
    }

    public function updateOffer($id, Request $request) {
        $offer = Offer::findOrFail($id);

        //uzupełnienie nowymi danymi
        $offer->fill([
            'book_id' => $request->book_id,
            'price' => $request->price,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'link' => $request->link,
        ]);

        $attributes = [
            'book_id' => 'książka',
            'price' => 'cena',
            'date_from' => 'data dodania',
            'date_to' => 'data wygaśnięcia',
            'link' => 'link'
        ];

        $validator = Validator::make($request->all(), [
            'book_id' => 'int|required',
            'price' => 'required|numeric',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after:date_from',
            'link' => 'string|required|max:400'
        ], [], $attributes)->validate();

        //zapis do bazy
        $offer->save();

        return redirect('/bookstore/offers')->with('success', 'Zaktualizowano wybraną ofertę!');;
    }

    public function deleteOffer($id) {
        //usuwanie ofert
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect('/bookstore/offers')->with('success', 'Usunięto wybraną ofertę!');
    }



    /*--------------------------------ARTYKUŁY - CRUD----------------------------------------*/


    public function addArticle(){
        //wyświetla formularz do dodawania agrtykułów
        return view('bookstore.add_article');
    }

    public function storeArticle(Request $request){
        //metoda zapisu nowego artykułu
        /*dd($request->photo);*/
        $newArticle = CreateArticleFactory::create($request->all(),Bookstore::findOrFail(Auth::user()->bookstore_id));
        $result = new BookstoreAddArticle();

        /*$newArticle->setPhoto($newArticle->getPhoto()->store());*/
        $newArticle->setPhoto($request->photo->store('article_images','public'));
        $result->add($newArticle);

        return redirect('/welcome')->with('success', 'Dodano nowy artykuł!');
    }

    public function editArticle($id) {
        $article = Article::findOrFail($id);
        return view('bookstore.edit_article')->with('article', $article);

    }

    public function updateArticle($id, Request $request) {
        $article = Article::findOrFail($id);

/*        dd($request->all());*/
       /* if($request->photo.startsWith('article_images')   startsWith('article_images')) $article->photo=$request->photo->store('article_images','public');*/
        $article->fill([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        if($request->photo != null) { $article->photo = ($request->photo->store('article_images','public'));}


        $attributes = [
            'title' => 'tytuł artykułu',
            'content' => 'treść artykułu',
            'photo' => 'zdjęcie artykułu',
        ];

        Validator::make($request->all(), [
            'title' => 'required|string|max:500',
            'content' => 'required|string|max:5000',
            'photo' => 'nullable|file|image|max:5000'
        ], [], $attributes)->validate();

/*        dd($article);*/
        $article->save();

        return redirect('/bookstore')->with('success', 'Zaktualizowao wybrany artykuł');
    }

    public function deleteArticle($id) {
        //usuwanie artykułów
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/bookstore')->with('success', 'Usunięto wybrany artykuł!');
    }



    /*--------------------------------USER - CRUD ----------------------------------------*/

    public function deleteProfile($id) {
        //usuwanie profilu zalogowanego pracownika
        $user = User::findOrFail($id);
        Auth::logout();

        if ($user->delete()) {

            return redirect('/welcome')->with('success', 'Usunięto konto!');
        }

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
