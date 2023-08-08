<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkoutModel extends Model
{
    use HasFactory;
    protected $table ='dat_hang';
    protected $fillable =['name','email','phone','address','tong_so_sp','thanh_tien','khach_hang_id','token','status'];
    protected $primariKey ='id';
    public $timestamps = true;


}
