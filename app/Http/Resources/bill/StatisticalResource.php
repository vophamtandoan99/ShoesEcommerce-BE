<?php

namespace App\Http\Resources\bill;
use App\Http\Resources\BaseResource;

class StatisticalResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'statusOne'       => $this->statusOne,
            'statusTwo'       => $this->statusTwo,
            'statusThree'     => $this->statusThree,
            'sum'             => $this->sum
        ];
    }
}
