<div class="container-fluid hidden-xs" id="menu-header-top">
    <ul class="nav navbar-nav">
      	<li><a href="javascript:void(0)"><i class="fa fa-phone"></i>&nbsp;+95 (9) 401 533 484</a></li>
      	<li><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i>&nbsp; info@takemetoburma.com </a></li>
    </ul>
</div>
<div id="main-menu"  >
	<nav class="navbar navbar" id="menu-nav">

		<div id="logo">
			<a href="{{url('/')}}" title="{{config('app.title')}}">
			  	<img class="mylogo" src="{{url('/')}}/img/demo-logotake.png" >
		  	</a>
	  	</div >
	  	<center>
			<div class="containe-fluid">		
			    <div class="navbar-header" >	
					<div class="icon-bar">
					 <button class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		  	<i class="glyphicon glyphicon-menu-hamburger"></i></button>
					</div>
				</div>
			</div>
		</center>

	    <div class="collapse navbar-collapse" id="myNavbar">
		    <ul class="nav navbar-nav" id="nav-ul" >
		    	<li><a href="{{url('/')}}">Home</a></li>
		        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#services">Where to Go</a>
		        	<ul class="dropdown-menu" id="sub-menu">
		        		<span id="triangle-point"></span>
			        	@foreach(\App\Province::where(['province_status'=>1, 'country_id'=> 122])->take(5)->orderBy('province_order', 'DESC')->get() as $pro)
			        		<li><a href="{{route('getDest')}}?location={{$pro->slug}}">{{$pro->province_name}}</a></li>
			        	@endforeach
			        	<li><a href="{{route('getDest')}}"><small class="btn btn-primary btn-sm btn-block">View More <i class="fa fa-angle-double-right"></i></small></a></li>
			        </ul>
		        </li>
		        <li><a href="{{route('getActivity')}}">Our Activities</a></li>		       
		        <li><a href="{{route('getContact')}}">Contact Us</a> </li>		        
		    </ul>		   
	    </div>
	</nav>
</div>
