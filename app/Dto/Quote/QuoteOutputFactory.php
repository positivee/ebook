<?php


namespace App\Dto\Quote;

use App\User;
use Illuminate\Http\Request;


class QuoteOutputFactory
{
    static function create(array $data): QuoteOutput {

        return new QuoteOutput(
            $data['id'],
            User::findOrFail($data['user_id']),
            $data['content'],
            $data['book_title'],
            $data['book_author_name'],
            $data['book_author_surname']
        );

    }

    public static function createFromRow(\stdClass $dbRow) : QuoteOutput {
        return static::create([
            'id' => $dbRow->id,
            'user_id' => $dbRow->user_id,
            'content' => $dbRow->content,
            'book_title' => $dbRow->book_title,
            'book_author_name' => $dbRow->book_author_name,
            'book_author_surname' => $dbRow->book_author_surname

        ]);
    }

    public function createFromRequest(Request $request): QuoteOutput
    {
        return static::create($request->all());
    }
}