<?php $get_pro_tour=\DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select('pro.*')
        ->groupBy('tour.province_id')
        ->where(['tour.status'=>1,'pro.province_status'=>1,'tour.country_id'=>122,'tweb.web_id'=>config('app.web')])
        ->inRandomOrder()
        ->limit(5)
        ->orderBy('pro.province_order', 'DESC')
        ->get(); ?>

<header id="header">  
    <div class="container-fluid">      
     <div id="" class="pull-left imgtop">
        <a href="/" class="scrollto"> <img src="{{url('/')}}/img/takemetoburma.png" style=" height: 60px;" alt="imglogo"></a>     
      </div>
  
   <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="home"><a  href="/">Home</a></li>          
            <li class="menu-has-children"><a href="#">DESTINATIONS</a>
              <ul>
                @foreach($get_pro_tour as $pro)
                  <li><a href="{{route('getDest')}}?location={{$pro->slug}}">{{$pro->province_name}}</a></li>
                @endforeach
                <li><a href="{{route('getDest')}}"><small class="btn btn-primary btn-sm btn-block">View More</small></a></li>
              </ul>
            </li>
            <li><a href="{{route('getpackage')}}">Our Package</a></li>           
            <li><a href="{{route('getContact')}}">Contact Us</a> </li>  
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
<div id="logo" class="pull-left" style="position: absolute; width: 100%;">
    <h1>
      <a href="{{url('/')}}" title="{{config('app.title')}}">
        <img class="mylogo" src="{{url('/')}}/img/demo-logotake.png" alt="img" >
      </a>
    </h1>
</div>


