@extends('admin/masterLayout')
@section('css')
  <style>
     a.user_add{
      display: inline-block;
      width: 100px;
      height:35px;
      background: blue;
      color: #fff;
      padding-top: 8px;
      position: relative;
      right: 530px;
      margin-bottom: 10px;
      margin-top: 70px;
    }

  </style>
@endsection


@endsection
@section('main')

   
 
  <!-- List user -->
  <div id="btn"style="display: block; width: 150px; height:45px;">
    <a href="" class="btn btn-primary" >Add</a>
  </div>
 
  <div>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Tên</th>
          <th>Hình minh họa</th>
          <th>album anh</th>
          <th>edit</th>
          <th>Delete</th>

        </tr>
      </thead>
      <tbody>
      <?php
        if(!empty($listSanPham)){ 
            foreach($listSanPham as $key=>$imgList){
              
                $imgList = json_decode($imgList['album_anh']);

             
               
              <?php  }

            }


        }


      ?>
       
     
     
  
      </tbody>
    </table>
      
     
     
    <div class="clearfix"> <!--phan trang -->
        {{-- $listUser->links()--}}
    </div>
     
 </div>

@endsection
@section('js')
  <script  type="text/javascript" charset="utf-8" >
  
   
  </script>
@endsection