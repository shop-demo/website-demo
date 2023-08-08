$(document).ready(function(){
    
  //LOGIN-ĐĂNG NHẬP
  $('#btn_login').on('click',function(ev){
         ev.preventDefault();
         var name = $('#name').val();
         var password =$('#pwd').val();
         var _url = $('#route_an').val()
         var _token   = $('input[name ="_token"]').val();
         
         $('.loi').text('');
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
                       
                        for(let key in res.error){
                          
                           $('.loi_'+key+'').text(res.error[key]);
                        }
                      
                     }
                     else if(res.mgs){
                         $('.mgs').text(res.mgs);
                        
                     }
                     else{
                        alert('Đăng nhập thành công');
                        location.reload();
                     }
                     
                  }  


       
        }); 
  }); //--------------cloze đăng nhập------------------------------- 

   //COMMENT--------------------------------------  

   $('#comment_post').on('click',function(event){
      event.preventDefault();
      
      var _url     = $('#route').val(); //'http://localhost/web/Shop/public/login/logout_ajax';
      var _token   = $('input[name ="_token"]').val();
      var _comment = $('#comnent_sp').val();
      var san_pham_id    = $('#sp_id').val();
      var khachhang_id =$('#Id_khachhang').val();
       $('#error_comment').text();
     
      $.ajax({

                  type:'POST',
                  url:_url,
                  data:{
                    comment: _comment,

                    _token :_token,

                    san_pham_id : san_pham_id,

                    khachhang_id: khachhang_id

                  },

                  success:function(res){

                    
                    if(res.error){
                      
                      $('#error_comment').html(res.error);
                    
                    }else{
                    
                     $('#error_comment').html('');
                     
                     $('#comnent_sp').val('');
                     
                     $('#dataComment').append(res);
                      

                     
                    }
                    
                    //console.log(res);
                  }  


                });


  });
   /*TRẢ LỜI- REPLYa.btn.btn-primary.btn_replay_comm*/
   //show form reply
   $(document).on('click','.btn_replay_comm',function(event){
      event.preventDefault();
      var id = $(this).data('id');
      var form_reply = '.form_replay_comm_' + id;
      $('.formReply').slideUp();
      $(form_reply).slideDown();
     // alert(form_reply);
   
   });
   //lấy nội dung comm reply
   $(document).on('click','.btn_replay_comm',function(event){
      event.preventDefault();
      var id = $(this).data('id');
      var form_reply = '.form_replay_comm_' + id;
      var id_textarea ='#reply_comm_'+id;
      var text_comm_replay = $(id_textarea).val();
      var san_pham_id    = $('#sp_id').val();
      var khachhang_id =$('#Id_khachhang').val();
      var _url     = $('#route').val();
      var _token   = $('input[name ="_token"]').val();
      
      //console.log(text_comm_replay);
      //alert(_url);
   $.ajax({

                  type:'POST',
                  url:_url,
                  data:{
                    comment: text_comm_replay,
                    san_pham_id : san_pham_id,

                    khachhang_id: khachhang_id,
                    
                    reply_id:id,

                    _token :_token


                  },

                  success:function(res){

                   
                     
                     $('#comnent_sp').val('');
                     
                     $('#dataComment').append(res);
                      

                     
                    
                    
                    //console.log(res);
                  }  


                });
   









   });



});