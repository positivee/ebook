<?php


namespace App\Dto\Offer;

//model wyjściowy do pobierania ofert


use App\Book;
use App\Bookstore;
use App\Category;
use DateTime;


class OfferOutput
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var Bookstore
     */
    public $bookstore;
    /**
     * @var Book
     */
    public $book;
    /**
     * @var float
     */
    public $price;
    /**
     * @var DateTime
     */
    public $date_from;
    /**
     * @var DateTime
     */
    public $date_to;
    /**
     * @var string
     */
    public $link;
    /**
     * @var string
     */
    public $file;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $year;
    /**
     * @var string
     */
    public $print;
    /**
     * @var string
     */
    public $picture;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $author_name;
    /**
     * @var string
     */
    public $author_surname;
    /**
     * @var string
     */
    public $isbn_number;
    /**
     * @var Category
     */
    public $category;

    /**
     * OfferOutput constructor.
     * @param int $id
     * @param Bookstore $bookstore
     * @param Book $book
     * @param float $price
     * @param DateTime $date_from
     * @param DateTime $date_to
     * @param string $link
     * @param string $file
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
    public function __construct(int $id, Bookstore $bookstore, Book $book, float $price, DateTime $date_from, DateTime $date_to, string $link, string $file, string $title, string $year, string $print, string $picture, string $description, string $author_name, string $author_surname, string $isbn_number, Category $category)
    {
        $this->id = $id;
        $this->bookstore = $bookstore;
        $this->book = $book;
        $this->price = $price;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->link = $link;
        $this->file = $file;
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getFile(): string
    {
        return $this->file;
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
