<?php


namespace App\Dto\Evaluation;


use App\Book;
use App\User;

class EvaluationOutput
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
     * @var String
     */
    protected $created_at;
    /**
     * CreateEvaluation constructor.
     * @param String $title
     * @param String $content
     * @param int $evaluation
     * @param Book $book
     * @param User $user
     * @param String $created_at
     */
    public function __construct(String $title, String $content, int $evaluation, Book $book, User $user, String $created_at)
    {
        $this->title = $title;
        $this->content = $content;
        $this->evaluation = $evaluation;
        $this->book = $book;
        $this->user = $user;
        $this->created_at = $created_at;
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

    /**
     * @return String
     */
    public function getDate() : String
    {
        return $this->created_at;
    }

}