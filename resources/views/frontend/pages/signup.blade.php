
@extends('frontend.client')
@section('main')
@include('frontend.pages.block.header') 


<section id="form"><!--form-->
		<div class="container">
			<div class="row">
			
				<div class="col-sm-4 col-sm-offset-4">
					
					<h2>Đăng ký thành viên</h2>
					
					<form action="" method="post">
					    @csrf
					    <div class="form-group">
						 <label for="usr">Name:</label>
						 <input type="text" class="form-control"  name="name" placeholder="Name">
						</div>
						
						<div class="form-group">
						 <label for="pwd">Password:</label>
						 <input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						
						<div class="checkbox">
	    				 <label><input type="checkbox" name="Remember">Lưu mật khẩu</label>
	  					</div>
	  					
	  					<button type="submit" class="btn btn-default">Submit</button>
					</form>	

				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection