@extends('layout.app')
@section('title')
Golf Travel Myanmar
@endsection
@section('content')
@widget('menu')
<div class="overflownone">
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
            <div id="myCarousel" class="slide carousel-fade" style="height: 350px;">
                <div class="carousel-inner" id="carousel-warpper" >
                    <div  class="item active item-slide" style="background-image: url(http://2f-design.fr/themes/tee-wp/wp-content/uploads/2014/03/3.jpg); background-position: 0px -80px;">                        
                    </div>  
                </div>    
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<form method="get">
    <div class="container">
        <div class="section-welcome">
            <div class="pull-left">
                &nbsp;<span class="fa fa-map-pin" style="color: green; font-size: 27px;"></span> &nbsp; JOIN WITH US TO PLAY GOLF TODAY 
            </div>
            @if(isset($active))
            <div class="pull-right">
                <select name="by" id="sort_by" class="form-control input-sm">
                    <option value="">sort By</option>
                    @foreach(\App\Country::where('country_status', 1)->orderBy('country_name', 'DES')->get() as $con)
                        <option value="{{$con->country_slug}}" {{ $active == $con->id ? 'selected':''}}>{{$con->country_name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="clearfix"></div>
        </div>     
    </div>
    <!-- our activities  -->
    <div class="row title-section">
        <br>
        <div class="container">
            <div class="row">         
                <div class="col-md-12 col-xs-6">
                    <div class="golf-title"><strong><i class="glyphicon glyphicon-tree-deciduous"></i> Golf Courses</strong></div>
                    <div class="row">
                        @foreach($golfpackage as $golf)
                            <div class="col-md-4 " style="overflow: hidden; margin-bottom: 28px;">
                                <a href="/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug}}"> 
                                    <img src="https://images.pexels.com/photos/167676/pexels-photo-167676.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt=" " class="img-responsive">
                                </a>
                                <span class="sticker">{{{ $golf->province->province_name or 'Local'}}}</span>
                            </div>
                        @endforeach
                    </div>     
                </div>                
            </div>


             <div class="row">         
                <div class="col-md-12 col-xs-6">
                    <div class="golf-title"><strong><i class="glyphicon glyphicon-tree-deciduous"></i> Golf Packages</strong></div>
                    <div class="row">
                        @foreach($golfpackage as $golf)
                            <div class="col-md-4 " style="overflow: hidden; margin-bottom: 28px;">
                                <a href="/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug}}"> 
                                    <img src="https://images.pexels.com/photos/167676/pexels-photo-167676.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt=" " class="img-responsive">
                                </a>
                                <span class="sticker">{{{ $golf->province->province_name or 'Local'}}}</span>
                            </div>
                        @endforeach
                    </div>     
                </div>                
            </div>
        </div>
    </div>
</form>
<div class="3w-margin-top"></div>
@include('include.footer')

@endsection