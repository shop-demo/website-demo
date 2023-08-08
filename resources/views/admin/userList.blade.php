
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
                  <option value="active" {{ request()->status == 'active'?'selected':'false' }}>active</option>
                  <option value="inactive" {{ request()->status == 'inactive'?'selected':'false' }}>inative</option>
                </select>
              </div> 
            </div>
             <div class="col-sm-3">
              <div class="form-group">
                <select class="form-control" name="group_name">
                  <option value="">Chon thành viên</option>
                        @if(!empty(getGroupUser()))
                         @foreach(getGroupUser() as $key=>$item)
                            <option value="{{$item->id}}"{{ request()->group_name == $item->id ?'selected':false}}>{{ $item->name }}</option>
                         @endforeach
                        @endif  
                   
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
@section('main')
 
  <!-- List user -->
  <div id="btn">
    <a href="{{ route('admin.userAdd') }}" class="user_add">Add</a>
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
      @if(!empty($listUser))
        @foreach($listUser as $key=>$value)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->group_id}}</td>
            <td>{!!$value->status == 0 ? '<button type="text" class="btn btn-danger btn-sm">chưa kích hoặt</button>':'<button type="text" class="btn btn-success btn-sm">Kích hoặt</button>' !!}</td>
            <td>
            <td><a href="{{ route('admin.userEdit',['id'=>$value->id])}}">edit</a></td>
            <td><a href="{{route('admin.delete',['id'=>$value->id])}}" class="btn btn-sm btn-danger delete" >delete</a></td>
             
           </tr>
       @endforeach  
     @endif  
  
      </tbody>
    </table>
      <form method="POST" action="" id="formDelete">
            @csrf
             @method('delete')

      </form>
    <div class="clearfix"> <!--phan trang -->
        {{ $listUser->links()}}
    </div>
     
 </div>

@endsection
@section('js')
  <script  type="text/javascript" charset="utf-8" >
     $('.delete').click(function(e){
      e.preventDefault();
      //get href
        var a = $(this).attr('href');
        //gan vào action
        $('#formDelete').attr('action',a);
       if(confirm("bạn có chắc xóa không ?")){
        $('#formDelete').submit();
       }
       
     });
    
  </script>
@endsection