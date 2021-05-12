<?php

namespace App\Http\Resources\bill;
use App\Http\Resources\BaseResource;

class BillResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'customer_id'   => $this->customer_id,
            'total'         => $this->total,
            'dateorder'     => $this->dateorder,
            'payment'       => $this->payment,
            'note'          => $this->note ? $this->note : null,
            'status'        => $this->status
        ];
    }
}
