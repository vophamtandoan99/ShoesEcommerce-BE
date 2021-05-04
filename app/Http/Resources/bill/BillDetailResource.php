<?php

namespace App\Http\Resources\bill;
use App\Http\Resources\BaseResource;

class BillDetailResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'id_product_size_color'     => $this->id_product_size_color,
            'amount'                    => $this->totamountal,
            'price'                     => $this->price
        ];
    }
}
