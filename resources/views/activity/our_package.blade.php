@extends('layout.app')
@section('title', 'Our Tour Package')
@section('keywords', 'Our Packege, Golf Burma, Golf in mynamar, Cycling in myanmar ')
@section('description', 'Myanmar(Burma) is the good destinations to visit and have lot of golf courses')

@section('content')
<!-- @widget('menu') -->
@include('widgets.menudemo')

<?php 
use App\component\Content;
?>
 <div class="overflownone">
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
            <div id="myCarousel" class="slide carousel-fade" style="height: 350px;">
                <div class="carousel-inner" id="carousel-warpper" >
                    <div  class="item active item-slide" style="background-image: url(/photos/share/play.jpg); background-position: 0px -80px;">                        
                    </div>  
                </div>    
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="container">
    <div class="section-welcome">
        <div class="pull-left">
            &nbsp;<span class="fa fa-map-o" style="color: green; font-size: 27px;"></span> &nbsp; Our Tour Package, Today : {{date('d-M-Y')}}
        </div>
        <div class="clearfix"></div>        
    </div>
    <div class="clearfix"></div>        
</div>
<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            <div class="col-md-12">
               


            		@if($package)
	<div class="title text-center">
		<header class="section-header">
          <h3>Tour Packages</h3>
        </header>
    </div>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:22px;">
	    <div class="carousel-inner">
				
	    			@foreach($package as $tour)
						<div class="col-sm-4" style="margin-bottom: 10px;">
		                	@include('include.item_tour')   
		                </div>            	
	                @endforeach		            
		               
	    </div>
	    {{$package->links()}} 
	</div>
	<div class="clearfix"></div>
@endif

            </div>          
        </div>
    </div>
</div>
<div class="3w-margin-top"></div>
@include('include.footer')
@endsection