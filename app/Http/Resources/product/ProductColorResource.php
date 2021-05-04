<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseResource;

class ProductColorResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'color' => $this->color
        ];
    }
}
