@if($webs)
	<div class="title text-center widget-title"><h2><b>Tour Packages</b></h2></div>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:22px;">
	    <div class="carousel-inner">
		    @foreach($webs->chunk(3) as $key => $chunkTour)
				<div class="item {{$key == 0 ? 'active' : ''}}"> 
	    			@foreach($chunkTour as $tour)
						<div class="col-sm-4">
		                	@include('include.item_tour')   
		                </div>            	
	                @endforeach		            
		        </div>	
		    @endforeach		           
	    </div>
	    @if($webs->count() >= 4 )
		    <div class="controls-slide">
	        	<a id="prev" class="left fa fa-chevron-left btn btn-default" href="#carousel-example-generic"
	            data-slide="prev"></a>	       
		        <a id="next" class="right fa fa-chevron-right btn btn-default" href="#carousel-example-generic" data-slide="next"></a>
		    </div>
	    @endif
	</div>
	<div class="clearfix"></div>
@endif