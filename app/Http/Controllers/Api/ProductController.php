<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\BaseResource;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\product\ProductCollection;
use App\Http\Resources\product\ProductResource;
use App\Http\Resources\product\ProductSizeColorResource;
use App\Http\Resources\product\SizeCollection;
use App\Http\Resources\product\ColorCollection;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductSizeColorRequest;
use App\Http\Requests\WarehouseRequest;
use App\Http\Resources\product\ProductSizeColorCollection;
use App\Repositories\ProductRepository;

class ProductController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    //Index-Search Product
    public function search(ProductRequest $request)
    {
        return new ProductCollection($this->productRepository->search($request->searchFilter()));
    }

    public function searchPSC(ProductSizeColorRequest $request)
    {
        return new ProductSizeColorCollection($this->productRepository->searchPSC($request->searchFilter()));
    }

    //Show Product
    public function show($id)
    {
        return new ProductResource($this->productRepository->show($id));
    }

    //Store Product
    public function store(ProductRequest $request, WarehouseRequest $warehouseRequest)
    {
        
        /*Upload Image*/
        $image          = $request->file('img');
        $newNamefile    = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/uploads/product'),$newNamefile);
        /*Store Product*/
        $product = new BaseResource($this->productRepository->store($request->storeFilter(), $newNamefile)); 
        /*Store ProductSizeColor*/
        $data = $warehouseRequest->data;
        foreach($data as $row){
            $warehouse = new BaseResource($this->productRepository->storeWarehouse($product->id, $row)); 
        }
        $this->productRepository->amount($product->id);
        return $product;
    }

    //Store altribute
    public function storePSC(ProductSizeColorRequest $requestSizeColor)
    {
        $data = [
            'product_id'    => $requestSizeColor->product_id,
            'color_id'      => $requestSizeColor->color_id,
            'size_id'       => $requestSizeColor->size_id,
            'amount'        => $requestSizeColor->amount
        ];
        $checkData     = $this->productRepository->checkData($data);
        /*Store ProductSizeColor*/
        if(empty($checkData)){
            $altribute = new BaseResource($this->productRepository->storePSC($data));
        }else{
            $altribute = new BaseResource($this->productRepository->storePSCNotNull($data, $checkData));
        }
        /*Update quantity Product*/
            if($altribute == true){
                $this->productRepository->amount($data['product_id']);
            }
        return $altribute;
    }

    //Update Product
    public function update(ProductRequest $request, $id)
    {
        return new BaseResource($this->productRepository->update($request->updateFilter(), $id));
    }

    /*Update altribute*/
    public function updatePSC(ProductSizeColorRequest $requestSizeColor, $id)
    {
        $Updatealtribute = new BaseResource($this->productRepository->updatePSC($requestSizeColor->updateFilter(), $id));
        $this->productRepository->amount($requestSizeColor->product_id);
        return $Updatealtribute;
    }
    
    //Delete Product (Update Status)
    public function destroy($id)
    {
        $getdata = new ProductResource($this->productRepository->show($id));
        if($getdata->status == 1){
            return new BaseResource($this->productRepository->destroy($id));
        }else{
            return new BaseResource($this->productRepository->updateStatus($id));
        }
    }

    //Get Size-Color
    public function getSize()
    {
        return new SizeCollection($this->productRepository->getSize());
    }
    public function getColor()
    {
        return new ColorCollection($this->productRepository->getColor());
    } 
}
 