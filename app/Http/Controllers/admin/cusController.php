<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\theLoaiModel;
use App\Models\admin\khachhangModel;
use App\Models\Admin\roleModel;
use App\Models\Admin\role_khachangModel;
use App\Models\ratingModel;
use Illuminate\Http\Request;
use Auth;

class cusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ="dashboard";
        
        return view('admin.cus_admin',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khachhangModel  $khachhangModel
     * @return \Illuminate\Http\Response
     */
    public function show(khachhangModel $khachhangModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khachhangModel  $khachhangModel
     * @return \Illuminate\Http\Response
     */
    public function edit(khachhangModel $khachhangModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\khachhangModel  $khachhangModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, khachhangModel $khachhangModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khachhangModel  $khachhangModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(khachhangModel $khachhangModel)
    {
        //
    }

    public function login(Request $request){
     
     $title="Auth";
     
     $dataTheloai = theLoaiModel::all(); 
    
     $request->validate([
                        'name'=> 'required',
                        'password' => 'required',
                        ],[
                        'name.required'=>'Dữ liệu không bỏ trống',
                         'password.required'=>'Dữ liệu không bỏ trống',
                         
       ]);

     
         //check
        $login = Auth::guard('khachhang')->attempt($request->only('name','password'));

            
            if($login ){
                return redirect()->route('cus_Login')->with('success','Đăng nhập thành công');
               
            }else{
                return redirect()->route('cus_Login')->with('success','Đăng nhập thất bại');
                
            }
   
    }

     //LOGOUT
    public function logout(){
        Auth::guard('khachhang')->logout();
        return redirect()->route('cus_Login')->with('success','bạn vừa đăng xuất thành công');
        
    }


}
