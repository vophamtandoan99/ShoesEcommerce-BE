<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class Role
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
        $token = $request->header('token');
        $role = $this->userRepository->first($token);
        if($role->role == 1){
            return $next($request);
        }else{
            return response()->json([
                'code' => 500,
                'message' => 'You do not have access'
            ], 500);
        }
    }
}
