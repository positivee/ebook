<?php

namespace App\Http\Controllers;

use App\Article;
use App\Book;
use App\Bookstore;
use App\Category;
use App\Dto\Article\ArticleOutputFactory;
use App\Dto\Offer\OfferFetchInputFactory;
use App\Evaluation;
use App\Model\BookstoreSearchOffer;
use App\Model\BookstoreShowArticle;
use App\Model\ShowEvaluation;
use App\Model\UserSearchOffer;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct() {
   /*     $this->middleware('quest');*/

    }

    public function index()
    {
        return view('home');
    }

    public function showNews(){
        //metoda wyświetlająca wszystkie artykuly

       $allArticles = new BookstoreShowArticle();
       $articlese = $allArticles->showAllArticles();

        $allArticlesTwo= DB::table('articles')
            ->join('bookstores', 'bookstores.id', '=', 'articles.bookstore_id')
            ->select('articles.id','bookstore_id','articles.title', 'articles.content', 'articles.photo',
                'articles.created_at', 'bookstores.name')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('welcome')->with(compact('articlese', 'allArticlesTwo'));

    }

    public function showNewsDetail($id) {
        $article = Article::findOrFail($id);
        $BookStoreName = Bookstore::findOrFail($article->bookstore_id);

        return view('full_article')->with(compact('article','BookStoreName'));
    }

    public function contact()
    {
        return view('contact');
    }

   /* public function offers()
    {
        $allOffers = new BookstoreSearchOffer();
        return view('offers')->with('offers', $allOffers->showAllOffer());
    }*/

    public function showOffersToBook($id) {

        //zwraca oferty i recenzje w szczegółach wybranej ksiązki

        $offer = Book::findOrFail($id);
        $category = Category::findOrFail($id);
        $offers = new BookstoreSearchOffer();

        $evaluation = Book::findOrFail($id);
        $evaluations = new ShowEvaluation();


        return view('detail_offer')->with(compact('offer', 'category',
            'evaluation' ))->with('offers', $offers->showOfferToCheckedBook($id))->with('evaluations',
            $evaluations->showAllEvaluations($id));

    }


    public function search()
    {
        $allOffers = new BookstoreSearchOffer();
        return view('search')->with('offers', $allOffers->showAllOffer());

    }


    public function searchx(Request $request) {
        //$offers = Book::search($request->name)->get();
        //return view('search', compact('offers'));

        $offers = Book::search($request->name)->get();

        //$offerFetchInput = OfferFetchInputFactory::createFromRequest($book, null);
        //$allOffers = new UserSearchOffer();
        //$offers = $allOffers->searchOffer($offerFetchInput);


        return view('search',compact('offers'));
    }


    public function find(Request $request)
    {
        //wyswietla wyszukane oferty wg danych z formularza zaawansowanego

        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, null);
        $allOffers = new UserSearchOffer();
        return view('search')->with('offers', $allOffers->searchOffer($offerFetchInput));
    }




}
