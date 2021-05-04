<?php

namespace App\Exceptions;

use Config;

class UserUnauthorizedException extends ApiException
{
    protected $status;

    public function __construct()
    {
        $this->status = Config::get('exceptions.class.' . get_class());
    }
}
