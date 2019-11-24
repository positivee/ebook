<?php


namespace App\Dto;



use App\Category;

use Illuminate\Http\Request;

class BookOutputFactory
{
    static function create(array $data): BookOutput
    {

        return new BookOutput(
            $data['book_id'],
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

    public static function createFromRow(\stdClass $dbRow) : BookOutput {
        return static::create([
            'book_id' => $dbRow->id,
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

    public function createFromRequest(Request $request): BookOutput
    {
        return static::create($request->all());
    }
}