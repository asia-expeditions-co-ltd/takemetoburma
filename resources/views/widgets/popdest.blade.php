<?php
use App\component\Content; ?>
<div class="section-title welcome-section widget-title">
    <h2><b>Our Popurlar Place</b></h2>
</div>

@foreach(\App\Province::getdes_pro() as $con)
<div class="col-sm-4 col-xs-12 golf-club wow fadeInUp animated" data-wow-delay="1s" style="visibility: visible; animation-name: fadeInUp;" >
    <div class="row"  >
      <div class="form-group item-tour" style="margin:8px; position: relative;">
        <span></span>
        <a href="{{route('getDest')}}?location={{$con->slug}}">
          <div class="caption" >
            <h4 ><b>{{$con->province_name}}</b></h4>
            </div>
          <img src="{{Content::urlImage($con->province_photo)}}" style="width: 100%; height: 100%; z-index: -2;" >
        </a>
      </div>
    </div>
</div>

@endforeach


