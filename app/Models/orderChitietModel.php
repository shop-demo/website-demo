<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderChitietModel extends Model
{
    use HasFactory;
    protected $table ='order_chitiet';
    protected $fillable =['name','dat_hang_id','san_pham_id','don_gia','quantity'];
    protected $primariKey ='id';
    public $timestamps = true;

	



}
