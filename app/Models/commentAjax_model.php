<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
 

class commentAjax_model extends Model
{
	//`comment`, `san_pham_id`, `khachhang_id`, `status`, `reply_id
    use HasFactory;
    protected $table ='comment';
    protected $fillable =['comment','san_pham_id','khachhang_id','status','reply_id'];
   	protected $primariKey ='id';
    public $timestamps = true;


    //1 use có nhiều comm
    public function use(){
      return $this->hasOne('App\Models\admin\khachhangModel','id','khachhang_id')->orderBy('created_at','DESC');
    }
    //lấy comment
    public function replay(){
      return $this->hasMany('App\Models\commentAjax_model','reply_id','id')->orderBy('created_at','DESC');
    }

    //lay cmm theo sp
    public function spComm(){
      return $this->belongsTo('App\Models\admin\sanphamModel','san_pham_id','id');
    }

   

}
