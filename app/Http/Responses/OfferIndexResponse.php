<?php

namespace App\Http\Responses;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Responsable;

class OfferIndexResponse implements Responsable
{
    public function __construct(Collection $offers)
    {
        $this->offers = $offers;
    }

    public function toResponse($request)
    {
        $productInfo = $request->input('product_info', false);
        $productInfo = $productInfo === "true";
        if ($productInfo) {
            foreach ($this->offers as $offer) {
                $offer->append(['product_name', 'product_image_url']);
            }
        }
        return $this->offers;
    }
}
