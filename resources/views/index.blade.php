@extends('layout.app')

@section('title', '')

@section('keywords', 'Cycling Burma, Golf Burma')

@section('description', 'Myanmar(Burma) is the good destinations to visit and have lot of golf courses')



<?php

use App\component\Content;

?>

@section('content')
@widget('menu')


@include('widgets.slide_show')

<div class="container">

	<div class="col-md-12">

		<div class="section-welcome">

			&nbsp;<span class="fa fa-map-pin" style="color: green; font-size: 27px;"></span> &nbsp; JOIN WITH US TO GET NEW UPDATE  

		</div>	

    </div>

</div>

<div class="container">

	@include('widgets.popdest')

</div>

<div style="margin-top: 50px;"></div>

<div class="title-section" style="background-image: url(http://2f-design.fr/themes/tee-wp/wp-content/uploads/2014/03/3.jpg); background-position: 0px -80px;">

	<div class="container">

		<div class="col-mg-12">

			@include('widgets.tour_package')

		</div>

	</div>

</div>

<!-- our activities  -->

<div class="">

	<div class="container">

		<div class="col-mg-12">

			@widget('our_activities')			

		</div>

	</div>

</div>
@include('include.footer')
@endsection