@extends('layouts.main')

@section('content')
    <!--===============================
=            Home Slider           =
================================-->
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselMoto" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($homeSliders as $key => $homeSlider)
                            <li data-target="#carouselMoto" data-slide-to="{{$key}}"
                                class="@if($key==0) active @endif"></li>
                        @endforeach

                    </ol>
                    <div class="carousel-inner">


                        @foreach($homeSliders as $key => $homeSlider)
                            <div class="carousel-item @if($key==0) active @endif">
                                <img class="d-block w-100" src="{{$homeSlider->image->getUrl()}}"
                                     alt="{{ $homeSlider->title ?? '' }}">
                            </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carouselMoto" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselMoto" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


            </div>
        </div>


    </section>

    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="content">

                        <form action="{{ url('newsletter') }}" method="post">
                            <div class="input-group">
                                <input type="email" name="user_email" id="email" class="form-control"
                                       placeholder="Enter your email" required>

                                {{ csrf_field() }}
                                <span class="input-group-btn">
         <button class="btn" type="submit">Subscribe Now</button>
         </span>
                            </div>
                        </form>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="content">
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
    </section>

    <section section="section" style="padding:50px 0;">
        <div class="container">
            <h1 class="text-lg-center">ARE YOU LOOKING FOR TYRES?</h1>
        </div>
    </section>
    <!--===============================
=          Card Area            =
================================-->
    <section class="section home-category mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card_car text-center mb-2">
                        <div class="title">
                            <h2>CAR TYRES</h2>
                        </div>

                        <a href="{{route('car-home')}}">Learn More</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card_moto text-center">
                        <div class="title">
                            <h2>MOTO TYRES</h2>
                        </div>

                        <a href="{{route('moto-home')}}">Learn More</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===============================
=          Call To Action            =
================================-->
    <section class="py-5  call-to-action">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-md-12 align-self-center">
                    <h1 class="my-3">Awesome with Ordinary Flexibility</h1>
                    <h4 class="mt-3">A NEW PATH FOR ADVENTURE.</h4>
                    <a class="btn btn-info-gradiant btn-md rounded-pill mt-3" href="#f32"><span>Learn More</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- partial -->
    <section class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align: center;" class="text-center">SOCIAL <strong>WALL</strong></h2>
                </div>

            </div>
            <!-- LightWidget WIDGET -->
            <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
            <iframe src="//lightwidget.com/widgets/2465456b2c6f52afa5280be0806aaeff.html" scrolling="no"
                    allowtransparency="true" class="lightwidget-widget"
                    style="width:100%;border:0;overflow:hidden;"></iframe>
        </div>
    </section>




@endsection

