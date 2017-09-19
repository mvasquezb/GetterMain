<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferType extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
