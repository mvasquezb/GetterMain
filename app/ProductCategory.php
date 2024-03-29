<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $fillable = [
        'name', 'slug'
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
