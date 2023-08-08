
@extends('frontend.client')
@section('main')
@include('frontend.pages.block.header') 

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
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
						
						<form action="" method="post">
							@csrf
							
							<input type="text" placeholder="Name" name="name"/>
							@error('name')
	  						<p>{{ $message }}</p>
	  						@enderror
							
							<input type="password" placeholder="pass" name="password" />
							@error('password')
	  						<p>{{ $message }}</p>
	  						@enderror
							
							<span>
							<input type="checkbox" class="checkbox" name="remember"> 
								lưu mật khẩu
							</span>
							<button type="submit" class="btn btn-default">Login</button>
							<a href="{{route('signup')}}" style="display: inline-block; padding-top:10px; font-size: 1.5rem;">Kích vào đây để đăng ký thành viên </a>
						</form>
					</div><!--/login form-->
				</div>
			
				
	</section><!--/form-->
	@endsection