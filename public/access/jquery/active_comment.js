
$(document).ready(function(){
	$(document).on('click','.btn_duyet',function(e){
		e.preventDefault();
		var _status = $(this).data('comment_status');
		var _sanpham_id = $(this).data('san_pham_id');
		var _id = $(this).data('id');
		var _token = $('input[name ="_token"]').val();
   // console.log(_status);
		
        $.ajax({

            type:'POST',
           
            url:'http://localhost:8088/web/Shop/public/login/active',
            
            data:{
   
              status:_status,
              
              san_pham_id:_sanpham_id,
              
              id :_id,

              _token:_token,

            },
           
           success:function(res){
            location.reload();
           
           } 



        });


	});
	





});