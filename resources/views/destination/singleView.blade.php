@extends('layout.app')
@include('include.facebook')
<?php use App\component\Content; ?>
@section('title', $tour->title)

@section('keywords', $tour->keyword != '' ? $tour->keyword : $tour->title )
@section('description', strip_tags($tour->tour_highlight))


<?php 
 
    if (isset($tour->photo)) {
        $image = Content::urlImage($tour->photo, '/photos/share/');
    }else {
        $image = 'img/noImage.jpg';
    }
?>

 <style type="text/css">
            .addcol{color: #002aff; }
            .addcol1:focus{color: red; border-color: red;}
          </style>

@section('content')
@widget('menu')
<div class="overflownone" >
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div id="myCarousel" class="slide carousel-fade" style="height: 400px;">
            <div class="carousel-inner" id="carousel-warpper" >

              
                <div class="item active item-slide">
                  <img src="/photos/share/golf_.jpg" style="width: 100%; height: 100%;">
                </div>  
            </div>    
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="container hidden-print">
    <div class="section-welcome" id="top-program" style="padding: 0px;">
        <span class="">
          
            <span class="fa fa-map-pin" style="color: #f2892d; font-size: 27px; padding: 13px 12px;"></span> {{{ $tour->country->country_name or ''}}} <i class="fa fa-angle-double-right"></i> {{{ $tour->province->province_name or ''}}} <i class="fa fa-angle-double-right"></i> {{$tour->title}}
        </span>
        <span class="pull-right single-price">{{$tour->tour_price}} <small style="font-size: 0.5em;"> USD</small></span>
    <div class="clearfix"></div>        
    </div>    
</div>
<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            @include('include.message')
            <div class="col-md-9">
                    <!-- add facebook -->
                  <!-- Load Facebook SDK for JavaScript -->
                 <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                  <!-- Your share button code -->
                   <div class="fb-share-button" 
                    data-href="{{route('tourDetails', ['url'=> $tour->slug])}}" 
                    data-layout="button_count" data-size="large">

                  </div>
                <!--   end add -->

                <!-- add twitter -->
                <script>window.twttr = (function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0],
                    t = window.twttr || {};
                  if (d.getElementById(id)) return t;
                  js = d.createElement(s);
                  js.id = id;
                  js.src = "https://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js, fjs);

                  t._e = [];
                  t.ready = function(f) {
                    t._e.push(f);
                  };

                  return t;
                }(document, "script", "twitter-wjs"));</script>


                <a class="twitter-share-button"
  href="{{route('tourDetails', ['url'=> $tour->slug])}}"

  data-size="large">
