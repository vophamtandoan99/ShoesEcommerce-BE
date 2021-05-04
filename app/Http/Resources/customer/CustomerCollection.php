<?php

namespace App\Http\Resources\customer;
use App\Http\Resources\BaseCollection;

class CustomerCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($customer) {
            return [
                'id' => $customer->id,
                'email' => $customer->email,
                'name' => $customer->name
                'phone' => $customer->phone,
                'address' => $customer->address,
            ];
        });
    }
}
