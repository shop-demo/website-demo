<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class theLoaiModel extends Model
{
    use HasFactory;
    protected $table ='theloai';
    protected $fillable =['name','code','id_cha','status'];
    protected $primariKey ='id';
    public $timestamps = false;
    
    function getTheloai(){
    	 return  DB::table($this->table)
    	 ->get();

    }

    //theloai có nhiều sản phẩm :1-n query trong cùng 1 bảng
    function children(){
        return $this->hasMany(theLoaiModel::class,'id_cha','id');
    }
   
    function parent(){
       return $this->belongsTo(theloaiModel::class, 'id_cha','id');
   }

  //1theloai có nhiều sản phẩm(lấy sản phẩm cùng thể loại)  
    public function sanpham(){
    return $this->hasMany(sanphamModel::class,'the_loai_id','id');
    }

   
}
