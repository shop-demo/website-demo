<?php
 
 namespace App\ThuvienApp;
use Session;

 class cartShopping {

 		public $items = [];
 		public $total_quantity =0;
 		public $total_price =0;


 		public function __construct(){
 		 $this->items = session('cart') ? session('cart') : [];
 		 $this->total_quantity = $this->get_total_quantity();
 		 $this->total_price = $this->get_total_price();
 		}

 		//add sản phẩm 
 		public function addCart($sp,$quantity=1){
 			
 			$this->items = session('cart') ? session('cart') : [];

 			if(isset($this->items[$sp->id])){
 				$this->items[$sp->id]['quantity'] += $quantity;
 			}else{
 				$this->items[$sp->id] = [

 					'id'=>$sp->id,
	 				'name'=>$sp->name,
	 				'gia'=>$sp->gia_khuyen_mai ? $sp->gia_khuyen_mai : $sp,
	 				'hình_minh_hoa'=>$sp->hinh_minh_hoa,
	 				'quantity'=>$quantity
 				];
 			} 			
 			
 			session(['cart'=>$this->items]);
 		
 			//session()->flush();
 	
 		}

 		//remove 1 sp
 		public function remove($id){

 			if(isset($this->items[$id])){
 				unset($this->items[$id]);
 			}
 			session(['cart'=>$this->items]);
 		}

 		//update
 		public function update($id,$quantity=1){
 			if(isset($this->items[$id])){
 				$this->items[$id]['quantity'] = $quantity;
 			}
 			session(['cart'=>$this->items]);
 		}

 		//xóa hết sản phẩm

 		public function clear_cart(){
 			session(['cart'=>[]]);
 		}



 		//tổng số tiền của 1 sản phẩm
 		private function get_total_price(){
 			$t = 0;
 			foreach($this->items as $key=>$value){
 				$t += $value['gia'] * $value['quantity'];
 			}
 			return $t;

 		}
 		
 		//tổng số sản phẩm
 		private function get_total_quantity(){
 			$t = 0;
 			foreach($this->items as $key=>$quantity){
 				$t +=$quantity['quantity'];
 			}
 			return $t;


 		}



 }

















?>