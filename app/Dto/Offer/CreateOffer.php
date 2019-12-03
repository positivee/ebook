<?php


namespace App\Dto\Offer;


use App\Book;
use App\Bookstore;
use DateTime;


class CreateOffer
{

    /**
     * @var Bookstore
     */
    protected $bookstore;
    /**
     * @var Book
     */
    protected $book;
    /**
     * @var float
     */
    protected $price;
    /**
     * @var DateTime
     */
    protected $date_from;
    /**
     * @var DateTime
     */
    protected $date_to;
    /**
     * @var string
     */
    protected $link;

    /**
     * CreateOffer constructor.
     * @param Bookstore $bookstore
     * @param Book $book
     * @param float $price
     * @param DateTime $date_from
     * @param DateTime $date_to
     * @param string $link
     */
    public function __construct(Bookstore $bookstore, Book $book, float $price, DateTime $date_from, DateTime $date_to, string $link)
    {

        $this->bookstore = $bookstore;
        $this->book = $book;
        $this->price = $price;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->link = $link;
    }


    /**
     * @return Bookstore
     */
    public function getBookstore(): Bookstore
    {
        return $this->bookstore;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return DateTime
     */
    public function getDateFrom(): DateTime
    {
        return $this->date_from;
    }

    /**
     * @return DateTime
     */
    public function getDateTo(): DateTime
    {
        return $this->date_to;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }



}





