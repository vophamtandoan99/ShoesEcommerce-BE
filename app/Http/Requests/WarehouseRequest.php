<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
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

   
    //Store Warehouse
    public function storeRules(): array
    {
        return [
            //'data'    => 'required',
            // 'color_id'   => 'required',
            // 'quantity'     => 'required',
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'data'
        ]);
    }

}
