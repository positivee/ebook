<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;


class Book extends Model
{
    use Searchable;
    use Notifiable;

    public function toSearchableArray()
    {
        return[
            'objectID' => $this->id,
            'title' => $this->title,
            'author_name' => $this->author_name,
            'author_surname' => $this->author_surname,
        ];
    }

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

    public function transaction(){
        return $this->hasMany('Transaction');
    }

}
