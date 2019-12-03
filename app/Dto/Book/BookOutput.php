<?php


namespace App\Dto\Book;

//model wyjściowy do pobierania książek

use App\Category;

class BookOutput
{
    /**
     * @var int
     */
    protected $id;
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
     * BookOutput constructor.
     * @param int $id
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
    public function __construct(int $id, string $title, string $year, string $print, string $picture, string $description,
                                string $author_name, string $author_surname, string $isbn_number, Category $category)
    {
        $this->id = $id;
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