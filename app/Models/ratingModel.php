<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratingModel extends Model
{
    use HasFactory;
    protected $table ='danh_gia_sp';
    protected $fillable =['san_pham_id','khach_hang_id','rating_star'];
   
    public $timestamps = false;
}
