<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseResource;

class ProductSizeResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'size'  => $this->size,
        ];
    }
}
