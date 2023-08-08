<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class sanphamModel extends Model
{
    use HasFactory;
    protected $table ='san_pham';
    protected $fillable =['name','code','hinh_minh_hoa','album_anh','status','gia','gia_khuyen_mai','mo_ta_ngan_gon','mo_ta_chi_tiet','the_loai_id'];
    protected $primariKey ='id';
    public $timestamps = false;

   
    //get thể loai;
    public function getTheLoai(){

    	 return  DB::table('theloai')
    	 ->get();

    }
    //lấy sanpham thuộc 1 theloai
     public function danhmuc(){
        return $this->belongsTo(theloaiModel::class,'the_loai_id','id');
     }

     function parent_theloai(){
     return $this->hasOne(theloaiModel::class, 'id','the_loai_id');
    } 
    
    /*COMMENT-SP*/
    public function spComm(){
        return $this->hasMany('App\Models\commentAjax_model','san_pham_id','id');
    }
     
    //seach
    public function scopeSeach($query){
        $key = request()->seach;
        if($key){
             $query->where('name','like','%'.$key.'%');
        }
        return $query;

    } 

    
 






}
