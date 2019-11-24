<?php


namespace App\Dto;

use App\Bookstore;
use App\Category;
use Illuminate\Http\Request;

class OfferFetchInputFactory
{
    public static function create(array $data, Bookstore $bookstore = null): OfferFetchInput {

        return new OfferFetchInput(

            $bookstore ?? (isset($data['bookstore_id']) ?  Bookstore::findOrFail($data['bookstore_id']) : null),
       isset($data['title']) ? $data['title'] : '',
       isset($data['author_name']) ? $data['author_name'] : '',
        isset($data['author_surname']) ? $data['author_surname'] : '',
        isset($data['isbn_number']) ? $data['isbn_number'] : '',
        isset($data['print']) ? $data['print'] : '',
        isset($data['price_from']) ? $data['price_from'] : null,
        isset($data['price_to']) ? $data['price_to'] : null,
      isset($data['category_id']) ?  Category::findOrFail($data['category_id']) : null

        );

    }

    public static function createFromRequest(Request $request, Bookstore $bookstore = null): OfferFetchInput
    {
        return static::create($request->all(), $bookstore);
    }
}