@extends('admin/masterLayout')
@section('main')

@section('css')
	
	<style type="text/css" media="screen">
		.form-add{
			padding-right: 20px;
		}

	
	</style>

@endsection


	
<h1 style="margin-top:60px;">Thêm user</h1>
	
  <form action="" name="forn_add"style=" margin: 40px 0;" method="POST" class="form-add">
 
  @if($errors->any())
	  <div class="alert alert-danger text-center">
		  	<p style="color:red;">Vui lòng nhập dữ liệu</p>
	  </div>
  @endif
  	 
  <table>

  	<tr>
  		<td><label for="name">Name</label></td>	   
  		@csrf
  		
  		<td><input type="text" class="form-control id="name" name="text_name" placeholder="Nhập tên"
  		value="{{ old('text_name') ?? $chitiet_thanhvien->name}}" /></td>
  		@error('text_name')
  			<td><span>{{$message}}</span></td>
  		@enderror	
  	</tr>
  	
  	<tr>
  		<td><label for="email">Email address:</label></td>
  		<input type="hidden" class="form-control" name="id"  value="{{$chitiet_thanhvien->id}}" />
		<td><input type="email" class="form-control" id="email" name='email' placeholder="Nhập email" 
		 value="{{ old('email') ?? $chitiet_thanhvien->email }}"/></td>
		 @error('email')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	</tr>
	<tr>
  		<td><label for="group_name">Chọn nhóm user</label></td>
		<td>
		<select name="group_name" class='form-control'>
			<option value="0">Chọn nhóm thành viên</option>
			@foreach($thanhvienGroup as $key=>$value)
				<option value="{{$value->id}}" {{ old('group_name')==$value->id ||$chitiet_thanhvien->group_id == $value->id ? 'selected':'false'}}>{{$value->name}}</option>
			@endforeach
			
		</select>
		</td>
		@error('group_name')
		 	<td><span>{{$message}}</span></td>	
		 @enderror


	</tr>
	<tr>
  		<td><label for="trang-thai">Trạng thái</label></td>
		<td>
		<select name="status" class='form-control'>
		<!--	<option value="">Trạng thái</option> -->
			<option value="0" {{ old('status')== 0 || $chitiet_thanhvien->status == 0 ?'selected': false }}>Chưa kích hoặt</option>
			<option value="1" {{ old('status')== 1 || $chitiet_thanhvien->status == 1 ?'selected': false }}>Kích hoặt</option>
			
		</select>
		</td>
		@error('status')
		 	<td><span>{{$message}}</span></td>	
		 @enderror

	</tr>
	<tr>
		<td><button type="submit" class="btn btn-primary">Thêm user</button></td>	
	</tr>			    
 </table> 

  
</form>

@endsection
