<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Bookstore extends Model
{


    protected $fillable = ['name'];

    public function offer() {
        return $this->hasMany('Offer');
    }

    public function user() {
        return $this->hasMany('User');
    }





}