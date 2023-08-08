@extends('frontend.client')
 
@section('main')
@include('frontend.pages.block.header')

@php
 
@endphp
  <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>Free E-Commerce Template</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="col-sm-6">
                  <img src="{{url('access')}}/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                  <img src="{{url('access')}}/images/home/pricing.png"  class="pricing" alt="" />
                </div>
              </div>
              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>100% Responsive Design</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="col-sm-6">
                  <img src="{{url('access')}}/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                  <img src="{{url('access')}}/images/home/pricing.png"  class="pricing" alt="" />
                </div>
              </div>
              
              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>Free Ecommerce Template</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="col-sm-6">
                  <img src="{{url('access')}}/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                  <img src="{{url('access')}}/images/home/pricing.png" class="pricing" alt="" />
                </div>
              </div>
              
            </div>
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->

<!--/category-products nọi dung-->
  
  <section>
    <div class="container">
      <div class="row">
      @section('menu')
        
        @include('frontend.pages.block.menu')
     
      @show
      
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Shop</h2>
            @foreach($dataSanpham as $key=>$sp)

            <div class="col-sm-3">
              <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="{{url('access')}}/images/home/{{$sp->hinh_minh_hoa}}" alt="" />
                          <h5 style="color:#FE980F">{{number_format($sp->gia)}}k</h5>
                          <p>{{$sp->name}}</p>
                          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                    
                    <div class="choose">
                      <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                      </ul>
                    </div>
              </div>
            </div>
           @endforeach
          
            
          </div><!--features_items-->
          
          
          
        </div>
      </div>
    </div>
  </section>
  @endsection

   @section('js')
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script src="{{url('access')}}/jquery/seach.js"></script>
   @endsection