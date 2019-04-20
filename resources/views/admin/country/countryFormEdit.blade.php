@extends('layout.backend')
@section('destination', 'active')
@section('title', 'Edit - Country '.$con->country_name )
@section('content')
<?php
use \App\component\Comtent;?>
<div class="wrapper">
  @include('admin.include.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.include.leftMenu')
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <section class="content">
    		@include('admin.include.message')
	    	<form method="POST" action="{{route('updateCountry')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
	    		<input type="hidden" name="cid" value="{{$con->id}}">
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="col-md-12">
					       <h3>Country Name</h3>
					  </div>
						<div class="row">
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">
			                    	<div class="form-group">
			                            <input type="text" name="country_name" class="form-control input-md" placeholder="Country Name" value="{{$con->country_name}}" required>
			                        </div>
			                       	<div class="form-group row">
			                       		 <div class="col-md-6 col-xs-6">
			                            	<input type="text" name="country_iso" class="form-control input-md" placeholder="Country IOS" value="{{$con->country_iso}}">
			                           </div>
			                           <div class="col-md-6 col-xs-6">
			                            	<input type="text" name="country_code" class="form-control input-md" placeholder="Country Code:Kh 12000" value="{{$con->country_code}}" >
			                            </div>
			                            <div class="clearfix"></div>
			                        </div>
			                    <div class="form-group">
			                     <div class="row" style="padding: 4px;">
			                      <div class="box-body">
								                <script src="{{asset('adminlte/js/lib/tinymce.min.js')}}"></script>
																<textarea name="intro" class="form-control my-editor">{!! old('intro', $con->country_intro) !!}</textarea>
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
					        		<input type="hidden" name="old_image" value="{{$con->country_photo}}">
							    	<?php
					        			$name = ($con->country_photo != '' ? '/photos/share/'.$con->country_photo : '#');
					        			$action = ($con->country_photo != '' ? '' : 'none');
					        		?>
								    	<img class="img-responsive" id="blah" src="{{$name}}" style="display: {{$action}}; cursor: pointer;"/>
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
					        		<input type="hidden" name="old_flag" value="{{$con->flag}}">
							    	<?php
					        			$name = ($con->flag != '' ? '/photos/share/thumbs/'.$con->flag : '#');
					        			$action = ($con->flag != '' ? '' : 'none');
					        		?>
								    	<img class="img-responsive" id="blahFlag" src="{{$name}}" style="display: {{$action}}; cursor: pointer;"/>
							    </center>
				            </div>
			             	<div class="clearfix"></div>
			             	<br><br>
			             	<div class="col-md-12">
			             		<div class="row">
								    <hr class="colorgraph">
								</div>
							    <div class="text-right">
									<input type="submit" value="Update" class="btn bg-olive">
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
