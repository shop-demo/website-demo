<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkoutModel;
use App\Models\orderChitietModel;
use App\ThuvienApp\cartShopping;
use Str;
use Auth;
use Mail;

class checkoutController extends Controller
{
	
	public function index(){
	
	   $title="checkout";
      

   	 return view('frontend.pages.checkout',compact('title'));
	
	}
	
    public function submit(Request $request,cartShopping $cartShopping){
       
		 $request->validate([
            'name'=> 'required',
            'email' => 'required|unique:users|email',
            'phone'=> 'required|integer',
            'address'=> 'required',

            ],[
            'name.required'=>'Dữ liệu không bỏ trống',
             'email.required'=>'Email không được bỏ trống',
             'email.unique'=> 'Email đã tồn tại trong hệ thống',
             'email.email'=> 'Định dạng không dúng',
             'phone.required'=>'Dữ liệu không được bỏ trống'
 
            ]);

            $token_order = strtoupper(Str::random(20));
            //luu vào table=dat_hang
            $data_order = checkoutModel::create([
            'name' => Auth::guard('cus')->user()->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'tong_so_sp'=>$cartShopping->total_quantity,
            'thanh_tien' =>$cartShopping->total_price,
            'khach_hang_id'=>Auth::guard('cus')->user()->id,
            'token'=> $token_order,
            ]);


            //luu chi_tietOrder

            if($data_order){
                
                    foreach($cartShopping->items as $sp_id =>$chitietOrder){
                        orderChitietModel::create([
                            'name' => $chitietOrder['name'],
                            'dat_hang_id'=>$data_order->id,
                            'san_pham_id'=>$sp_id,
                            'don_gia'=>$chitietOrder['gia'],
                            'quantity'=>$chitietOrder['quantity']

                        ]);
                      
                    }

            }
            /*gửi mail[
                -đơn hàng,ngày đặt
                -giỏ hàng
                -to:email khách hàng
                -from: từ của hàng gửi,
                -subject: Tiêu đề email được gửi

            ]
            */
            $mail_khachhang = $request->email;
            $name_khachhang = Auth::guard('cus')->user()->name;
           
            Mail::send('emails.infoMail',[
                'name'=> $name_khachhang,
                'donhang'=> $data_order,
                'shopping'   => $cartShopping->items,
                'total_price' =>$cartShopping->total_price,


                ], function($email) use($mail_khachhang,$name_khachhang){
                
                $email->subject('Email đặt hàng');
                $email->to($mail_khachhang,$name_khachhang);
                $email->from('info.haianhh@gmail.com');
            
            });

            session(['cart'=>'']);
            
            $title="checkout";
            
            return view('frontend.pages.layout.infoCheckout',compact('title'));

	}

    //xác nhận đơn hàng
     public function accept_order($id,$token_order,checkoutModel $checkoutModel,orderChitietModel $orderChitietModel){
       /*
        kiểm tra mã token có đúng không và tồn tại trong giỏ hàng không
        -kiểm tra còn hạn không 
        nếu còn hạn thì cập nhật status==1 còn không thì hủy đơn hàng 
       */
        $title="xác nhận đơn hàng thành công";
      //lấy dơn hàng xác nhận 
        $checkout = $checkoutModel::find($id);
       
        $chitiet = $orderChitietModel::where('dat_hang_id',$id)->get()->toArray();
      
        $name_khachhang = Auth::guard('cus')->user()->name;
       
        $mail_khachhang = $checkout->email;
      
      
        if($checkout->token === $token_order){
            //kiểm tra còn hạn(ví dụ trong 72h) không (lấy ngày hiện tại - ngày đặt hàng >= 72h thông báo mã hết hanj )
            $checkout->update(['status'=>1]); 
        
            Mail::send('emails.accept_order',[
            'name'=> $name_khachhang,
            'donhang'=> $checkout,
            'shopping'   => $chitiet,
         
            ], function($email) use($mail_khachhang,$name_khachhang){
                
            $email->subject('Email đặt hàng xác nhận thành công');
            $email->to($mail_khachhang,$name_khachhang);
            $email->from('info.haianhh@gmail.com');
            
            });

       }else{
            dd('hủy đơn hàng');
        }

        return view('frontend.pages.layout.accept',compact('title'));
    
    }
     
}
