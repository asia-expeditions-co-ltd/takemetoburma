@extends('layout.app')
@section('title')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        	<br>
        	<div class="well">
        		<form action="{{route('doLogin')}}" method="POST">
        			{{ csrf_field()}}
		        	<div class="form-group">
		        		<img src="/img/demo-logo.png" class="img-responsive">
		        	</div>
		        	<div class="form-group">
		        		<label>Usern / Email</label>
		        		<input type="text" name="username" class="form-control input-md" placeholder="UserName Or Email ">   
		        	</div>
		        	<div class="form-group">
		        		<label>Password</label>
		        		<input type="text" name="username" class="form-control input-md" placeholder="Password">   
		        	</div>
		        	<div class="form-group">
		        		<label><input class="checkbox" type="checkbox" name="remember"> Remember</label>
		        		&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info">Login</button>   
		        	</div>
	        	</form>
        	</div>
        </div>
    </div>
</div>
@endsection