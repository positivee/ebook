<?php


namespace App\Dto\Evaluation;


use App\Book;
use App\User;
use Illuminate\Http\Request;

class EvaluationOutputFactory
{
    static function create(array $data): EvaluationOutput
    {

        return new EvaluationOutput(
            $data['title'],
            $data['content'],
            $data['evaluation'],
            Book::findOrFail($data['book_id']),
            User::findOrFail($data['user_id']),
            $data['created_at']
        );

    }

    public static function createFromRow(\stdClass $dbRow) : EvaluationOutput {
        return static::create([
            'title' => $dbRow->title,
            'content' => $dbRow->content,
            'evaluation' => $dbRow->evaluation,
            'book_id' => $dbRow->book_id,
            'user_id' => $dbRow->user_id,
            'created_at' =>$dbRow->created_at
        ]);
    }

    public function createFromRequest(Request $request): EvaluationOutput
    {
        return static::create($request->all());
    }
}