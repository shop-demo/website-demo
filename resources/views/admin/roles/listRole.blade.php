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

<!--nội dung website -->

@section('main')

  
<h1 style="margin-top:60px;">List Quyền</h1>
 @if(session('success'))
      <div class='alert alert-success'>{{session('success')}}</div>
  @endif
  
  <!-- List user -->
  <div id="btn">
    <a href="{{route('admin.addRole')}}" class="user_add">Thêm quyền</a>
  </div>
 
  <div>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Id</th>
          <th>name</th>
          <th>Ngày tạo</th>
          <th>trạng thái</th>


        </tr>
      </thead>
      <tbody>
         @foreach($dataRole as $key=>$value)
              
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
           
            <td>{{$value->created_at}}</td>
           
            <td>
            <td><a href="{{route('admin.editRole',['id'=>$value->id])}}">edit</a></td>
            <td>
              <form method="POST" action="" id="formDelete">
               @csrf @method('delete')
              <a href="{{--route('thanhvien_delete',['id'=>$thanhvien->id])--}}"  class="btn btn-sm btn-info delete" >delete</a>
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
  

@endsection