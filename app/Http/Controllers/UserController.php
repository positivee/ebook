<?php

namespace App\Http\Controllers;

use App\Dto\CreateQuoteFactory;
use App\Dto\OfferFetchInputFactory;
use App\Dto\QuoteFetchInputFactory;
use App\Dto\UserFetchInputFactory;
use App\Model\BookstoreSearchOffer;
use App\Model\UserAddQuote;
use App\Model\UserSearchInfo;
use App\Model\UserSearchOffer;
use App\Model\UserSearchQuotes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //ograniczenie dostępu za pomocą middleware

    public function __construct() {
        $this->middleware('checkUser');
        $this->middleware('auth');
    }

    public function show(Request $request) {
        //metoda zwraca dane o zalogowanym użytkowniku + formularz edycji + widok swoich cytatów

        $user = Auth::user();

        $userFetchInput = UserFetchInputFactory::createFromRequest($request, User::findOrFail(Auth::user()->id));
        $userInfo = new UserSearchInfo();

        //wyswietla cytaty dodane przez zalogowanego użytkownika
        $quoteFetchInput = QuoteFetchInputFactory::createFromRequest($request, User::findOrFail(Auth::user()->id));
        $myQuotes = new UserSearchQuotes();

        return view('user.show', compact('user'))->with('userInfo', $userInfo->showUserInfo($userFetchInput))->with('myQuotes', $myQuotes->showMyQuotes($quoteFetchInput));
    }

    public function showAllQuotes() {
        //wyswietla wszystkie cytaty
        $allQuotes = new UserSearchQuotes();
        return view('user.quotes')->with('allQuotes', $allQuotes->showAllQuotes());

    }

    public function update(Request $request)
    {
        //pobranie aktualnego uzytkownika
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'.$user->id,
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
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //zapis do bazy
        $user->save();


        return redirect('/user');
    }

    public function search() {
        //wyswietla strone z formularzem do wyszukiwania
        return view('user.search');
    }

    public function findOffer(Request $request){
        //wyswietla wyszukane oferty wg danych z formularza zaawansowanego

        $offerFetchInput = OfferFetchInputFactory::createFromRequest($request, null);
        $allOffers = new UserSearchOffer();
        return view('user.temporary_results')->with('offers', $allOffers->searchOffer($offerFetchInput));
    }


    public function contact() {
        return view('user.contact');
    }

    public function showNews() {
        return view('user.welcome');
    }

    public function offers() {

        $allOffers = new BookstoreSearchOffer();
        return view('user.offers')->with('offers', $allOffers->showAllOffer());

    }

    public function addQuote() {
        //formularz dodawania cytatu
        return view('user.add_quote');
    }

    public function storeQuote(Request $request){
        //metoda do zapisywania nowego cytatu z formularza

        $newQuote = CreateQuoteFactory::create($request->all(),User::findOrFail(Auth::user()->id));
        $result = new UserAddQuote();
        $result->add($newQuote);


        return redirect('/user/my_quotes')->with('success', 'Dodano nowy cytat!');

    }


}
