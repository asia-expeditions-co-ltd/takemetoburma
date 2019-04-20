@extends('layout.backend')
@section('destination', 'active')
@section('title', 'Country List')
<?php 
use App\component\Content; ?>
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
			<h3>User Lists <i class="fa fa-angle-double-right"></i> <a href="{{route('getCountry')}}" class="btn btn-primary btn-xs">Add New</a></h3>	
			<table id="example" class="table table-hover " cellspacing="0" width="100%">
		        <thead>
		            <tr>
		            	<th>Flag</th>
		                <th>Country</th>
		                <th>Country Code</th>
		                <th style="width: 80px;">Created_at</th>
		                <th style="width: 80px;" class="text-right">Status</th>                
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($country as $con)
		            <tr>
		            	<td style="width:6%;vertical-align:middle;text-align:center;">	
	    					<img style="width:100%;" src="{{Content::urlImage($con->flag)}}">
	    				</td>
		            	<td>{{$con->country_name}}</td>
		            	<td>{{$con->country_iso}}</td>		            	
		            	<td style="width: 80px;">{{ date('Y-M-d', strtotime($con->updated_at))}}</td>
		            	<td style="width: 80px;" class="text-right">		            		
				    		<a href="{{route('getCountryEdit', ['country_id'=> $con->id])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
				    		@if(Auth::user()->role_id == 1)
				    		<a data-action="country" data-id="{{$con->id}}" class="btnDelete btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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

