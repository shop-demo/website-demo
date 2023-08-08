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

        <h1>Danh sách khách hàng</h1>
  @if(session('success'))
      <div class='alert alert-success'>{{session('success')}}</div>
  @endif
 
  <!-- List user -->
  <div id="btn">
    <a href="{{--route('thanhvienAdd')--}}" class="user_add">Add</a>
  </div>
 
  <div>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Id</th>
          <th>Tên</th>
          <th>email</th>
          <th>quyền</th>
          <th>created_at</th>
          <th>add-quyen</th>
       
        </tr>
      </thead>
      <tbody>
         @foreach($listKhachhang as $key=>$value)
         
            <td>{{$key+1}}</td>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>email</td>
           
            <td>
            <ul style="list-style: none;">
              @foreach($value->roles as $key=>$val)
               <li>{{$val->name}}</li>
              @endforeach
              </ul>
            </td>
           
            <td>{{$value->created_at}}</td>
            
            <td><a href="{{route('admin.khachhangQuyen',['id'=>$value->id])}}" class="btn btn-danger btn-sm">quyền</a></td>
            <td>
            <td><a href="{{--route('admin.thanhvienEdit',['id'=>$thanhvien->id])--}}">edit</a></td>
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