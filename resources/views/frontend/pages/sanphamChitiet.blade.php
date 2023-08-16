@extends('frontend.client')
@section('css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    
@endsection 
@section('main')
@include('frontend.pages.block.header')


 
<!--/category-products Danh muc -->
   
   <div class="container">
     <div class="row">
     <!--chitiet-->

        <div class="col-sm-12 padding-right">
          <div class="product-details col-sm-5"><!--product-details-->
           
              <div class="view-product">
                <img src="{{url('upload')}}/sanpham/{{$chiTietSp->hinh_minh_hoa}}" alt="" />
                <h3>ZOOM</h3>
              </div> 
              <div id="similar-product" class="carousel slide" data-ride="carousel">
                
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                       <?php
                        $img = json_decode($chiTietSp->album_anh);
                          echo'<div class="item active">';
                            foreach($img as $album){
                               echo ' <a href=""><img src="'.url('upload').'/sanpham/'.$album.'" alt="" style="width:20%;"></a>';
                               
                             }
                          
                          echo'</div>';
                          echo' <div class="item">';
                            foreach($img as $album){
                              echo' <a href=""><img src="'.url('upload').'/sanpham/'.$album.'" alt="" style="width:20%;"></a>';
                            }
                     
                          echo' </div>';

                         ?>

                  </div>

                  <!-- Controls -->
                  <a class="left item-control" href="#similar-product" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right item-control" href="#similar-product" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
              </div>

            </div><!--/product-details-->
         

            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <img src="{{url('access')}}/images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$chiTietSp->name}}</h2>
                <p>review:{{$ratingSP}}</p>
                <!-- Đánh giá sp -->
                @if(auth()->guard('cus')->check())

                    <div id="rateYo"></div>

                <form action="{{route('rating')}}" method="post" class="form-inline" id="form_rating">
                    <div class="form-group">
                    @csrf
                    <input type="hidden"  name="rating_star" id="rating_star" value="{{$ratingSP}}"/>
                    <input type="hidden"  name="san_pham_id" id="san_pham_id"  value="{{$chiTietSp->id}}" />
                   
                    <input type="hidden"  name="khach_hang_id" id="khach_hang_id" value ="{{auth()->guard('cus')->user()->id}}" />
                  
                    </div>
                </form>
                @else
                    <div id="rateYo1"></div>
                @endif
               
               
                <span>
                
                  <span>{{number_format($chiTietSp->gia)}} vnd</span>
                  <label>Quantity:</label>
                  <input type="text" value="3" />
                  <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                  </button>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> E-SHOPPER</p>
                <a href=""><img src="{{url('access')}}/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
              </div><!--/product-information-->
            </div>
        </div>    
    </div>
  <!---cloze row 1-->
  <!-- row2 comment-->
  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Đăng nhập</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content đăng nhập tài khoản để viết bình luận-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đăng nhập tài khoản của bạn</h4>
      </div>
      
      <div class="modal-body">
        <p class="mgs" style="font-family: roboto; font-size:16px;padding: 15px; text-align: center; color:green; margin: 0;"></p>
        
        <form action="{{route('login_Ajax')}}" method="POST" >
            @csrf
            <input type="hidden" value="{{route('login_Ajax')}}" id="routeLogin"/>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="name" class="form-control" id="name" name="name">
              <p class='loi_0 err'></p>
              
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="password">
                <p class='loi_1 err'></p>
            </div>
            <div class="checkbox">
              <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="button" class="btn btn-default btn_Login">Login</button>
        </form>

      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- \Modal -->
  
  <div class="media commnets">
  
            <a class="pull-left" href="#" style="width:50px; height:auto;">
              <img class="media-object" src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg"  alt="">
            </a>
            <div class="media-body">
             @if(auth()->guard('cus')->check())
              <h4 class="media-heading">Chào ban {{auth()->guard('cus')->user()->name}}</h4>
              @endif  
              <p>Bạn tiếp tục viết binh luận </p>
              <div class="blog-socials">
                <ul>
                  <li><a href=""><i class="fa fa-facebook"></i></a></li>
                  <li><a href=""><i class="fa fa-twitter"></i></a></li>
                  <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                  <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                </ul>
              @if(auth()->guard('cus')->check())
                <form action="{{route('commentAjax')}}" method="POST" > 
               
                @csrf
                  <textarea name="comment" rows="8" cols="5" placeholder="bình luận" id="comn"></textarea>
                  <p class="errComm" style="font-family: roboto; font-size: 16px; color:red;"><p>
                
                 <input type="hidden"  name="san_pham_id" id="sanpham"  value="{{$chiTietSp->id}}" />
                  <input type="hidden"  name="khachhang_id" id="khachhang"  value="{{auth()->guard('cus')->user()->id}}" />
                 <input type="hidden" value="{{route('commentAjax')}}" name="routePost" id="routePost"/>
                </form>
             @endif   
                <a class="btn btn-primary btn_postComment" href="" style="display: block; padding: 10px;">Gủi bình luận</a>
              </div>
            </div>
          </div><!--Comments-->
  
  <!--View comment -->
  <div class="response-area">
  
  <h2> {{ !empty($totalComm) ? $totalComm : 0}} bình luận</h2>
  
  <div id="commSP">
  {{-- @include('frontend.pages.layout.commentAjax') --}} 
  </div>

  <h1>Mới<h1>
  
  <div id="html">
    

  </div>

  
  <form action="#" method="get">
    <input type="hidden" value="{{request()->url()}}/comm" name="commSp" id="comment_rou" />
    
  </form>

   
   {{-- @include('frontend.pages.layout.repComm',['san_pham_id'=>$chiTietSp->id]) --}}
   
  
 </div><!--/Response-area-->
 </section>
@endsection
  
  @section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  <script type="text/javascript" language="javascript">
        
    $(document).ready(function(){
       var rating_sp = '{{$ratingSP}}';         
     
      $("#rateYo").rateYo({
        rating: rating_sp,
        starWidth: "20px"
      
      }).on("rateyo.set", function (e, data) {
            $('#rating_star').val(data.rating);
            $('#form_rating').submit();
                //alert("The rating is set to " + data.rating + "!");
        });


      $("#rateYo1").rateYo({
        rating: rating_sp,
        starWidth: "20px"
      

      }).on("rateyo.set", function (e, data) {
 
                alert("Bạn login tài khoản và mua sản phẩm để được đánh giá sản phẩm");
        });


    });
   

  </script>
   <script src="{{url('access')}}/jquery/comment.js"></script>
   
  @endsection