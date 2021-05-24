<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSizeColorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
       if($this->isMethod('post')){
            return $this->storeRules();
        }elseif($this->isMethod('put')){
            return $this->updateRules();
        }
    }

    //Store Product Size
    public function storeRules(): array
    {
        return [
            'product_id' => 'required',
            'size_id'    => 'required',
            'color_id'   => 'required',
            'amount'     => 'required',
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'product_id',
            'size_id',
            'color_id',
            'amount'
        ]);
    }

    //Update Product Size
    public function updateRules(): array
    {
        return [
            'product_id' => 'required',
            'size_id'    => 'required',
            'color_id'   => 'required',
            'amount'     => 'required',
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'product_id',
            'size_id',
            'color_id',
            'amount'
        ]);
    }
}
