@extends('admin/masterLayout')
@section('main')

@section('css')
	<style type="text/css" media="screen">
	.form-add{
		padding-right: 20px;
	}

	
	</style>
@endsection

	


<h1 style="margin-top:60px;">Thêm thể loại</h1>
	
  <form action="{{ route('admin.menu_store') }}" name="forn_add"style=" margin: 40px 0;" method="POST" class="form-add">
 
		 @if($errors->any())
			  <div class="alert alert-danger text-center">
				  	<p style="color:red;">Vui lòng nhập dữ liệu</p>
			  </div>
		  @endif
  
  <table>

  	<tr>
  		<td><label for="name">Name</label></td>	   
  		@csrf
  		<td><input type="text" class="form-control id="name" name="name" placeholder="Nhập tên"
  		value="{{ old('name')}}" /></td>
  			@error('name')
  				<td><span>{{ $message }}</span></td>
  			@enderror
  	</tr>
  	
  	<tr>
  		<td><label for="code">code</label></td>
		<td><input type="text" class="form-control" id="code" name='code' placeholder="Nhập code" 
		 value="{{ old('code')}}"/></td>
		 	@error('code')
		 		<td><span>{{ $message }}</span></td>	
		 	@enderror
	</tr>
	<tr>
  		<td><label for="group_name">Chọn thể loại</label></td>
		<td>
		<select name="id_cha" class='form-control'>
			<option value="0">Chọn</option>
			@php
				$theloai_id = getTheloai_id_cha($listTheloai,$id_cha=0,$level=0);
				if(!empty($theloai_id )){
					foreach($theloai_id as $key=>$item){
					@endphp
						<option value="{{$item->id}}" {{ old('id_cha')== $item->id ? 'selected' : false }}>{{str_repeat(' --- ',$item->level).$item->name}}</option>
					@php }
				}
			
		
			@endphp
						
		</select>
		</td>
			@error('id_cha')
		 	<td><span>{{ $message }}</span></td>	
			@enderror

	</tr>
	<tr>
  		<td><label for="trang-thai">Trạng thái</label></td>
		<td>
		<select name="status" class='form-control'>
		<!--	<option value="">Trạng thái</option> -->
			<option value="0" {{ old('status')== 0 ? 'selected' : false }}>Chưa kích hoặt</option>
			<option value="1" {{ old('status')== 1 ? 'selected' : false }}>Kích hoặt</option>
			
		</select>
		</td>
			@error('status')
		 		<td><span>{{ $message }}</span></td>	
			@enderror

	</tr>
	<tr>
		<td><button type="submit" class="btn btn-primary">Thêm thể loại</button></td>	
	</tr>			    
 </table> 

  
</form>

@endsection
