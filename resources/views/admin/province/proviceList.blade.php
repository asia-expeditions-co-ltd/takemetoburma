@extends('layout.backend')
@section('destination', 'active')
@section('title', 'Provinces List')
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
			<h3>Province Lists <i class="fa fa-angle-double-right"></i> <a href="{{route('createProvince')}}" class="btn btn-primary btn-xs">Add New</a></h3>
			<table id="example" class="table table-hover " cellspacing="0" width="100%">
		        <thead>
		            <tr>
                    <th>Picture</th>
		                <th>Province Name</th>
		                <th>Country</th>
		                <th style="width: 80px;" class="text-right">Status</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($province as $pro)
		            <tr>
		            	<td style="width:6%;vertical-align:middle;text-align:center;">	
	    					<img style="width:100%;" src="{{Content::urlImage($pro->province_photo)}}">
	    				</td>                  
		            	<td>{{$pro->province_name}}</td>
		            	<td>{{{ $pro->country->country_name or '' }}}</td>
		            	<td style="width: 80px;" class="text-right">
				    		<a href="{{route('updateProvince', ['pro_id'=> $pro->id])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
				    		<a data-action="province" data-id="{{$pro->id}}" class="btnDelete btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
	});
</script>
@endsection

