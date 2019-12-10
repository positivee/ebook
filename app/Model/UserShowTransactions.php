<?php


namespace App\Model;


use App\Dto\Transaction\TransactionFetchInput;
use App\Dto\Transaction\TransactionOutputFactory;
use Illuminate\Support\Facades\DB;

class UserShowTransactions
{

    public function showMyTransactions(TransactionFetchInput $fetchInput) : array {
        $selectedTransations = DB::table('transactions')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('offers', 'offers.id', '=', 'transactions.offer_id')
            ->select('transactions.user_id', 'transactions.offer_id', 'transactions.created_at')
            ->where('transactions.user_id', '=', $fetchInput->getUser()->id)
            ->orderBy('transactions.created_at', 'DESC')
            ->get();

        $transactionOutputArray = [];

        foreach ($selectedTransations as $ts) {
            $transactionOutputArray[] = TransactionOutputFactory::createFromRow($ts);
        }

        return $transactionOutputArray;
    }

    public function showBookTitle(TransactionFetchInput $fetchInput) {
        $bookTitle = DB::table('offers')
            ->join('books', 'books.id', '=', 'offers.book_id')
            ->select('books.title')
            ->where('books.id', '=', 'offers.book_id')
            ->get();

        return $bookTitle;
    }
}