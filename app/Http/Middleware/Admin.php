<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Admin middleware.
 * 
 * Access can get only user with admin role.
 */
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ( Auth::check() && Auth::user()->role == "admin" )
        {
            return $next($request);
        }

        return redirect('/login');
    }
}
