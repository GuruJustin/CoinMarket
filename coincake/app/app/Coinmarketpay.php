<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coinmarketpay extends Model
{
    protected $table = "coinmarketpays";
    protected $guarded =[];


     public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
