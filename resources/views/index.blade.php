@extends('layout.app')
@section('title', '')
@section('keywords', 'Take Ma To Burmar, Golf Burma, golf Myanmar, Golf in Myanmar, Cycling Myanmar, golf Bagan, Irrawaddy dolphin')
@section('description', 'Myanmar(Burma) is the good destinations to visit and have lot of golf courses')
<?php use App\component\Content; ?>
@section('content')

@include('widgets.menudemo')

@include('widgets.slide_show')

<div class="container">
	<div class="col-md-12">
		<div class="section-welcome">
			&nbsp;<span class="fa fa-map-pin" style="color: green; font-size: 27px;"></span> &nbsp; JOIN WITH US TO GET NEW UPDATE  
		</div>	
    </div>
</div>
<div class="title-section" style="background-position: 0px -80px;">
	<div class="container">
		<div class="col-md-12">
			@include('widgets.tour_package')
		</div>
	</div>
	<div class="container">
		@if($webs->count() >5)
		<div align="center" style="padding: 10px;"><a  class="btn btn-rose" href="{{route('getpackage')}}">See More</a></div>
		@endif		
	</div>			
	</div>
</div>
<div class="container">
	@include('widgets.popdest')
</div>
<!-- our activities  -->
<div class="">
	<div class="container">
		<div class="col-md-12">
			@include('widgets.gallery_des')			
		</div>
	</div>
</div>
@include('include.footer')
@endsection