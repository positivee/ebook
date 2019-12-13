<?php


namespace App\Dto\Article;

use App\Bookstore;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateArticleFactory
{
    static function create(array $data, Bookstore $bookstore): CreateArticle
    {

        $attributes = [
            'title' => 'tytuł artykułu',
            'content' => 'treść artykułu',
            'photo' => 'zdjęcie artykułu',
        ];

        Validator::make($data, [
            'title' => 'required|string|max:500',
            'content' => 'required|string|max:5000',
            'photo' => 'required|file|image|max:5000'
        ], [], $attributes)->validate();


/*        Validator::make($data, [
            'title' => 'required|string|max:500',
            'content' => 'required|string|max:5000',
            'photo' => 'required|max:500'
        ])->validate();*/

       /* if ($validator->fails()) {
            //var_export($validator->errors());
            throw new ModelNotFoundException();


        }*/

        return new CreateArticle(
            $bookstore,
            $data['title'],
            $data['content'],
            $data['photo']
        );

    }

    public function createFromRequest(Request $request, Bookstore $bookstore): CreateArticle
    {
        return static::create($request->all(), $bookstore);
    }

}
