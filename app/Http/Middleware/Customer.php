<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;

class Customer
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $customer = $request->header('customer_id');
        $checkCustomer = $this->customerRepository->check($customer);
        if(!empty($checkCustomer)){
            return $next($request);
        }else{
            return response()->json([
                'code' => 500,
                'message' => 'Please login'
            ], 500);
        }
    }
}
