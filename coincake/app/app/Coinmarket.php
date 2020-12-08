<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coinmarket extends Model
{
     use SoftDeletes;
    protected $table = "coinmarkets";
    protected $guarded =[];


     public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
