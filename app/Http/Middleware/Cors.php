<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // return $next($request)
        return $next($request)->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', '*')
        ->header('Access-Control-Allow-Headers', 'Origin, Methods, Content-Type, Authorization')
        ->header('Access-Control-Allow-Credentials', true);
            // ->header('Access-Control-Allow-Origin', "*")
            // ->header('Access-Control-Allow-Methods', "PUT, POST, GET, DELETE,OPTIONS")
            // ->header('Access-Control-Allow-Credentials', 'true')
            // ->header('Access-Control-Allow-Headers', "Accept, Authorization,Content-Type");//X-CSRF-Token
    }
}
