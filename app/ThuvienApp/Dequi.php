<?php
	use App\ThuvienApp;
	use App\Models\admin\groupModel;
	use App\Models\admin\theLoaiModel;
	use App\Models\admin\sanphamModel;
	use App\Models\commentAjax_model;
	use App\Models\admin\khachhangModel;

		//comment
			function comm_dequy($data,$id_cha=0){
				$output ='<ul class="media-list">';
				foreach($data as $key=>$value){
					if($value->reply_id == 0){
						$output .='<li class="media">
								
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-two.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>'.$value->use->name.'</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> {{$value->created_at}}</li>
									</ul>
									<p>'.$value->comment.'</p>
									<form action="'.route('commentAjax').'" method="POST" class="form_reply_comm_'.$value->id.' formReply" style="display:none;">
										@csrf
										<textarea name="commentRep" class="commRep_{{$value->id}} comm_rep" value=""></textarea>
										<input type="hidden"  name="san_pham_id" id="chitietSp_id"  value="{{$value->san_pham_id}}" />
						                 <input type="hidden"  name="khachhang_id" id="user_id"  value="{{$value->use->id}}" />
						                 <input type="hidden" value="'.route('commentAjax').'" name="routePost" id="routeRep"/>
																
									</form>';
									if(auth()->guard('khachhang')->check()){
										$output .='<a class="btn btn-primary btn_reply_comm" href="" data-id="'.$value->id.'"><i class="fa fa-reply" ></i>Trả lời</a>
									
									</div>';
									}
									
							$output .='</li >';
							//replay
							if(rep($data,$value->id)){
								$output .='<li class="media second-media">';
								$output .= comm_dequy($data,$value->id);
								$output .='</li>';
							}
					}
				
				}
				

				$output .='</ul>';
				return $output;
			
			}
		

			function rep($data,$id){
			foreach($data as $k=>$value){
				if($value->id_cha == $id){
					return true;
				}
			}
			return false;

		}



		//\cloze commmet




		//menu-----------------------	
		 function menu_Dequy($data,$id_cha=0){
		 	
		 	$html='';
		 	
		 	foreach($data as $key=>$item){
		 		if($item->id_cha == $id_cha){
		 			$html .= '<li><a href="'.route('view',['slug'=>$item['code']]).'" class="">'.$item->name.'</a>';
		 			if(children($data,$item->id)){
		 				$html.='<ul role="menu" class="sub-menu">';
		 				$html .= menu_Dequy($data,$item->id);
		 				$html.='</ul>';
		 			}

		 			$html .= '</li>';

		 		}
		 	}
			return $html;
		}

		
		function children($data,$id){
			foreach($data as $k=>$value){
				if($value->id_cha == $id){
					return true;
				}
			}
			return false;

		}


	//theloai
		
	function getTheloai_id_cha($data,$id_cha=0,$level=0){
		
		$ketqua =[];
		foreach($data as $key=>$value){
			if($value->id_cha == $id_cha){
				$value->level = $level;
				$ketqua[] = $value;
				unset($data[$key]);
			$data_con = getTheloai_id_cha($data,$value->id,$level+1);
			$ketqua = array_merge($ketqua,$data_con) ;
			}
		}
		return $ketqua;
		
	}

	//hàm convert không dấu

			if (!function_exists('Tieu_de')) {
				  function Tieu_de($str) {
				      $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
				      $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
				      $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
				      $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
				      $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
				      $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
				      $str = preg_replace("/(đ)/", "d", $str);
				      $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
				      $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
				      $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
				      $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
				      $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
				      $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
				      $str = preg_replace("/(Đ)/", "D", $str);
				      $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
				      return $str;
	 			 }
		


		}
	
		 





	

	
?>
