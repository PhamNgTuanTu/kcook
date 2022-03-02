<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect()->route('getLogin')->with('status', 'Email hoặc Password không chính xác');
    }
}
