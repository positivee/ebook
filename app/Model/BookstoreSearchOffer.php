<?php


namespace App\Model;

//model dla księgarni do wyszukiwania dodanych przez nią ofert

use App\Book;
use App\Dto\Offer\OfferFetchInput;
use App\Dto\Offer\OfferOutputFactory;
use Illuminate\Support\Facades\DB;

class BookstoreSearchOffer
{
    public function showBookstoreOffer(OfferFetchInput $fetchInput) : array {
        //metoda do wyswietlania ofert dla zalogowanej ksiegarni - tylko te co dodała

        $allOffersSelect = DB::table('offers')
            ->join('bookstores', 'bookstores.id', '=', 'offers.bookstore_id')
            ->join('books', 'books.id', '=', 'offers.book_id')
            ->select('offers.id','books.title', 'books.year', 'books.print', 'books.picture',
                'books.description', 'books.author_name', 'books.author_surname',
                'books.category_id','offers.bookstore_id', 'offers.book_id', 'offers.price',
                'offers.date_from', 'offers.date_to', 'offers.link', 'books.isbn_number')
            ->where('offers.bookstore_id', '=' , $fetchInput->getBookstore()->id)
            ->orderBy('offers.date_to', 'ASC')
            ->paginate(9)/*get()*/;

        $offerOutputArray = [];

        foreach ($allOffersSelect as $offer) {

            $offerOutputArray[] = OfferOutputFactory::createFromRow($offer);
        }

        return $offerOutputArray;
    }


    public function showAllOffer() : array {
        //metoda do wyswietlania wszystkich ofert

        $allOffersSelect = DB::table('offers')
            ->join('bookstores', 'bookstores.id', '=', 'offers.bookstore_id')
            ->join('books', 'books.id', '=', 'offers.book_id')
            ->select('books.title','books.id', 'books.year', 'books.print', 'books.picture',
                'books.description', 'books.author_name', 'books.author_surname',
                'books.category_id','offers.bookstore_id', 'offers.book_id', 'offers.price',
                'offers.date_from', 'offers.date_to', 'offers.link', 'books.isbn_number')
            ->orderBy('books.title', 'ASC')
            ->paginate(6);



        $offerOutputArray = [];

        foreach ($allOffersSelect as $offer) {

            $offerOutputArray[] = OfferOutputFactory::createFromRow($offer);
        }

        return $offerOutputArray;
    }

    public function showOfferToCheckedBook($id): array {
        $allOffersSelect = DB::table('offers')
            ->join('bookstores', 'bookstores.id', '=', 'offers.bookstore_id')
            ->join('books', 'books.id', '=', 'offers.book_id')
            ->select('books.id','books.title', 'books.year', 'books.print', 'books.picture',
                'books.description', 'books.author_name', 'books.author_surname',
                'books.category_id','offers.bookstore_id', 'offers.book_id', 'offers.price',
                'offers.date_from', 'offers.date_to', 'offers.link', 'books.isbn_number')
            ->where('books.id', '=', $id)
            ->orderBy('books.title', 'ASC');

        $offerOutputArray = [];

        foreach ($allOffersSelect->get() as $offer) {

            $offerOutputArray[] = OfferOutputFactory::createFromRow($offer);
        }

        return $offerOutputArray;
    }





}
