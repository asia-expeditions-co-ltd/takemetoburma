@extends('layout.app')
@section('title', 'Our Activities')
@section('keywords', 'Cycling Burma, Golf Burma')
@section('description', 'Myanmar(Burma) is the good destinations to visit and have lot of golf courses')

@section('content')
@widget('menu')
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
            &nbsp;<span class="fa fa-map-o" style="color: green; font-size: 27px;"></span> &nbsp; Our Activities, Today : {{date('d-M-Y')}}
        </div>
        <div class="clearfix"></div>        
    </div>
    <div class="clearfix"></div>        
</div>
<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            <div class="col-md-9">
                @foreach($ourNews as $news)
                <div class="crane-listing col-md-12 col-xs-6 bg-white">
                    <div class="row">
                        <div class="col-md-6" style="overflow: hidden;">
                            <div class="row">
                                <a href="{{route('singleActivity', ['slug' => $news->slug])}}"><img src="{{Content::urlImage($news->photo)}}" style="width: 100%;">
                                </a>
                                <!-- <span class="sticker">{{{ $news->province->province_name or '' }}}</span> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="title"><a href="{{route('singleActivity', ['slug' => $news->slug])}}">{{$news->title}}</a></h2>
                            <h6><i class="fa fa-user-o"></i> Published Date: {{date('d-M-Y H:i: A', strtotime($news->created_at))}}</h6>
                            <p>{!! str_limit(strip_tags($news->description),170) !!}</p>
                            <a href="{{route('singleActivity', ['slug' => $news->slug])}}" class="btn btn-block btn-primary btn-flat">View Details</a>

                        </div>                        
                    </div>   
                    <div class="clearfix"></div>
                </div>
                @endforeach
                {{$ourNews->links()}}         
            </div>
            <!-- left sidebar -->
            <div class="col-md-3">
                
            </div>
            <!-- end left sidebar     -->
        </div>
    </div>
</div>
<div class="3w-margin-top"></div>
@include('include.footer')
@endsection