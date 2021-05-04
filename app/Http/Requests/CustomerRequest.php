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
        return $this->storeRules();
    }
    public function storeRules(): array
    {
        return [
            'email'     => 'required|email|min:0|max:50',
            'name'      => 'required|string|min:0|max:30',
            'phone'     => 'required|numeric',
            'address'   => 'required|string|min:0|max:255',
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'email',
            'name',
            'phone',
            'address'
        ]);
    }
}
