<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseCollection;

class SizeCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($size) {
            return [
                'id'            => $size->id,
                'size'          => $size->size,
            ];
        });
    }
}
