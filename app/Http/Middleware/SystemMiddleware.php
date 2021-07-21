<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SystemMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role->all_access) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
