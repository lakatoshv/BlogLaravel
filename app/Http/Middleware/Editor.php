<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Editor middleware.
 * 
 * Access can get only user with editor role.
 */
class Editor
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
        if ( Auth::check() && Auth::user()->role == "editor" )
        {
            return $next($request);
        }

        return redirect('/');
    }
}
