<?php


namespace App\Dto\Transaction;


use App\Offer;
use App\User;

class TransactionFetchInput
{
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
     * @param Offer $offer
     * @param User $user
     */
    public function __construct(?Offer $offer = null, ?User $user = null)
    {
        $this->offer = $offer;
        $this->user = $user;
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