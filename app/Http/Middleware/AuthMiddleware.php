<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     * Checks if user is admin
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user() == null){
            return redirect('home');
        }
        elseif($request->user()->id != 1){
            return redirect('home');
        }
        return $next($request);
    }
}
