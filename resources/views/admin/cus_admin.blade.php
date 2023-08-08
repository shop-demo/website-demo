@extends('admin.masterLayout')
@section('main')



			<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
	
						@if($errors->any())
				  		<div class="alert alert-danger text-center">
					  		<p style="color:red;">Vui lòng nhập dữ liệu</p>
				  		</div>
						@endif

						@if(session('success'))
		    				<div class='alert alert-success'>{{session('success')}}</div>
		 				 @endif
						
						<form action="" method="post" style="width: 100%;height:auto;">
							@csrf
							
							<input type="text" placeholder="Name" name="name"/>
							@error('name')
	  						<p>{{ $message }}</p>
	  						@enderror
	  						
							
							<input type="password" placeholder="pass" name="password" style="width: 100%; padding: 16px;"/>
							@error('password')
	  						<p>{{ $message }}</p>
	  						@enderror
							<div class="checkbox">
							    <label><input type="checkbox" > Remember me</label>
							 </div>

							<button type="submit" class="btn btn-default">Login</button>
							<a href="{{route('signup')}}" style="display: inline-block; padding-top:10px; font-size: 1.5rem;">Kích vào đây để đăng ký thành viên </a>
						</form>
						

					</div><!--/login form-->
			</div>
			
	
	@endsection