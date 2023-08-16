<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\thanhvienController;
use App\Http\Controllers\admin\theLoaiController;
use App\Http\Controllers\admin\sanphamController;
use App\Http\Controllers\admin\fileController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\slugController;
use App\Http\Controllers\khachhangController;
use App\Http\Controllers\cardController;
use App\ThuvienApp\cartShopping;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\ajax\loginAjaxController;
use App\Http\Controllers\ajax\commentController;
use App\Http\Controllers\admin\roleController;
use App\Http\Controllers\admin\cusController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('welcome');
});


Route::get('/gioi-thieu', [slugController::class,'index']);

Route::get('/home', [homeController::class,'index'])->name('home.index');
Route::get('/login',[khachhangController::class,'index'])->name('login.index');
Route::post('/login',[khachhangController::class,'login'])->name('login');
Route::post('/logout',[khachhangController::class, 'logout'])->name('logout');

Route::get('/signup',[khachhangController::class,'signup'])->name('signup');
Route::post('/signup',[khachhangController::class,'post_signup'])->name('post/signup');

Route::get('/test',[homeController::class,'test']);
Route::get('/seach', [homeController::class,'seach'])->name('home_seach');

//error
Route::get('erorr',[khachhangController::class,'error'])->name('error');

//seach


route::group(['prefix'=>'admin','middleware'=>'khachhang','as'=>'admin.'],function(){

	Route::get('home',[userController::class, 'index'])->name('userList');
	//return view('admins.userEdit');
	Route::get('add',[userController::class, 'create'])->name('userAdd');
	Route::post('add',[userController::class, 'store'])->name('userStore');

	Route::get('edit/{id}',[userController::class, 'show'])->name('userEdit');
	
	Route::post('edit/{id}',[userController::class, 'edit'])->name('userUpdate');
	
	Route::get('delete/{id}',[userController::class, 'delete'])->name('userDelete');
	Route::delete('delete/{id}',[userController::class, 'destroy'])->name('delete');

	//thanhvien

	Route::get('thanhvien',[thanhvienController::class,'index'])->name('thanhvienList');
	Route::get('thanhvien/add',[thanhvienController::class,'create'])->name('thanhvienAdd');
	Route::post('thanhvien/add',[thanhvienController::class,'store'])->name('thanhvienPost');

	Route::get('thanhvien/edit/{id}',[thanhvienController::class,'edit'])->name('thanhvienEdit');
	Route::post('thanhvien/edit/{id}',[thanhvienController::class,'update'])->name('thanhvien_update');

	Route::delete('thanhvien/delete/{id}',[thanhvienController::class,'destroy'])->name('thanhvien_delete');

	//khachhang
	Route::get('khachhang',[khachhangController::class,'listKhachhang'])->name('listKhachhang');
	Route::get('khachhang/quyen/{id}',[khachhangController::class,'khachhangQuyen'])->name('khachhangQuyen');
	Route::post('khachhang/quyen/{id}',[khachhangController::class,'updateQuyen'])->name('updateQuyen');

	//error
	//Route::get('erorr',[khachhangController::class,'error'])->name('error');
	

	//role
	Route::get('role',[roleController::class,'index'])->name('listRole');
	Route::get('role/add',[roleController::class,'create'])->name('addRole');
	Route::post('role/add',[roleController::class,'store'])->name('themRole');
	Route::get('role/edit/{id}',[roleController::class,'edit'])->name('editRole');
	Route::post('role/edit/{id}',[roleController::class,'update'])->name('upRole');

	



	//---theloai---
	Route::get('menu',[theLoaiController::class, 'index'])->name('menuList');
	Route::get('menu/add',[theLoaiController::class, 'create'])->name('menuAdd');
	Route::post('menu/add',[theLoaiController::class, 'store'])->name('menu_store');

	Route::get('menu/edit/{id}',[theLoaiController::class, 'show'])->name('menuEdit');
	Route::post('menu/edit/{id}',[theLoaiController::class, 'edit'])->name('menuUpdate');

	//Route::get('menu/delete/{id}',[theLoaiController::class, 'destroy'])->name('menuDelete');
	Route::delete('menu/delete/{id}',[theLoaiController::class, 'destroy'])->name('menuDelete');

	
	//SẢN PHẨM-----------------------
	
	Route::get('sanpham',[sanphamController::class,'index'])->name('sanphamList');
	Route::get('sanpham/add',[sanphamController::class,'create'])->name('sanphamAdd');
	Route::post('sanpham/add',[sanphamController::class,'store'])->name('sanphamStore');
	
	// edit
	Route::get('sanpham/edit/{id}',[sanphamController::class, 'show'])->name('sanphamEdit');
	Route::post('sanpham/edit/{id}',[sanphamController::class, 'edit'])->name('sanphamUpload');

	//delete 
	Route::delete('sanpham/delete/{id}',[sanphamController::class, 'destroy'])->name('sanphamDelete');




	//filemanager
	Route::get('file',[fileController::class,'index'])->name('sanphamFile');

});

/*	Route::group(['prefix' => 'file'], function () {
	     \UniSharp\LaravelFilemanager\Lfm::routes();
	 });
*/	
	Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
	//login
	Route::get('admin',[cusController::class, 'index'])->name('cus_Login');
	Route::post('admin',[cusController::class,'login'])->name('cus_Login');
	Route::get('logout',[cusController::class, 'logout'])->name('cus_logout');

//giỏ hang
	Route::group(['prefix'=>'shopping'],function(){
		Route::get('',[cardController::class,'show_cart'])->name('showCart');
		Route::get('cart/{id}',[cardController::class,'cartAdd'])->name('cartList');
		Route::get('remove/{id}',[cardController::class,'cart_remove'])->name('cart_remove');
		Route::get('update/{id}',[cardController::class,'cart_update'])->name('cart_update');
		Route::get('clear',[cardController::class,'clear_cart'])->name('clear_cart');
		
	});

//checkout
	Route::group(['prefix'=>'checkout','middleware'=>'cus'],function(){

		//Route::get('logout',[khachhangController::class, 'logout'])->name('logout');
		Route::get('',[checkoutController::class,'index'])->name('checkout_index');
		Route::post('',[checkoutController::class,'submit'])->name('submitCheckout');
		Route::get('accept_order/{id}/{token_order}',[checkoutController::class,'accept_order'])->name('accept_order');

		//Route::post('rating',[khachhangController::class, 'rating'])->name('rating');
		

		Route::middleware(['rating_premisstion'])->post('rating',[khachhangController::class, 'rating'])->name('rating');
		
	});

//login_ajax

Route::group(['prefix'=>'login'],function(){
		
		Route::post('loginAjax',[loginAjaxController::class, 'loginAjax'])->name('login_Ajax');
		
		Route::post('commentAjax',[loginAjaxController::class, 'comment_ajax'])->name('commentAjax');

		Route::get('listComm',[loginAjaxController::class, 'listComm'])->name('listComm');
		Route::post('active',[loginAjaxController::class, 'active_comment'])->name('active_comment');

	});

Route::get('demo',[commentController::class,'addComment']);

//phân quyền


//frontend
	Route::get('{slug}', [homeController::class,'danhmucSp'])->name('view');

	Route::get('/{category}/{slug}',[homeController::class,'ChiTietSP'])->name('ChiTietSp');
	Route::get('/{category}/{slug}/comm',[homeController::class,'SP'])->name('Sp');
	


	
	
	



