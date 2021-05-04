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

    //Show Product
    public function show($id)
    {
        return new ProductResource($this->productRepository->show($id));
    }

    //Store Product
    public function store(ProductRequest $request, ProductSizeColorRequest $requestSizeColor)
    {
        /*Upload Image*/
        $image          = $request->file('img');
        $newNamefile    = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/uploads/product'),$newNamefile);
        /*Store Product*/
        $product        = new BaseResource($this->productRepository->store($request->storeFilter(), $newNamefile));
        /*Store Product Size Color*/
        $size = $requestSizeColor->size_id;
        $color = $requestSizeColor->color_id; 
        $amount = $requestSizeColor->amount;
        if($product == true && isset($size) && isset($color) && isset($amount)){
            for($x = 0; $x < count($amount); $x++) {
                $data = ['size_id'=>$size[$x], 'color_id'=> $color[$x], 'amount'=>$amount[$x]];
                $PSC = new BaseResource($this->productRepository->storePSC($data, $product->id));
            }
            /*Update quantity Product*/
            if($PSC == true){
                $totalAmount = $this->productRepository->sum($product->id);
                $this->productRepository->amount($product->id, $totalAmount);
            }
            return $product;
        }
        
    }

    //Update Product
    public function update(ProductRequest $request, ProductSizeColorRequest $requestSizeColor, $id)
    {
        /*Update Product*/
        $Updateproduct = new BaseResource($this->productRepository->update($request->updateFilter(), $id));
        /*Update Product Size Color*/
        $size   = $requestSizeColor->size_id;
        $color  = $requestSizeColor->color_id;
        $amount = $requestSizeColor->amount;
        if(isset($size) && isset($color) && isset($amount)){
            $productPSC = $this->productRepository->showPSC($id);
            $idPSC = [];
            foreach($productPSC as $row){
                array_push($idPSC, $row['id']);
            }
            for($x = 0; $x < count($amount); $x++) {
                $data = ['id'=>$idPSC[$x], 'size_id'=>$size[$x], 'color_id'=> $color[$x], 'amount'=>$amount[$x]];
                $PSC = new BaseResource($this->productRepository->updatePSC($data));
            }
            /*Update Quantity Product*/
            $totalAmount = $this->productRepository->sum($id);
            $this->productRepository->amount($id, $totalAmount);
            return $Updateproduct;
        }
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

    // public function category($id)
    // {
    //     return new ProductCollection($this->productRepository->category($id));
    // }    
}
 