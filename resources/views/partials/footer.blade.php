<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME', 'The Event') }}"/>
            </a>
            <p>Asian Automotives Limited is the official distributor of Pirelli Motorcycles & Car Tyres in Bangladesh since 2019. We offer variety types of motorcycle tyres,aftersales service. Our online service will provide you the information and the product you need.</p>

        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            @guest
              <li><i class="fa fa-angle-right"></i> <a href="{{ route('login') }}">Login</a></li>
            @endguest
            @auth
              <li><i class="fa fa-angle-right"></i> <a href="{{ route('admin.home') }}">Admin Panel</a></li>
            @endauth
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            @guest
              <li><i class="fa fa-angle-right"></i> <a href="{{ route('login') }}">Login</a></li>
            @endguest
            @auth
              <li><i class="fa fa-angle-right"></i> <a href="{{ route('admin.home') }}">Admin Panel</a></li>
            @endauth
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <p>
           Footer Address<br>
            <strong>Phone:</strong> 01844495120<br>
            <strong>Email:</strong> ratan.mia@continental-motor.com<br>
          </p>

          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>{{ env('APP_NAME', 'TheEvent') }}</strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="#">Ratan Mia</a>
    </div>
  </div>
</footer><!-- #footer -->
