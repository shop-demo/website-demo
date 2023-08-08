<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Auth;
use DB;


class khachhangModel extends Authenticatable
{
    use HasFactory;
    protected $table ='khachhang';
    protected $fillable =['name','password'];
    protected $primariKey ='id';
    public $timestamps = false;
	
	public function roles(){
		return $this->belongsToMany('App\Models\Admin\roleModel','role_khachhang','khachhang_id','roles_id');
	}

	public function checkQuyen($route){
		
		
		$user = Auth::guard('khachhang')->user();

		 $url = $user->roles->pluck('route')->toArray();
		 
		
		foreach ($url as $key => $value) {
			
			$check = json_decode($value); 

		 
		 	return in_array($route, $check) ?true : false;
		 
		}
		
		return  false; 
		 	
		 
	}	
}

