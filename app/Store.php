<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function business()
    {
        return $this->belongsTo('App\Business');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
	
}
