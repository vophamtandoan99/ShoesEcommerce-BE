<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Http\Resources\BaseResource;
use App\Http\Requests\CartRequest;

class CartController extends BaseResource
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function add(Request $request, CartRequest $cartRequest)
    {
        $product = $this->productRepository->showCart($cartRequest);
        if(!empty($product)){
            $items = $request->session()->get('cart', []);
            $rowId = $product['product']['id'].$product['size']['id'].$product['color']['id'];
            $quantity = $cartRequest->quantity ?? 1;
            $new = [                
                'id'        => $product['product']['id'],
                'name'      => $product['product']['name'],
                'price'     => $product['product']['export_price'] ? $product['product']['export_price'] : $product['product']['import_price'],
                'img'       => $product['product']['img'],
                'size_id'   => $product['size']['id'],
                'size'      => $product['size']['size'],
                'color_id'  => $product['color']['id'],
                'color'     => $product['color']['color'],
                'quantity'  => $quantity,
                ];
            if(isset($items[$rowId])){
                $items[$rowId]['quantity'] += $quantity;
                $new['quantity'] = $items[$rowId]['quantity'];
            }
            else{
                $items[$rowId] = $new;
            }
            $request->session()->put('cart', $items);
            return $this->sendResponse($new, 'Add to cart successfully');
        }else{
            return $this->sendError('Add to cart failed');
        }
        
    }

    public function view(Request $request)
    {
        // $items = $request->session()->all();
        $items = $request->session()->get('cart');
        // $value = $request->cookie('cart'); 
        if(isset($items) && !empty($items)){
            $price      = 0;
            $quantity   = 0;
            foreach($items as $rowCart){
                $price      += $rowCart['price']*$rowCart['quantity'];
                $quantity   += $rowCart['quantity'];
            }
            $totalPrice = $price;
            $totalQuantity = $quantity;
            return $this->sendResponse([
                'items'             => $items,
                'total_price'       =>  $totalPrice,
                'total_quantity'    =>  $totalQuantity,
            ], 'View Cart');
        }else{
            return $this->sendError('The cart is empty');
        }
    }

    public function update($id, Request $request)
    {
        $items = session('cart');
        if(isset($items[$id])){
            $items[$id]['quantity'] = $request->quantity;
            $request->session()->put('cart', $items);
            return $this->sendResponse($items[$id], 'Edit to cart successfully');
        }else{
            return $this->sendError('Edit to cart failed');
        }
    }

    public function remove($id, Request $request)
    {
        $items = session('cart');
        if(isset($items[$id])){
            unset($items[$id]);
            $request->session()->put('cart', $items);
            return $this->sendResponse(null, 'Item deleted successfully');
        }else{
            return $this->sendError('This item does not exist');
        }
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        if(empty($request->session()->get('cart'))){
            return $this->sendResponse(null, 'Cart deleted successfully');
        }
    }
}
