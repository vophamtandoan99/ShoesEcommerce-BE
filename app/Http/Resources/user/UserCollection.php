<?php

namespace App\Http\Resources\user;
use App\Http\Resources\BaseCollection;

class UserCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($user) {
            return [
                'id'            => $user->id,
                'code'          => $user->code,
                'name'          => $user->name,
                'dateofbirth'   => $user->dateofbirth,
                'phone'         => $user->phone,
                'address'       => $user->address,
                'email'         => $user->email,
                'img'           => $user->img,
                'role'          => $user->role,
                'status'        => $user->status
            ];
        });
    }
}
