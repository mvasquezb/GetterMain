<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description'
    ];

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function business()
    {
        return $this->belongsTo('App\Business');
    }
}
