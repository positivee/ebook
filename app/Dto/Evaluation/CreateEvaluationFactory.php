<?php


namespace App\Dto\Evaluation;


use App\Book;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateEvaluationFactory
{
    static function create(array $data, User $user): CreateEvaluation {

        $attributes = [
            'title' => 'tytuł',
            'content' => 'treść',
            'evaluation' => 'ocena',
            'book_id' => 'książka',
            'user_id' => 'użytkownik'
        ];

        $validator = Validator::make($data, [
            'title' => 'string|required|max:500',
            'content' => 'string|required|max:3000',
            'evaluation' => 'int|required|min:1|max:5',
            'book_id' => 'required|int',
            'user_id' => 'int|required'
        ], [], $attributes)->validate();



        if ($validator->fails()) {
            var_export($validator->errors());
            throw new ModelNotFoundException();
        }

        return new CreateEvaluation(
            $user,
            $data['title'],
            $data['content'],
            $data['evaluation'],
            Book::findOrFail($data['book_id']),
        );

    }

    public function createFromRequest(Request $request, User $user): CreateEvaluation
    {
        return static::create($request->all(), $user);
    }

}
