<?php


namespace App\Dto\Transaction;


use App\Offer;
use App\User;

class TransactionOutput
{

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
     * @param Offer $offer
     * @param User $user
     * @param string $created_at
     */
    public function __construct(Offer $offer, User $user, string $created_at)
    {
        $this->offer = $offer;
        $this->user = $user;
        $this->created_at = $created_at;
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