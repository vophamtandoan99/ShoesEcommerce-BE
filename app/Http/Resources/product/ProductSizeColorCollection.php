<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseCollection;

class ProductSizeColorCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($altribute) {
            return [
                'id'            => $altribute->id,
                'product'       => $altribute->product,
                'color'         => $altribute->color,
                'size'          => $altribute->size
            ];
        });
    }
}