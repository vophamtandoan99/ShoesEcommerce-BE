<?php

namespace App\Http\Resources\user;
use App\Http\Resources\BaseResource;

class SessionResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'token'   => $this->token,
            'name'    => $this->name,
            'email'   => $this->email,
            'img'     => $this->img
        ];
    }
}