<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Sesi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->route('userid') ) {
            $userlogin = Auth()->user();
            if($userlogin && $userlogin->id == $request->route('userid')){
                return $next($request);
            }
            // dd($request->route('userid'));

        }

        Abort('403');


    }
}
