<?php


namespace App\Dto\Book;

use App\Category;

class CreateBook
{

    /**
     * @var String
     */
    protected $title;
    /**
     * @var String
     */
    protected $year;
    /**
     * @var String
     */
    protected $print;
    /**
     * @var String
     */
    protected $picture;
    /**
     * @var String
     */
    protected $description;
    /**
     * @var String
     */
    protected $author_name;
    /**
     * @var String
     */
    protected $author_surname;
    /**
     * @var String
     */
    protected $isbn_number;
    /**
     * @var Category
     */
    protected $category;

    /**
     * CreateBook constructor.
     * @param String $title
     * @param String $year
     * @param String $print
     * @param String $picture
     * @param String $description
     * @param String $author_name
     * @param String $author_surname
     * @param String $isbn_number
     * @param Category $category
     */
    public function __construct(String $title, String $year, String $print, String $picture, String $description, String $author_name, String $author_surname, String $isbn_number, Category $category)
    {
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
     * @return String
     */
    public function getTitle(): String
    {
        return $this->title;
    }

    /**
     * @return String
     */
    public function getYear(): String
    {
        return $this->year;
    }

    /**
     * @return String
     */
    public function getPrint(): String
    {
        return $this->print;
    }

    /**
     * @return String
     */
    public function getPicture(): String
    {
        return $this->picture;
    }

    /**
     * @return String
     */
    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @return String
     */
    public function getAuthorName(): String
    {
        return $this->author_name;
    }

    /**
     * @return String
     */
    public function getAuthorSurname(): String
    {
        return $this->author_surname;
    }

    /**
     * @return String
     */
    public function getIsbnNumber(): String
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