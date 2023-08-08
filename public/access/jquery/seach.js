$(document).ready(function(){
  	
    
   $('.seach').hide();
  	$('.input_seach').on('keyup',function(){
     var _url = $('.route_seach').val();
  		var _text = $(this).val();
      //console.log(_text,_url);
     
      if(_text != ''){

          $.ajax({
           
              url:_url, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
             
              type:"GET", // phương thức gửi dữ liệu.
             
              data:{ seach: $(this).val()},
              
              success: function(data) {
                       $('.seach').show();
                       $('.seach').html(data);

   
                     }
        
          });


      }else{

         $('.seach').html('');
         $('.seach').hide();
      }
  		  
      

  	});
  
});