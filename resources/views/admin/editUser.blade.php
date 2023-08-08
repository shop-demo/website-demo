@extends('admin/masterLayout')
@section('main')

@section('css')
	<style type="text/css" media="screen">
	.form-add{
		padding-right: 20px;
	}

	
	</style>
@endsection

<h1 style="margin-top:60px;">Cập nhật User</h1>
	
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
  		value="{{ old('text_name') ?? $userChitiet[0]->name }}" /></td>
  		@error('text_name')
  			<td><span>{{$message}}</span></td>
  		@enderror	
  	</tr>
  	
  	<tr>
  		<td><label for="email">Email address:</label></td>
		<td><input type="email" class="form-control" id="email" name='email' placeholder="Nhập email" 
		 value="{{ old('email') ?? $userChitiet[0]->email }}"/></td>
		 @error('email')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	</tr>
	<tr>
  		<td><label for="group_name">Chọn nhóm user</label></td>
		<td>
		<select name="group_name" class='form-control'>
			<option value="">Chọn nhóm thành viên</option>
			@if(!empty(getGroupUser()))
				@foreach(getGroupUser() as $key=>$item)
					<option value="{{$item->id}}" {{ old('group_name') ?? $userChitiet[0]->group_id == $item->id ? 'selected' : false }}>{{ $item->name }}</option>
				@endforeach
			@endif
			
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
			<option value="0" {{ old('status') ?? $userChitiet[0]->status == 0 ?'selected': false }}>Chưa kích hoặt</option>
			<option value="1" {{ old('status') ?? $userChitiet[0]->status == 1 ?'selected': false }}>Kích hoặt</option>
			
		</select>
		</td>
		@error('status')
		 	<td><span>{{$message}}</span></td>	
		 @enderror

	</tr>
	<tr>
		<td><button type="submit" class="btn btn-primary">Cập nhất</button></td>	
	</tr>			    
 </table> 

  
</form>

@endsection
