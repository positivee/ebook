<?php


namespace App\Dto\Transaction;


use App\Offer;
use App\User;
use Illuminate\Http\Request;

class TransactionFetchInputFactory
{

    public static function create(array $data, User $user = null): TransactionFetchInput
    {

        return new TransactionFetchInput(
            $offer ?? (isset($data['offer_id']) ? Offer::findOrFail($data['offer_id']) : null),
            $user ?? (isset($data['user_id']) ? User::findOrFail($data['user_id']) : null)
        );
    }

    public static function createFromRequest(Request $request, User $user = null): TransactionFetchInput
    {
        return static::create($request->all(), $user);
    }
}