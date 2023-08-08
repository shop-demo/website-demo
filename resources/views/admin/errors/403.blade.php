@extends('admin/masterLayout')
@section('main')
<?php 
	$code = isset($code) ? $code : 404;
	$title = isset($title) ? $title : "không tìm thấy";
	$message = isset($message) ? $message : 'lỗi page';

?>

<div class="container">
  <div class="jumbotron">
    <h1>{{$code}}</h1>
    <p>{{$title}}</p>
    <p>{{$message}}</p>
  </div>
  <p>Bấm vào <a href="{{route('home.index')}}">đây</a> để quay lại trang chủ</p>
</div


@endsection
