
@extends('frontend.client')
 
@section('main')
@include('frontend.pages.block.header')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				@if($cartShopping->total_quantity>0)
				<h2 class="heading">Giỏ hàng của bạn có:{{$cartShopping->total_quantity}} sản phẩm. Mời bạn tiếp tục đặt hàng </h2>
				@else
					<h2 class="heading">Giỏ hàng của bạn có:{{$cartShopping->total_quantity}} sản phẩm. Bạn vào <a href="">đây</a> để tiếp tục mua hàng</h2>
				@endif
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-8 ">
						
							<div class="form-two">
							<h3>Thông tin Đặt hàng</h3>
								<form action="{{route('submitCheckout')}}" method="POST" > 
									@csrf
									<input type="text" placeholder="name" name="name" value="{{Auth::guard('cus')->user()->name}}"/>
									<input type="email" placeholder="email" name="email" value="{{old('email')}}"/>
									@error('email')
						  			<span>{{$message}}</span>
						  			@enderror
									<input type="text" placeholder="Phone *" name="phone" value="{{old('phone')}}"/>
									@error('email')
						  			<span>{{'phone'}}</span>
						  			@enderror
									<input type="text" placeholder="address" name="address" value="{{old('address')}}"/>
									@error('email')
						  			<span>{{'address'}}</span>
						  			@enderror
									<input type="submit" value="Đặt hàng" class="btn btn-info" style="color:#333;" />
								
								</form>         
							</div>
						</div>
						
						<div class="col-sm-4">
								<div class="order-message">
									<p>Shipping Order</p>
									<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
									<label><input type="checkbox"> Shipping to bill address</label>
								</div>	
						</div>	
						
					
					</div>
									
				</div>
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">STT</td>
							<td class="image">Item</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $n=1;?>
					@foreach($cartShopping->items as $key=>$cart)
						<tr>
							<td style="width:20px;height:auto;">{{$n}}</td>
							<td class="cart_product" style="width:30px;height:auto;">
								<a href=""><img src="{{url('access')}}/images/home/{{$cart['hình_minh_hoa']}}" alt="" style="width:70%; height:auto;" ></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart['name']}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{$cart['gia']}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart['quantity']}}" autocomplete="off" size="2">
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($cart['gia']*$cart['quantity'])}} vnđ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php $n++;?>
					@endforeach
					
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									
									<tr>
										<td>Tổng tiền</td>
										<td><span>{{number_format($cartShopping->total_price) }} vnđ</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->






@endsection
