@extends('layout.backend')
@section('event', 'active')
@section('title', 'Add New Program')
@section('content')
<div class="wrapper">
  @include('admin.include.header')
  @include('admin.include.leftMenu') 
	<div class="content-wrapper">
	    <section class="content row">
    		@include('admin.include.message')    		
	    	<form method="POST" action="{{route('createCreateNew')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="col-md-12">			
					       <h3>Title</h3>			  
					    </div>
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">
			                    	<div class="form-group">
			                            <input type="text" name="title" class="form-control input-md" placeholder="Title " required>
			                        </div>		            
			                        <div class="form-group row">
			                        	<div class="col-md-6">
				                        	<label for="country">Country</label>
				                        	<select name="country" class="form-control btnSearch" action-to="province">
				                        		<option value="">--select--</option>
												@foreach(\App\Country::orderBy('country_name', 'ASC')->get() as $con)	
												<option value="{{$con->id}}">{{$con->country_name}}</option>
												@endforeach		
				                        	</select>
			                        	</div>
			                        	<div class="col-md-6">
				                        	<label for="country">Province</label>
				                        	<select name="province" class="form-control " id="province">
				                        		<option value="">--select--</option>
												@foreach(\App\Province::where('province_status', 1)->orderBy('province_name', 'ASC')->get() as $pro)
												<option value="{{$pro->id}}">{{$pro->province_name}}</option>
												@endforeach		
				                        	</select>
			                        	</div>                        	
			                        </div>
			                      	<div class="form-group row">
		                            	<div class="col-md-12">
		                            		<label for="desc">Descriptions</label>
							                <script src="{{asset('adminlte/js/lib/tinymce.min.js')}}"></script>
											<textarea name="desc" class="form-control my-editor">{!! old('desc') !!}</textarea>
							            </div>
			                        </div>		
			                        <div class="form-group row">
		                            	<div class="col-md-12">
		                            		<label for="keyword">Keyword</label>
											<textarea name="keyword" class="form-control" rows="3" placeholder="Keyword for google SEO arrangment"></textarea>
							            </div>
			                        </div>	                    
			                        <hr class="colorgraph">
				                </div>        
						  	</div>
					  	</div>				  
				  	</div>
				</section>
				<section class="col-md-4 connectedSortable">
					<div class="fancy-collapse-panel">
	                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	                        <div class="panel panel-default">
	                            <div class="panel-heading" role="tab" id="headingOne">
	                                <h4 class="panel-title">
	                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><strong>Choose Website</strong>
	                                    </a>
	                                </h4>
	                            </div>
	                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	                                <div class="panel-body">
	                                	@foreach(\App\Web::orderBy('name', 'DESC')->get() as $web)
	                                	<div><label style="font-weight: 400;"><input type="checkbox" style="width: 16px; height: 16px;" class="web_{{$web->id}}" name="web[]" value="{{$web->id}}"> <span style="position:relative; top: -4px;">{{$web->name}}</span></label></div>
	                                	@endforeach
	                                </div>
	                                <div class="section-btn">
	                                   	<div class="text-right">
											<input type="submit" name="btnTrash" value="Save to Trash" class="btn btn-default btn-sm">
											<input type="submit" name="btnPublish" value="Publish" class="btn bg-olive btn-sm">
										</div> 
									</div>
									<div class="clearfix"></div>
	                            </div>
	                        </div>
	                        <div class="panel panel-default">
	                            <div class="panel-heading" role="tab" id="headingTwo">
	                                <h4 class="panel-title">
	                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><strong>Image Feature</strong>
	                                    </a>
	                                </h4>
	                            </div>
	                            <div id="collapseTwo" class="panel-collapse " role="tabpanel" aria-labelledby="headingTwo">
	                                <div class="panel-body">
	                                   	<a id="choosImg" href="javascript:void(0)">Choose Image</a>
							        	<input name="image" type='file' id="imgInp" style="display: none;" />
							        	<center>
									    	<img class="img-responsive" id="blah" src="#" style="display: none; cursor: pointer;"/>
									    </center> 
	                                </div>
	                            </div>	                            
	                        </div>
                         	<div class="panel panel-default">
	                            <div class="panel-heading" role="tab" id="headingThree">
	                                <h4 class="panel-title">
	                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><strong>Image Gallery</strong>
	                                    </a>
	                                </h4>
	                            </div>
	                            <div id="collapseThree" class="panel-collapse " role="tabpanel" aria-labelledby="headingThree">
	                                <div class="panel-body">
	                                   	<a id="choosGallery" href="javascript:void(0)">Choose Image</a>
							        	<input name="gallery[]" type='file' id="gallery" style="display: none;" multiple="" />
							        	<center>
									    	<img class="img-responsive" id="blah" src="#"  style="display: none; cursor: pointer;"/>
									    </center>
									    <div class="placeImage">
									    	
									    </div> 
	                                </div>
	                            </div>	                            
	                        </div>
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
