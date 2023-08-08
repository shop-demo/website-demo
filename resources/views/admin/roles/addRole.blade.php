@extends('admin/masterLayout')
@section('main')

<h3 style="margin:30px 0; font-family: roboto; text-transform: uppercase;">Thêm vai trò người dùng</h3>

<form action="{{route('admin.themRole')}}" method="post" >
	@csrf
	<table>
	  
	  	<tr>
	  		<td>
	  			<div class="form-group">
		  			<label for="name">Tên vai trò</label>
		  			<input type="text" class="form-control" id="role" name="name" value={{ old('name') }}>
	  			</div>
	  		</td>
	  	</tr>
	  	<tr>
	  		<td>
	  		@foreach($rou as $key=>$r)
	  			<div class="checkbox">
			   	 <label><input type="checkbox" value="{{$r}}" name="route[]" class="route_check" >{{$r}}</label>
			    </div>
			 @endforeach
	  		</td>
	  	</tr>	
	  	
	  	<tr>
	  		<td><button type="submit" class="btn btn-default">Submit</button>
	  		
			 <label style="padding-left:20px;"><input type="checkbox" value="" name="check-all" id="chech_all">Check all</label>
			
	  		</td>
	  	</tr>
	  
	</table>
  
</form>

@endsection
@section('js')
    <script  type="text/javascript" charset="utf-8" >
    //lấy tất cả route
      $(document).ready(function(){

      	$("#chech_all").on('click',function(){
      		var ischeck = $(this).is(':checked');
      		if(ischeck==true){
      			$('.route_check').prop('checked',true);
      		}else{
      			$('.route_check').prop('checked',false);
      		}
      
      	});

      });        


    </script>

@endsection