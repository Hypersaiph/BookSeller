<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class BlockMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->blocked == 1) {
                return redirect()->guest('/user/blocked');
            }
        }
        return $next($request);
    }
}
