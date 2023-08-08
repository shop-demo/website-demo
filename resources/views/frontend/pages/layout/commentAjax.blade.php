

<ul class="media-list">
	@foreach($getComm as $key=>$value)	
	<li class="media">
		
		<a class="pull-left" href="#">
			<img class="media-object" src="images/blog/man-two.jpg" alt="">
		</a>
		<div class="media-body">
			<ul class="sinlge-post-meta">
				<li><i class="fa fa-user"></i>{{$value->use->name}}</li>
				<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
				<li><i class="fa fa-calendar"></i> {{$value->created_at}}</li>
			</ul>
			<p>{{$value->comment}}</p>
			<form action="{{route('commentAjax')}}" method="POST" class="form_reply_comm_{{$value->id}} formReply" style="display:none;">
				@csrf
				<textarea name="commentRep" class="commRep_{{$value->id}} comm_rep" value=""></textarea>
				<input type="hidden"  name="san_pham_id" id="chitietSp_id"  value="{{$chiTietSp->id}}" />
				<input type="hidden"  name="khachhang_id" id="user_id"  value="{{$value->use->id}}" />
				<input type="hidden" value="{{route('commentAjax')}}" name="routePost" id="routeRep"/>
				
			</form>
			@if(auth()->guard('cus')->check())
			<a class="btn btn-primary btn_reply_comm" href="" data-id="{{$value->id}}"><i class="fa fa-reply" ></i>Trả lời</a>
			@endif
		</div>
	</li>
	@foreach($value->replay as $key=>$rep)
	<li class="media second-media">
		<a class="pull-left" href="#">
			<img class="media-object" src="images/blog/man-three.jpg" alt="">
		</a>
		<div class="media-body">
			<ul class="sinlge-post-meta">
				<li><i class="fa fa-user"></i>{{$rep->use->name}}</li>
				<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
				<li><i class="fa fa-calendar"></i>{{$rep->created_at}}</li>
			</ul>
			<p>{{$rep->comment}}</p>
			<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
		</div>
	</li>
	@endforeach
	@endforeach
</ul>					
