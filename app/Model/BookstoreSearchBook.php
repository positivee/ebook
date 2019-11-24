<?php


namespace App\Model;

//model dla księgarni do wyszukiwania dodanych przez nią ksiązek

use App\Dto\BookOutputFactory;
use Illuminate\Support\Facades\DB;

class BookstoreSearchBook
{
    public function showAllBooks() : array {

        $allBooks = DB::table('books')
            ->select('id', 'title', 'year', 'print' ,'picture', 'description', 'author_name',
                'author_surname', 'isbn_number', 'category_id')
            ->orderBy('id', 'DESC')
            ->get();

        $bookOutputArray = [];

        foreach ($allBooks as $book) {

            $bookOutputArray[] = BookOutputFactory::createFromRow($book);
        }

        return $bookOutputArray;


    }
}