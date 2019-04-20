@extends('layout.backend')
@section('slide', 'active')
@section('title','Slide List')
<?php  
use App\component\Content; ?>
@section('content')
<div class="wrapper">
	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>
  	@include('admin.include.header')
  	<!-- Left side column. contains the logo and sidebar -->
  	@include('admin.include.leftMenu')
  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
  		<div class="col-md-12">
  			@include('admin.include.message')
  		</div>
  		<div class="col-md-12"><br>  			
			<h3>All Slide <i class="fa fa-angle-double-right"></i> <a href="{{route('slideForm')}}" class="btn btn-primary btn-xs">Add New</a></h3>		  
		    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>		               
		                <th>Image</th>
		                <th>Name</th>
		                <th>WebSite</th>
		                <th>Created At</th>
		                <th class="text-right">Status</th>                
		            </tr>
		        </thead>
		    	<tbody>	
		    		@foreach($slides as $slide)		    		
	    			<tr>	    					    				
	    				<td style="width: 20%; vertical-align: middle;text-align: center;">
	    					<img style="width:100%;" src="{{Content::urlImage($slide->picture, '/photos/share/')}}">
	    				</td>
	    				<td>{{ $slide->name }}</td>
	    				<td>
	    					@foreach($slide->web as $web)
	    					<div><label class="label label-default">{{$web->name}}</label></div>
	    					@endforeach
	    				</td>
	    				<td>{{ date('d-M-Y', strtotime($slide->updated_at))}}</td>			
	    				<td class="text-right">
	    					<a href="{{route('slideForm')}}?id={{$slide->id}}&type=update" class="btnEdit btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
	    					@if(Auth::user()->role_id == 1)
	    					<a data-action="slide" data-id="{{$slide->id}}" class="btnDelete btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>	    				
	    					@endif	
	    				</td>
	    			</tr>
		    		@endforeach
		    	</tbody>
		    </table>
	    </div><div class="clearfix"></div>
   	</div>
   	@include('admin.include.footer')
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();

	    $("#check_all").click(function () {
	        if($("#check_all").is(':checked')){
	            if ($('#example tbody tr:visible')) {
	                $('#example tbody tr:visible td .checkall').prop('checked', true);     
	            }else{
	                $('#example tbody tr:visible td .checkall').prop('checked', false);     
	            }          
	        } else {
	            $(".checkall").prop('checked', false);
	        }
	    });
	} );
</script>
@endsection

