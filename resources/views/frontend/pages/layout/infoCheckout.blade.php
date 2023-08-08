@extends('frontend.client')
 
@section('main')
@include('frontend.pages.block.header')

<div class="container">
  <div class="jumbotron">
    <h1>Đặt hàng thành công</h1>
    <p>Vui lòng kiểm tra hộp thư email và kích vào nút xác nhận.Hệ thống sẽ hủy đơn hàng trong vòng 72h nếu bạn không xác nhận đơn hàng này</p>
  </div>
  <p><a class= "btn btn-success" href="https://gmail.com">kích vào đây để vào Email</a></p>
  
</div>

@endsection