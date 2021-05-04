<?php

namespace App\Http\Resources\supplier;
use App\Http\Resources\BaseCollection;

class SupplierCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($supplier) {
            return [
                'id'            => $supplier->id,
                'name'          => $supplier->name,
                'address'       => $supplier->address,
                'phone'         => $supplier->phone,
                'status'        => $supplier->status
            ];
        });
    }
}
