@extends('layouts.main')

@section('content')
    <!--===============================
=            Home Slider           =
================================-->
    <section class="home-slider">
        <div class="container-fluid">
                    <div class="row">
            <div class="col-md-12">
                <div style="margin: 0 -15px;" id="carouselMoto" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($homeSliders as $key => $homeSlider)
                            <li data-target="#carouselMoto" data-slide-to="{{$key}}"
                                class="@if($key==0) active @endif"></li>
                        @endforeach

                    </ol>
                    <div class="carousel-inner">


                        @foreach($homeSliders as $key => $homeSlider)
                            <div class="carousel-item @if($key==0) active @endif">
                                <img class="d-block w-100" src="{{$homeSlider->image->getUrl() ?? ''}}"
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
                               <a href="https://www.facebook.com/bdpirelli" class="facebook"><i class="fa fa-facebook"></i></a>
                               <a href="https://www.instagram.com/pirellibd/" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/pirellibd" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section section="section" style="padding:50px 0;">
        <div class="container">
            <h1 class="text-lg-center">ARE YOU LOOKING <span>FOR TYRES?</span></h1>
        </div>
    </section>
    <!--===============================
=          Card Area            =
================================-->
    <section class="section home-category two-cards mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div style="width:100%;" class="card card_car text-center mb-2">
                        <div class="title">
                            <h2>CAR TYRES</h2>
                        </div>

                        <a style="left: 35%;" href="{{route('car-home')}}">Learn More</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card_moto text-center">
                        <div class="title">
                            <h2>MOTO TYRES</h2>
                        </div>

                        <a style="left: 35%;" href="{{route('moto-home')}}">Learn More</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
       
    <section class="section car-tyre-technology-section">
            <div class="container">
                 <h3 style="font-family:'gotham-black', sans-serif;color:#fff;font-weight:bold;" class="mb-5">TECHNOLOGY</h3>
                <div class="row">
                    <div class="col-md-12">
                        
                        
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-runflat-tab" data-toggle="pill" href="#pills-runflat" role="tab" aria-controls="pills-runflat" aria-selected="true">Run Flat</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-pncs-tab" data-toggle="pill" href="#pills-pncs" role="tab" aria-controls="pills-pncs" aria-selected="false">PNCS</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-seal-tab" data-toggle="pill" href="#pills-seal" role="tab" aria-controls="pills-seal" aria-selected="false">SEAL INSIDE</a>
                      </li>
                </ul>
                
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-runflat" role="tabpanel" aria-labelledby="pills-runflat-tab">
                       <div class="row">
                               <div class="col-md-8">
                                   <h1 class="technology-title mt-3">DRIVE WITHOUT PRESSURE</h1>
                                   <p class="technology-text">RUN FLAT™ tyres mean safety. They provide greater control of the carin emergency conditions and allow you to continue driving safely evenduring a rapid loss of inflation pressure.</p>
                                   <a id="play-video" class="btn btn-primary btn-lg video-popup play-video-btn" href="https://www.youtube.com/watch?v=PzmTRLEkKcY">PLAY VIDEO  <i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                   <a class="btn btn-secondary btn-lg learn-more-btn" href="">LEARN MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                               </div>
                               <div class="col-md-4"><img class="img-fluid" src="{{asset('/images/car/car-tyre-technology.webp')}}"></div>
                          </div>
                  </div>
                  <div class="tab-pane fade" id="pills-pncs" role="tabpanel" aria-labelledby="pills-pncs-tab">
                            <div class="row">
                                <div class="col-md-8">
                                   <h1 class="technology-title mt-3">COMFORTABLE DRIVING</h1>
                                   <p class="technology-text">The PIRELLI NOISE CANCELLING SYSTEM™ (PNCS) is a technology able to reduce the noise inside the vehicle thanks to a sound absorbing device applied to the inside circumferential wall of the tyre, reducing noise by half.</p>
                                   <a id="play-video" class="btn btn-primary btn-lg video-popup play-video-btn" href="https://www.youtube.com/watch?v=KMtVuLA08kI">PLAY VIDEO  <i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                   <a class="btn btn-secondary btn-lg learn-more-btn" href="">LEARN MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                               </div>
                               <div class="col-md-4">
                                   <img class="img-fluid" src="{{asset('/images/car/cut-pncs-technology-4505515054281.webp')}}">
                               </div>
                          
                         </div>
                  </div>
                  <div class="tab-pane fade" id="pills-seal" role="tabpanel" aria-labelledby="pills-seal-tab">
                       <div class="row">
                                <div class="col-md-8">
                                   <h1 class="technology-title mt-3">PUNCTURE PROOF</h1>
                                   <p class="technology-text">SEAL INSIDE™ is a new tyre construction technology that allows to drive on without losing air pressure even after the tyre has been punctured by an external object, covering almost 85% of the possible accidental causes of pressure loss.</p>
                                   <a id="play-video" class="btn btn-primary btn-lg video-popup play-video-btn" href="https://www.youtube.com/watch?v=_WlcUry5IYY">PLAY VIDEO  <i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                   <a class="btn btn-secondary btn-lg learn-more-btn" href="">LEARN MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                               </div>
                               <div class="col-md-4">
                                   <img class="img-fluid" src="{{asset('/images/car/cut-seal-inside-technology-4505515066257.webp')}}">
                               </div>
                          
                         </div>
                  </div>
                </div>
                
                </div>
            </div>
        </div>
                
</section>

    <!--===============================
=          Call To Action            =
================================-->
    <section id="home-cta" class="pb-5  call-to-action">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-md-12 text-center">
                    <h2 class="my-3">Choose Pirelli and Take Control</h2>
                       <a style="color:#000;font-weight:400;" class="btn btn-info-gradiant btn-md rounded-pill mt-3" href="{{route('car-home')}}"><span>Learn More</span></a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                 
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>
    
    

    <!-- partial -->
    <section class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align: center;" class="text-center">SOCIAL <span>WALL</span></h2>
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

