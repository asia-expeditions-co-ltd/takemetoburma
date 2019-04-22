<footer class="footer" style="margin-bottom: 0px;">
	<div class="container">
		<div class="col-md-4 col-xs-4 full">
			<address>
                <strong>Head Office: </strong><br>
               	 Anawrahtar Road, Pazundaung Township, Yangon 11171, Myanmar (Burma)<br>		                
                <abbr title="Phone">
                <i class="fa fa-phone-square"></i>&nbsp;+95 (9) 401 533 484  <br> 
                <!-- <abbr title="Phone">Hotline: -->
                
                <i class="fa fa-envelope-o"></i> info@takemtoburma.com
            </address>	            
		</div>			
		<div class="col-md-1"></div>		
		<div class="col-md-4 col-xs-8 full">
			<div><label><h3>Connect With Us</h3></label></div>
	<!-- 		<div>
				<a href="#"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="#"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="#"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
        	</div> -->
<div style="margin-top: 15px;">

@if (session('message'))
	<script type="text/javascript"> alert('{{ session("message")}}');</script>
@endif

        		 <form action="{{route('subscribe')}}" method="post">
              
        		 	{{csrf_field() }}
  <div class="input-group ">
    <input type="hidden" name="subscribe" value="subscriber">
    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope-o"></i></span>
     <input class="form-control " name="email" type="email" placeholder="your email" aria-label="email" required="">
         <span class="input-group-btn" >
                           <input type="submit" value="Subscribe Now" class="btnsub1 btnsub2">
                        </span>
    </div>
  </form>

  </div>
		</div>
		

	
		<div class="clearfix"></div>
		<hr style="border-top: 1px solid rgba(238, 238, 238, 0.23);">
		<div class="copyright">
		    <div class="container">
		        <div class="col-md-12 col-xs-12 text-center">
		          <p>Copyright © 2018, {{config('app.title')}}</p>
		        </div>
		    </div>
		 <!--    <div>
		     	<a id="goTotop" style="position: fixed; right: 19px; display: block; font-size: 35px; z-index: 2;" href="javascript:void(0)"><span class="fa fa-chevron-circle-up"></span>
		     	</a>
		    </div> -->
			<div class="clearfix"></div>
		</div>
	</div>

	<button onclick="topFunction()" id="myBtn"><a><span class="fa fa-chevron-circle-up"></span></a></button>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</footer>
