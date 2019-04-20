<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/takeme-to-burma(icon).png" type="image/x-icon" />
    <title>@yield('title') | {{Config('app.title')}}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/AdminLTE.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/font-awesome.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/daterangepicker.css') }}">  
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/ionicons.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/jquery.dataTables.min.css') }}">
    
    <script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminlte/js/lib/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminlte/js/lib/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminlte/js/lib/adminlte.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.tinymce.min.js')}}"></script>
    <!-- script editing -->
    <script type="text/javascript" src="{{asset('adminlte/js/delController.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminlte/js/admin.js')}}"></script>
</head>
<body>
    @yield('content')
</body>
</html>