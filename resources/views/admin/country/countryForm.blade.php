@extends('layout.backend')
@section('destination', 'active')
@section('title', 'Add New - Country')
@section('content')
<div class="wrapper">
  @include('admin.include.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.include.leftMenu')
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <section class="content">
    		@include('admin.include.message')    		
	    	<form method="POST" action="{{route('createCountry')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="col-md-12">			
					       <h3>Country Name</h3>			  
					    </div>
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">		                   
			                    	<div class="form-group">
			                            <input type="text" name="country_name" class="form-control input-md" placeholder="Country Name" required>
			                        </div>	
			                       	<div class="form-group row">
			                       		<div class="col-md-6 col-xs-6">
			                            	<input type="text" name="country_iso" class="form-control input-md" placeholder="Country IOS">
			                            </div>
			                            <div class="col-md-6 col-xs-6">
			                            	<input type="text" name="country_code" class="form-control input-md" placeholder="Country Code:Kh 12000" >
			                            </div>
			                            <div class="clearfix"></div>
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
					<div class="box box-solid">
					    <div class="box-header"></div>		     
					    <div class="panel">
				    		<div class="col-md-12">
				    			<label>Photo of Country</label>
				    			<div class="row">
				    				<hr style="margin-top: 0px; margin-bottom: 4px;">
				    			</div>
				    			<a id="choosImg" href="javascript:void(0)">Choose Image</a>
					        	<input name="image" type='file' id="imgInp" style="display: none;" />
					        	<center>
							    	<img class="img-responsive" id="blah" src="#"  style="display: none; cursor: pointer;"/>
							    </center>							    			               	
				            </div>			
				            <div class="clearfix"></div><br>
				            <div class="col-md-12">
				    			<label>Flag</label>
				    			<div class="row">
				    				<hr style="margin-top: 0px; margin-bottom: 4px;">
				    			</div>
				    			<a id="choosFlag" href="javascript:void(0)">Choose Flag</a>
					        	<input name="flag" type='file' id="imgFlag" style="display: none;" />
					        	<center>
							    	<img class="img-responsive" id="blahFlag" src="#"  style="display: none; cursor: pointer;"/>
							    </center>							    			               	
				            </div>	       	
			             	<div class="clearfix"></div>
			             	<br><br>
			             	<div class="col-md-12">			
			             		<div class="row">
								    <hr class="colorgraph">		
								</div>
							    <div class="text-right">
									<input type="submit" value="Public" class="btn bg-olive">
								</div>
								<div class="clear"></div>	
								 <br>	               	
				            </div>				           
			             	<div class="clear"></div>
						</div>
					</div>			
				</section>   
			<div class="clear"></div>  
			</form>
	    </section>
	    <!-- /.content -->
	</div>
  <!-- /.content-wrapper -->
  	@include('admin.include.editorscript')
	@include('admin.include.footer')
</div>
@endsection
