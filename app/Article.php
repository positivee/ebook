<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'photo', 'bookstore_id'];

    public function bookstore() {
        return $this->belongsTo('Bookstore');
    }
}
