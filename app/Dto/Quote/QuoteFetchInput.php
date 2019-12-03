<?php

namespace App\Dto\Quote;
use App\User;

class QuoteFetchInput
{
    /**
     * @var User
     */
    protected $user = null;
    /**
     * @var string
     */
    protected $content = '';
    /**
     * @var string
     */
    protected $book_title = '';
    /**
     * @var string
     */
    protected $book_author_name = '';
    /**
     * @var string
     */
    protected $book_author_surname = '';

    /**
     * QuoteFetchInput constructor.
     * @param User|null $user
     * @param string $content
     * @param string $book_title
     * @param string $book_author_name
     * @param string $book_author_surname
     */
    public function __construct(?User $user= null, ?string $content = '', ?string $book_title = '',
                                ?string $book_author_name = '', ?string $book_author_surname = '')
    {
        $this->user = $user;
        $this->content = $content;
        $this->book_title = $book_title;
        $this->book_author_name = $book_author_name;
        $this->book_author_surname = $book_author_surname;
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

    public function getActiveFilters() : array
    {
        $filters = [];

        if ($this->content !== '') {
            $filters['content'] = $this->content;
        }

        if($this->book_title !=='') {
            $filters['book_title'] = $this->book_title;
        }

        if($this->book_author_name !=='') {
            $filters['book_author_name'] = $this->book_author_name;
        }

        if($this->book_author_surname !=='') {
            $filters['book_author_surname'] = $this->book_author_surname;
        }


        return $filters;
    }



}