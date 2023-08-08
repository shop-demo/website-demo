<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class groupModel extends Model
{
    use HasFactory;
    protected $table = "groups";
    protected $fillable =['name'];
    protected $primariKey ='id';
    public $timestamps = false;


}
