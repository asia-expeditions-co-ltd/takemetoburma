<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminMiddleware
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
        if (\Auth::check()) {
        // if (isset(\Auth::user()->role) == 1 || isset(\Auth::user()->role) == 2) {
            return $next($request);
        }else{
            // return $next($request);
            return redirect()->route('getLogin');
            // return redirect()->url('g');  
        }
        
    }
}
