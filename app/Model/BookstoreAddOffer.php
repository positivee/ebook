<?php


namespace App\Model;


use App\Dto\Offer\CreateOffer;
use App\Offer;

class BookstoreAddOffer
{
    public function add(CreateOffer $createOffer) {

        $offer = new Offer();
        $offer->bookstore_id = $createOffer->getBookstore()->id;
        $offer->book_id = $createOffer->getBook()->id;
        $offer->price = $createOffer->getPrice();
        $offer->date_from = $createOffer->getDateFrom();
        $offer->date_to = $createOffer->getDateTo();
        $offer->link = $createOffer->getLink();

        $offer->save();
    }
}