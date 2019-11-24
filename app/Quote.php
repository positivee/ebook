<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['content', 'book_title', 'book_author_name','book_author_surname', 'user_id'];

    public function user() {
        return $this->belongsTo('User');
    }

}
