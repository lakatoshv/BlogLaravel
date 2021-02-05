<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Super admin middleware.
 * 
 * Access can get only user with super admin role.
 */
class SuperAdmin
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
       if ( Auth::check() && Auth::user()->role == "superadmin" )
        {
            return $next($request);
        }

        return redirect('/');
    }
}
