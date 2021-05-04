<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if($this->isMethod('get')){
            return $this->searchRules();
        }elseif($this->isMethod('post')){
            return $this->storeRules();
        }elseif($this->isMethod('put')){
            return $this->updateRules();
        }
    }

    //Search User
    public function searchRules():array
    {
        return [
            'code'      => 'integer|nullable',
            'name'      =>'string|nullable',
            'email'     => 'string|nullable',
            'status'    => 'integer|nullable'
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'code',
            'name',
            'email',
            'status'
        ]);
    }

    //Store User
    public function storeRules(): array
    {
        return [
            'code'              => 'required|min:1|max:20|unique:users',
            'name'              => 'required|min:2|max:50',
            'dateofbirth'       => 'required|date',
            'phone'             => 'required|numeric',
            'address'           => 'required|min:1|max:200',
            'email'             => 'required|email|unique:users',
            'img'               => 'required|file|image',
            'password'          => 'required|min:5|max:30',
            'confirmpassword'   => 'required|same:password',
            'role'              => 'required'
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'code',
            'name',
            'dateofbirth',
            'phone',
            'address',
            'email',
            'img',
            'password',
            'role'
        ]);
    }

    //Update User
    public function updateRules(): array
    {
        return [
            'code'              => 'required|string|min:1|max:100|unique:users,code,'.$this->id,
            'name'              => 'required|min:2|max:50',
            'dateofbirth'       => 'required|date',
            'phone'             => 'required|numeric',
            'address'           => 'required|min:1|max:200',
            'email'             => 'required|email|unique:users,email,'.$this->id,
            'password'          => 'string|min:6|max:50|nullable',
            'confirmpassword'   => 'string|min:6|max:50|same:password|nullable',
            'role'              => 'required|max:2',
            'status'            => 'required|max:2',
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'code',
            'name',
            'dateofbirth',
            'phone',
            'address',
            'email',
            'password',
            'role',
            'status'
        ]);
    }
}
