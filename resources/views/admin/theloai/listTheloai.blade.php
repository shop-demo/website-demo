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

        <h1>Danh sách thể loại danh mục</h1> 
        @php
       
       
        @endphp
       
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
  <div id="btn">
    <a href="{{route('admin.menuAdd')}}" class="user_add">Add</a>
  </div>
 
  <div>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Id</th>
          <th>Tên</th>
          <th>code</th>
          <th>id-cha</th>
          <th>trạng thái</th>


        </tr>
      </thead>
      <tbody>
        @php
          if($listTheloai->count()>0){
              foreach($listTheloai as $key=>$value){
           @endphp
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->id}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->code}}</td>
              <td>{{$value->id_cha}}</td>
              <td>{{$value->status}}</td>
              <td><a href="{{ route('admin.menuEdit',['id'=>$value->id]) }}" class="btn-sm btn-info">edit</a></td>
               <form action ="" method="POST" id="submit_delete">
                 @csrf
                 @method('delete')
                  <td><a href="{{route('admin.menuDelete',['id'=>$value->id])}}"  class="btn btn-sm btn-danger delete" >delete</a></td>
               </form>
           </tr>
               
           @php }
            
          }
          @endphp
             
     
  
      </tbody>
    </table>
      
     
     
    <div class="clearfix"> <!--phan trang -->
        {{-- $listUser->links()--}}
    </div>
     
 </div>

@endsection
@section('js')
  <script  type="text/javascript" charset="utf-8" >
  
      $('.delete').click(function(event){
        event.preventDefault();
        var _href = $(this).attr('href');

       $('form#submit_delete').attr('action',_href);
      $('form#submit_delete').submit();
      if(confirm('bạn có muốn xóa không')==false){
           window.location = 'http://localhost:8088/web/Shop/public/admin/menu';
           alert('chưa có dữ liệu được xóa');
      }else{
           $('form#submit_delete').submit();
      }
       
      })
         
     
  </script>
@endsection