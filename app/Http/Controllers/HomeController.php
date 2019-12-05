<?php

namespace App\Http\Controllers;

use App\Article;
use App\Dto\Article\ArticleOutputFactory;
use App\Dto\Offer\OfferFetchInputFactory;
use App\Model\BookstoreSearchOffer;
use App\Model\BookstoreShowArticle;
use App\Model\UserSearchOffer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        return view('full_article')->with('article', $article);
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
