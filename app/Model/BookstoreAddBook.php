<?php


namespace App\Model;


use App\Book;
use App\Dto\CreateBook;

class BookstoreAddBook
{
    public function add(CreateBook $createBook) {

        $book = new Book();
        $book->title = $createBook->getTitle();
        $book->year = $createBook->getYear();
        $book->print = $createBook->getPrint();
        $book->picture = $createBook->getPicture();
        $book->description = $createBook->getDescription();
        $book->author_name = $createBook->getAuthorName();
        $book->author_surname = $createBook->getAuthorSurname();
        $book->isbn_number = $createBook->getIsbnNumber();
        $book->category_id = $createBook->getCategory()->id;

        $book->save();
    }
}