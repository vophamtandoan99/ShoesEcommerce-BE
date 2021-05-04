<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if ($this->isMethod('get')){
            return $this->searchRules();
        }elseif($this->isMethod('post')){
            return $this->storeRules();
        }elseif($this->isMethod('put')){
            return $this->updateRules();
        }
    }

    //Search Product
    public function searchRules():array
    {
        return [
            'id'        =>'integer|nullable',
            'name'      =>'string|nullable',
            'status'    =>'integer|nullable'
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'id',
            'name',
            'status'
        ]);
    }

    //Store Product
    public function storeRules(): array
    {
        return [
            'name'          => 'required|unique:product|string|min:1|max:255',
            'img'           => 'required|file|image',
            'note'          => 'required|string|min:1|max:1000',
            'import_price'  => 'required|integer|min:0',
            'export_price'  => 'required|integer:min:0',
            'sale'          => 'required|integer|max:100',
            'supplier_id'   => 'required|integer',
            'category_id'   => 'required|integer'
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'name',
            'img',
            'note',
            'import_price',
            'export_price',
            'sale',
            'supplier_id',
            'category_id'
        ]);
    }

    //Update Product
    public function updateRules(): array
    {
        return [
            'name'          => 'required|string|min:1|max:255|unique:product,name,'.$this->id,
            'note'          => 'required|string|min:1|max:1000',
            'import_price'  => 'required|integer|min:0',
            'export_price'  => 'required|integer:min:0',
            'sale'          => 'required|integer|max:100',
            'supplier_id'   => 'required|integer',
            'category_id'   => 'required|integer'
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'name',
            'note',
            'import_price',
            'export_price',
            'sale',
            'supplier_id',
            'category_id'
        ]);
    }
}
