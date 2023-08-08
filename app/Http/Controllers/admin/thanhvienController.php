<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\thanhvienModel;
use App\Models\admin\groupModel;
use App\Http\Requests\ThanhVien\ThanhVien_requestAdd;
use App\Http\Requests\ThanhVien\ThanhVien_requestEdit;
use Illuminate\Http\Request;
use Auth;

class thanhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $title = "thành viên";
        $auth = Auth::guard('khachhang')->user();
        //dd($auth);
        

        $listThanhvien = thanhvienModel::seach()->get();
      
        //get group thanhvien
        $thanhvienGroup = groupModel::all();
       return view('admin.thanhvien.thanhVienList',compact('title','listThanhvien','thanhvienGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Thêm thành viên';
        //get_group thành vien
        $thanhvienGroup = groupModel::all();

        return view('admin.thanhvien.thanhVienAdd',compact('title','thanhvienGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThanhVien_requestAdd $request){

       
        $inset_thanhvien           =  new thanhvienModel;
        $inset_thanhvien->name     = $request->input('text_name');
        $inset_thanhvien->email    = $request->input('email');
        $inset_thanhvien->status   = request()->status;
        $inset_thanhvien->group_id = request()->group_name;
             
        $inset_thanhvien->save();
        return redirect()->route('admin.thanhvienList')->with('success','Thêm mới thành viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\thanhvienModel  $thanhvienModel
     * @return \Illuminate\Http\Response
     //xem chi tiết thành viên
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\thanhvienModel  $thanhvienModel
     * @return \Illuminate\Http\Response
        //sửa thành viên
     */
    public function edit(thanhvienModel $thanhvienModel,$id)
    {
        //chi tiết
        $title='Chi tiết thành viên';
        $thanhvienGroup = groupModel::all();
        $chitiet_thanhvien = thanhvienModel::find($id);
        
        return view('admin.thanhvien.thanhvien_Edit',compact('title','chitiet_thanhvien','thanhvienGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\thanhvienModel  $thanhvienModel
     * @return \Illuminate\Http\Response
     */
    public function update(ThanhVien_requestEdit $request,$id)
    {
        
        $update_thanhvien           =  new thanhvienModel;
        $update_thanhvien ->name     = $request->input('text_name');
        $update_thanhvien ->email    = $request->input('email');
        $update_thanhvien->status   = request()->status;
        $update_thanhvien ->group_id = request()->group_name;
             
        $update_thanhvien ->save();
        return redirect()->route('admin.thanhvienList')->with('success','Update thành viên thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\thanhvienModel  $thanhvienModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(thanhvienModel $thanhvienModel,$id)
    {
         $chitiet_thanhvien = thanhvienModel::find($id);
           $chitiet_thanhvien->delete();
       return redirect()->route('admin.thanhvienList')->with('success','Xóa thành công');
        
    }
}
