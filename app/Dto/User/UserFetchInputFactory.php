<?php


namespace App\Dto\User;


use App\User;
use Illuminate\Http\Request;

class UserFetchInputFactory
{
    static public function create(array $data, User $user = null): UserFetchInput {

        return new UserFetchInput(
            $user ?? (isset($data['user_id']) ?  User::findOrFail($data['user_id']) : null),
            isset($data['name']) ? $data['name'] : '',
            isset($data['surname']) ? $data['surname'] : '',
            isset($data['email']) ? $data['email'] : ''

        );
    }

    static public function createFromRequest(Request $request, User $user = null): UserFetchInput
    {
        return static::create($request->all(), $user);
    }
}