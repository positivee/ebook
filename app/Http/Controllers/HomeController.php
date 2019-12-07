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
use Illuminate\Http\Request;

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
        return view('welcome')->with('articles', $allArticles->showAllArticles());

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

    public function offers()
    {
        $allOffers = new BookstoreSearchOffer();
        return view('offers')->with('offers', $allOffers->showAllOffer());
    }

    public function showOffersToBook($id) {

        //zwraca oferty i recenzje w szczegółach wybranej ksiązki

        $offer = Book::findOrFail($id);
        $category = Category::findOrFail($id);
        $offers = new BookstoreSearchOffer();

        $evaluation = Book::findOrFail($id);
        $evaluations = new ShowEvaluation();


        return view('detail_offer')->with(compact('offer', 'category', 'evaluation' ))->with('offers', $offers->showOfferToCheckedBook($id))->with('evaluations', $evaluations->showAllEvaluations($id));

    }


    public function search(Request $request)
    {
        //wyswietla strone z formularzem do wyszukiwania i wyszukane oferty

        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, null);
        $allOffers = new UserSearchOffer();

        return view('search')->with('offers', $allOffers->searchOffer($offerFetchInput));
    }


    public function find(Request $request)
    {
        //wyswietla wyszukane oferty wg danych z formularza zaawansowanego

        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, null);
        $allOffers = new UserSearchOffer();
        return view('search')->with('offers', $allOffers->searchOffer($offerFetchInput));
    }




}
