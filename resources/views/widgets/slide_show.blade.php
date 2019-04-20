<?php 
  use App\component\Content;
 ?>
<div class=" overflownone" >
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
          <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach($getSlide as $key => $item) 
                <?php 
                  $active = $key == 0 ? 'active' : '';
                ?>
                  <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$active}}"></li>
                @endforeach
              </ol>
              <div class="carousel-inner" role="listbox" id="carousel-warpper" >
                @foreach($getSlide as $key => $item) 
                  <?php 
                    $active = $key == 0 ? 'active' : '';
                  ?>
                  <div class="item {{$active}} item-slide" src="{{Content::urlImage($item->picture, '/photos/share/')}}" style="z-index:-2; background-image: url({{Content::urlImage($item->picture, '/photos/share/')}})">
                      <div class="carousel-caption">                      
                        <p>{{$item->name}}</p>
                      </div>
                  </div>  
                @endforeach
              </div>  
              <!-- Left and right controls -->
            <a class="left carousel-control slide-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left slide" aria-hidden="true"> </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control slide-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>          
          </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

