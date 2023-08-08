<?php

namespace App\Models\ajax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentModel extends Model
{
   
    //`comment`, `san_pham_id`, `khachhang_id`, `status`, `reply_id
    use HasFactory;
    protected $table ='comment';
    protected $fillable =['comment','san_pham_id','khachhang_id','status','reply_id'];
   	protected $primariKey ='id';
    public $timestamps = true;


    //1 use có nhiều comm
    public function use(){
      return $this->hasOne('App\Models\admin\khachhangModel','id','khachhang_id');
    }

    public function children(){
        return $this->hasMany(commentModel::class,'reply_id','id');
    }
   
   

}
