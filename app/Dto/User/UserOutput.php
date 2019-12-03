<?php


namespace App\Dto\User;


use App\User;

class UserOutput
{
    /**
     * @var User
     */
    public $user;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $surname;
    /**
     * @var string
     */
    public $email;


    /**
     * UserOutput constructor.
     * @param User $user
     * @param string $name
     * @param string $surname
     * @param string $email
     */
    public function __construct(User $user, string $name, string $surname, string $email)
    {
        $this->user = $user;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }




}