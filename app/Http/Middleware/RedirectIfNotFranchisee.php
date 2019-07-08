<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotFranchisee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'franchisee')
    {

        if (!auth()->guard($guard)->check()) {
            return redirect('franchisee/login')->with('error', 'You must be an franchisee to see this page.');
        }

        return $next($request);
    }
}
