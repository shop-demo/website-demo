<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\userModel;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userData;
    public function __construct(){
        
        $this->userData = new userModel;

    }
    
    public function index(Request $request)
    {
        $filters = [];
       $seach = null;
       //status
       if(!empty($request->status)){
          $status = $request->status;
            if($status=='active'){
                 $status =1;
            }else{
                 $status =0;
            }
             $filters[] =['users.status','=', $status];
       }
       //kiểm tra group
       if(!empty($request->group_name)){
            $group_name = $request->group_name;
            $filters[]=['users.group_id','=',$group_name];
       }
       //kiểm tra seach
       if(!empty($request->seach_name)){
            $seach = $request->seach_name;
        
       }

        $title ="list";

        $listUser = $this->userData->getUser($filters,$seach);
       //dd($listUser);

        return view('admin.userList',compact('title','listUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = "Thêm user";
        return view('admin.userAdd',compact('title'));
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
            'text_name'=> 'required|min:3',
            'email' => 'required|unique:users|email',
            'group_name'=> 'required|integer'

            ],[
            'text_name.required'=>'Dữ liệu không bỏ trống',
             'text_name.min'=> 'Dữ liệu không đúng định dạng',
             'email.required'=>'Email không được bỏ trống',
             'email.unique'=> 'Email đã tồn tại trong hệ thống',
             'email.email'=> 'Định dạng không dúng',
             'group_name.required'=>'Dữ liệu không được bỏ trống',
             'group_name.integer'=>'Dữ liệu không đúng định dạng'

            ]);
        $dataInsert=[
        'name'=>$request->input('text_name'),
         'email'=>$request->input('email'),
         'status'=>request()->status,
         'group_id'=>request()->group_name,
         'created_at'=>date('Y-m-d H:i:s'),
         'updated_at'=>date('Y-m-d H:i:s')
          
        ];

        $inseUser =$this->userData->insetUser($dataInsert);
       return redirect()->route('admin.userList')->with('success','Thêm mới user thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userModel  $userModel
     * @return \Illuminate\Http\Response
     */
    //edit
    public function show($id)
    {
        //chi tiet user
        $userChitiet = $this->userData->userChitiet($id);

       // dd($userChitiet);
       $title = "edit";
       return view('admin/editUser',compact('title','userChitiet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id=0)
    {
        
    
        $request->validate([
            'text_name'=> 'required|min:3',
            'email' => 'required|unique:users,email,'.$id,
            'group_name'=> 'required|integer'

            ],[
            'text_name.required'=>'Dữ liệu không bỏ trống',
             'text_name.min'=> 'Dữ liệu không đúng định dạng',
             'email.required'=>'Email không được bỏ trống',
             'email.unique'=> 'Email đã tồn tại trong hệ thống',
             'email.email'=> 'Định dạng không dúng',
             'group_name.required'=>'Dữ liệu không được bỏ trống',
             'group_name.integer'=>'Dữ liệu không đúng định dạng'

            ]);
        
        $dataEdit=[
            'name'=>$request->input('text_name'),
             'email'=>$request->input('email'),
             'status'=>request()->status,
             'group_id'=>request()->group_name,
             'created_at'=>date('Y-m-d H:i:s'),
             'updated_at'=>date('Y-m-d H:i:s')
          
        ];

        $editUser = $this->userData->editUser($dataEdit,$id);
        return redirect()->route('admin.userList')->with('success','cập nhật thành công');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
       if($id!=null){
        $userDelete = $this->userData->deleteUser($id);
         return redirect()->route('admin.userList')->with('success','delete thành công');
       }else{
         return redirect()->route('admin.userList')->with('success','delete thất bại');
       }
       
        

    }
}
