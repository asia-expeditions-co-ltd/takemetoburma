@extends('layout.backend')
@section('program', 'active')
@section('title','Program List')
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
  		<section class="content">
	  		@include('admin.include.message')
	  		<div class="row">
		      	<div class="col-md-12 col-md-12">    
		      		<form action="{{route('catCreate')}}" method="POST">
		      			{{csrf_field()}}
	                    <table class="table" style="margin-bottom: 0px;">
	                    	<tr>
	                    		<td style="width: 50%;">	
	                    			<input type="hidden" name="eid" value="{{isset($_GET['eid']) ? $catEdit->id : ''}}" >
	                        		<div class="form-group">
							        	<input type="text" name="name" class="form-control" placeholder="Category Name" value="{{isset($_GET['eid']) ? $catEdit->name : ''}}" required>  
							        </div>
							        <div class="form-group">
							        	<textarea class="form-control" name="keyword" rows="5" placeholder="keyword for google SEO arrangment">{{isset($_GET['eid']) ? $catEdit->meta_keyword : ''}}</textarea>
							        </div>
						        </td>
	                    		<td>
	                    			<div class="form-group">
		                   				<input type="submit" value="{{isset($_GET['eid'])?'Update' :'Create'}}" class="btn bg-olive btn-sm">
		                   			</div>
	                   				@if(isset($_GET['eid']))
	                   				<div>
	                   					<a href="{{route('categoryList')}}" class="btn btn-primary btn-sm"> Add New</a>
	                   				</div>
	                   				@endif
	                    		</td>                	                            		
	                    	</tr>
	                    </table>
	                </form>
                </div>
		  	</div>
			<table id="example" class="table table-hover" cellspacing="0" width="100%">
		        <thead>
		            <tr>			                              
		                <th>Title</th>
		                <th class="text-right">Status</th>
		                <th>Keyword</th>
		            </tr>
		        </thead>
		    	<tbody>
		    		@foreach($getCat as $cat)
	    			<tr class="cat_row">
	    				<td>{{$cat->name}}</td>
	    				<td><small>{!! $cat->meta_keyword !!}</small></td>
	    				<td class="text-right" style="width: 9%;">
    						<a href="{{route('categoryList')}}?eid={{$cat->id}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
							<a data-action="cat" data-id="{{$cat->id}}" class="btnDelete btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"></i></a>		
	    				</td>
	    			</tr>
		    		@endforeach
		    	</tbody>
	    	</table>			
	    </div>
	    <div class="clearfix"></div>
   </div>
   @include('admin.include.footer')
</div>

@endsection
