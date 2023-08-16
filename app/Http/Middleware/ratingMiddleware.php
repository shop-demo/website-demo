<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\checkoutModel;
use App\Models\orderChitietModel;
use Auth;

class ratingMiddleware
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
       // dd($request->all());
       $id_san_pham = $request->san_pham_id; //lấy sp hiện tại
 
       $user = Auth::guard('cus')->user();
       
       $user_order = $user->dat_hang; // đơn hàng của người dùng

       //kiểm tra  sản phẩm có trong đơn hàng không
       $producs_order =  orderChitietModel::where('san_pham_id',$id_san_pham)->pluck('san_pham_id')->toArray();

       if($user_order !== null && $user->dat_hang->status == 1 && in_array($id_san_pham, $producs_order)){

            return $next($request);
       }else{
            return response()->view('frontend.errors.ratingError');
       }
       
    }



}
