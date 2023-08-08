<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_khachangModel extends Model
{
    use HasFactory;
    protected $table ='role_khachhang';
    protected $fillable =['khachhang_id','roles_id'];
    protected $primariKey ='id';
    public $timestamps = true;
}
