<?php


namespace App\Dto\Book;

use App\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateBookFactory
{
    static function create(array $data): CreateBook {
       /* $validator = Validator::make($data, [
            'title' => 'string|required|max:200',
            'year' => 'string|required|max:4|min:4',
            'print' => 'string|required|max:100',
            'picture' => 'required|string|max:500',
            'description' => 'string|required|max:1000',
            'author_name' => 'string|required|max:100',
            'author_surname' => 'string|required|max:100',
            'isbn_number' => 'string|required|max:13|min:13',
            'category_id' => 'int|required'
        ]);*/

        $attributes = [
            'title' => 'tytuł',
            'year' => 'rok',
            'print' => 'wydawnictwo',
            'picture' => 'okładka',
            'description' => 'opis książki',
            'author_name' => 'imie autora',
            'author_surname' => 'nazwisko autora',
            'isbn_number' => 'numer ISBN',
            'category_id' => 'kategoria'
        ];

        $validator = Validator::make($data, [
            'title' => 'string|required|max:200',
            'year' => 'string|required|max:4|min:4',
            'print' => 'string|required|max:100',
            'picture' => 'required|file|image|max:5000',
            'description' => 'string|required|max:1000',
            'author_name' => 'string|required|max:100',
            'author_surname' => 'string|required|max:100',
            'isbn_number' => 'string|required|max:13|min:13',
            'category_id' => 'int|required'
        ], [], $attributes)->validate();


        /*if ($validator->fails()) {
           var_export($validator->errors());
            throw new ModelNotFoundException();
        }*/

        return new CreateBook(
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

    public function createFromRequest(Request $request): CreateBook
    {
        return static::create($request->all());
    }
}
