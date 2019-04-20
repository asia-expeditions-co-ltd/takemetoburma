@extends('layout.backend')
@section('users', 'active')
@section('title', 'Add New User')
@section('content')
<div class="wrapper">
  @include('admin.include.header')
<!-- Left side column. contains the logo and sidebar -->
@include('admin.include.leftMenu')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="col-md-12">
		@include('admin.include.message')	    		
	</div>
    <section class="content row">
	<form method="POST" action="{{route('createUser')}}" >
		<!-- alert message when has action? -->		
		{{ csrf_field() }}	    		
		<section class="col-md-8 connectedSortable">
			<div class="panel">
				<div class="col-md-12">			
			       <h3>Add New User </h3>			  
			    </div>
				<div class="row">						    
				    <div class="box-body">
				      	<div class="col-md-12 col-md-12">		                   
	                    	<div class="row">
	                            <div class="col-xs-12 col-sm-6 col-md-6">
	                            	
	                            	<div class="form-group has-feedback {{ $errors->first('username') ? 'has-error':''}}">
		                              	<input type="text" name="username" class="form-control" placeholder="User Name*" required value="{{old('username')}}">
		                              	<span class="fa fa-user form-control-feedback"></span>    
		                            </div>
	                            </div>
	                            <div class="col-xs-12 col-sm-6 col-md-6">
	                                <div class="form-group has-feedback {{$errors->first('fullname') ? 'has-error':''}}">
		                               <input type="text" name="fullname" class="form-control" placeholder="Full Name*" value="{{old('fullname')}}">
		                               <span class="fa fa-user form-control-feedback"></span> 
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-xs-12 col-sm-6 col-md-6">
	                            	<div class="form-group has-feedback {{$errors->first('password') ? 'has-error':''}} ">
		                              	<input required type="password" name="password" class="form-control" placeholder="Password*" value="{{old('password')}}">
		                              	<span class="fa fa-unlock-alt form-control-feedback"></span>
		                            </div>
	                            </div>
	                            <div class="col-xs-12 col-sm-6 col-md-6">
	                                <div class="form-group has-feedback {{$errors->first('re_password') ? 'has-error':''}}">
		                               <input required type="password" name="re_password" class="form-control" placeholder="Re-Type Password" value="{{old('re_password')}}">
		                               <span class="fa fa-eye-slash form-control-feedback"></span>
	                                </div>
	                            </div>
	                        </div>     
	                        <div class="row">
	                            <div class="col-xs-12 col-sm-6 col-md-6">
	                            	<div class="form-group has-feedback {{$errors->first('email') ? 'has-error':''}}">
		                              	<input required type="email" name="email" class="form-control" placeholder="Email Address*" value="{{old('email')}}">
		                              	<span class="fa fa-envelope-o form-control-feedback"></span>
		                            </div>
	                            </div>
	                            <div class="col-xs-12 col-sm-6 col-md-6">
	                                <div class="form-group has-feedback {{$errors->first('phone') ? 'has-error':''}}">
		                               <input type="text" name="phone" class="form-control" placeholder="Phone Number*" value="{{old('phone')}}">
		                           		<span class="fa fa-phone-square form-control-feedback"></span>
	                                </div>
	                            </div>
	                        </div> 
	                        <div class="row">
	                            <div class="col-xs-12 col-sm-6 col-md-6">
	                            	<div class="form-group has-feedback ">
		                              	<select class="form-control" name="role">
		                              		<option value="">--select Role--</option>
		                              		@foreach(\App\Role::all() as $role)
		                              		<option value="{{$role->id}}">{{$role->name}}</option>
		                              		@endforeach
		                              	</select>
		                            </div>
	                            </div>			                          
	                        </div>
	                        <hr class="colorgraph">
		                </div>        
				  	</div>
			  	</div>				  
		  	</div>
		</section>
		<section class="col-md-4 pull-left-3 connectedSortable">
			<div class="box box-solid">
			    <div class="box-header"></div>		     
			    <div class="panel">
		    		<div class="col-md-12">				    		
			        	<center>
					    	<img style="width:55%;" class="img-responsive" src="/img/create_user.png" />
					    </center>
					    <hr class="colorgraph">		
						<input type="submit" id="btnSave" value="Create" class="btn bg-olive"  >
		            </div>
	             	<div class="clear"></div>
	             	<br>
				</div>
			</div>			
		</section>   
	<div class="clear"></div>  
	</form>
    </section>
</div>
@include('admin.include.footer')
</div>
@endsection
