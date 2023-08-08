<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\khachhangModel;
use App\Models\ajax\commentModel;
use App\Models\admin\sanphamModel;
use DB;
use Auth;

class commentController extends Controller
{
    public function addComment(Request $Request){
    	$sp = commentModel::has('children')->get()->toArray();
    		
    }





}
