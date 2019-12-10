<?php


namespace App\Dto\Transaction;


use App\Offer;
use App\User;
use Illuminate\Http\Request;


class TransactionOutputFactory
{

    static function create(array $data): TransactionOutput
    {

        return new TransactionOutput(
            Offer::findOrFail($data['offer_id']),
            User::findOrFail($data['user_id']),
            $data['created_at'],
        );

    }

    public static function createFromRow(\stdClass $dbRow) : TransactionOutput {
        return static::create([
            'offer_id' => $dbRow->offer_id,
            'user_id' => $dbRow->user_id,
            'created_at' => $dbRow->created_at
        ]);
    }

    public function createFromRequest(Request $request): TransactionOutput
    {
        return static::create($request->all());
    }
}