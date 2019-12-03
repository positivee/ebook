<?php

namespace App\Dto\Quote;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateQuoteFactory
{
    static function create(array $data, User $user): CreateQuote
    {

        $validator = Validator::make($data, [
            'content' => 'required|string|max:1000',
            'book_title' => 'required|string|max:200',
            'book_author_name' => 'required|string|max:100',
            'book_author_surname' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            //var_export($validator->errors());
            throw new ModelNotFoundException();


        }

        return new CreateQuote(
            $user,
            $data['content'],
            $data['book_title'],
            $data['book_author_name'],
            $data['book_author_surname']
        );

    }

    public function createFromRequest(Request $request, User $user): CreateQuote
    {
        return static::create($request->all(), $user);
    }


}