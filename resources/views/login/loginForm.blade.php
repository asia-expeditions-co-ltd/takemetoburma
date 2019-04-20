@extends('layout.app')
@section('title')

@endsection
@section('content')
<div class="container">

    <div class="row" >
        <div class="col-sm-6 col-md-4 col-md-offset-4" >
        	<div class="well" style="margin-top: 50px;">
        		<form  method="POST" action="{{route('doLogin')}}">
        			{{ csrf_field()}}
		        	<div class="form-group">
		        		<img src="/img/demo-logotake.png" class="img-responsive">
		        	</div>
		        	<div class="form-group">
		        		<label>Usern / Email</label>
		        		<input  type="text" name="email" class="form-control input-md" placeholder="Enput Email" required>
		        	</div>
		        	<div class="form-group">
		        		<label>Password</label>
		        		<input type="password" name="password" class="form-control input-md" placeholder="Password" required>
		        	</div>
		        	<div class="form-group">
		        		<label><input type="checkbox" name="remember">Remember</label>&nbsp;&nbsp;&nbsp;
		        		<button type="submit" class="btn btn-info">Login</button>   
		        	</div>
	        	</form>
	        	<div class="row">
        			@if(session('message'))
        				<div class="alert alert-warning alert-dismissible " role="alert">
						  	{{session('message')}}
						</div>
        			@endif
        		</div>
        	</div>
        </div>
    </div>
</div>

@endsection