<header id="header" class="header-fixed">
{{--<header id="header"@if(Route::current()->getName() != 'home') class="header-fixed"@endif>--}}
  <div class="container">

    <div id="logo" class="pull-left">
      <h1>
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME', 'The Event') }}"/>
        </a>
      </h1>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li @if(Route::current()->getName() == 'home') class="menu-active" @endif><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#intro">Home</a></li>
        <li @if(Route::current()->getName() == 'moto-home') class="menu-active" @endif><a href="{{ route('moto-home')}}">Moto Tyres </a></li>
        <li @if(Route::current()->getName() == 'car-home') class="menu-active" @endif><a href="{{ route('car-home')}}">Car Tyres</a></li>
        <li @if(Route::current()->getName() == 'warranty-register-car') class="menu-active" @endif><a href="{{ route('warranty-register-car')}}">Car Warranty</a></li>
        <li @if(Route::current()->getName() == 'warranty-register-moto') class="menu-active" @endif><a href="{{ route('warranty-register-moto')}}">Moto Warranty</a></li>
          @guest
              <li class="buy-tickets"><i class="fa fa-angle-right"></i> <a href="{{ route('login') }}">Login</a></li>
          @endguest
          @auth
              <li class="buy-tickets"><i class="fa fa-angle-right"></i> <a href="{{ route('admin.home') }}">Dashboard</a></li>
          @endauth
      </ul>
    </nav>
  </div>
</header>
