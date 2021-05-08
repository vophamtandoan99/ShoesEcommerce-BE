<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if ($this->isMethod('post')){
            return $this->storeRules();
        }elseif($this->isMethod('put')){
            return $this->updateRules();
        }
    }
    
    //Add Cart
    public function storeRules(): array
    {
        return [
            'id' => 'integer',
            'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'integer'
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'id',
            'size_id',
            'color_id',
            'quantity'
        ]);
    }

    //Update Cart
    public function updateRules(): array
    {
        return[
            'quantity' => 'numeric',
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'quantity',
        ]);
    }
}
