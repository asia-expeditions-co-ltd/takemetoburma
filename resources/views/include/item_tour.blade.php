<?php 
use App\component\Content;?>
<div class="box-tour">
	<figure class="item-tour">
		<a href="{{route('getDest')}}?location={{{ $tour->province->slug or ''}}}"><span class="location-text">{{{ $tour->province->province_name or (isset($prov->province_name) ? $prov->province_name : '' )  }}}</span></a>
        <a href="{{route('tourDetails', ['url'=>$tour->slug])}}">
            <img style="width: 100%;" src="{{Content::urlImage($tour->photo)}}">
        </a> 	
    </figure>            
    <div class="col-sm-12">
         <h2 style="font-size:14px; text-align: center; color: #777; height: 40px;">{!! str_limit(strip_tags($tour->title),95)!!} </h2>
        <div class="row" style="margin-bottom: 28px;">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <p style="color: #ffa821;font-weight: bold;">
                	<span style="font-size: 21px;">{!!isset($tour->tour_price) ? $tour->tour_price.'<span style="font-size:12px;" class="ng-binding"> USD</span>': ''!!}</span>
                </p>
            </div>                            
            <div class="col-lg-6 col-md-12 col-sm-12">
            	<a href="{{route('tourDetails', ['url'=> $tour->slug])}}" class="btn btn-sm add2cart">View Details</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>