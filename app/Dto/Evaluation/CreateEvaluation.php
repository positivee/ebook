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
     * @var int
     */
    protected $book_id;
    /**
     * @var User
     */
    protected $user;

    /**
     * CreateEvaluation constructor.
     * @param User $user
     * @param String $title
     * @param String $content
     * @param int $evaluation
     * @param int $book_id
     *
     */
    public function __construct(User $user,String $title, String $content, int $evaluation, int $book_id )
    {
        $this->user = $user;
        $this->title = $title;
        $this->content = $content;
        $this->evaluation = $evaluation;
        $this->book_id = $book_id;

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
     * @return int
     */
    public function getBookId(): int
    {
        return $this->book_id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }



}
