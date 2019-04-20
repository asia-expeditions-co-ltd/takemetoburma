@extends('layout.backend')
@section('news')
active
@endsection
@section('title')
	News - Add
@endsection
@section('content')
<div class="wrapper">
  @include('admin.include.header')
  @include('admin.include.leftMenu')
	<div class="content-wrapper">
	    <section class="content row">
    		@include('admin.include.message')    		
	    	<form method="POST" action="{{route('createNew')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="col-md-12"><h3>Add News</h3></div>
						<div class="row">  
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">
			                    	<div class="form-group">
			                            <input type="text" id="title" name="title" class="form-control input-md" placeholder="News Title" required>
			                        </div>		                            
			                      	<div class="form-group">
			                      		<div class="row" style="padding: 4px;">
			                            	<div class="box-body">
								                <script src="{{asset('adminlte/js/lib/tinymce.min.js')}}"></script>
												<textarea name="intro" class="form-control my-editor">{!! old('intro') !!}</textarea>
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
	                                	@foreach(\App\Website::orderBy('name', 'DESC')->get() as $web)
	                                	<label style="font-weight: 400;"><input type="checkbox" style="width: 16px; height: 16px;" class="web_{{$web->id}}" name="webchoose[]"> <span style="position:relative; top: -4px;">{{$web->name}}</span></label>
	                                	@endforeach
	                                </div>
	                                <div class="section-btn">
	                                   	<div class="text-right">
											<input type="submit" value="Save to Trash" class="btn btn-default btn-sm">
											<input type="submit" value="Public" class="btn bg-olive btn-sm">
										</div> 
									</div>
									<div class="clearfix"></div>
	                            </div>
	                        </div>
	                        <div class="panel panel-default">
	                            <div class="panel-heading" role="tab" id="headingTwo">
	                                <h4 class="panel-title">
	                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><strong>Choose Website</strong>
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
	                    </div>
	                </div>
	                <div class="clearfix"></div>
				</section>
			</form>
	    </section>
	</div>
  	@include('admin.include.editorscript')
	@include('admin.include.footer')
</div>
@endsection
