@extends('frontend.client')
 
@section('main')
@include('frontend.pages.block.header')

<div class="container">
  <div class="jumbotron">
    <h2 style="font-family: roboto; text-transform: uppercase; text-align: center; color:green; ">Thông báo chưa đủ điều kiện rating</h2>
    <p style="font-family: roboto; font-size: 16px; padding: 10px 0; font-weight: 300;">Bạn phải mua hàng để được ranting sản phẩm</p>
  </div>
  <p><a class= "btn btn-success" href="{{route('home.index')}}">kích vào đây để đến trang chủ</a></p>
  
</div>

@endsection