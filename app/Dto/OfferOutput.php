<?php


namespace App\Dto;

//model wyjściowy do pobierania ofert


use App\Book;
use App\Bookstore;
use App\Category;
use DateTime;


class OfferOutput
{

    /**
     * @var Bookstore
     */
    protected $bookstore;
    /**
     * @var Book
     */
    protected $book;
    /**
     * @var float
     */
    protected $price;
    /**
     * @var DateTime
     */
    protected $date_from;
    /**
     * @var DateTime
     */
    protected $date_to;
    /**
     * @var string
     */
    protected $link;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $year;
    /**
     * @var string
     */
    protected $print;
    /**
     * @var string
     */
    protected $picture;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $author_name;
    /**
     * @var string
     */
    protected $author_surname;
    /**
     * @var string
     */
    protected $isbn_number;
    /**
     * @var Category
     */
    protected $category;

    /**
     * OfferOutput constructor.
     * @param Bookstore $bookstore
     * @param Book $book
     * @param float $price
     * @param DateTime $date_from
     * @param DateTime $date_to
     * @param string $link
     * @param string $title
     * @param string $year
     * @param string $print
     * @param string $picture
     * @param string $description
     * @param string $author_name
     * @param string $author_surname
     * @param string $isbn_number
     * @param Category $category
     */
    public function __construct(Bookstore $bookstore, Book $book, float $price, DateTime $date_from, DateTime $date_to,
                                string $link, string $title, string $year, string $print, string $picture,
                                string $description, string $author_name, string $author_surname, string $isbn_number,
                                Category $category)
    {
        $this->bookstore = $bookstore;
        $this->book = $book;
        $this->price = $price;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->link = $link;
        $this->title = $title;
        $this->year = $year;
        $this->print = $print;
        $this->picture = $picture;
        $this->description = $description;
        $this->author_name = $author_name;
        $this->author_surname = $author_surname;
        $this->isbn_number = $isbn_number;
        $this->category = $category;
    }

    /**
     * @return Bookstore
     */
    public function getBookstore(): Bookstore
    {
        return $this->bookstore;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return DateTime
     */
    public function getDateFrom(): DateTime
    {
        return $this->date_from;
    }

    /**
     * @return DateTime
     */
    public function getDateTo(): DateTime
    {
        return $this->date_to;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
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
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getPrint(): string
    {
        return $this->print;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->author_name;
    }

    /**
     * @return string
     */
    public function getAuthorSurname(): string
    {
        return $this->author_surname;
    }

    /**
     * @return string
     */
    public function getIsbnNumber(): string
    {
        return $this->isbn_number;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }


}