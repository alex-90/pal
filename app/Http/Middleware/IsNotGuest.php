<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsNotGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        // redirect()->route('login');
        // route('login1');
        return $request->user() ? $next($request) : route('sign-in');

        // return $request->user() ? $next($request) : dd(999);
    }
}
