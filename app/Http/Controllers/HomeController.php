<?php

namespace App\Http\Controllers;

use App\Dto\OfferFetchInputFactory;
use App\Elastic\SearchModel;
use App\Model\BookstoreSearchOffer;
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

    public function showNews()
    {
        return view('welcome');
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

    public function search()
    {
        //wyswietla strone z formularzem do wyszukiwania
        return view('search');
    }

    public function find(Request $request)
    {
        //wyswietla wyszukane oferty wg danych z formularza zaawansowanego

        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, null);
        $allOffers = new UserSearchOffer();
        return view('temporary_results')->with('offers', $allOffers->searchOffer($offerFetchInput));
    }


}
