<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleModel extends Model
{
    use HasFactory;

    protected $table ='roles';
    protected $fillable =['name','route'];
    protected $primariKey ='id';
    public $timestamps = true;

   
}
