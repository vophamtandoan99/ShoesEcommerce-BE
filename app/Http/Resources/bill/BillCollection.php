<?php

namespace App\Http\Resources\bill;
use App\Http\Resources\BaseCollection;

class BillCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($bill) {
            return [
                'id'            => $bill->id,
                'customer_id'   => $bill->customer_id,
                'total'         => $bill->total,
                'payment'       => $bill->payment,
                'dateorder'     => $bill->dateorder,
                'note'          => $bill->note,
                'status'        => $bill->status
            ];
        });
    }
}
