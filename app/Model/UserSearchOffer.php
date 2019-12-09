<?php


namespace App\Model;


use App\Dto\Offer\OfferFetchInput;
use App\Dto\Offer\OfferOutputFactory;
use Elastica\Request;
use Illuminate\Support\Facades\DB;

class UserSearchOffer
{
    public function searchOffer(OfferFetchInput $fetchInput) : array
    {

        $booksTable = DB::table('offers')
            ->join('bookstores', 'bookstores.id', '=', 'offers.bookstore_id')
            ->join('books', 'books.id', '=', 'offers.book_id')
            ->select('books.title','books.id', 'books.year', 'books.print', 'books.picture',
                'books.description', 'books.author_name', 'books.author_surname',
                'books.category_id','offers.bookstore_id', 'offers.book_id', 'offers.price',
                'offers.date_from', 'offers.date_to', 'offers.link', 'books.isbn_number')
            ->orderBy('books.title', 'ASC');

       if ($fetchInput->getTitle() !== '') {
            $booksTable->where('title', 'like', '%' . $fetchInput->getTitle() . '%');
        }

        if ($fetchInput->getAuthorName() !== '') {
            $booksTable->where('author_name', 'like', '%' . $fetchInput->getAuthorName() . '%');
        }

        if ($fetchInput->getAuthorSurname() !== '') {
            $booksTable->where('author_surname', 'like', '%' . $fetchInput->getAuthorSurname() . '%');
        }

        if ($fetchInput->getIsbnNumber() !== '') {
            $booksTable->where('isbn_number', 'like', '%' . $fetchInput->getIsbnNumber() . '%');
        }

        if ($fetchInput->getPrint() !== '') {
            $booksTable->where('print', 'like', '%' . $fetchInput->getPrint() . '%');
        }

        if ($fetchInput->getPriceFrom() !== null) {
            $booksTable->where('price', '>=', $fetchInput->getPriceFrom());
        }

        if ($fetchInput->getPriceTo() !== null) {
            $booksTable->where('price', '<=', $fetchInput->getPriceTo());
        }

        if ($fetchInput->getCategory() !== null) {
            $booksTable->where('category_id', '=', $fetchInput->getCategory()->id);
        }

        //var_export($booksTable->toSql());
        $offerOutputArray = [];

        foreach ($booksTable->get()->unique('title') as $offer) {

            //var_export($offer);
            $offerOutputArray[] = OfferOutputFactory::createFromRow($offer);

        }

       return $offerOutputArray;

    }


}