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

@section('seach')

        <h1>Danh sách Sản phẩm</h1> 

        
       
     @if(session('success'))
      <div class='alert alert-success'>{{session('success')}}</div>
     @endif

      <!-- Form Seach -->
        <form action="" style="margin: 30px 0;" method="get">

            <div class="col-sm-3">
              <div class="form-group">

                 <input type="seach" class="form-control" name="seach_name" placeholder="Seach-name" value="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                 <select class="form-control" name="status">
                 <option value="0">Chọn status</option> 
                  <option >active</option>
                  
                </select>
              </div> 
            </div>
             <div class="col-sm-3">
              <div class="form-group">
                <select class="form-control" name="group_name">
                  <option value="">Chon thành viên</option>
                    
                </select>
              </div>
            </div>
            
             <div class="col-sm-3">
              <div class="form-group">
                
                 <input type="submit" class="btn btn-primary" id="email" name="btn_submit" value="Tìm kiếm">
              </div>
            </div>
           

         </form>


@endsection
@section('main')

  <!-- List user -->
  <div id="btn"style="display: block; width: 150px; height:45px;">
    <a href="{{route('admin.sanphamAdd')}}" class="btn btn-primary" >Add</a>
  </div>
 
  <div>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Tên</th>
          <th>code</th>
          <th>Hình minh họa</th>
          <th>Abum ảnh</th>
          
          <th>trạng thái</th>
          <th>Giá</th>
          <th>Giá khuyến mại</th>
          <th>Mô tả </th>
          <th>Chi tiết</th>
          <th>Thể loại id</th>
          <th>edit</th>
          <th>Delete</th>

        </tr>
      </thead>
      <tbody>

     
        <?php 

          if($listSanPham->count()>0){
            foreach($listSanPham as $key=>$sanphamList){ ?>

              <tr>
                <td>{{$sanphamList->id}}</td>
                 <td>{{$sanphamList->name}}</td>
                 <td>{{$sanphamList->code}}</td>
                 <td><img src="{{url('upload/sanpham')}}/{{$sanphamList->hinh_minh_hoa}}" style="width:30px; height:auto;"/></td>
                 <td>
                 <?php
                  $img = json_decode($sanphamList->album_anh);
                    
                      foreach($img as $album){
                       echo '<span><img src="http://localhost:8088/web/Shop/public/upload/sanpham/'.$album.'" style="width:20%;" /></span>';
                     }
        
                   ?>

                 </td>
                 <td>{{$sanphamList->status}}</td>
                 <td>{{$sanphamList->gia}}</td>
                 <td>{{$sanphamList->gia_khuyen_mai}}</td>
                 <td>{{$sanphamList->mo_ta_ngan_gon}}</td>
                 <td>{!!$sanphamList->mo_ta_chi_tiet!!}</td>
                 <td>{{$sanphamList->the_loai_id}}</td>
                 <td><a href="{{route('admin.sanphamEdit',['id'=>$sanphamList->id])}}" class="btn btn-info" >Edit</a></td>
                 <form  action=""  method="POST" id="sanpham_delete">
                     @csrf
                     @method('delete')
                    <td><a href="{{route('admin.sanphamDelete',['id'=>$sanphamList->id])}}" class="btn btn-sm btn-danger spDelete"> delete</a></td>

                 </form>
                
        
            </tr>
           <?php }
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
    
        $('.spDelete').click(function(event){
          event.preventDefault();
          var _href = $(this).attr('href');

        $('form#sanpham_delete').attr('action',_href);
        
        $('form#sanpham_delete').submit();
       
          if(confirm('bạn có muốn xóa không')==false){
              
               window.location = 'http://localhost:8088/web/Shop/public/admin/sanpham';
               
               alert('chưa có dữ liệu được xóa');
          
          }else{
               
               $('form#sanpham_delete').submit();
         
          }
         
        })
    </script>

@endsection