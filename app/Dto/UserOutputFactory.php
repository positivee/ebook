<?php


namespace App\Dto;


use App\User;
use Illuminate\Http\Request;

class UserOutputFactory
{
    static function create(array $data): UserOutput {

        return new UserOutput(
            User::findOrFail($data['id']),
            $data['name'],
            $data['surname'],
            $data['email']
        );

    }

    public static function createFromRow(\stdClass $dbRow) : UserOutput {
        return static::create([
            'id' =>$dbRow->id,
            'name' => $dbRow->name,
            'surname' => $dbRow->surname,
            'email' => $dbRow->email

        ]);
    }

    public static function createFromRequest(Request $request): UserOutput
    {
        return static::create($request->all());
    }
}