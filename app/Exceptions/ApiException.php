<?php

namespace App\Exceptions;

use Exception;
use Config;

class ApiException extends Exception
{
    protected $status;

    public function exceptionResponse(Exception $exception)
    {
        return response()->json([
            'data' => null,
            'meta' => [
                'status' => $this->status,
                'error' => $exception->getMessage(),
                'pagination' => null
            ]
        ], Config::get('api.status.' . $this->status, 500));
    }
}
