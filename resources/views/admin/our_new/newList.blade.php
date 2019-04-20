@extends('layout.backend')
@section('news')
active
@endsection
@section('title')
	News List
@endsection
@section('content')
<div class="wrapper">
	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>	
  	@include('admin.include.header')
  	<!-- Left side column. contains the logo and sidebar -->
  	@include('admin.include.leftMenu')
  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
  		<section class="content">
  			@include('admin.include.message')
		    <section class="col-md-12">
			    <h3>New Lists <i class="fa fa-angle-double-right"></i> <a class="btn btn-primary btn-xs" href="{{route('getForm')}}"> Add News</a></h3><br>
		    </section>
		    <table id="example" class="table table-hover" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>
		                  	<input type="checkbox" id="check_all" style="width: 16px; height: 16px; opacity: 0.7;">
			            </th>
		                <th>Image</th>
		                <th>Title</th>
		                <th>Created By</th>
		                <th>Created At</th>
		                <th class="text-right">Status</th>                
		            </tr>
		        </thead>
		    	<tbody>	
		    		@foreach($ournew as $post)		    		
	    			<tr>
	    				<td style="width: 17px;vertical-align: middle; text-align: center;">
	    					<input type="checkbox" name="checkall" class="checkall" style="width: 16px; height:16px;opacity:0.7;">
						</td>
	    				<td style="width:8%; vertical-align: middle;text-align: center;">
	    					<?php echo $post->picture != '' ? '<img class="img-responsive" src="/photos/share/thumbs/'.$post->picture.'">' : '<i style="font-size:28px;" class="'.$post->icon.'"></i>';?>
	    				</td>	    					
	    				<td>{{ str_limit($post->tittle, 60)}}</td>	    				
	    				<td style="text-transform: capitalize;"> {{{ $post->user->fullname or ''}}}</td>
	    				<td>{{ date('Y-M-d', strtotime($post->created_at))}}</td>
	    				<td class="text-right">	    					
	    					<a href="{{route('getUpdateNew', ['id' => $post->id])}}" class="btn btn-info btn-xs">Edit</a>
	    					@if(Auth::user()->role_id == 1)
							<a data-action="new" data-id="{{$post->id}}" class="btnDelete btn btn-danger btn-xs">Delete</a>
							@endif
	    				</td>
	    			</tr>
		    		@endforeach
		    	</tbody>
		    </table>
	    </div>
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

