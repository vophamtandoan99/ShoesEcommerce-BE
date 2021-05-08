<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerBillRequest extends FormRequest
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
            'name'      => 'required|string|min:0|max:50',
            'phone'     => 'required|min:5|max:30',
            'address'   => 'required|string|min:0|max:150',
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'name',
            'phone',
            'address'
        ]);
    }
}
