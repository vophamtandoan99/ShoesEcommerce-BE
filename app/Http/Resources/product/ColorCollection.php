<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseCollection;

class ColorCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($color) {
            return [
                'id'            => $color->id,
                'color'          => $color->color,
            ];
        });
    }
}
