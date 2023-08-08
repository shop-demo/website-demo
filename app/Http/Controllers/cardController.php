<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\admin\sanphamModel;
use App\Models\admin\theLoaiModel;
use App\ThuvienApp\cartShopping;
use Session;


class cardController extends Controller
{
    //
  
    public function show_cart(){
          $title ='showCart';
          return view('frontend.pages.cart',compact('title'));
    }

   
    public function cartAdd(cartShopping $cartShopping,$id){
    	//dd($id);
       // die();
      $sp = sanphamModel::find($id);
      $cartShopping->addCart($sp,$quantity=1);
      
      return redirect()->back();
   
    }

    public function cart_remove(cartShopping $cartShopping,$id){
      $cartShopping->remove($id);
      return redirect()->back();
    }
   
   public function cart_update(cartShopping $cartShopping,$id){

      $quantity = request()->quantity ? request()->quantity : 1;
      $cartShopping->update($id,$quantity);
      
      return redirect()->back();

   }

   public function clear_cart(cartShopping $cartShopping){
    
      $cart = $cartShopping->clear_cart();
     
      return view('frontend.pages.cart');
   }

}
