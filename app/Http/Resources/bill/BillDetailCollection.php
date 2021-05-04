<?php

namespace App\Http\Resources\bill;
use App\Http\Resources\BaseCollection;

class BillDetailCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($billDetail) {
            return [
                'id'                     => $billDetail->id,
                'id_bill'                => $billDetail->id_bill,
                'id_product_size_color ' => $billDetail->id_product_size_color ,
                'amount'                 => $billDetail->amount,
                'price'                  => $billDetail->price
            ];
        });
    }
}
