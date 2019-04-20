@extends('layout.backend')
@section('slide', 'active')
@section('title', 'Update Slide')
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
	    <section class="content">
	    	<form method="POST" action="{{route('editSlide')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-12 connectedSortable">
					<div class="panel">
						<div class="box-header">			
					       <h3>Edit slide</h3>			  
					    </div>
					    <div class="col-md-12">
					    	<select class="form-control" name="slide_for" id="slide_for" style="text-transform: capitalize;">
					    		@for($row = 1; $row <= 1; $row++ )
					    		<option value="1" {{ $slide->slide_for === 1 ? 'selected' : '' }}> home Page</option>
					    		<option value="2" {{ $slide->slide_for === 2 ? 'selected' : '' }}> Monitor</option>
					    		@endfor
					    	</select>
					    </div>
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">    
		                            <table class="table" id="productList">
		                            	<tr>
		                            		<td style="width: 40%;">		                            			
		                            			<input type="hidden" name="id" value="{{$slide->id}}">
		                            			<a id="choosImg" href="javascript::void(0)">Choose Image</a>
									        	<input name="slide" type='file' id="imgInp" style="display: none;" />
									        	<input type="hidden" name="old_slide" value="{{$slide->slide}}">
									        	<center>
									        		<?php
									        			$name = ($slide->slide != '' ? '/photos/share/'.$slide->slide : '#');
									        			$action = ($slide->slide != '' ? '' : 'none');
									        		?>
											    	<img style="" class="img-responsive" id="blah" src="{{$name}}" style="display: {{$action}}; cursor: pointer;"/>
											    </center>												  
									        </td>
		                            		<td><textarea class="form-control" name="intro">{{$slide->intro}}</textarea></td>
		                            		<td><input type="text" name="title" class="form-control" value="{{$slide->title}}" placeholder="Slide Title"></td>		                            		
		                            	</tr>
		                            </table>		                        
			                       <input type="submit" value="Update" class="btn bg-olive ">
				                </div>				                				
						  	</div>
					  	</div>				  
				  	</div>
				</section>			
			<div class="clear"></div>  
			</form>
	    </section>
	    <!-- /.content -->
	</div>
  <!-- /.content-wrapper -->
	@include('admin.include.footer')
</div>

<script type="text/javascript">
	$('.LoadData').summernote({
	  	height: 150,   //set editable area's height
	  	codemirror: { // codemirror options
	    theme: 'monokai'
	  }
	});
</script>
@endsection
