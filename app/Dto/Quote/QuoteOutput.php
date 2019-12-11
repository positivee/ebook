<?php

namespace App\Dto\Quote;

//model wyjściowy do pobierania cytatów

use App\User;

class QuoteOutput {

    /**
     * @var $id
     */
    protected $id;
    /**
     * @var User
     */
    protected $user;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $book_title;

    /**
     * @var string
     */
    protected $book_author_name;

    /**
     * @var string
     */
    protected $book_author_surname;

    /**
     * QuoteOutput constructor.
     * @param int $id
     * @param User $user
     * @param string $content
     * @param string $book_title
     * @param string $book_author_name
     * @param string $book_author_surname

     */
    public function __construct(int $id, User $user, string $content, string $book_title, string $book_author_name, string $book_author_surname)
    {
        $this->id = $id;
        $this->user = $user;
        $this->content = $content;
        $this->book_title = $book_title;
        $this->book_author_name = $book_author_name;
        $this->book_author_surname = $book_author_surname;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return$this->id;
    }
    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getBookTitle(): string
    {
        return $this->book_title;
    }

    /**
     * @return string
     */
    public function getBookAuthorName(): string
    {
        return $this->book_author_name;
    }

    /**
     * @return string
     */
    public function getBookAuthorSurname(): string
    {
        return $this->book_author_surname;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }




}