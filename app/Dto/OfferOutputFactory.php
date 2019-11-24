<?php


namespace App\Dto;


use App\Book;
use App\Bookstore;
use App\Category;
use DateTime;
use Illuminate\Http\Request;


class OfferOutputFactory
{
    static function create(array $data): OfferOutput {

        return new OfferOutput(
            Bookstore::findOrFail($data['bookstore_id']),
            Book::findOrFail($data['book_id']),
            $data['price'],
            DateTime::createFromFormat('Y-m-d', $data['date_from']),
            DateTime::createFromFormat('Y-m-d', $data['date_to']),
            $data['link'],
            $data['title'],
            $data['year'],
            $data['print'],
            $data['picture'],
            $data['description'],
            $data['author_name'],
            $data['author_surname'],
            $data['isbn_number'],

            Category::findOrFail($data['category_id'])
        );

    }

    public static function createFromRow(\stdClass $dbRow) : OfferOutput {
        return static::create([
                'bookstore_id' => $dbRow->bookstore_id,
                'book_id' => $dbRow->book_id,
                'price' => $dbRow->price,
                'date_from' => $dbRow->date_from,
                'date_to' => $dbRow->date_to,
                'link' => $dbRow->link,
                'title' => $dbRow->title,
                'year' => $dbRow->year,
                'print' => $dbRow->print,
                'picture' => $dbRow->picture,
                'description' => $dbRow->description,
                'author_name' => $dbRow->author_name,
                'author_surname' => $dbRow->author_surname,
                'isbn_number' => $dbRow->isbn_number,
                'category_id' => $dbRow->category_id
            ]);
    }

    public function createFromRequest(Request $request): OfferOutput
    {
        return static::create($request->all());
    }
}