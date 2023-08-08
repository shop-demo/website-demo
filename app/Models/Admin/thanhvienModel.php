<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class thanhvienModel extends Authenticatable
{
    use HasFactory;
    protected $table ='users';
    protected $fillable =['name','email','group_id','status'];
    protected $primariKey ='id';
    public $timestamps = false;

//seach
    public function scopeSeach($query){
        
    	if(!empty(request()->seach_name)){
    		$seach = request()->seach_name;
    		$query->Where('name','like','%'.$seach.'%');
    	}
      
    	return $query;
    	
    }
    //1thanhf viên thuộc 1group(liên kết bảng con đến bảng cha)
    public function group(){
        return $this->belongsTo(groupModel::class,'group_id','id');
    }

   

}
