<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coinwallet extends Model
{
    protected $guarded = [''];
    protected  $table = "coinwallets";
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency','currency_id','id');
    }
}
