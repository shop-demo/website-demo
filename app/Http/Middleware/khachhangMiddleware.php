<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class khachhangMiddleware  
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard='khachhang')
    {
        if (!Auth::guard($guard)->check()) {//chưa đăng nhập

            return redirect()->route('cus_Login');//quay về login để đăng nhập

        }

         //lấy thông tin user khi đã đăng nhập


        $user = Auth::guard('khachhang')->user();

        $url = $user->roles->pluck('route')->toArray();//lấy tất cả route 

        $route = $request->route()->getName();//route hiện tại
            //dd($route );
        if($user->cant($route)){//nếu không thể

            //return view('admin.error.403');//quay về login để đăng nhập
            //return response()->view('admin.error.403',['code'=>403]);
         //   return redirect()->route('error',['code'=>403]);
            //  abort(403, 'Unauthorized action.');
            // redirect()->back();
        }
       
     return $next($request); 



    }



}
