<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;

class CustomerRepository
{
    public function show($id)
    {
        return Customer::findOrFail($id);
    }
    public function store($inputs)
    {
        return Customer::create($inputs);
    }
}
