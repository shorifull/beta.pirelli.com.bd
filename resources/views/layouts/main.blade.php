<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME', 'Pirelli Bangladesh') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png" sizes="16x16">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Lato:400,700' type='text/css' />
    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.11.2/css/all.css?wpfas=true' type='text/css' />
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css?wpfas=true' type='text/css' />

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/icomoon/style.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Select 2 js -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nivo-lightbox.css') }}" rel="stylesheet">
    <script async src="https://www.google.com/recaptcha/api.js">

    @yield('styles')

</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=273903454119119&autoLogAppEvents=1" nonce="bT0HozDW"></script>
    @include('partials.header')
    @yield('content')

    @include('partials.footer')

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>

    <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
    <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel2.thumbs.min.js') }}"></script>


    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('js/contactform.js') }}"></script>





    <!-- Template Main Javascript File -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    @yield('scripts')
    @yield('script1')
    @yield('script2')
</body>

</html>
