<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $guarded = [''];
    protected  $table = "coins";
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency','currency_id','id');
    }
}
