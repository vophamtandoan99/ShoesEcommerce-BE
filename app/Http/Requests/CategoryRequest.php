<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

    //Search Category
    public function searchRules():array
    {
        return [
            'id'    => 'integer|nullable',
            'name'  =>'string|nullable',
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'id',
            'name'
        ]);
    }

    //Store Category
    public function storeRules(): array
    {
        return [
            'name'   => 'required|unique:category|string|min:1|max:100',
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'name'
        ]);
    }

    //Update Category
    public function updateRules(): array
    {
        return [
            'name' => 'required||string|min:1|max:100|unique:category,name,'.$this->id,
            'status' => 'integer|max:2'
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'name',
            'status'
        ]);
    }
}
