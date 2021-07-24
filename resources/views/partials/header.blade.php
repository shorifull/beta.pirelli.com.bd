<header class="site-navbar" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME', 'The Event') }}"/>
        </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li @if(Route::current()->getName() == 'home') class="active" @endif><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}"><span>Home</span></a></li>
                <li class="has-children">
                  <a href="{{ route('car-home')}}"><span>Car Tyres</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="{{ route('car-home')}}">Find Tyres</a></li>
                    <li><a href="{{ route('car-home')}}">By Model</a></li>
                    <li><a href="{{ route('car-home')}}">By Size</a></li>
                    <li class="has-children">
                      <a href="#">Dropdown</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                        <li><a href="#">Menu Four</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
               
                <li @if(Route::current()->getName() == 'moto-home') class="menu-active" @endif><a href="{{ route('moto-home')}}"><span>Moto Tyres</span></a></li>
                <li @if(Route::current()->getName() == 'warranty-register-car') class="menu-active" @endif><a href="{{ route('warranty-register-car')}}"><span>Car Warranty</span></a></li>
                <li @if(Route::current()->getName() == 'warranty-register-moto') class="menu-active" @endif><a href="{{ route('warranty-register-moto')}}"><span>Moto Warranty</span></a></li>
                  @guest
                      <li class="buy-tickets"><i class="fa fa-angle-right"></i> <a href="{{ route('login') }}">Login</a></li>
                  @endguest
                  @auth
                      <li class="buy-tickets"><i class="fa fa-angle-right"></i> <a href="{{ route('admin.home') }}">Dashboard</a></li>
                  @endauth
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>
      <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
