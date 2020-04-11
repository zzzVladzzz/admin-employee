<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdministratorRole
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
        if(\Auth::user()->hasAnyRole('administrator') === false){
            abort(403);
        }

        return $next($request);
    }
}
