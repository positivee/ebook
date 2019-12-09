<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'offer_id',];

    public function user() {
        return $this->belongsTo('User');
    }

    public function offer() {
        return $this->belongsTo('Offer');
    }
}