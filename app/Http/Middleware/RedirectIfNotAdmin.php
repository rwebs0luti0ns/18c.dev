<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {

        if (!auth()->guard($guard)->check()) {
            return redirect('admin/login')->with('error', 'You must be an admin to see this page.');
        }

        return $next($request);
    }
}
