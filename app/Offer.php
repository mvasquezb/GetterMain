<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'start_date', 'end_date', 'description', 'offer_type_id'
    ];

    protected $hidden = [
        'pivot', 'product'
    ];

    public function getProductImageUrlAttribute() {
        return $this->product->image_url;
    }

    public function getProductNameAttribute() {
        return $this->product->name;
    }

    public function getPurchaseDateAttribute() {
        if (!$this->pivot) {
            return null;
        }
        $purchaseDate = $this->pivot->purchase_date;
        if (!$purchaseDate) {
            return null;
        }
        return $purchaseDate;
    }
    
    public function type()
    {
        return $this->belongsTo('App\OfferType');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function buyers() {
        return $this->belongsToMany('App\User', 'purchases')
                    ->withPivot('purchase_date');
    }
}
