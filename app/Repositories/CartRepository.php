<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;

class CartRepository
{
    public function store($cart)
    {
        return Cart::create([
            "customer_id"   => $cart['customer_id'],
            "product_id"    => $cart['product_id'],
            "size_id"       => $cart['size_id'],
            "color_id"      => $cart['color_id'],
            "quantity"      => $cart['quantity']
        ]);
    }

    public function check($customer, $cart)
    {
        return Cart::wherecustomer_id($customer)
            ->whereproduct_id($cart['product_id'])
            ->wherecolor_id($cart['color_id'])
            ->wheresize_id($cart['size_id'])
            ->first();
    }

    public function plus($checkCart, $quantity)
    {
        return Cart::find($checkCart->id)
            ->update(['quantity' => $checkCart->quantity+$quantity]);
    }

    public function show($customer)
    {
        return Cart::join('product', 'cart.product_id', '=', 'product.id')
            ->join('color', 'cart.color_id', '=', 'color.id')
            ->join('size', 'cart.size_id', '=', 'size.id')
            ->select('cart.id as id', 'cart.product_id as product_id',
                    'product.name as product_name', 'product.import_price as product_import_price',
                    'product.export_price as product_export_price', 'product.img as product_img',
                    'size.id as size_id', 'size.size as size', 'color.id as color_id',
                    'color.color as color', 'cart.quantity as quantity', 'cart.customer_id as customer_id')
            ->where('cart.customer_id', $customer)
            ->paginate();
    }

    public function remove($id)
    {
        return Cart::findOrFail($id)
            ->delete();
    }

    public function clear($customer)
    {
        return Cart::wherecustomer_id($customer)
            ->delete();
    }

    public function update($inputs, $id)
    {
        return Cart::findOrFail($id)
            ->update(['quantity' => $inputs['quantity']]);
    }

    public function total($customer)
    {
        return Cart::wherecustomer_id($customer)
            ->count();
    }
}
