<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class cusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard="cus")
    {

        if (!Auth::guard($guard)->check()) {//chưa đăng nhập
            

            return redirect()->route('login.index');//quay về login để đăng nhập
           
         }
        return $next($request);
    }
}
