<?php

namespace App\Http\Resources\user;
use App\Http\Resources\BaseResource;

class SessionUserResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'token'                 => $this->token,
            'refresh_token'         => $this->refresh_token,
            'token_expried'         => $this->token_expried,
            'refresh_token_expried' => $this->refresh_token_expried,
            'user_id'               => $this->user_id
        ];
    }
}