<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

    //Store Customer
    public function storeRules(): array
    {
        return [
            'email'             => 'required|email|min:0|max:50|unique:customer',
            'password'          => 'required|min:5|max:30',
            'confirmpassword'   => 'required|same:password',
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'email',
            'password'
        ]);
    }

    //update Customer
    public function updateRules(): array
    {
        return [
            'name'              => 'required|min:2|max:50',
            'phone'             => 'required|numeric',
            'address'           => 'required|min:1|max:200'
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'name',
            'phone',
            'address'
        ]);
    }
}
