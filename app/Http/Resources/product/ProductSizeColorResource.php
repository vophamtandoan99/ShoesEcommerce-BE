<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseResource;

class ProductSizeColorResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'product_id'    => $this->product_id,
            'size_id'       => $this->size_id,
            'color_id'      => $this->color_id,
            'amount'        => $this->amount
        ];
    }
}
