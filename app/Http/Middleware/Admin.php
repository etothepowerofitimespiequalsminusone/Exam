<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        if(Auth::check() && Auth::user()->isAdmin())
//        return $next($request);
//
//        return redirect('fu');
//    }
    public function handle($request, Closure $next)
    {
        if(Auth::guest() || !Auth::user()->isAdmin())
            return redirect('login');
        return $next($request);
    }
}