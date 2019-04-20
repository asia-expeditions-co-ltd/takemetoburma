@extends('layout.backend')
@section('news')
active
@endsection
@section('title')
	News - AUpdate
@endsection
@section('content')
<div class="wrapper">
  @include('admin.include.header')
  @include('admin.include.leftMenu')
	<div class="content-wrapper">
	    <section class="content row">
    		@include('admin.include.message')   
	    	<form method="POST" action="{{route('UpdateNew')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="box-header">			
					       <h3>News Title </h3>			  
					    </div>
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">		                   
			                    	<div class="form-group">
			                            <input type="text" id="title" name="title" class="form-control input-md" placeholder="News Title" required value="{{$new->tittle}}">
			                        </div>		                            
			                        <input type="hidden" name="Nid" value="{{ $new->id }}">
			                      	<div class="form-group">
			                      		<div class="row" style="padding: 4px;">
			                            	<div class="box-body">
								                <script src="{{asset('adminlte/js/lib/tinymce.min.js')}}"></script>
												<textarea name="intro" class="form-control my-editor">{!! old('intro', $new->description) !!}</textarea>
								            </div>
							            </div>
			                        </div>
			                        <hr class="colorgraph">
				                </div>        
						  	</div>
					  	</div>				  
				  	</div>
				</section>
				<section class="col-md-4 connectedSortable">
					<div class="box box-solid">
					    <div class="box-header"></div>		     
					    <div class="panel">
				    		<div class="col-md-12">
				    			<label>Feature Image</label>
				    			<div class="row">
				    			<hr style="margin-top: 0px; margin-bottom: 4px;">
				    			</div>
				    			<a id="choosImg" href="javascript::void(0)">Choose Image</a>
					        	<input name="image" type='file' id="imgInp" style="display: none;" />
					        	<center>
					        		<input type="hidden" name="old_image" value="{{$new->picture}}">
				        		<?php
				        			$name = ($new->picture != '' ? '/photos/share/'.$new->picture : '#');
				        			$action = ($new->picture != '' ? '' : 'none');
				        		?>
							    <img class="img-responsive" id="blah" src="{{$name}}" style="display: {{$action}}; cursor: pointer;"/>
							    </center>
							    <div class="row">
							    	<hr class="colorgraph">		
							    </div>
								<input type="submit" value="Update" class="btn bg-olive">				
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
  	@include('admin.include.editorscript')
	@include('admin.include.footer')
</div>
@endsection
