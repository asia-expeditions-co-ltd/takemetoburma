@extends('layout.backend')
@section('users', 'active')
@section('title', 'Users List')
@section('content')
<div class="wrapper">
  	@include('admin.include.header')
  	@include('admin.include.leftMenu')
  	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>
  	<div class="content-wrapper">  		
		<section class="content">
			<!-- script for news message json -->
			@include('admin.include.message')			
			<!-- end message json>? -->
			<h3>Users List
				@if(Auth::user()->role_id == 1)
				<i class="fa fa-angle-double-right"></i> <a href="{{route('getcreateUser')}}" class="btn btn-primary btn-xs">Add New</a>
				@endif
			</h3>	
			<table id="example" class="table table-hover " cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>User Name</th>
		                <th>Email</th>
		                <th>Phone</th>
		                <th>Role</th>
		                <th style="width: 80px;">Created_at</th>
		                <th style="width: 80px;" class="text-right">Status</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($users as $user)
		            <tr>
		            	<td>{{$user->fullname}}</td>
		            	<td>{{$user->email}}</td>
		            	<td>{{$user->phone}}</td>
		            	<td>{{{ $user->role->name or '' }}}</td>
		            	<td style="width: 80px;">{{ date('Y-M-d', strtotime($user->created_at))}}</td>
		            	<td style="width: 80px;" class="text-right">		            		@if(Auth::user()->role_id == 1)
				    		<a href="{{url('admin/user/edit')}}/{{$user->id}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
				    		<a data-action="user" data-id="{{$user->id}}" class="btnDelete btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
				    		@endif
		            	</td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
		</section>
    </div>
   	@include('admin.include.footer')
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
@endsection

