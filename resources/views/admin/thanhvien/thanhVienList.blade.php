@extends('admin.masterLayout')
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

        <h1>Danh sách user</h1>
  @if(session('success'))
      <div class='alert alert-success'>{{session('success')}}</div>
  @endif
      <!-- Form Seach -->
        <form action="" style="margin: 30px 0;" method="get">
           
            <div class="col-sm-3">
              <div class="form-group">

                 <input type="seach" class="form-control" name="seach_name" placeholder="Seach-name" value="{{request()->seach_name}}">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                 <select class="form-control" name="status">
                 <option value="0">Chọn status</option> 
                  <option value="active" {{ request()->status == 'active'?'selected':'' }}>active</option>
                  <option value="inactive" {{ request()->status == 'inactive'?'selected':'false' }}>inative</option>
                </select>
              </div> 
            </div>
             <div class="col-sm-3">
              <div class="form-group">
                <select class="form-control" name="group_name">
                  <option value="">Chon thành viên</option>
                  @foreach($thanhvienGroup as $key=>$thanhvienGroup)
                  <option value="{{$thanhvienGroup->id}}" {{request()->group_name == $thanhvienGroup->id ? 'selected':'false'}}>{{$thanhvienGroup->name}}</option>
                  @endforeach
                        
                   
                </select>
              </div>
            </div>
            
             <div class="col-sm-3">
              <div class="form-group">
                 <input type="submit" class="form-control" id="email" name="btn_submit" value="Tìm kiếm">
              </div>
            </div>
           

         </form>


@endsection

<!--nội dung website -->
@section('main')
 
  <!-- List user -->
  <div id="btn">
    <a href="{{ route('admin.thanhvienAdd') }}" class="user_add">Add</a>
  </div>
 
  <div>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Id</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Nhóm</th>
          <th>trạng thái</th>


        </tr>
      </thead>
      <tbody>
          @foreach($listThanhvien as $key=>$thanhvien)
          <tr>
            <td>{{$key++}}</td>
            <td>{{$thanhvien->id}}</td>
            <td>{{$thanhvien->name}}</td>
            <td>{{$thanhvien->email}}</td>
            <td>{{$thanhvien->group_id}}</td>
            <td>{!!$thanhvien->status == 0 ? '<button type="text" class="btn btn-danger btn-sm">chưa kích hoặt</button>':'<button type="text" class="btn btn-success btn-sm">Kích hoặt</button>' !!}</td>
            <td>
            <td><a href="{{route('admin.thanhvienEdit',['id'=>$thanhvien->id])}}">edit</a></td>
            <td>
              <form method="POST" action="" id="formDelete">
               @csrf @method('delete')
              <a href="{{route('admin.thanhvien_delete',['id'=>$thanhvien->id])}}"  class="btn btn-sm btn-info delete" >delete</a>
              </td>
             </form> 
           </tr>
          @endforeach
  
      </tbody>
    </table>
      
    <div class="clearfix"> <!--phan trang -->
        {{-- $listUser->links()--}}
    </div>
     
 </div>

@endsection
@section('js')
  <script  type="text/javascript" charset="utf-8" >
    
        $('a.delete').click(function(event){
          event.preventDefault();
          var _href = $(this).attr('href');
      
       $('form#formDelete').attr('action',_href);
        
        $('form#formDelete').submit();
       
        if(confirm('bạn có muốn xóa không')==false){
              
               window.location = 'http://localhost:8088/web/Shop/public/admin/thanhvien';
               
              alert('chưa có dữ liệu được xóa');
          
         }else{
               
            $('form#formDelete').submit();
         
         }

         
        })
    </script>

@endsection