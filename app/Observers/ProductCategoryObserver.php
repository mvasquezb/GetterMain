<?php

namespace App\Observers;

use App\ProductCategory;

class ProductCategoryObserver
{
    /**
     * Listen to the creating ProductCategory event
     */
    public function creating(ProductCategory $productCategory)
    {
        if (!$productCategory->slug) {
            $productCategory->slug = str_slug($productCategory->name);
        }
    }
}
