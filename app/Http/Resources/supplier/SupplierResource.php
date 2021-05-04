<?php

namespace App\Http\Resources\supplier;
use App\Http\Resources\BaseResource;

class SupplierResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'address'       => $this->address,
            'phone'         => $this->phone,
            'status'        => $this->status
        ];
    }
}