Tweet</a>

                <!-- end add twitter -->




                <div class="crane-listing bg-white">
                    @include('include.singSlide')
                </div> 
                 
              
                     
            </div>
            <div class="col-md-3">
                <div class="panel single-title">
                    <div class="row">
                        <div class="card-header bg-primary text-white text-uppercase" style="line-height: 35px;">  &nbsp;<i class="fa fa-calendar"></i> Traveling Date</div><br>
                    </div>
                    <form method="POST" action="{{route('reqtraveling')}}">
                        {{csrf_field()}}          
                               
                        <div class="col-md-12">
                            <div class="input-group form-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                <input type="date" name="date" class="form-control textbox_color" placeholder="Date Check Out" required="">
                            </div>
                            <div class="form-group">
                                <div class="row">                                                                   
                                    <div class="col-md-12">
                                        <label for="pax_number">Pax No.</label>
                                        <select class="form-control textbox_color" name="pax_number" required id="pax_number">
                                            <option value="">--select--</option>
                                            @for ($i = 1; $i < 30; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                               </div>                                
                            </div>
                            <input type="hidden" name="title" value="{{$tour->title}}">
                            <input type="hidden" name="url" value="{{route('tourDetails', ['url'=> $tour->slug])}}">
                            <input type="hidden" name="t_id" value="{{isset($tour->id)? $tour->id: ''}}">


                            <div class="form-group">
                                <input type="text" name="phone" class="form-control textbox_color" placeholder="Phone: +95 (1) 123 456 " required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control textbox_color" placeholder="Email" required="" id="eshow">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Type message" cols="7" rows="4"></textarea>
                            </div>

                                    <div class="form-group" id="notrobot" style="">

                                <input  type="text" id="num1" class="form-control textbox_color"   style="float: left; width: 20%; text-align: center;" disabled>

                                <label style="font-size: 25px;float: left; width: 10%;font-weight: 500;
                                text-align: center;">+</label>
                                <input  type="text" id="num2" class="form-control textbox_color"  style="float: left; width: 20%; text-align: center;" disabled >
                                <label style="font-size: 25px;float: left;width: 10%;font-weight: 500;
                                text-align: center;">=</label>

                                <input type="text" name="myResult" id="myResult" class="form-control textbox_color" placeholder="" required style="width: 40%;">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <center>
                                <button type="submit" id="btn" class="btn btn-block btn-color text-color">Request Traveling</button>
                            </center>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" style="text-transform: uppercase;">
            <li class="active"><a data-toggle="tab" href="#desc">Itinaries</a></li>            
            <li><a data-toggle="tab" href="#hightlight">Hightlight</a></li>
            <li><a data-toggle="tab" href="#service">Service Include/Exclude</a></li>
            <li><a data-toggle="tab" href="#Gmap">Map</a></li>
        </ul>

        <div class="tab-content">
            <div id="desc" class="tab-pane fade in active">
              <div class="bd-example">
                <div class="table-responsive-md ">

              
                {!! $tour->tour_desc !!}
               </div>
              </div>
           
            </div>
            <div id="hightlight" class="tab-pane fade">
             <div class="bd-example">
                <div class="table-responsive-md">

                {!! $tour->tour_highlight!!}
              
</div>
              </div>
            </div>
            <div id="service" class="tab-pane fade">
<div class="bd-example">
                <div class="table-responsive-md ">
                               
                         
                {!! $tour->tour_remark !!}
               
</div>
              </div>
            </div>
            <div id="Gmap" class="tab-pane fade">
                    <!--The div element for the map -->
       
      <div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=21.171704, 94.858390&amp;q=+(bagan)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Plot a route map</a></iframe></div>

            </div>
        </div>
    </div>
</div>
<!-- star tours  -->
<div class="container">
  <?php $data      = $tour->province->id; 
        $getTitle  = $tour->title; 
        $pro_name  = $tour->province->province_name;
        ?>

         <?php  $webs = \App\Web::find(config('app.web'))->tour()->where(['status'=>1, 'type'=>1, 'province_id'=> $data])->whereNotIn('title',[$getTitle])->get(); ?>
            <div class="title text-center widget-title"><h2><b>Tour Packages in {{$pro_name  }} </b></h2></div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:22px;">
                <div class="carousel-inner">
                  @foreach($webs->chunk(4) as $key => $chunkTour)
                  <div class="item {{$key == 0 ? 'active' : ''}}"> 
                      @foreach($chunkTour as $tour)
                      <div class="col-sm-3">
                                @include('include.item_tour')   
                              </div>              
                            @endforeach               
                      </div>  
                  @endforeach              
                </div>
                @if($webs->count() >= 5 )
                  <div class="controls-slide">
                      <a id="prev" class="left fa fa-chevron-left btn btn-default" href="#carousel-example-generic"
                        data-slide="prev"></a>         
                      <a id="next" class="right fa fa-chevron-right btn btn-default" href="#carousel-example-generic" data-slide="next"></a>
                  </div>
                @endif
            </div>
            <div class="clearfix"></div>
      
</div>
<!-- end tours -->
<script type="text/javascript">
$(document).ready(function(){


    var datanum1=Math.floor(Math.random() * 11)+1;
    var datanum2=Math.floor(Math.random() * 11)+1;
  $('#num1').val(datanum1);
  $('#num2').val(datanum2);
  $('#myResult').on('keyup',function(){

    var getdata=$(this).val();
    var total = datanum1 + datanum2;
    
    
    if (getdata == total) {
      console.log(getdata);
      $('#myResult').removeClass('addcol1');
         $('#btn').on('click',function(){
         $('#myResult').val(getdata);
    
  });
    }
    else{
       $('#myResult').addClass('addcol1');
      $('#myResult').attr('required', true);
       $('#btn').on('click',function(){
         $('#myResult').val('');
    
  });
    }

  });

  $('#notrobot').css({'display':'none'});
  $('#eshow').on('keyup', function(){
      var eshow= $('#eshow').val();
        if (eshow.length>0) {
          $('#notrobot').css({'display':'block'});
    console.log(eshow);
  }
  else{
     $('#notrobot').css({'display':'none'});
  }

  });

});


</script>


@include('include.footer')
@endsection
