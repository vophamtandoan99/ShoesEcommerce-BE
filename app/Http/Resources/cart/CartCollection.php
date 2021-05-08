<?php

namespace App\Http\Resources\cart;
use App\Http\Resources\BaseCollection;

class CartCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($cart) {
            return [
                'id'            => $cart->id,
                'product_id'    => $cart->product_id,
                'product_name'  => $cart->product_name,
                'product_price' => $cart->product_export_price ? $cart->product_export_price : $cart->product_import_price,
                'product_img'   => $cart->product_img,
                'size_id'       => $cart->size_id,
                'size'          => $cart->size,
                'color_id'      => $cart->color_id,
                'color'         => $cart->color,
                'quantity'      => $cart->quantity
            ];
        });
    }
}
