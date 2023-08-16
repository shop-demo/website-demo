<?php

namespace App\Http\Controllers;

use App\Models\admin\theLoaiModel;
use App\Models\admin\sanphamModel;
use Illuminate\Http\Request;
use App\Models\ratingModel;
use App\Models\commentAjax_model;
use App\Models\admin\khachhangModel;
use App\Models\checkoutModel;
use App\Models\orderChitietModel;
use DB;
use Auth;
use Str;
use Mail;


class homeController extends Controller
{
    //

    public function index(){
        
            //list thể loai;
        $dataTheloai = theLoaiModel::all();
            //theLoai theo id_cha = 0
        $dataTheloai_id_cha = theLoaiModel::where('id_cha',0)->get();

          //get tất cả danh muc sản phẩm right
        $data_menu = theLoaiModel::where('id_cha',0)->with('children')->get()->toArray();

        //list sanpham
        $dataSanpham = sanphamModel::all();

        return view('frontend.pages.home',compact('dataTheloai','data_menu','dataTheloai_id_cha','dataSanpham'));

    }

        //lấy theo thể loại sản phẩm
    public function danhmucSp($slug){
       
        //lấy sản phẩm thuộc danhmuc 
  
        $dataTheloai = theLoaiModel::all();
        
        $data_menu = theLoaiModel::where('id_cha',0)->with('children')->get()->toArray();
       
        $dataSanpham = theLoaiModel::where('code',$slug)->first()->sanpham;
         
         //lấy tên danh muc của sanpham
        $nameDanhmuc = theLoaiModel::where('code',$slug)->first();
       
        //lay danh muc con thuộc danh mục cha 
        $DanhMuc_children =theLoaiModel::where('code',$slug)->first()->children;
       
            return view('frontend.pages.phongkhach',
              [ 'dataTheloai'     =>$dataTheloai,
                'data_menu'       =>$data_menu,
                'dataSanpham'     =>$dataSanpham,
                'nameDanhmuc'     =>$nameDanhmuc,
                'DanhMuc_children'=>$DanhMuc_children,
                  
              ]);

    }
    
/*------------------------------------------------------------*/
/*------------------------------------------------------------*/

    public function ChiTietSP($category,$slug,request $request){
        //lấy toàn bộ sản phẩm
       // DB::enableQueryLog();

        $dataTheloai = theLoaiModel::all();
        $category = theLoaiModel::where('code',$slug)->first();

        //chi tiết sản phẩm
        $chiTietSp = sanphamModel:: where('code',$slug)->first();

        //REVIEW RATING
        $id_Sp = $chiTietSp->id;
      

        $ratingSP = round(ratingModel::where('san_pham_id',$id_Sp)->avg('rating_star'));
       
        //VIEW COMM
        
        $getComm = commentAjax_model::where(['reply_id'=>0,'san_pham_id'=>$id_Sp])->orderBy('id','DESC')->get();
        
        //VIEW SỐ LƯỢNG BÌNH LUẬN
        $totalComm = $getComm->count(); 
        
       // $query = DB::getQueryLog();
       // $user = Auth::guard('cus')->user()->name;
       
    
       return view('frontend.pages.sanphamChitiet',compact('dataTheloai','chiTietSp','category','ratingSP','totalComm'));
    }
/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
//getcomment
 
public function SP($category,$slug, request $request){
        //lấy toàn bộ sản phẩm
       // DB::enableQueryLog();
        $dataTheloai = theLoaiModel::all();
        $category = theLoaiModel::where('code',$slug)->first();

        //chi tiết sản phẩm
        $chiTietSp = sanphamModel:: where('code',$slug)->first();

        //review rating
        $id_Sp = $chiTietSp->id;

        
        $ratingSP = round(ratingModel::where('san_pham_id',$id_Sp)->avg('rating_star'));
       
        //view comm
       
        $getComm = commentAjax_model::where(['reply_id'=>0,'san_pham_id'=>$id_Sp,'status'=>'1'])->orderBy('created_at','DESC')->get();
        //view số lượng bình luận
        $totalComm = $getComm->count(); 
      // echo $request->url();

        

       // $query = DB::getQueryLog();
     
         return view('frontend.pages.layout.repComm',compact('getComm'));
    }
    

    
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
   public function test(){

        $name ="Nội dung vừa được sửa";
        $obj = "Hoàng Quốc Việt";
        Mail::send('emails.test',compact('name'), function($email) use($obj){
            $email->subject('Demo test email');
            $email->to('info.haianhh@gmail.com',$obj);
        });


   }

   
   //seach

   public function seach(){
        
        //seach

        $data_seach = sanphamModel::seach()->get();
      
        $html='';
        foreach ($data_seach as $key => $value) {
           $danhmuc = sanphamModel::find($value->id)->danhmuc->toArray();
           
            $html .=' <li class="link_seach"> ';
            $html .='<img src="'.url('upload').'/sanpham/'.$value->hinh_minh_hoa.'" lass="media-object" style="display:inline-block; width:20%;height:auto;">';
            $html .='<span><a href="http://localhost/web/Shop/public/'.$danhmuc['code'].'/'.Str::slug($value->name).'">'.$value->name.'</a></span>';
            $html .='<p>'.Str::words(strip_tags($value->mo_ta_chi_tiet),7).'</p>';
            $html .='</li>';
            $html .='<hr>';

        }
       
        //http://localhost/web/Shop/public/Sofa-vai/Sofa-vai-Alassa
        //Str::words : gioi hạn từ
        //hàm strip_tags($str) cắt loại bỏ html

        //return view('frontend.pages.layout.seach_ajax',compact('data_seach','danhmuc'));
        return $html;
       
    }

}
