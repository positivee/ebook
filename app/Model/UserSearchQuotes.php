<?php

//model dla użytkownika do wyświetlania cytatów - własnych i wszystkich

namespace App\Model;

use App\Dto\QuoteFetchInput;
use App\Dto\QuoteOutputFactory;
use Illuminate\Support\Facades\DB;

class UserSearchQuotes
{
    public function showAllQuotes() : array {

        $allQuotes = DB::table('quotes')
            ->join('users', 'users.id', '=', 'quotes.user_id')
            ->select('user_id','quotes.id', 'quotes.content', 'quotes.book_title', 'quotes.book_author_name',
                'quotes.book_author_surname', 'users.name', 'users.surname')
            ->orderBy('quotes.book_title', 'ASC')
            ->get();

        $quoteOutputArray = [];

        foreach ($allQuotes as $quote) {

            $quoteOutputArray[] = QuoteOutputFactory::createFromRow($quote);
        }

        return $quoteOutputArray;
    }

    public function showMyQuotes(QuoteFetchInput $fetchInput) : array {

        $myQuotes = DB::table('quotes')
            ->select( 'user_id','id','content', 'book_title', 'book_author_name',
                'book_author_surname')
            ->orderBy('book_title', 'ASC');

        if($fetchInput->getUser()) {
            $myQuotes->where('quotes.user_id', '=' , $fetchInput->getUser()->id);
        }

        $quoteOutputArray = [];

        foreach ($myQuotes->get() as $quote) {

            $quoteOutputArray[] = QuoteOutputFactory::createFromRow($quote);
        }

        return $quoteOutputArray;

    }


}