<?php


namespace App\Dto\Transaction;


use App\Book;
use App\Offer;
use App\User;

class TransactionOutput
{

    /**
     * @var Book
     */
    protected $book;
    /**
     * @var Offer
     */
    protected $offer;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var string
     */
    protected $created_at;

    /**
     * TransactionOutput constructor.
     * @param Book $book
     * @param Offer $offer
     * @param User $user
     * @param string $created_at
     */
    public function __construct(Book $book, Offer $offer, User $user, string $created_at)
    {
        $this->book = $book;
        $this->offer = $offer;
        $this->user = $user;
        $this->created_at = $created_at;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }
    /**
     * @return Offer
     */
    public function getOffer(): Offer
    {
        return $this->offer;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->created_at;
    }




}