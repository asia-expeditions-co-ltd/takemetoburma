<?php 
	$title = 'Add New Slide';
	if(isset($_GET['id'])){
		$title = 'Update Slide';
	}
?>
@extends('layout.backend')
@section('slide','active')
@section('title',$title)
<?php 
use App\component\Content; ?>
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
	    	<form method="POST" action="{{route('createSlide')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-12 connectedSortable">
					<div class="panel">
						<div class="box-header">			
					       <h3>{{$title}}</h3>			  
					    </div>					    
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">    
		                            <table class="table" id="productList">
		                            	<tr>
		                            		<th>Slide Picture</th>
		                            		<th>Slide Title</th>
		                            		<th>Choose Website</th>
		                            	</tr>
		                            	<tr>
		                            		<td style="width: 20%;"><input type="file" name="slide" class="form-control">
		                            			@if(isset($slide->picture))
		                            			<img style="width: 100%;" src="{{Content::urlImage($slide->picture, '/photos/share/')}}">
		                            			<input type="hidden" name="old_image" value="{{$slide->picture}}">
		                            			@endif
		                            		</td>
		                            		<td><input type="text" name="title" class="form-control" placeholder="Slide Title" value="{{isset($slide->name) ? $slide->name:'' }}"></td>
		                            		<td>
		                            			@foreach(\App\Web::orderBy('name', 'DESC')->get() as $web)
		                            			<?php 
		                            			$check ='';
		                            			if(isset($webid)){
		                            			$check=in_array($web->id, explode(',',$webid))?'checked':'';
		                            			}
		                            			?>
			                                	<div><label style="font-weight: 400;"><input type="checkbox" style="width: 16px; height: 16px;" class="web_{{$web->id}}" name="web[]" value="{{$web->id}}" {{$check}}> <span style="position:relative; top:-4px;">{{$web->name}}</span></label></div>
			                                	@endforeach
		                            		</td>		                            		
		                            	</tr>
		                            </table>		                        
			                        <hr class="colorgraph">
			                        <?php 
			                        $action = 'Publish';
			                        if(isset($_GET['id'])){
			                        	$action = 'Update';
			                        	echo '<input type="hidden" name="id" value="'.$slide->id.'">';
			                        }
			                        ?>
				                	<input type="submit" name="btnSave" value="{{$action}}" class="btn bg-olive">
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
