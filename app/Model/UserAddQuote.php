<?php

namespace App\Model;

use App\Dto\CreateQuote;
use App\Quote;

class UserAddQuote
{
    public function add(CreateQuote $createQuote) {

        $quote = new Quote();

        $quote->user_id = $createQuote->getUser()->id;
        $quote->content = $createQuote->getContent();
        $quote->book_title = $createQuote->getBookTitle();
        $quote->book_author_name = $createQuote->getBookAuthorName();
        $quote->book_author_surname = $createQuote->getBookAuthorSurname();

        $quote->save();
     }
}