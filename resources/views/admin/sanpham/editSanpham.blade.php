@extends('admin/masterLayout')
@section('main')

@section('css')
	<style type="text/css" media="screen">
	
	form.form-add {
	padding-right: 20px;
    width: 90%;
}

	
	</style>
@endsection


<h1 style="margin-top:60px;">Sửa Sản phẩm</h1>
	
  <form action="" name="forn_add"style=" margin: 40px 0;" method="POST" class="form-add" enctype="multipart/form-data">
 
	  @if($errors->any())
		  <div class="alert alert-danger text-center">
			  	<p style="color:red;">Vui lòng nhập dữ liệu</p>
		  </div>
	  @endif
  
  <table>

  	<tr>
  		<td><label for="name">Name</label></td>	   
  			@csrf
  		   
  		<td><input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên"
  		value="{{ old('name') ?? $sanpham_id->name }}" /></td>
  		@error('name')
  			<td><span>{{$message}}</span></td>
  		@enderror	
  	</tr>
  	
  	<tr>
  		<td><label for="code">code:</label></td>
		<td><input type="text" class="form-control" id="code" name='code' placeholder="Nhập code" 
		 value="{{ old('code') ?? $sanpham_id->code }}"/></td>
		 @error('code')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	</tr>
	
	<tr>
  		<td><label for="hình">Hình minh họa:</label></td>
		<td>
		<div class="input-group">
		    <input type="text" class="form-control" name="hinh_minh_hoa" id="hinh_minh_hoa" value="{{ old('hinh_minh_hoa') ?? $sanpham_id->hinh_minh_hoa }}"/>
		    <span class="input-group-addon">
		    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" ><i class="fa fa-folder-open-o" aria-hidden="true"></i></button></span>

		    <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content" style="width:900px;height:900px;">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Modal Header</h4>
			        </div>
			        <div class="modal-body">
			          <p>Some text in the modal.</p>
			          <iframe src="http://localhost:8088/web/Shop/public/manager/dialog.php?field_id=hinh_minh_hoa" style="width:100%;height:600px; overflow-y: auto; "></iframe>
			        </div>
			        <div class="modal-footer" style="width:900px;border: 1px solid #ccc;position: fixed;bottom: 0;left: 0;">
			       	  <button type="button" class="btn btn-info" data-dismiss="modal">Save</button>
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			        </div>
			      </div>
			      
			    </div>
			  </div>
	  

	  		</div>

		
		 </td>

		 @error('hinh_minh_hoa')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	</tr>
	<!-- hinh-album -->
	<tr>
  		<td><label for="hình_album">album:</label></td>
		<td>
		<div class="input-group">
		    <input type="text" class="form-control" name="album_anh" id="hinh_album" 
		    value="{{ old('album_anh') ?? $sanpham_id->album_anh }}" />
		    <span class="input-group-addon">
		    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal_album_hinh" ><i class="fa fa-folder-open-o" aria-hidden="true"></i></button></span>

		    <!-- Modal -->
			  <div class="modal fade" id="myModal_album_hinh" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content" style="width:900px;height:900px;">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Modal Header</h4>
			        </div>
			        <div class="modal-body">
			          <p>Some text in the modal.</p>
			          <iframe src="http://localhost:8088/web/Shop/public/manager/dialog.php?field_id=hinh_album" style="width:100%;height:600px; overflow-y: auto; "></iframe>
			        </div>
			        <div class="modal-footer" style="width:900px;border: 1px solid #ccc;position: fixed;bottom: 0;left: 0;">
			       	  <button type="button" class="btn btn-info" data-dismiss="modal">Save</button>
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			        </div>
			      </div>
			      
			    </div>
			  </div>
	  

	  		</div>

		
		 </td>

		 @error('album_anh')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	</tr>
	<tr>
  		<td><label for="gia">Giá bán</label></td>
		<td><input type="text" class="form-control" id="giá" name='gia'
		 value="{{old('gia') ?? $sanpham_id->gia }}"/></td>
	
		 @error('gia')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	
	</tr>
	<tr>
  		<td><label for="gia_khuyen_mai">Giá bán khuyến mại</label></td>
		<td><input type="text" class="form-control" id="giá" name='gia_khuyen_mai'
		 value="{{old('gia_khuyen_mai') ?? $sanpham_id->gia_khuyen_mai }}"/></td>
	
		 @error('gia_khuyen_mai')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	
	</tr>
	<tr>
  		<td><label for="mota">Mô tả</label></td>
		<td><textarea type="text" class="form-control" name="mo_ta_ngan_gon" 
		 value="">{{old('mo_ta_ngan_gon') ?? $sanpham_id->mo_ta_ngan_gon }}</textarea></td>
	
		 @error('mo_ta_ngan_gon')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	
	</tr>
	<tr>
  		<td><label for="mota_chitiet">Chi tiết</label></td>
		<td><textarea type="text" class="form-control" name="mo_ta_chi_tiet" id="editor1" >{{old('mo_ta_chi_tiet') ?? $sanpham_id->mo_ta_chi_tiet }}</textarea></td>
		
	
		 @error('mo_ta_chi_tiet')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
	
	</tr>
	<!-- theloai-->
	<tr>
  		<td><label for="group_name">Thể loại</label></td>
		<td>
		<select name="the_loai_id" class='form-control'>
			
			<option value="0">Chọn thể loại</option>

			@foreach(getTheloai_id_cha($dataTheLoai,$id_cha=0,$level=0) as $key=>$value) 
			
				<option value="{{$value->id}}" {{ old('id_cha')== $value->id || $sanpham_id->the_loai_id == $value->id? 

				'selected' : false }}>{{str_repeat(' --- ',$value->level).$value->name}} </option>
			
			
		  @endforeach
			
		</select>
		</td>
		
		@error('the_loai_id')
		 	<td><span>{{$message}}</span></td>	
		 @enderror
		

	</tr>
	<!--cloze theloai-->
	<tr>
  		<td><label for="trang-thai">Trạng thái</label></td>
		<td>
		<select name="status" class='form-control'>
		<!--	<option value="">Trạng thái</option> -->
			<option value="0" {{ old('status')== 0 ?'selected': false }}>Chưa kích hoặt</option>
			<option value="1" {{ old('status')== 1 ?'selected': false }}>Kích hoặt</option>
			
		</select>
		</td>
		@error('status')
		 	<td><span>{{$message}}</span></td>	
		 @enderror

	</tr>
	<tr>
		<td><button type="submit" class="btn btn-primary">Thêm Sản phẩm</button></td>	
	</tr>			    
 </table> 

</form>

@endsection
@section('js')

<script >
     
  CKEDITOR.replace( 'editor1' ,{
	filebrowserBrowseUrl : '/web/Shop/public/manager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserUploadUrl : '/web/Shop/public/manager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserImageBrowseUrl : '/web/Shop/public/manager/dialog.php?type=1&editor=ckeditor&fldr='
	
});
	
     	//http://localhost/upload/sanpham/images/cookie.png
 
 </script>
	
@endsection

