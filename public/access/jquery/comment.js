$(document).ready(function(){

	//lấy giá trị trên form đăng nhập tài khoản
	$('.btn_Login').on('click',function(ev){
		 ev.preventDefault();
		 var name = $('#name').val();
		 var password = $('#pwd').val();
		 var _url = $('#routeLogin').val();
		 var _token = $('input[name ="_token"]').val();
		  
      $('.err').text('');
      $('.mgs').text('');
		
		  $.ajax({

                  type:'POST',
                  url:_url,
                  data:{
                    name: name,
                    password:password,
                    _token :_token,

                  },

                  success:function(res){
                    if(res.error){
                      for(var key in res.error) {
                          $('.loi_'+key).text(res.error[key]);
                          
                         }
                    }else if(res.mgs){
                      $('.mgs').text(res.mgs);
                    }else{
                      alert('Đăng nhập thành công');
                        location.reload();
                    }//\if
                    
                  }//\success  
			 
       })// \ajax


  })//\login Tài khoản
  //--------------------------------------------
  //-----------------------------------------------
  /*COMMENT*/
      load();
        
          function load(){

           var _url = $('#comment_rou').val();
              $.get(_url, function(data){
                  $('#html').html(data);
                 // console.log(data);
              
              });
           
            
          }//\cloze load comment

  
          $('.btn_postComment').on('click',function(ev){
          ev.preventDefault();
          var _url = $('#routePost').val();
          var comment = $('#comn').val().trim();
          var san_pham_id = $('#sanpham').val();
          var khachang_id = $('#khachhang').val();
          var _token = $('input[name ="_token"]').val();


          $.ajax({

                        type:'POST',
                        url:_url,
                        data:{
                          comment: comment,
                          san_pham_id:san_pham_id,
                          khachang_id:khachang_id,
                          _token :_token,

                        },

                        success:function(res){
                          if(res.error){
                            $('.errComm').html(res.error);
                          }else{
                             $('.errComm').html('');
                             $('#comn').val('');
                            // $('#commSP').append(res);
                            $('#html').append(res);
                            load();
                            
                           // console.log(res.data);
                          }//\if
                          
                        }//\success  
             
             })// \ajax



        });//\comment
  
  
  

//-----------reply comment--------


/*

  $(document).on('click','.btn_reply_comm',function(ev){
      ev.preventDefault();
      var id = $(this).data('id');
      var form_reply = '.form_reply_comm_' + id;
     
      $('.formReply').slideUp();
      $(form_reply).slideDown(); //slideDown();

      //alert(form_reply);
      
   });

 
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
              $('#html').append(res);
            // load();
           } 



        });


     
     // console.log(comment,khachhang_id,san_pham_id,khachhang_id,_urlReply,_token);
      
   });


        
*/


});