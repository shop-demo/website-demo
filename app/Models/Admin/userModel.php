<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userModel extends Model
{
    use HasFactory;

     protected $table ='users';

    public function getUser($filters=[],$seach=null){
    	//DB::enableQueryLog();
        $userList = DB::table($this->table)
        ->select('users.*','groups.name as nhom')
        ->join('groups','users.group_id','=','groups.id')
        ->orderBy('users.id','DESC');

        if(!empty($filters)){
            $userList = $userList->where($filters);
        }
        if(!empty($seach)){
            $userList = $userList->where(function($query) use($seach){
                $query->orWhere('users.name','like','%'.$seach.'%');
                $query->orWhere('users.email','like','%'.$seach.'%');
            });
        }
       
        //$userList = $userList->get();
        $userList = $userList->paginate(2);
        
      // $sql=DB::getQueryLog();
      //dd($sql);
        return $userList;
    	
    }
    //get 1 user
    public function userChitiet($id){
       return  DB::table($this->table)
        ->where('id',$id)
        ->get();

    }

    //add user
    public function insetUser($dataInsert){
        return DB::table($this->table)->insert($dataInsert);

    }
    //cập nhật uses
    public function editUser($data,$id){
        return DB::table($this->table)
                ->where('id',$id)
                ->update($data);
    }

    //delete
    public function deleteUser($id){
        
         return DB::table($this->table)->where('id',$id)->delete();

    }








}
