	<!-- add like faceook -->
	<?php use App\component\Content; ?>
	 <meta property="og:url"           content="{{route('tourDetails', ['url'=> $tour->slug])}}" />
  <!-- <meta property="og:type"          content="http://takemetoburma.com" /> -->
  <meta property="og:title"         content="Destinations {{$tour->tour_price}}" />
  <meta property="og:description"   content="{!! $tour->title !!}" />
 <meta property="og:image"         content="{{Content::urlImage($tour->photo, '/photos/share/')}}" />