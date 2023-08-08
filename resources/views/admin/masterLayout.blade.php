<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$title}} </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
  
  <script src="{{asset('/kckfinder/ckfinder.js')}}"></script>
 
  <style>
        input[type=text] {
                          width: 100%;
                          padding: 12px 20px;
                          margin: 8px 0;
                          box-sizing: border-box;
                          }

     table, th, td  {
               padding: 15px;
                text-align: left;
                border: 1px solid #ddd;

              }
       table{
         width: 100%;

       } 
   
    a.btn.btn-primary.dropdown-toggle {
        display: block;
        width: 100%;
        padding: 8px;
        margin-top:10px; 
        }
    
    ul.dropdown-menu.nav-pills.nav-stacked {
        width: 100%;
        height: auto;
        padding: 10px;
      }
     
  </style>
    @yield('css')
</head>
<body>
<?php
  $menus = config('menu');
  $user = Auth::guard('khachhang')->user();
  //dd($menus);
?>

<div class="container-fluid text-center">
  <div class="row">
  
    <div class="col-sm-2" style="background: #f4f4f4; height:800px;">
      <ul style="display: block;">
        <li ><a href="{{route('cus_Login')}}"></i> Đăng nhập</a></li>
        <li><a href=""> Đăng ký</a></li>
        <li><a href="{{route('cus_logout')}}"></i>logout</a></li>

      </ul>
   
    @if(Auth::guard('khachhang')->check())
      <h4 style="padding: 10px; "><span></span>Chào mừng bạn dến trang admin</h4>
     <p>{{Auth::guard('khachhang')->user()->name}}</p>
        @foreach($menus as $key=>$value)
         @if($user->can($value['route']))

          <div class="dropdown">
            <a href="{{route($value['route'])}}" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{$value['name']}}
            <span class="caret"></span></a>

            <ul class="dropdown-menu nav-pills nav-stacked">
              @foreach($value['items'] as $item)
              @if($user->can($item['route']))
              <li><a href="{{route($item['route'])}}">{{$item['name']}}</a></li>
              @endif
              @endforeach
              
            </ul>
          </div>
          @endif
        @endforeach

        
@endif
    </div>
  
    <!-- noi dung -->
    <div class="col-sm-10">
      <div class="container">
         
          <div class="row">
            @yield('seach')
          </div>
         
          <div class="row">
             @yield('main')
          </div>
     
      </div>
        
    </div>
    

  </div>

  <!--footer -->
  <div class="row" style="margin-top:150px;">
    <div class="col-sm-12" style="background: #c4c4c4;"><h2>Footer</h2></div>   
  </div>
  
</div>
  @yield('js')
</body>
</html>
