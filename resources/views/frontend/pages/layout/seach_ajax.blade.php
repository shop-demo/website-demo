

@foreach($data_seach as $key=>$value)

                           <li class="link_seach"> 
      
                                <img src="{{url('upload')}}/sanpham/{{$value->hinh_minh_hoa}}" class="media-object" 
                                style="display:inline-block; width:20%;height:auto;">
                                
                                <span><a href="{{--route('ChiTietSp'),['category'=>$dm->code,'slug'=>Str::slug($value->name)]--}}">{{$value->name}}</a></span>
                                
                                 <p>Giới thiệu ngắn về sản phẩm</p>
                            
                          </li>
                          <hr>
                          
                           
@endforeach