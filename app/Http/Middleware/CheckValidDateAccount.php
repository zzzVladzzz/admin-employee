<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class CheckValidDateAccount
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
//        dd($request->route());

        if (\Auth::user()->created_at->diffInYears(Carbon::now()) > 0){
                    return redirect()->route('time-is-out');

//        dd('2');
//            throw new HttpResponseException(\redirect()->action('HomeController@invalidAccount'));
//            abort( route('invalidAccount'));

        }
//            dd($request);
//        dd($next);
//        dd(\Auth::user());
        return $next($request);
    }

}
