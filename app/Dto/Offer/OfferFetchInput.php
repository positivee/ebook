<?php


namespace App\Dto\Offer;

//model wejściowy do wyszukiwania ofert dla użytkownika

use App\Bookstore;
use App\Category;

class OfferFetchInput
{
    /**
     * @var Bookstore
     */
    protected $bookstore = null;
    /**
     * @var string
     */
    protected $title = '';
    /**
     * @var string
     */
    protected $author_name = '';
    /**
     * @var string
     */
    protected $author_surname = '';
    /**
     * @var string
     */
    protected $isbn_number = '';
    /**
     * @var string
     */
    protected $print = '';
    /**
     * @var float
     */
    protected $price_from = null;
    /**
     * @var float
     */
    protected $price_to =null;
    /**
     * @var Category
     */
    protected $category = null;

    /**
     * OfferFetchInput constructor.
     *
     * @param Bookstore|null $bookstore
     * @param string $title
     * @param string $author_name
     * @param string $author_surname
     * @param string $isbn_number
     * @param string $print
     * @param float $price_from
     * @param float $price_to
     * @param Category $category
     */
    public function __construct(?Bookstore $bookstore = null,?string $title = '', ?string $author_name = '', ?string $author_surname = '', ?string $isbn_number = '',
                                ?string $print = '', ?float $price_from = null, ?float $price_to = null, ?Category $category = null)
    {
        $this->bookstore = $bookstore;
        $this->title = $title;
        $this->author_name = $author_name;
        $this->author_surname = $author_surname;
        $this->isbn_number = $isbn_number;
        $this->print = $print;
        $this->price_to = $price_to;
        $this->price_from = $price_from;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * @return string
     */
    public function getPrint(): string
    {
        return $this->print;
    }

    /**
     * @return float
     */
    public function getPriceFrom(): ?float
    {
        return $this->price_from;
    }

    /**
     * @return float
     */
    public function getPriceTo(): ?float
    {
        return $this->price_to;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }



    public function getActiveFilters() : array {
       $filters = [];

       if($this->title !== '') {
           $filters['title'] = $this->title;
       }

       if($this->author_name !== '') {
           $filters['author_name'] = $this->author_name;
       }

       if($this->author_surname !== '') {
           $filters['author_surname'] = $this->author_surname;
       }

       if($this->isbn_number !== '') {
           $filters['isbn_number'] = $this->isbn_number;
       }

       if($this->print !== '') {
           $filters['print'] = $this->print;
       }

       if($this->price_from !== null) {
           $filters['price_from'] = $this->price_from;
       }

       if($this->price_to >= $this->price_from) {
           $filters['price_to'] = $this->price_to;
       }

       if($this->category !== null) {
           $filters['category'] = $this->category;
       }

       return $filters;

    }


}