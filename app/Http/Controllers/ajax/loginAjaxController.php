<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\commentAjax_model;
use App\Models\admin\khachhangModel;
use App\Models\admin\sanphamModel;
use DB;
use Auth;

class loginAjaxController extends Controller
{

    //login

        public function loginAjax(Request $Request){


         $validator = Validator::make($Request->all(), [
          'name' => 'required|min:3',
          'password' => 'required',
          ],[
          'name.required'=>'Trường name không được bỏ trống',
          'name.min'=>'Định đạng dữ liệu không đúng',
          'password.required'=>'Trường password không được bỏ trống'

          ],[
          'name'=>'Tên người dùng',
          'password'=>'Mật khẩu người dùng'

          ]


          );

         if ($validator->fails()) {

          $errors = $validator->errors();

          return response()->json(['error'=>$validator->errors()->all()]); 


        }else{

           $login = Auth::guard('cus')->attempt($Request->only('name','password'));

           if($login){

            return response()->json(['data'=>$validator->validate()]);

          }else{
            return  response()->json(['mgs'=>'Dữ liệu nhập không chính xác.']);
          } 

       }
      
      }//\cloze login	
      /*-----------------------------------------------------------------*/			
      /*-----------------------------------------------------------------*/     

            //bình luận
      
      
      public function comment_ajax(Request $Request){

        $khachhangId = auth()->guard('cus')->user()->id;

        $validator = Validator::make($Request->all(), [
          'comment'    => 'required',

          ],[

          'comment.required'=>'comment không được bỏ trống',


          ]);


        if ($validator->fails()) {
          $errors = $validator->errors();

          return response()->json(['error'=>$validator->errors()->first()]); 

        }else{

          $dataInset = new commentAjax_model;
          $dataInset->comment = $Request->comment;
          $dataInset->san_pham_id = $Request->san_pham_id;
          $dataInset->khachhang_id = $khachhangId;
          $dataInset->status = $Request->status ? $Request->status :0;
          $dataInset->reply_id = $Request->reply_id ? $Request->reply_id :0;
          $dataInset ->save();


          if($dataInset){

            $getComm = commentAjax_model::where(['reply_id'=>0,'san_pham_id'=>$Request->san_pham_id,'status'=>'1'])->orderBy('id','DESC')->get();

            return view('frontend.pages.layout.repComm',compact('getComm'));

            }//\if

          } //els 

        }//\cloze Bình luân-comment
      /*-----------------------------------------------------------------*/     
      /*-----------------------------------------------------------------*/    
       /*load comm*/

       public function listComm(){
          $title ='listComm';
          $listComm = commentAjax_model::all();
          return view('admin.comment.listComm',compact('listComm','title'));
       }

      
       /*duyệt comment*/
      
       public function active_comment(Request $Request){
             
        $data = $Request->all();
        $Comm_status = commentAjax_model::where('id',$data['id'])->get();

         $Comm_status['status'] = $data['status'];
       
        return commentAjax_model::where('id',$data['id'])->update(['status' =>$Comm_status['status'] ]);
          
         
    
     }

     




}//\classs

