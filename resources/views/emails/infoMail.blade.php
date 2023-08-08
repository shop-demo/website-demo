
		<h1 style="margin: 10px auto; text-align: center; font-weight:900; font-family: roboto;">Thông tin đặt hàng của bạn {{$name}} </h1>
		<h1 style="font-family: roboto; padding:15px; margin-top:50px;">Chúc mừng bạn đã đặt hàng thành công </h1>

		<div>
				 
							<h2>Tên: {{$donhang->name}}</h3>
							<h2>Email: {{$donhang->email}}</h3>
							<h2>Phone: {{$donhang->phone}}</h3>
							<h2>Địa chỉ: {{$donhang->address}}</h3>
							<h2>Ngày đặt:{{$donhang->created_at}}</h3>		
				
		</div>

		<div style="width:100%;height:auto">
				<table style="width:100%; height:auto; border-collapse: collapse; border: 1px solid;">
					<thead>
						<tr style="border: 1px solid; padding: 15px; background-color:#ddd;;">
							<td style="border: 1px solid; padding: 8px;">STT</td>
							<td style="border: 1px solid; padding: 8px;">Item</td>
							<td style="border: 1px solid; padding: 8px;">Tên sản phẩm</td>
							<td style="border: 1px solid; padding: 8px;">Giá</td>
							<td style="border: 1px solid; padding: 8px;">Số lượng</td>
							<td style="border: 1px solid; padding: 8px;">Thành tiền</td>
							
						</tr>
					</thead>
					<tbody>
					<?php $n=1;?>
					@foreach($shopping as $key=>$cart)
						<tr style="border: 1px solid; padding: 8px;">
							<td style="border: 1px solid; padding: 8px;">{{$n}}</td>
							<td style="border: 1px solid; padding: 8px;">
								<a href=""><img src="{{url('access')}}/images/home/{{$cart['hình_minh_hoa']}}" alt="" style="width:70%; height:auto;" ></a>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{$cart['name']}}</h4>
								<p>Web ID: 1089772</p>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{number_format($cart['gia'])}}vnđ</h4>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{$cart['quantity']}}</h4>
							</td>
							<td style="border: 1px solid; padding: 8px;">
								<h4>{{number_format($cart['gia']*$cart['quantity'])}} vnđ</h4>
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
										<td><h1>{{number_format($total_price) }} vnđ</h1></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div><a style="display: inline-block;width:200px; height:35px; padding: 10px 25px; background: green;color:#fff; font-weight:bold; text-align: center;margin-top:20px; font-family: roboto; font-size:16px;" href="{{route('admin.accept_order',
			[
			'id'=>$donhang->id,
			'token_order'=>$donhang->token,
			])}}">Xác nhận đơn hàng</a></div>




		
				
			