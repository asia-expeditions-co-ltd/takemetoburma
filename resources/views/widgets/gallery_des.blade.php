 <?php   use App\component\Content; ?>
 <!--==========================
      Clients Section
    ============================-->
  
    <section id="clients" class="wow fadeInUp" style="padding: 0;">
      <div class="container">

        <header class="section-header">
          <h3>DESTINATIONS</h3>
        </header>
  
        <div class="owl-carousel clients-carousel">
          <?php $web = \App\Province::where(['country_id'=>122,'province_order'=>1])->get(); ?>
          @foreach($web->chunk(2) as $key => $items) 
            <div class="col-md-12">
              @foreach($items as $key => $item)
                <div class="portfolio-wrap">
                  <figure>
                    <a href="{{route('getDest')}}?location={{$item->slug}}" target="_blank" rel="noopener">
                      <img src="{{Content::urlImage($item->province_picture)}}" class="img-fluid" alt="">
                    </a>
                  </figure>
                  <div class="portfolio-info">
                    <h4>{{$item->province_name}}</h4>
                    <p style="height: 5px;"></p>
                  </div>
                </div>
              @endforeach
            </div>
         @endforeach
        </div>
 
      </div>
    </section><!-- #clients -->

