<?php 
	use App\component\Content;
	$getNews = \App\Web::find(config('app.web'))->events()->where(['status'=>1])->orderBy('id', 'DESC')->get();
?>
<div class="col-md-6">
	<div id="carousel-example-news" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators item-point">
			@foreach($getNews as $key => $icon)
				<li data-target="#carousel-example-news" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active':''}}"></li>
			@endforeach			
		</ol>
		<div class="carousel-inner">
			@foreach($getNews as $key => $new)
			<div class="item {{$key == 0 ? 'active':''}}">
				<img style="width: 100%;" src="{{Content::urlImage($new->photo)}}" alt="{{$new->tittle}}">
				<div class="carousel-caption">
					<a href="{{route('singleActivity', ['slug' => $new->slug])}}"><h5>{{$new->title}}</h5></a>
				</div>
			</div>			
			@endforeach
		</div>	
		<a class="left carousel-control slideCarousel" href="#carousel-example-news" data-slide="prev"></a>
		<a class="right carousel-control slideCarousel" href="#carousel-example-news" data-slide="next"></a>		
	</div>
</div>
<div class="col-md-6">
	<h1><strong>Our Activities</strong></h1>
	<h6 style="color: #7e9d10!important;">Unique Construction</h6>
	<div><p>EXTENSIVE UPGRADES AND THOROUGH MAINTENANCE HAVE MADE OUR GOLF FIELDS A MODERN COMFORTABLE PLACE FOR TRAININGS</p></div><br>
	<ul class="list-unstyled liststyle-li"> 
		<li><i class="fa fa-check-circle-o"></i> No daily water usage</li>
		<li><i class="fa fa-check-circle-o"></i> Not affected by freezing weather</li>
		<li><i class="fa fa-check-circle-o"></i> 3 Distinct golf fields surface speed-of-play options</li>
		<li><i class="fa fa-check-circle-o"></i> Adjustable golf field speeds that are great for serves</li>
	</ul>
</div>	
