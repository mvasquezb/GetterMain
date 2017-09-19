<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function stores()
    {
        return $this->hasMany('App\Store');
    }
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}