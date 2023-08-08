<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\theLoaiModel;
use Illuminate\Http\Request;
use App\Http\Requests\Theloai\TheloaiShow;
use App\Http\Requests\Theloai\TheloaiAdd;
use DB;

class theLoaiController extends Controller
{
    /**
     * list menu
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $title= "thể Loại";
           $seach = $request->seach_name;

          
            if(!empty($seach)){
               $listTheloai = theLoaiModel::where('name','like','%'.$seach.'%')->get();  
            }else{
                $listTheloai = theLoaiModel::all();
            }
            
           
        //
        return view('admin.theloai.listTheloai',compact('title','listTheloai'));
    }

    /**
     Show add menu
     */
    public function create()
    {
        //
        $title ='Thêm thể loại';

       $listTheloai = theLoaiModel::all();
       
        return view('admin.theloai.addTheloai',
            [
            
                'title'=>$title,
               'listTheloai'=>$listTheloai
             
            ]);
       
    }

    /**
      INSET MENU_THELOAI
     */
    public function store(TheloaiAdd $request)
    {
     

             $inset_theloai =  new theLoaiModel;
             $inset_theloai->name = $request->input('name');
             $inset_theloai->code = Tieu_de($request->input('name'));
             $inset_theloai->id_cha =$request->id_cha;
             $inset_theloai->status = $request->status;
             $inset_theloai->save();

             //dd($inset_theloai);
             return redirect()->route('admin.menuList')->with('success','Thêm mới menu thành công');
           
    }

    /*
        EDIT_THELOAI -SHOW
     */
    public function show($id)
    {
        
         $title ='sửa thể loại';
         $listTheloai = theLoaiModel::all();

         $editModel = theLoaiModel::find($id);
        
        return view('admin.theloai.editTheloai',compact('title','editModel','listTheloai'));
    }

    /*
        EDIT
    */
     
    public function edit(TheloaiShow $request,$id)
    {
        
         $edit_theloai = theLoaiModel::find($id);
         $edit_theloai->name = $request->input('name');
         $edit_theloai->code = Tieu_de($request->input('name'));
         $edit_theloai->id_cha = $request->id_cha;
         $edit_theloai->status = $request->status;
         
      $edit_theloai->save();
     return redirect()->route('admin.menuList')->with('success','Sửa menu thành công');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\theLoaiModel  $theLoaiModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, theLoaiModel $theLoaiModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\theLoaiModel  $theLoaiModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
       $editModel = theLoaiModel::find($id);
       $editModel->delete();
       return redirect()->route('admin.menuList')->with('success','Xóa thành công');
    }
}
