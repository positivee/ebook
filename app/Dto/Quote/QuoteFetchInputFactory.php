<?php

namespace App\Dto\Quote;

use App\User;
use Illuminate\Http\Request;

class QuoteFetchInputFactory
{
    public static function create(array $data, User $user = null): QuoteFetchInput {

        return new QuoteFetchInput(

            $user ?? (isset($data['user_id']) ?  User::findOrFail($data['user_id']) : null),
            isset($data['content']) ? $data['content'] : '',
            isset($data['book_title']) ? $data['book_title'] : '',
            isset($data['book_author_name']) ? $data['book_author_name'] : '',
            isset($data['book_author_surname']) ? $data['book_author_surname'] : '',

        );

    }

    public static function createFromRequest(Request $request, User $user = null): QuoteFetchInput
    {
        return static::create($request->all(), $user);
    }
}