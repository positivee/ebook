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

        $attributes = [
            'content' => 'treść cytatu',
            'book_title' => 'nazwa książki',
            'book_author_name' => 'imię autora',
            'book_author_surname' => 'nazwisko autora'
        ];

        $validator = Validator::make($data, [
            'content' => 'required|string|max:1000',
            'book_title' => 'required|string|max:200',
            'book_author_name' => 'required|string|max:100|regex:/^[A-Z-ŻŹĆĄŚĘŁÓŃ]([A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ])+$/',
            'book_author_surname' => 'required|string|max:100|regex:/^[A-Z-ŻŹĆĄŚĘŁÓŃ]([A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ])+$/'
        ], [], $attributes)->validate();


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
