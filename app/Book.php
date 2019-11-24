<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{

    protected $fillable = ['title', 'year', 'print', 'picture', 'description', 'author_name', 'author_surname', 'isbn_number', 'category_id'];

    public function offer() {
        return $this->hasMany('Offer');
    }

    public function evaluation() {
        return $this->hasMany('Evaluation');
    }

    public function category() {
        return $this->belongsTo('Category');
    }

}
