<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\theLoaiModel;
use App\Models\admin\khachhangModel;
use App\Models\Admin\roleModel;
use App\Models\Admin\role_khachangModel;
use App\Models\ratingModel;
use Auth;


class khachhangController extends Controller
{
    //
    //list khach hang admin
    public function listKhachhang(){
       
        $title="listKhachhang";
        $user = Auth::guard('khachhang')->user();
       
        $listKhachhang = khachhangModel::orderBy('name','asc')->get();
       
        return view('admin.khachhang.listKhachhang',compact('title','listKhachhang'));
     
    }
    //show quyen
    public function khachhangQuyen($id){
            
        $title="addQuyen";

        $dataRole = roleModel::orderBy('name','ASC')->get();

        $listKhachhang= khachhangModel::find($id);

        $r =  $listKhachhang->roles->pluck('name','id')->toArray(); //get name,id roles
         

        return view('admin.roles.userRole',compact('title','dataRole','listKhachhang','r'));
    }

     //them quyen
	public function updateQuyen(Request $request,$id){
        
       if(is_array($request->route)){
           
            role_khachangModel::where('khachhang_id',$id)->delete();//trức khi thêm xóa dữ liệu cũ 

            foreach($request->route as $key=>$val){

                role_khachangModel::create(['khachhang_id'=>$id,'roles_id'=> $val]);
            }
            return redirect()->route('admin.listKhachhang')->with('success','thêm role thành công');
       }
    }

	//đăng nhập tài khoản
  
    public function index(){
    	
    	$title="Auth";
    	$dataTheloai = theLoaiModel::all();

    	return view('frontend.pages.login',compact('title','dataTheloai'));
    
    }

    //login-đăng nhập

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
	  	$login = Auth::guard('cus')->attempt($request->only('name','password'));
		  	
		  	if($login ){
		  		return redirect()->route('login.index')->with('success','Đăng nhập thành công');
		  	}else{
		  		return redirect()->route('login.index')->with('success','Đăng nhập thất bại');
		  	}
	     
	   
	 }

	   //đăng ký
	  	
    public function signup(){
        $title="Auth";
        $dataTheloai = theLoaiModel::all();
        return view('frontend.pages.signup',compact('title','dataTheloai'));

    }

    public function post_signup(Request $request){
    	
    	$request->validate([
	                    'name'=> 'required',
	                    'password' => 'required',
	                    ],[
	                    'name.required'=>'Dữ liệu không bỏ trống',
	                    'password.required'=>'Dữ liệu không bỏ trống',
	                     
	                ]);
   
    	//save
    		$data_khachhang =  new khachhangModel;
            $data_khachhang->name = $request->name;
            $data_khachhang->password = bcrypt($request->password); 
            $data_khachhang->save();
         
    	return redirect()->route('login.index')->with('success','Thêm mới khách hàng thành công');

    }
    //LOGOUT
    public function logout(){
    	Auth::guard('cus')->logout();
    	return redirect()->route('login.index')->with('success','bạn vừa đăng xuất thành công');
        
    }


    //rating
    public function rating(Request $request){


    		$rating_model = ratingModel::where($request->only('san_pham_id','khach_hang_id'))->first();
    		
    		if($rating_model){
    			 ratingModel::where($request->only('san_pham_id','khach_hang_id'))->
                 update($request->only('rating_star'));
               
    		}else{
                ratingModel::create($request->only('san_pham_id','khach_hang_id','rating_star'));
               
            }
    		return redirect()->back();
    }
   

    //error
    public function error(){

            $code = request()->code;
            $errors = config('error.'.$code);

            /*
            $errors = [
                'code'=>$code, 
                'title'=>'Unauthorized-Không có quyền',
                'message'=>'Bạn không có quyền truy cập....!'

            ];
            */
           
            return view('admin.errors.403',$errors);

    }











}
