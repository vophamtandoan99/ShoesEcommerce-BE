<?php

namespace App\Http\Resources\user;
use App\Http\Resources\BaseCollection;

class SessionUserCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($token) {
            return [
                'token'     => $token->token,
                'name'      => $token->name,
                'email'     => $token->email,
                'img'       => $token->img,
                'role'      => $token->role
            ];
        });
    }
}
