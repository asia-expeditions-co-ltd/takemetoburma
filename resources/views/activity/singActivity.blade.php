@extends('layout.app')
@section('title', $Onew->title)
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
                    <div  class="item active item-slide" style="background-image: url(http://takemetoburma.com/photos/share/thumbs/1538360664-GES-006-shutterstock_543367150.jpg
                      ); background-position: 0px -80px;">                   
                    </div>  
                </div>    
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="container">
    <div class="section-welcome" id="top-program" style="padding: 12px;">
        <span class="">
            <a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right"></i> 
            {{$Onew->title}}
        </span>       
    </div>    
</div>
@include('include.message')

<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            <div class="col-md-9">
                <div class="bg-white wrap-image">
                    <div style="background-color:#00b7f1;">
                        <h2 class="title">{{$Onew->title}}</h2>
                    </div>                  
                    <div class="img">
                        <img src="{{Content::urlImage($Onew->photo)}}" class="img-responsive">
                    </div>
                    <div class="dateTime">
                        <i class="fa fa-calendar"></i> <span>{{date('d-M-Y H:i A', strtotime($Onew->created_at))}}</span>
                    </div>
                    <p>{!! $Onew->description !!}</p>
                     <?php 
                        $gallery = explode(',', rtrim($Onew->picture, ','));
                        ?>
                        @if($Onew->picture)
                            @foreach($gallery as $key => $val)
                            <p>
                                <img src="{{Content::urlImage($val, '/photos/share')}}" style="width: 100%;">
                            </p>
                            @endforeach
                        @endif
                    <hr>                    
                </div>                      
            </div>
            <div class="col-md-4">  
               
            </div>
        </div>
    </div>
</div>
@include('include.footer')
@endsection