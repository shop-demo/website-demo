<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class albumImage extends Model
{
    use HasFactory;

    protected $table ='album_image';
    protected $fillable =['ten_anh','san_pham_id'];
   
    protected $primariKey ='id';
   
    public $timestamps = false;
}
