@extends('layouts.main')

@section('content')

    <!--===============================
=            Car Slider           =
================================-->
    <section class="section">
        <div class="container-fluid">
                 <div class="row">
            <div class="col-md-12">
                <div style="margin: 0 -15px;" id="carouselMoto" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($carSliders as $key => $carSlider)
                            <li data-target="#carouselMoto" data-slide-to="{{$key}}"
                                class="@if($key==0) active @endif"></li>
                        @endforeach

                    </ol>
                    <div class="carousel-inner">


                        @foreach($carSliders as $key => $carSlider)
                            <div class="carousel-item @if($key==0) active @endif">
                                <img class="d-block w-100" src="{{$carSlider->image->getUrl() ?? ''}}"
                                     alt="{{ $carSlider->title ?? '' }}">
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
    <section class="section">
        <!-- Container Start -->
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <!-- Advance Search -->
                    <div class="advance-search">

                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-model-tab" data-toggle="tab" href="#nav-model" role="tab" aria-controls="nav-model" aria-selected="true">Search By Model</a>
                                <a class="nav-item nav-link" id="nav-size-tab" data-toggle="tab" href="#nav-size" role="tab" aria-controls="nav-size" aria-selected="false">Search By Size</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-model" role="tabpanel" aria-labelledby="nav-model-tab">
{{--                                Search Form Stat--}}

                                <form action="{{ route('search') }}" method="GET">

                                    <div class="form-row">

                                        <div class="form-group col-md-2">
                                            <select name="brand_id" class="form-control form-control-lg" id="brand_id" placeholder="Brand" required>
                                                <option val="">Select brand</option>
                                                @foreach ($search_brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                            @if($errors->has('brand_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('brand_id') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-2">
                                            <select name="model_id" class="form-control form-control-lg" id="model_id" placeholder="Select Model" required>
                                                 <option val="">Select model</option>
                                                @foreach ($search_models as $model)
                                                    <option value="{{ $model->id }}">{{ $model->model }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                            @if($errors->has('model_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('model_id') }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-2">
                                            <select name="year_id" class="form-control form-control-lg" id="year_id" placeholder="Year">
                                                 <option val="">Select year</option>
                                                @foreach ($search_years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                            @if($errors->has('year_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('year_id') }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-2">
                                            <select name="engine_id" class="form-control form-control-lg" id="engine_id" placeholder="Engine">
                                                 <option val="">Select engine</option>
                                                @foreach ($search_engines as $engine)
                                                    <option value="{{ $engine->id }}">{{ $engine->engine }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                            @if($errors->has('engine_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('engine_id') }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button type="submit"
                                                    class="btn btn-yellow">
                                                Search Now
                                            </button>
                                        </div>
                                    </div>

                                </form>
{{--                                End Search Form--}}
                            </div>
                            <div class="tab-pane fade" id="nav-size" role="tabpanel" aria-labelledby="nav-size-tab">
{{--                                Search Form Start--}}

                                <form action="{{ route('car-search-by-size') }}" method="GET">

                                    <div class="form-row">

                                        <div class="form-group col-md-2">
                                            <select name="width_id" class="form-control form-control-lg" id="width_id" placeholder="Width" required>
                                                <option value="">Select Width</option>
                                                @foreach ($search_widths as $width)
                                                    <option value="{{ $width->id }}">{{ $width->width }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                            @if($errors->has('width_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('width_id') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-2">
                                            <select name="ratio_id" class="form-control form-control-lg" id="ratio_id" placeholder="Aspect Ratio" required>
                                                <option value="">Select Ratio</option>
                                                @foreach ($search_ratios as $ratio)
                                                    <option value="{{ $ratio->id }}">{{ $ratio->ratio }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                            @if($errors->has('ratio_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('ratio_id') }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-2">
                                            <select name="size_id" class="form-control form-control-lg" id="size_id" placeholder="Select Size" required>
                                                <option value="">Rim Size</option>
                                                @foreach ($search_sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                            @if($errors->has('size_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('size_id') }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button type="submit"
                                                    class="btn btn-yellow">
                                                Search Now
                                            </button>
                                        </div>
                                    </div>

                                </form>
                                {{--                                End Search Form--}}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    
   <section section="section" style="padding:50px 0;">
        <div class="container">
            <h1 class="text-lg-center">TYRE <span>RANGE</span></h1>
        </div>
    </section>
    <!--===============================
=          Card Area            =
================================-->
    <section class="section home-category mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div style="background: url({{asset('/images/car/p1.png')}}) no-repeat center center;background-size:contain; min-width: 271px;min-height: 371px;" class="card card_car text-center mb-2">


                        <div class="car-card-btn"><a href="{{ route('pzero')}}">Learn More</a></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div style="background: url({{asset('/images/car/p7.png')}}) no-repeat center center;background-size:contain; min-width: 271px;min-height: 371px;"  class="card card_car text-center">


                       <div class="car-card-btn"> <a href="{{ route('cinturato-p7')}}">Learn More</a></div>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div style="background: url({{asset('/images/car/pzero.png')}}) no-repeat center center;background-size:contain; min-width: 271px;min-height: 371px;"  class="card card_car text-center">


                       <div class="car-card-btn"> <a href="{{ route('pzero')}}">Learn More</a></div>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div style="background: url({{asset('/images/car/Scorpion.png')}}) no-repeat center center;background-size:contain; min-width: 271px;min-height: 371px;" class="card card_car text-center">


                     <div class="car-card-btn"> <a href="{{ route('scorpion')}}">Learn More</a></div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    
    
        <!--===============================
=          Card Area            =
================================-->
    <section class="section home-category two-cards mb-3">
        <div class="container">
            <div class="row">
              
                
                <div class="col-md-6">
                    <div style="background: url({{asset('/images/car/two-card-left.png')}}) no-repeat center center;"  class="card-car text-center">
                        
                        <div class="hover-box">
                            <h3 style="color:#fff;" class="title">PIRELLI FOR <span style="font-weight:800;color:#fff;">PRESTIGE CARS</span></h3>
                          <p style="color:#fff;" class="text">Discover the exclusive partnerships between Pirelli and the world’s most renowned prestige car manufacturers</p>
                          <a href="#">Learn More</a>
                        </div>
                          
                    </div>
                    
                </div>
                
                <div class="col-md-6">
                    <div style="background: url({{asset('/images/car/two-card-right.png')}}) no-repeat center center;"  class="card-car text-center">
                        <div class="hover-box">
                            <h3 style="color:#fff;" class="title">CUSTOM-MADE <span style="font-weight:800;color:#fff;">FOR YOUR CAR</span></h3>
                          <p style="color:#fff; class="text">Discover the synergy between Pirelli and the best car manufacturers through dedicated technologies, processes and materials to create the perfect tyre for your car</p>
                          <a href="#">Learn More</a>
                        </div>
                          
                    </div>
                </div>
                

            </div>

        </div>
    </section>
    

    <!--===============================
=            Car  Latrst Product Slider           =
================================-->
<!--    <section class="trends">-->
<!--        <div class="latest_product_background"></div>-->
<!--        <div class="latest_product_overlay"></div>-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-3">-->
<!--                    <h2 class="latest_product_title">Latest Tyres</h2>-->
<!--                    <div class="latest_product_text">-->
<!--                        <p>Latest Moto Tyres</p>-->
<!--                    </div>-->
<!--                    <div class="latest_product_slider_nav">-->
<!--                        <div class="latest_product_prev latest_product_nav"><i class="fas fa-angle-left ml-auto"></i>-->
<!--                        </div>-->
<!--                        <div class="latest_product_next latest_product_nav"><i class="fas fa-angle-right ml-auto"></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-9">-->
<!--                    <div class="latest_product_slider_container">-->
<!--                        <div class="owl-carousel owl-theme latest_product_slider">-->

<!--                            @if (count($tyres) > 0)-->
<!--                                @foreach ($tyres as $tyre)-->
<!--                                    <div class="owl-item">-->
<!--                                        <div class="card latest_product_item is_new">-->
<!--                                            <div class="latest_product_image d-flex flex-column align-items-center justify-content-center">-->
<!--                                                <img class="img-fluid" alt="" src="@if($tyre->thumbnail){{ $tyre->thumbnail->getUrl() }}@endif"></div>-->
<!--                                            <div class="latest_product_content">-->
<!--                                                <div class="latest_product_category"><a href="#">Category</a></div>-->
<!--                                                <div class="latest_product_info clearfix">-->
<!--                                                    <div class="latest_product_name"><a href="#">{{ $tyre->title ?? '' }}</a></div>-->
<!--{{--                                                    <div class="latest_product_price">{{ $tyre->size ?? '' }}</div>--}}-->

<!--                                                </div>-->
<!--                                                <div class="mt-2"><a href="{{ route('car-tyre', [$tyre->id]) }}" class="btn btn-yellow">VIEW DETAILS</a></div>-->
<!--                                            </div>-->
<!--                                            <ul class="latest_product_marks">-->
<!--                                                <li class="latest_product_mark latest_product_discount">-25%</li>-->
<!--                                                <li class="latest_product_mark latest_product_new">new</li>-->
<!--                                            </ul>-->

<!--                                        </div>-->
<!--                                    </div>-->
<!--                                @endforeach-->
<!--                            @endif-->




<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

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

    <!--===============================
=          Call To Action            =
================================-->
    <section id="home-cta" class="pb-5  call-to-action">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-md-12 text-center">
                    <h1 class="my-3">Choose Pirelli and Take Control</h1>
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
                    <h2 style="text-align: center;"class="text-center">SOCIAL <span>WALL</span></h2>
                </div>

            </div>
            <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/2465456b2c6f52afa5280be0806aaeff.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
        </div>
    </section>
@endsection


@section('scripts')
    <script type="text/javascript">
        function get_models_by_brand(){
            var brand_id = $('#brand_id').val();

            $.get('{{ route('modelcombinations.get_models_by_brand') }}',{_token:'{{ csrf_token() }}', brand_id:brand_id}, function(data){
                   $('#model_id').html(null);
                $('#year_id').html(null);
                $('#engine_id').html(null);
            

                $('#model_id').append('<option value="">Select Model</option>')
                $('#year_id').append('<option value="">Select Year</option>')
                $('#engine_id').append('<option value="">Select Engine</option>')
                
                for (var i = 0; i < data.length; i++) {
                    $('#model_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].model
                    }));
                }

            });
        }

        $('#brand_id').on('change', function() {
            get_models_by_brand();
        });

        $('#model_id').on('change', function() {
            var model_id = $('#model_id').val();

            $.get('{{ route('modelcombinations.get_years_by_model') }}',{_token:'{{ csrf_token() }}', model_id:model_id}, function(data){
                console.log(data);
                $('#year_id').html(null);
                $('#engine_id').html(null);
                $('#engine_id').append('<option value="">Select Engine</option>')

                $('#year_id').append('<option value="">Select Year</option>')
                for (var i = 0; i < data.length; i++) {
                    $('#year_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].year
                    }));

                }
            });
        });

        $('#year_id').on('change', function() {
            var year_id = $('#year_id').val();
            var model_id = $('#model_id').val();

            $.get('{{ route('modelcombinations.get_engines_by_year') }}',{_token:'{{ csrf_token() }}', year_id:year_id, model_id:model_id}, function(data){
                console.log(data);
                $('#engine_id').html(null);

                $('#engine_id').append('<option value="">Select Engine</option>')
                for (var i = 0; i < data.length; i++) {
                    $('#engine_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].engine
                    }));

                }
            });
        });

        function filter() {
            $('#search-form').submit();
        }
        $(document).ready(function () {

            if ($('.latest_product_slider').length) {
                var trendsSlider = $('.latest_product_slider');
                trendsSlider.owlCarousel(
                    {
                        loop: false,
                        margin: 30,
                        nav: false,
                        dots: false,
                        autoplayHoverPause: true,
                        autoplay: false,
                        responsive:
                            {
                                0: {items: 1},
                                575: {items: 2},
                                991: {items: 3}
                            }
                    });

                trendsSlider.on('click', '.latest_product_fav', function (ev) {
                    $(ev.target).toggleClass('active');
                });

                if ($('.latest_product_prev').length) {
                    var prev = $('.latest_product_prev');
                    prev.on('click', function () {
                        trendsSlider.trigger('prev.owl.carousel');
                    });
                }

                if ($('.latest_product_next').length) {
                    var next = $('.latest_product_next');
                    next.on('click', function () {
                        trendsSlider.trigger('next.owl.carousel');
                    });
                }
            }


        });

    </script>
@endsection
