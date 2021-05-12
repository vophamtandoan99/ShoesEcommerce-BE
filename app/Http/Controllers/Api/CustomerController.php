<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\customer\CustomerCollection;
use App\Http\Resources\customer\CustomerLoginCollection;
use App\Http\Resources\customer\CustomerResource;
use App\Repositories\CustomerRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Encryption\DecryptException;
use Crypt;

class CustomerController extends BaseResource
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository   = $customerRepository;
    }

    public function store(CustomerRequest $customerRequest)
    {
        return new BaseResource($this->customerRepository->store($customerRequest->storeFilter()));
    }

    public function login(LoginRequest $loginRequest)
    {
        $checkCustomer = $this->customerRepository->getCustomer($loginRequest->filter());
        if(empty($checkCustomer)){
            return $this->sendError('Account does not exist');
        }else{
            $encryption = decrypt($checkCustomer->password);
            if($checkCustomer->email == $loginRequest->email && $loginRequest->password == $encryption){
                return new CustomerLoginCollection($this->customerRepository->get($checkCustomer->id));
            }else{
                return $this->sendError('Account or password is incorrect');
            } 
        }
    }

    public function show($id)
    {
        return new CustomerResource($this->customerRepository->show($id));
    }

    public function update(CustomerRequest $request, $id)
    {
        if(!empty($request->password)){
            return new BaseResource($this->customerRepository->edit($request->updateFilter(), $id));
        }else{
            return new BaseResource($this->customerRepository->editNoPass($request->updateFilter(), $id));
        }
    }
}
