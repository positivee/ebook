<?php


namespace App\Dto\Article;


use App\Bookstore;
use Illuminate\Http\Request;


class ArticleFetchInputFactory
{
    public static function create(array $data, Bookstore $bookstore = null): ArticleFetchInput {

        return new ArticleFetchInput(
            $bookstore ?? (isset($data['bookstore_id']) ?  Bookstore::findOrFail($data['bookstore_id']) : null),
            isset($data['title']) ? $data['title'] : '',
            isset($data['content']) ? $data['content'] : '',
            isset($data['photo']) ? $data['photo'] : '');
    }

    public static function createFromRequest(Request $request, Bookstore $bookstore = null): ArticleFetchInput
    {
        return static::create($request->all(), $bookstore);
    }
}