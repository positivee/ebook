<?php


namespace App\Dto\Article;

use App\Article;
use App\Bookstore;
use Illuminate\Http\Request;

class ArticleOutputFactory
{
    static function create(array $data): ArticleOutput {

        return new ArticleOutput(
            $data['article_id'],
            Bookstore::findOrFail($data['bookstore_id']),
            $data['title'],
            $data['content'],
            $data['photo'],
            $data['created_at'],
        );

    }

    public static function createFromRow(\stdClass $dbRow) : ArticleOutput {
        return static::create([
            'article_id' => $dbRow->id,
            'bookstore_id' => $dbRow->bookstore_id,
            'title' => $dbRow->title,
            'content' => $dbRow->content,
            'photo' => $dbRow->photo,
            'created_at' =>$dbRow->created_at
        ]);
    }

    public function createFromRequest(Request $request): ArticleOutput
    {
        return static::create($request->all());
    }
}
