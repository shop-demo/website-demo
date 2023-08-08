<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class fileController extends Controller
{
    //
    public function index(){
    	$title ='file';
    	return view('admin.sanpham.file',compact('title'));
    }

}
