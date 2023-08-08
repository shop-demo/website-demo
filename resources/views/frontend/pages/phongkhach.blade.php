@extends('frontend.client')

 
@section('main')
@include('frontend.pages.block.header')
  

    <div class="container">
      <div class="row" style="margin-top:150px;">
        <div class="col-sm-3">
        <!-- menu-right-->
          <div class="left-sidebar">
            <h2>Danh mục sản phẩm</h2>
            <div class="panel-group category-products"><!--category-productsr-->
            
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="">{{$nameDanhmuc->name}}</a>
                  </h4>
                </div>
                  <div class="panel-body">
                    <ul>
                    @if($DanhMuc_children->count()>0)
                    @foreach($DanhMuc_children as $key=>$children)
                      <li><a href="#">{!!$children->name!!}</a></li>
                    @endforeach
                    @endif
                    </ul>
                  
                </div>
              </div>
             
             
            </div><!--/category-products-->
          </div><!-- cloze menu -->
      </div>
  
  <!-- san pham -->
    <div class="col-sm-9 padding-right">
      <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            @foreach($dataSanpham as $key=>$sanpham)
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{url('access')}}/images/home/{{$sanpham->hinh_minh_hoa}}" alt="" />
                      <h2>{{number_format($sanpham->gia)}}vnd</h2>
                      <p>{{$sanpham->name}}</p>
                      <a href="{{route('cartList',['id'=>$sanpham->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                   
                </div>

                <div class="choose">
                  <ul>
                    <li><a href="{{route('ChiTietSp',
                    [
                      'category'=>$nameDanhmuc->code,
                      'slug'=>$sanpham->code

                    ])}}"><i class="fa fa-plus-square"></i>xem chi tiết</a></li>
                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
        </div> <!--cloze features_items-->
      



      </div>
  



  </div>          

</div>






























@endsection