<?php

namespace App\Http\Resources\user;
use App\Http\Resources\BaseResource;

class UserResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'code'          => $this->code,
            'name'          => $this->name,
            'dateofbirth'   => $this->dateofbirth,
            'phone'         => $this->phone,
            'address'       => $this->address,
            'email'         => $this->email,
            'img'           => $this->img,
            'role'          => $this->role,
            'status'        => $this->status
        ];
    }
}
