<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLogin
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
        //Auth::user()->roles->contains('Admin')
        if (Auth::Check()) {
            return $next($request);
        } else {
            return redirect()->route('admin.show-form-login');
        }
    }
}
