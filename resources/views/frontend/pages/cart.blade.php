
@extends('frontend.client')
 
@section('main')
@include('frontend.pages.block.header')
@php
 /*
	 echo "<pre>";
    print_r($cartShopping->items);
    echo "</pre>";
 */
@endphp
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td >stt</td>
							<td class="image">Item</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng </td>
							<td class="total">Thành tiền </td>
							
						</tr>
					</thead>
					<tbody>
					<?php $n=1;?>
					@if($cartShopping->items)
						@foreach($cartShopping->items as $key=>$cart)
						<tr>
							<td style="width:30px;height:auto;">{{$n}}</td>
							
							<td class="cart_product" style="width: 100px;height:auto;">
								<a href="" ><img src="{{url('access')}}/images/home/{{$cart['hình_minh_hoa']}}" alt="" style="width:50%;height:auto;"></a>
							</td>
							
							<td class="cart_description"style="width:150px;height:auto;">
								<h4><a href="">{{$cart['name']}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							
							<td class="cart_price">
								<p>{{number_format($cart['gia'])}}vnđ</p>
							</td>
							
							<td class="cart_quantity">
							
								<form action="{{route('cart_update',['id'=>$cart['id']])}}" method="GET">
									<div class="cart_quantity_button">
										
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart['quantity']}}" autocomplete="off" size="2">
										<input class="cart_quantity_input btn-primary" type="submit" name="btn_submit" value="update" size="2" >
										
									</div>
								</form>
							</td>
							
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($cart['gia']*$cart['quantity'])}} vnđ</p>
							</td>
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('cart_remove',['id'=>$cart['id']])}}"><i class="fa fa-times"></i></a>
							</td>
						
						</tr>
						<?php $n++;?>
						@endforeach

					@endif	
					<tr>
						<td class="cart_description"><p>Tổng tiền: {{ $cartShopping->total_price }} vnđ</p></td>
						<td class="cart_description"><p>Giỏ hàng của bạn có:{{$cartShopping->total_quantity}} sản phẩm.</p></td>
					</tr>
					<tr>
						<td><a href="{{route('clear_cart')}}" class="btn btn-danger">Delete</a></td>
						<td><a href="{{route('home.index')}}" class="btn btn-info">Mua thêm</a></td>	
						<td><a href="{{route('checkout_index')}}" class="btn btn-info">Đặt hàng</a></td>		
					
					</tr>

							
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	@endsection