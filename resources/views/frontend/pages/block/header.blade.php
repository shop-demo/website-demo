
<div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
               <li><a href="{{route('home.index')}}" class="active">Home</a></li>
             
           @php
    					$data=menu_Dequy($dataTheloai,$id_cha=0);
    					echo $data ;
					
				  @endphp
             
                <li><a href="contact-us.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
              <form action="" method="get" class="form_seach">
                <input type="hidden" value="{{route('home_seach')}}" name="route_seach" class="route_seach" />
                <div class="form-group"> <!--search_box pull-right-->
                  <input type="text" placeholder="Search" value="" name="seach" class="form-control 
                  input_seach" />
                    <div class="form-group seach_data">
                      <ul class="seach">
                     
                      </ul>
                    </span>
                  
                </div>

                
               
              </form>
          </div>
        </div>
      </div>
@section('css')
  <style type="text/css">
  .seach{
    display: block;
    width: 100%;
    height: auto;
    padding: 10px;
    background: #f4f4f4;
  }
  
  .link_seach a{
    font-family: roboto;
    font-size: 14px;
    color: #333;
  }
  .media-object{
    width: 20%;
    height: auto;
  }

    
  
  </style>
  
 
@endsection