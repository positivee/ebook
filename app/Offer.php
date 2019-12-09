<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    protected $fillable = ['price', 'date_from', 'date_to', 'link', 'bookstore_id', 'book_id'];

    public function book() {
        return $this->belongsTo('Book');
    }

    public function bookstore() {
        return $this->belongsTo('Bookstore');
    }

    public function transaction() {
        return $this->hasMany('Transaction');
    }

}
