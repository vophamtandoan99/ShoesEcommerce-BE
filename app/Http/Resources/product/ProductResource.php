<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseResource;

class ProductResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'amount'        => $this->amount,
            'img'           => $this->img,
            'note'          => $this->note,
            'import_price'  => $this->import_price,
            'export_price'  => $this->export_price,
            'sale'          => $this->sale,
            'status'        => $this->status,
            'supplier_id'   => $this->supplier_id,
            'category_id'   => $this->category_id,
        ];
    }
}
