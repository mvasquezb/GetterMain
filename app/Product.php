<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'image_url', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function business()
    {
        return $this->belongsTo('App\Business');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
