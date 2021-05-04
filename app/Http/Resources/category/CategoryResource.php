<?php

namespace App\Http\Resources\category;
use App\Http\Resources\BaseResource;

class CategoryResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'status'     => $this->status
        ];
    }
}
