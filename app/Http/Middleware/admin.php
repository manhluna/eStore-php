<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!empty(Auth::user()) && Auth::user()->role == 0) {
            return $next($request);
        }
        return redirect('/');
    }
}
