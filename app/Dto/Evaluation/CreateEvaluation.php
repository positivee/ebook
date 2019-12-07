<?php


namespace App\Dto\Evaluation;


use App\Book;
use App\User;

class CreateEvaluation
{

    /**
     * @var String
     */
    protected $title;
    /**
     * @var String
     */
    protected $content;
    /**
     * @var int
     */
    protected $evaluation;
    /**
     * @var Book
     */
    protected $book;
    /**
     * @var User
     */
    protected $user;

    /**
     * CreateEvaluation constructor.
     * @param String $title
     * @param String $content
     * @param int $evaluation
     * @param Book $book
     * @param User $user
     */
    public function __construct(String $title, String $content, int $evaluation, Book $book, User $user)
    {
        $this->title = $title;
        $this->content = $content;
        $this->evaluation = $evaluation;
        $this->book = $book;
        $this->user = $user;
    }

    /**
     * @return String
     */
    public function getTitle(): String
    {
        return $this->title;
    }

    /**
     * @return String
     */
    public function getContent(): String
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getEvaluation(): int
    {
        return $this->evaluation;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }



}