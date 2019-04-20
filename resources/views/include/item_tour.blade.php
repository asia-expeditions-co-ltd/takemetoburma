<?php 
use App\component\Content;?>
<div class="box-tour">
	<figure class="item-tour">
		<a href="{{route('getDest')}}?location={{{ $tour->province->slug or ''}}}"><span class="location-text">{{{ $tour->province->province_name or (isset($prov->province_name) ? $prov->province_name : '' )  }}}</span></a>
        <a href="{{route('tourDetails', ['url'=>$tour->slug])}}">
            <img style="width: 100%;" src="{{Content::urlImage($tour->photo)}}">
        </a> 	
    </figure>            
    <div class="col-md-12">
        <h2 style="font-size:14px; text-align: center; color: #777;">{{$tour->title}}</h2>
        <div class="row" style="margin-bottom: 28px;">
            <div class="col-sm-6 col-xs-6">
                <p style="color: #ffa821;font-weight: bold;">
                	<span style="font-size: 21px;">{{$tour->tour_price}}</span><span style="font-size:12px;" class="ng-binding"> USD</span>
                </p>
            </div>                            
            <div class="col-sm-6">
            	<a href="{{route('tourDetails', ['url'=> $tour->slug])}}" class="btn btn-sm add2cart">View Details</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>