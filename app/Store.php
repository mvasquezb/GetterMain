<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = [
        'latitude', 'longitude',
    ];

    protected $hidden = ['business'];

    public function getBusinessNameAttribute() {
        return $this->business->name;
    }

    public function getBusinessLogoUrlAttribute() {
        return $this->business->logo;
    }

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
