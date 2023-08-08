$(document).ready(function(){
	
//show form_reply
	$('.btn_reply_comm').on('click',function(e){
		e.preventDefault();
		var _id = $(this).data('id');
		var form_reply ='.form_reply_comm_' +_id;
		
	  $('.formReply').slideUp();
      $(form_reply).slideDown(); //slideDown();
	
	});

//trả lời comment

$(document).on('click','.btn_reply_comm',function(ev){
      ev.preventDefault();
      var id = $(this).data('id');
      var commentReply = '.commRep_' + id;
      var comment      = $(commentReply).val().trim();
      var san_pham_id  = $('#chitietSp_id').val();
      var khachhang_id = $('#user_id').val();
      var _urlReply    = $('#routeRep').val();
      var _token       = $('input[name ="_token"]').val();


        $.ajax({

            type:'POST',
           
            url:_urlReply,
            
            data:{
              
              comment:comment,
              
              san_pham_id:san_pham_id,
              
              khachhang_id:khachhang_id,
              
              reply_id :id,

              _token:_token

            },
           
           success:function(res){
            
              $('.comm_rep').val('');
              //console.log(res);
             //$('#commSP').append(res);
              $('#rep').append(res);
              
           
           } 



        });


     
     // console.log(comment,khachhang_id,san_pham_id,khachhang_id,_urlReply,_token);
      
   });






});