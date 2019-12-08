<?php

namespace App\Http\Controllers;

use App\Dto\Evaluation\CreateEvaluation;
use App\Dto\Evaluation\CreateEvaluationFactory;
use App\Dto\Quote\CreateQuoteFactory;
use App\Dto\Offer\OfferFetchInputFactory;
use App\Dto\Quote\QuoteFetchInputFactory;
use App\Dto\User\UserFetchInputFactory;
use App\Model\AddEvaluation;
use App\Model\BookstoreSearchOffer;
use App\Model\BookstoreShowArticle;
use App\Model\UserAddQuote;
use App\Model\UserSearchInfo;
use App\Model\UserSearchOffer;
use App\Model\UserSearchQuotes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        return view('user.show', compact('user'))->with('userInfo', $userInfo->showUserInfo($userFetchInput))
            ->with('myQuotes', $myQuotes->showMyQuotes($quoteFetchInput));
    }

    public function showAllQuotes() {
        //wyswietla wszystkie cytaty
        $quotes = new UserSearchQuotes();
        $allQuotes = $quotes->showAllQuotes();


        $pagination = DB::table('quotes')
            ->join('users', 'users.id', '=', 'quotes.user_id')
            ->select('user_id','quotes.id', 'quotes.content', 'quotes.book_title', 'quotes.book_author_name',
                'quotes.book_author_surname', 'users.name', 'users.surname')
            ->orderBy('quotes.created_at', 'DESC')
            ->paginate(6);

        return view('user.quotes')->with(compact('allQuotes', 'pagination'));

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
        return redirect('/user');
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

        return redirect('/user');
    }

    public function contact() {
        return view('user.contact');
    }

    public function showNews() {
        //wyswietlenie artykułów
        $allArticles = new BookstoreShowArticle();
        return view('welcome')->with('articles', $allArticles->showAllArticles());
    }

    public function addEvaluation(Request $request) {
        ///metoda zapisywania nowej recenzji z formularza
        $newEvaluation = CreateEvaluationFactory::create($request->all(), User::findOrFail(Auth::user()->id));
        $result = new AddEvaluation();
        $result->add($newEvaluation);

        return redirect('/welcome')->with('success', 'dodano nową opinie');

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


        return redirect('/user/quotes')->with('success', 'Dodano nowy cytat!');

    }


}
