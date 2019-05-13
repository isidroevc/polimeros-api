<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
class CorsMiddleware
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
        $request = $response = $next($request);
        if(!($request instanceof BinaryFileResponse)) {
            return $request->header('Access-Control-Allow-Origin', '*')
                //->header('Access-Control-Allow-Methods', '*'/*'POST, OPTIONS'*/)
                ->header('Access-Control-Allow-Methods', 'POST, GET, DELETE, PUT, UPDATE')
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Max-Age', '10000')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, Application, X-Requested-With, Timestamp');
        } else {
            
            $response->headers->set('Access-Control-Allow-Origin' , '*');
            //$response->headers->set('Access-Control-Allow-Methods' , '*');
            $response->headers->set('Access-Control-Allow-Methods' , 'POST, GET, DELETE, PUT, UPDATE');
            $response->headers->set('Access-Control-Allow-Credentials' , '*');
            $response->headers->set('Access-Control-Max-Age' , '10000');
            $response->headers->set('Access-Control-Allow-Headers' , 'Content-Type, Authorization, Application, X-Requested-With, Timestamp');
            return $response;
        }
    }
}
