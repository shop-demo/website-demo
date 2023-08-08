<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\roleModel;
use Illuminate\Http\Request;
use App\Models\admin\khachhangModel;
use Route;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='listRole';
        $dataRole = roleModel::orderBy('created_at','DESC')->get();
        
        return view('admin.roles.listRole',compact('title','dataRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='addRole';

        $list_r = route::getRoutes();//hàm lấy toàn bộ route
        
        $rou =[];

        foreach($list_r as $key=>$r){
           $rou_name = $r->getName();

           $pos = strpos($rou_name,'admin');//kt str có 'admin k '
           
           if($pos !== false){ //nếu có thì pust vảo mảng rou 
           
            array_push($rou, $r->getName());
        }

    }
        
        return view('admin.roles.addRole',compact('title','rou'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'=> 'required|unique:roles,name|min:3',
            'route'=> 'required'
            ],[
            'name.required'=>'Dữ liệu không bỏ trống',
            'name.min'=> 'Dữ liệu không đúng định dạng',
            'name.unique'=>'Dữ liệu đã tồn tại',
            'route.required'=>'Dữ liệu không bỏ trống'

            ]);

        //save

            $roleData =  new roleModel;
            $roleData->name = $request->name;
            $roleData->route = json_encode($request->route); 
            $roleData->save();

        return redirect()->route('admin.listRole')->with('success','Thêm mới role mới thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\roleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function show(roleModel $roleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\roleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function edit(roleModel $roleModel,$id)
    {
        $title="edit-role";
        $role = roleModel::find($id);
        $quyen = json_decode($role->route);
       
        $list_r = route::getRoutes();//hàm lấy toàn bộ route
        
        $rou =[];

        foreach($list_r as $key=>$r){
         $rou_name = $r->getName();

         $pos = strpos($rou_name,'admin');//kt str có 'admin k '
           
         if($pos !== false){ //nếu có thì pust vảo mảng rou 

          array_push($rou, $r->getName());
            }

        }
        
         return view('admin.roles.editRole',compact('title','role','quyen','rou'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\roleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, roleModel $roleModel,$id)
    {
        $roleData = roleModel::find($id);
        
        $roleData->update([
           
            'name'=>$request->name,
            
            'route'=>json_encode($request->route)

            ]);
        
        
       return redirect()->route('admin.listRole')->with('success','Cập nhật role mới thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\roleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(roleModel $roleModel)
    {
        //
    }
}
