@extends('layout.app')
@section('title', 'Contact Us')
@section('keywords', 'Tour Burma, Golf Burma')
@section('description', 'Myanmar(Burma) is the good destinations to visit and have lot of golf courses')
<script src='https://www.google.com/recaptcha/api.js'></script>
@section('content')
 <style type="text/css">
            .addcol{color: #002aff; }
            .addcol1:focus{color: red; border-color: red;}
          </style>
@widget('menu')
<div class="overflownone">
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
            <div id="myCarousel" class="slide carousel-fade" style="height: 350px;">
                <div class="carousel-inner" id="carousel-warpper" >
                    <div class="item active item-slide" style="background-image: url(/photos/share/myanmar.jpg); background-position:0px -80px;">                        
                    </div>  
                </div>    
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="container">
    <div class="section-welcome" id="top-program" style="padding: 0px;">
        <span class="">
            <span class="fa fa-envelope-o" style="color: green; font-size: 27px; padding: 13px 12px;"></span> Feel free to contact us anytime
        </span>
        <!-- <span class=" pull-right single-price">/Per Player </span> -->
    <div class="clearfix"></div>        
    </div>    
</div>
<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            @include('include.message')
            <div class="col-md-12">
                <div class="crane-listing bg-white">
                    <div class="well-sm">
                        <form action="{{route('sendContact')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="fa fa-user "></span>
                                             </span>
                                            <input type="text" name="fullname" class="form-control"  placeholder="Full name" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-phone "></span>
                                            </span>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone : +95 (1) 200 401" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-envelope-o"></span>
                                            </span>
                                            <input type="email" name="email" id="eshow" class="form-control" placeholder="example@gmail.com" required="required" />
                                        </div>
                                    </div>                             
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message"> Message</label>
                                        <textarea name="message" class="form-control" rows="8" cols="25" 
                                            placeholder="Type your message here ...!"></textarea>
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
                                    <button type="submit" id="btn" class="btn btn-primary pull-right">
                                        Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                      
            </div>
            <div class="col-md-1">  
                
            </div>
            <div class="col-md-12" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7640.028049427388!2d96.17003873627696!3d16.775977839369798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x290f313eb6d438d8!2sAsia+Expeditions!5e0!3m2!1sen!2skh!4v1495440787846" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <br>
</div>
    <script type="text/javascript">
 $(document).ready(function(){
     $(".Contact").addClass('menu-active');
  });
  </script>

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
@endsection