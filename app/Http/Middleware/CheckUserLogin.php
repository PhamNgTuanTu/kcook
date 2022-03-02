<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'user')
    {
        if (Auth::check()) {
            return $next($request);
        }
        return redirect()->route('home.dang_nhap')->with('status', 'Email hoặc mật khẩu không chính xác');
    }
}
