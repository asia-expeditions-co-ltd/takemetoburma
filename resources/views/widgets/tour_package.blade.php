@if($webs)
	<div class="title text-center">
		<header class="section-header">
          <h3>Tour Packages</h3>
        </header>
    </div>
	<!-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:22px;">
	    <div class="carousel-inner"> -->
		    @foreach($webs->chunk(3) as $key => $chunkTour)
				<!-- <div class="item {{$key == 0 ? 'active' : ''}}">  -->
	    			@foreach($chunkTour as $tour)
						<div class="col-sm-4" style="padding-bottom: 10px;">
		                	@include('include.item_tour')
		                </div>            	
	                @endforeach		            
		        <!-- </div>	 -->
		    @endforeach		           
	   <!--  </div>
	    @if($webs->count() >= 4 )
		    <div class="controls-slide">
	        	<a id="prev" class="left fa fa-chevron-left btn btn-default" href="#carousel-example-generic"
	            data-slide="prev"></a>	       
		        <a id="next" class="right fa fa-chevron-right btn btn-default" href="#carousel-example-generic" data-slide="next"></a>
		    </div>
	    @endif
	</div>
	<div class="clearfix"></div> -->
	

@endif