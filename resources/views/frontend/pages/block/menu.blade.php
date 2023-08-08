@section('menu')
  @parent
   <div class="col-sm-3">
        <!-- menu-right-->
          <div class="left-sidebar">
            <h2>Danh mục sản phẩm</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              
              @foreach($data_menu as $key=>$rightMenu)
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$rightMenu['id']}}">
                      
                      {{$rightMenu['name']}}
                     
                     <!--Kiểm tra có tồn tại menu con không -->
                      @if(!empty($rightMenu['children']))
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      @endif
                    </a>
                  </h4>
                </div>
                <div id="sportswear{{$rightMenu['id']}}" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                    @foreach($rightMenu['children'] as $key=>$menu_children)
                      <li><a href="#">{!!$menu_children['name']!!}</a></li>
                    @endforeach
                   
                    </ul>
                  </div>
                </div>
              </div>
              @endforeach
             
              
            </div><!--/category-products-->
          </div><!-- cloze menu -->
      </div>

@endsection
   