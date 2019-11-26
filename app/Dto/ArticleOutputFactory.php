<?php


namespace App\Dto;

use App\Bookstore;
use Illuminate\Http\Request;

class ArticleOutputFactory
{
    static function create(array $data): ArticleOutput {

        return new ArticleOutput(
            Bookstore::findOrFail($data['bookstore_id']),
            $data['title'],
            $data['content'],
            $data['photo']
        );

    }

    public static function createFromRow(\stdClass $dbRow) : ArticleOutput {
        return static::create([
            'bookstore_id' => $dbRow->bookstore_id,
            'title' => $dbRow->title,
            'content' => $dbRow->content,
            'photo' => $dbRow->photo
        ]);
    }

    public function createFromRequest(Request $request): ArticleOutput
    {
        return static::create($request->all());
    }
}