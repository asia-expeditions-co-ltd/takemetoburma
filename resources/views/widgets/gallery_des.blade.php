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
          @foreach($webs->chunk(2) as $key => $items)
            <div class="col-md-12" style="padding-right: 1px;">
              @foreach($items as $key => $tour)
                <div class="portfolio-wrap">
                  <figure>
                    <a href="{{route('tourDetails', ['url'=> $tour->slug])}}" target="_blank" rel="noopener">
                      <img src="{{Content::urlImage($tour->photo)}}" class="img-fluid" alt="">
                    </a>
                  </figure>
                  <div class="portfolio-info">
                    <p style="height: 5px;"></p>
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
 
      </div>
    </section><!-- #clients -->    