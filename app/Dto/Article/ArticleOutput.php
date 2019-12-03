<?php


namespace App\Dto\Article;

//model wyjściowy do pobierania artykułów

use App\Bookstore;

class ArticleOutput
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
     * @var string
     */
    protected $created_at;

    /**
     * ArticleOutput constructor.
     * @param Bookstore $bookstore
     * @param string $title
     * @param string $content
     * @param string $photo
     * @param string $created_at
     */
    public function __construct(Bookstore $bookstore, string $title, string $content, string $photo, string $created_at)
    {
        $this->bookstore = $bookstore;
        $this->title = $title;
        $this->content = $content;
        $this->photo = $photo;
        $this->created_at=$created_at;
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
    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->created_at;
    }




}
