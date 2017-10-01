<?php

namespace App\Http\Responses;

use App\Offer;
use Illuminate\Contracts\Support\Responsable;

class OfferShowResponse implements Responsable
{
    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function toResponse($request)
    {
        if ($request->input('product_info')) {
            $this->offer->append(['product_name', 'product_image_url']);
        }
        return $this->offer;
    }
}
