@extends('layout.backend')
@section('subscribe', 'active')
@section('title', 'subscribe List')
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
		
			<form action="{{route('delete_data')}}" method="POST">
				{{csrf_field()}}	
			<table id="example" class="table table-hover " cellspacing="0" width="100%">
		        <thead>
		            <tr>

		            	<th><input type="checkbox" id="check_all" style="width: 16px; height: 16px; opacity: 0.7;"></th>
		                
		                <th>Email</th>
		                <th>Phone</th>
		                <th>Type</th>
		                <th>Ip</th>
		                <th>CityName</th>
		                <th>CountryName</th>
		                <th>TimeZone</th>
		                <th style="width: 80px;">Created_at</th>
		                <th style="width: 80px;" class="text-right">Status</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($emailusers as $email)
		            <tr>
		                <td><input type="checkbox" name="checkall[]" class="checkall" style="width: 16px;height:16px;opacity:0.7;" value="{{$email->id}}"></td>
		            	<td>{{$email->subscribeEmail}}</td>
		            	<td>{{$email->phone}}</td>
		            	<td>{{$email->type}}</td>
		            	<td>{{$email->ip}}</td>
		            	<td>{{$email->cityName}}</td>
		            	<td>{{$email->countryName}}</td>
		            	<td>{{$email->timezone}}</td>
		            
		            	<td style="width: 80px;">{{ date('Y-M-d', strtotime($email->created_at))}}</td>
		            	<td style="width: 80px;" class="text-right">

				    		<a data-action="datasub" data-id="{{$email->id}}" class="btnDelete btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
				    	
		            	</td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
	            @if(isset($_GET['sort']))
					<input type="submit" name="btnStatus" value="Publish" class="btn btn-primary btn-xs btnStatus" disabled="enabled">
				@else
					<input type="submit" name="btnStatus" value="Move to Delete" class="btn btn-danger btn-xs btnStatus" >
				@endif
		    	</form> 
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

