<!DOCTYPE html>
<html >
<head>
	<!--   <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
  <meta property="og:type"          content="http://takemetoburma.com" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description " />
  <meta property="og:image"         content="http://takemetoburma.com/img/demo-logo.png" /> -->

	<meta charset="utf-8">
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
	<script type="text/javascript" src="{{ asset('js/lib/jquery-3.3.1.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/angular.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/app/controller.js')}}"></script>	


</head>
<body>
<div id="top"></div>
	@yield('content')
</body>
</html>