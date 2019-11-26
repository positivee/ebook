<?php


namespace App\Dto;


use App\Book;
use App\Bookstore;

class CreateArticle
{
    /**
     * @var Bookstore
     */
    protected $bookstore;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $photo;

    /**
     * CreateArticle constructor.
     * @param Bookstore $bookstore
     * @param string $title
     * @param string $content
     * @param string $photo
     */
    public function __construct(Bookstore $bookstore, string $title, string $content, string $photo)
    {
        $this->bookstore = $bookstore;
        $this->title = $title;
        $this->content = $content;
        $this->photo = $photo;
    }

    /**
     * @return Bookstore
     */
    public function getBookstore(): Bookstore
    {
        return $this->bookstore;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
    public function getPhoto(): string
    {
        return $this->photo;
    }



}
