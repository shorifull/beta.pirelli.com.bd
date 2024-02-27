<footer id="footer">
  <div class="footer">
       <div class="container">
    <div class="row">

     <div class="col-lg-3 col-md-6 footer-info">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME', 'Pirelli Bangladesh') }}"/>
            </a>
            <p>Asian Automotives Limited is the official distributor of Pirelli Motorcycles & Car Tyres in Bangladesh since 2019. We offer variety types of motorcycle tyres,aftersales service. Our online service will provide you the information and the product you need.</p>
 <br>
 <img  class="img-fluid" width="300" height="auto" src="{{asset("/images/ssl-payment-banner.webp")}}">
        </div>

  

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>USEFUL LINKS</h4>
          <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('car-home')}}">Car Tyre</a></li>
             <li><a href="{{route('moto-home')}}">Moto Tyre</a></li>
             <li><a href="{{route('about')}}">About US</a></li>
               <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
            <li><a href="{{route('terms-conditions')}}">Terms and Conditions</a></li>
             <li><a href="{{route('return-refund-policy')}}">Return and Refund Policy</a></li>
            
         
             
         
          </ul>
        </div>
        
             <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Contact US</h4>
                  <p style="font-size:14px;">
           277, Tejgaon I/A, Dhaka-1208
            <strong>Phone:</strong> <a style="color:white;" href="tel:01400-440440">01400-440440</a>
            <strong>Email:</strong> info@pirelli.com.bd<br>
          </p>
                 <div class="social-links">
                <a href="https://www.facebook.com/bdpirelli" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/pirellibd/" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/pirellibd" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>

        </div>
        <div class="col-lg-3 col-md-6">
      <div class="fb-page" data-href="https://www.facebook.com/bdpirelli/" data-tabs="timeline" data-width="" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bdpirelli/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bdpirelli/">Pirelli Bangladesh</a></blockquote></div>

        </div>
        
        
     

      </div>
    </div>
  </div>
  

  <div class="container">
    
    <div class="copyright">
      
      &copy; Copyright <strong>{{ env('APP_NAME', 'Pirelli Bangladesh') }}</strong>. All Rights Reserved
    </div>
    <div class="credits">
    
    </div>
  </div>
</footer><!-- #footer -->
