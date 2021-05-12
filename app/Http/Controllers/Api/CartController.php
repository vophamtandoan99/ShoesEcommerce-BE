<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\CartRepository;
use App\Http\Resources\BaseResource;
use App\Http\Requests\CartRequest;
use App\Http\Resources\cart\CartProductCollection;
use App\Http\Resources\cart\CartCollection;

class CartController extends BaseResource
{
    private $productRepository;
    private $cartRepository;

    public function __construct(ProductRepository $productRepository, CartRepository $cartRepository)
    {
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
    }
    public function add(Request $request, CartRequest $cartRequest, $customer)
    {
        // $customer = $request->header('customer_id');
        $quantity = $cartRequest->quantity ?? 1;
        $cart = [   
            'customer_id'   => $customer,             
            'product_id'    => $cartRequest['product_id'],
            'size_id'       => $cartRequest['size_id'],
            'color_id'      => $cartRequest['color_id'],
            'quantity'      => $quantity
        ];
        $checkCart = $this->cartRepository->check($customer, $cart);
        if(empty($checkCart)){
            return new BaseResource($this->cartRepository->store($cart));
        }elseif($cart['customer_id'] == $checkCart->customer_id && $cart['product_id'] == $checkCart->product_id && $cart['size_id'] == $checkCart->size_id && $cart['color_id'] == $checkCart->color_id){
            return new BaseResource($this->cartRepository->plus($checkCart, $quantity));
        }else{
            return $this->sendError('Add failure');
        }
    }

    public function view(Request $request, $customer)
    {
        return new CartCollection($this->cartRepository->show($customer));
    }

    public function update($id, CartRequest $cartRequest)
    {
        return new BaseResource($this->cartRepository->update($cartRequest->updateFilter(), $id));
    }

    public function remove($id)
    {
        return new BaseResource($this->cartRepository->remove($id));
    }

    public function clear($customer)
    {
        return new BaseResource($this->cartRepository->clear($customer));
    }

    public function total($customer)
    {
        return $this->sendResponse($this->cartRepository->total($customer), 'cart quantity');
    }
}
