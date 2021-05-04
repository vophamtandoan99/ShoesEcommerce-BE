<?php

namespace App\Http\Resources\customer;
use App\Http\Resources\BaseResource;

class CustomerResource extends BaseResource
{
    public function toArray($request)
    {
        return [
                'id'        => $this->id,
                'email'     => $this->email,
                'name'      => $this->name,
                'phone'     => $this->phone,
                'address'   => $this->address
        ];
    }
}
