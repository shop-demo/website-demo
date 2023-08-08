@extends('admin/masterLayout')
@section('main')
	
	
	<h3 style="margin:30px 0; font-family: roboto; text-transform: uppercase;">Thêm vai trò người dùng</h3>
		
    <form action="{{route('admin.updateQuyen',['id'=>$listKhachhang->id])}}" method="post" >
		
		@csrf
		<table>

		  
		  	<tr>
		  		<td>
		  			<div class="form-group">
			  			<label for="name">{{$listKhachhang->name}}</label>
			  			<input type="text" class="form-control"  name="name" value="{{$listKhachhang->name}}">
		  			</div>
		  			<div class="form-group">
			  			<label for="pass">Pass</label>
			  			<input type="pass" class="form-control" name="password" value="{{$listKhachhang->password}}">
		  			</div>
		  		</td>
		  	</tr>
		  	<tr>

		  		<td>
		  			<h4>Vai trò - Role</h4>
		  			
				    @foreach($dataRole as $key=>$role)
				 	<?php $checked = in_array($role->name,$r) ? 'checked' : ''; ?>
				    <div class="checkbox">
				   	 <label><input type="checkbox" value="{{$role->id}}" name="route[]" {{ $checked }} />{{$role->name}} </label>

				    </div>
				    @endforeach
				   
		  		</td>
				
		  	</tr>
		  	
		  	<tr>
		  		<td><button type="submit" class="btn btn-default">Submit</button></td>
		  		
		  	</tr>
		  
		</table>
	  
	</form>
    

@endsection