<?php


namespace App\Dto\Offer;


use App\Book;
use App\Bookstore;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CreateOfferFactory
{
    static function create(array $data, Bookstore $bookstore): CreateOffer
    {

     /*   $validator = Validator::make($data, [
            'book_id' => 'int|required',
            'price' => 'required|numeric',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after:date_from',
            'link' => 'string|required|max:400'
        ]);*/

        $attributes = [
            'book_id' => 'książka',
            'price' => 'cena',
            'date_from' => 'data dodania',
            'date_to' => 'data wygaśnięcia',
            'link' => 'link'
        ];

        $validator = Validator::make($data, [
            'book_id' => 'int|required',
            'price' => 'required|numeric',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after:date_from',
            'link' => 'string|required|max:400'
        ], [], $attributes)->validate();


       /* if ($validator->fails()) {
            //var_export($validator->errors());
            throw new ModelNotFoundException();


        }*/

        return new CreateOffer(
            $bookstore,
            Book::findOrFail($data['book_id']),
            $data['price'],
            DateTime::createFromFormat('Y-m-d', $data['date_from']),
            DateTime::createFromFormat('Y-m-d', $data['date_to']),
            $data['link']
        );

    }

    public function createFromRequest(Request $request, Bookstore $bookstore): CreateOffer
    {
        return static::create($request->all(), $bookstore);
    }


}
