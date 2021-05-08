<?php

namespace App\Http\Resources\cart;
use App\Http\Resources\BaseCollection;

class CartProductCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($cart) {
            return [
                'id'         => $cart->id,
                'name'       => $cart->name,
                'price '     => $cart->export_price ? $cart->export_price : $cart->import_price,
                'img'        => $cart->img,
            ];
        });
    }
}
