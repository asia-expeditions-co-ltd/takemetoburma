<!DOCTYPE html>
<html >
<head>
	<!--   <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
  <meta property="og:type"          content="http://takemetoburma.com" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description " />
  <meta property="og:image"         content="http://takemetoburma.com/img/demo-logo.png" /> -->

	<meta charset="utf-8">
    <meta name="google-site-verification" content="0iWQYo0bnbVxgAzUNINHraMN_FzusKS5WRvBIoYdB0k" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/takeme-to-burma(icon).png" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">        
	<title>@yield('title') | {{config('app.title')}}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.min.css')}}">
	<script type="text/javascript" src="{{ asset('js/lib/jquery-3.3.1.min.js')}}"></script>



  <!-- Libraries CSS Files -->
  <link href="{{asset('/add_lib/lib/animate/animate.min.css')}}" rel="stylesheet"> <!-- for action slow -->
  <link href="{{asset('/add_lib/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('/add_lib/css/style.css')}}" rel="stylesheet">


	<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/app/controller.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/datepicker.min.js')}}"></script>

 <style type="text/css">
   figure a img:hover{
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
   }
 </style>


</head>
<body>
  
	@yield('content')  
 
  <script src="{{asset('/add_lib/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/isotope/isotope.pkgd.min.js')}}"></script>  
  <script src="{{asset('/add_lib/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <script src="{{asset('/add_lib/js/mainn.js')}}"></script>

</body>
</html>