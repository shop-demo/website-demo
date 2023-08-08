@extends('admin.masterLayout')
@section('css')
<style>
    

  </style>
@endsection
@section('main')
<div>
	<h2>Danh sách comment</h2>
      
      <table class="table table-bordered comm">
      <thead class="comm">
        <tr>
          <th>id</th>
          <th>comment</th>
          <th>san_pham_id</th>
          <th>khach_hang_id</th>
          <th>status</th>
          <th>replay</th>
          <th>created_at</th>
          <th>updated_at</th>

        </tr>
      </thead>
      <tbody>
        @foreach($listComm as $key=>$listComm)
       
          <tr>
            <td>{{$listComm->id}}</td>
            <td>{{$listComm->comment}}

                <ul>
                @foreach($listComm->replay as $key=>$rep)
                 
                  <li>{{$rep->comment}}</li>
               
                @endforeach 
                </ul>
            
             <form rows="8" action="{{route('commentAjax')}}" method="POST" class="form_reply_comm_{{$listComm->id}} formReply" style="margin-top: 10px; display: none;" >
				@csrf
				<textarea cols="50" rows="3" name="commentRep" class="commRep_{{$listComm->id}} comm_rep" value=""></textarea>
				<input type="hidden"  name="san_pham_id" id="chitietSp_id"  value="{{$listComm->san_pham_id}}" />
				<input type="hidden"  name="khachhang_id" id="user_id"  value="{{$listComm->khachhang_id}}" />
				<input type="hidden" value="{{route('commentAjax')}}" name="routePost" id="routeRep"/>
				
			</form>
			<h2 id="rep"></h2>
     		@if($listComm->status == 1)
            <a class="btn btn-primary btn-xs btn_reply_comm" href="" data-id="{{$listComm->id}}" style="display: block; width: 70px;height:auto; margin-top:10px;">Trả lời</a>
			@endif

            </td>
           
            <td>{{$listComm->san_pham_id}}</td>
            <td>{{$listComm->khachhang_id}}</td>
            <td>{{$listComm->status}}</td>
            <td>{{$listComm->reply_id}}</td>
            <td>{{$listComm->created_at}}</td>
            <td>{{$listComm->updated_at}}</td>

            <td>
               <form action="{{route('active_comment')}}" method="post">
               @csrf
            {!!$listComm->status == 0 ? '<input type="button" class="btn btn-danger btn-xs btn_duyet" data-id="'.$listComm->id.'" data-comment_status="1" data-san_pham_id="'.$listComm->san_pham_id.'" value="chưa kích hoặt" />':'<input type="button" class="btn btn-success btn-xs btn_duyet" data-id ="'.$listComm->id.'" data-comment_status="0" data-san_pham_id="'.$listComm->san_pham_id.'" value="kích hoặt" />' !!}
             </form>
            </td>
           
            <td><button type="button" attr="{{$listComm->id}}" class="btn btn-info btn-xs btn-edit">edit</button></td>
            <td>
              <form method="POST" action="" id="formDelete">
               @csrf @method('delete')
              <a href=""  class="btn btn-sm btn-danger delete" >delete</a>
              </td>
             </form> 
           </tr>
         
        @endforeach
      </tbody>
    </table>
      
    <div class="clearfix"> <!--phan trang -->
        {{-- $listUser->links()--}}
    </div>
     
 </div>

@endsection
@section('js')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  	<script type="text/javascript" language="javascript"></script>
	<script src="{{url('access')}}/jquery/replay.js"></script>
  <script src="{{url('access')}}/jquery/active_comment.js"></script>
    
		
	
@endsection
