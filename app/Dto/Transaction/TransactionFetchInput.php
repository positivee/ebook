<?php


namespace App\Dto\Transaction;


use App\Book;
use App\Offer;
use App\User;

class TransactionFetchInput
{
    /**
     * @var Book
     */
    protected $book = null;
    /**
     * @var Offer
     */
    protected $offer = null;
    /**
     * @var User
     */
    protected $user = null;
    /**


    /**
     * TransactionFetchInput constructor.
     * @param Book $book
     * @param Offer $offer
     * @param User $user
     */
    public function __construct(?Book $book = null, ?Offer $offer = null, ?User $user = null)
    {
        $this->book = $book;
        $this->offer = $offer;
        $this->user = $user;
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




}