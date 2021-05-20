<header id="header"@if(Route::current()->getName() != 'home') class="header-fixed"@endif>
  <div class="container">

    <div id="logo" class="pull-left">
      <h1>
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME', 'The Event') }}"/>
        </a>
      </h1>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#intro">Home</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#about">Mennu 1</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#speakers">Menu 2</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#schedule">Menu 3</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#venue">Menu 4</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#hotels">Menu 5</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#gallery">Menu 6</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#supporters">Menu 7</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#contact">Menu 8</a></li>
        <li class="buy-tickets"><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#buy-tickets">Menu 9</a></li>
      </ul>
    </nav>
  </div>
</header>
