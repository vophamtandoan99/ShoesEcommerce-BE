<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Session;
use App\Http\Resources\bill\DetailCollection;
use App\Http\Resources\bill\BillCollection;
use App\Http\Requests\BillRequest;
use App\Repositories\ProductRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\BillRepository;
use App\Http\Resources\customer\CustomerCollection;
use App\Http\Resources\customer\CustomerResource;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerBillRequest;
use App\Http\Resources\bill\BillResource;
use App\Http\Resources\BaseResource;
use App\Http\Resources\cart\CartCollection;
use App\Repositories\CartRepository;

class BillController
{
    private $billRepository;
    private $customerRepository;
    private $productRepository;
    private $cartRepository;

    public function __construct(BillRepository $billRepository, CustomerRepository $customerRepository, ProductRepository $productRepository, CartRepository $cartRepository)
    {
        $this->billRepository       = $billRepository;
        $this->customerRepository   = $customerRepository;
        $this->productRepository    = $productRepository;
        $this->cartRepository       = $cartRepository;
    }

    //Index-Search Bill
    public function search(BillRequest $request)
    {
        return new BillCollection($this->billRepository->search($request->searchFilter()));
    }

    //Store Bill & BillDetail
    public function store(Request $request, CustomerBillRequest $customerRequest, BillRequest $billRequest)
    {
        $customer_id = $request->header('customer_id');
        $items = new CartCollection($this->cartRepository->show($customer_id));
        if(!empty($items)){
            $totalPrice          = 0;
            $totalQuantity       = 0;
            foreach($items as $rowCart){
                $price = $rowCart->product_export_price ? $rowCart->product_export_price : $rowCart->product_import_price;
                $totalPrice      += $price*$rowCart->quantity;
                $totalQuantity   += $rowCart->quantity;
            }
            $cart = [
                'items'          => $items,
                'total_price'    => $totalPrice,
                'total_quantity' => $totalQuantity
            ];
            // return $cart;
            $customerUpdate = $this->customerRepository->update($customerRequest->storeFilter(), $customer_id);//new CustomerResource();
            $customer = new CustomerResource($this->customerRepository->show($customer_id));
            $bill = new BillResource($this->billRepository->store($billRequest->storeFilter(), $customer->id, $cart));
            foreach($cart['items'] as $rowCart){
                $PSCdata = $this->billRepository->showPSC($rowCart);
                $price = $rowCart->product_export_price ? $rowCart->product_export_price : $rowCart->product_import_price;
                $billDetail = new BaseResource($this->billRepository->storeBillDetail($bill->id, $PSCdata, $rowCart, $price));
            }
            $showBillDetail = new DetailCollection($this->billRepository->showBillDetail($bill->id));
            //deleteCart
            $this->cartRepository->clear($customer_id);
            return [
                'customer' => $customer,
                'bill' => $bill,
                'billDetail' => $showBillDetail
            ];     
        }
    }
    public function show($id)
    {
        $bill           = new BillResource($this->billRepository->showBill($id));
        $customerInfo   = new CustomerResource($this->customerRepository->show($bill->customer_id));
        $billDetail     = new DetailCollection($this->billRepository->showBillDetail($id));
        return [
            'bill'       => $bill,
            'customer'   => $customerInfo,
            'billdetail' => $billDetail
        ];
    }
    public function update($id)
    {
        $bill = $this->billRepository->show($id);
        if($bill->status == 1){
            return new BaseResource($this->billRepository->update($id));
        }else{
            $billDetail = $this->billRepository->showBillDetail($id);
            foreach($billDetail as $row){
                $psc = $this->billRepository->updateBillDetail($row);
            }
            $product = [];
            foreach($billDetail as $row){
                array_push($product, $row->product_id);
            }
            foreach($product as $product_id){
                $totalAmount = $this->productRepository->sum($product_id);
                $this->productRepository->amount($product_id, $totalAmount);
            }
            return new BaseResource($this->billRepository->updateStatus($id));
        } 
    }
    public function destroy($id, Request $request)
    {
        $bill    = $this->billRepository->show($id);
        $destroy = new BaseResource($this->billRepository->destroy($id, $request->session()->put('bill', $bill->customer_id)));
        $request->session()->forget('bill');
        return $destroy;
    }
    public function statistical()
    {
        return response()->json($this->billRepository->statistical(), 200);
    }
}