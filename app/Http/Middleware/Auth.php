<?php

namespace App\Http\Middleware;

use Closure;
use Facades\App\Libraries\Session;
use App\Exceptions\UserUnauthorizedException;
use App\Repositories\UserRepository;

class Auth
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function handle($request, Closure $next)
    {
        $token = $request->header('token');
        $session = $this->userRepository->check($token);
        if(empty($token)){
            return response()->json([
                'code' => 500,
                'message' => 'Tokens are not sent through the header'
            ], 500);
        }elseif(empty($session)){
            return response()->json([
                'code' => 500,
                'message' => 'Invalid token'
            ], 500);
        }else{
            return $next($request);
        }
    }
}
