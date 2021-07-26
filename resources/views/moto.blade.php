@extends('layouts.main')

@section('content')
    <!--===============================
=            Moto Slider           =
================================-->
    <section class="section">

        <div class="row">
            <div class="col-md-12">
                <div id="carouselMoto" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($motoSliders as $key => $motoSlider)
                            <li data-target="#carouselMoto" data-slide-to="{{$key}}"
                                class="@if($key==0) active @endif"></li>
                        @endforeach

                    </ol>
                    <div class="carousel-inner">


                        @foreach($motoSliders as $key => $motoSlider)
                            <div class="carousel-item @if($key==0) active @endif">
                                <img class="d-block w-100" src="{{$motoSlider->image->getUrl()}}"
                                     alt="{{ $motoSlider->title ?? '' }}">
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


    <!--===============================
=            Moto Tyre Search          =
================================-->
    <section class="section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Advance Search -->
                    <div class="advance-search">

                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-model-tab" data-toggle="tab"
                                   href="#nav-model" role="tab" aria-controls="nav-model" aria-selected="true">Search By
                                    Model</a>
                                <a class="nav-item nav-link" id="nav-size-tab" data-toggle="tab" href="#nav-size"
                                   role="tab" aria-controls="nav-size" aria-selected="false">Search By Size</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-model" role="tabpanel"
                                 aria-labelledby="nav-model-tab">
                                {{--                                Search Form Stat--}}

                                <form action="{{ route('moto-search-by-model') }}" method="GET">

                                    <div class="form-row">

                                        <div class="form-group col-md-2">
                                            <select name="brand_id" class="form-control form-control-lg" id="brand_id"
                                                    placeholder="Brand">
                                                @foreach ($search_moto_brands as $brand)
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
                                            <select name="model_id" class="form-control form-control-lg" id="model_id"
                                                    placeholder="Select Model">

                                                @foreach ($search_moto_models as $model)
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
                                            <select name="engine_id" class="form-control form-control-lg" id="engine_id"
                                                    placeholder="Engine">
                                                @foreach ($search_moto_engines as $engine)
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

                                <form action="{{ route('moto-search-by-size') }}" method="GET">

                                    <div class="form-row">

                                        <div class="form-group col-md-2">
                                            <select name="width_id" class="form-control form-control-lg" id="width_id"
                                                    placeholder="Width" required>
                                                <option value="">Select Width</option>
                                                @foreach ($search_moto_widths as $width)
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
                                            <select name="ratio_id" class="form-control form-control-lg" id="ratio_id"
                                                    placeholder="Aspect Ratio" required>
                                                <option value="">Select Ratio</option>
                                                @foreach ($search_moto_ratios as $ratio)
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
                                            <select name="size_id" class="form-control form-control-lg" id="size_id"
                                                    placeholder="Select Size" required>
                                                <option value="">Rim Size</option>
                                                @foreach ($search_moto_sizes as $size)
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
            <h1 class="text-lg-center">DISCOVER OUR TYRES</h1>
        </div>
    </section>
    <!--===============================
=          Card Area            =
================================-->
    <section class="section home-category mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div style="background: url({{asset('/images/moto/angel-gt-II-cat-sfondo-4505504730317.jpg')}}) no-repeat center center;" class="card card_car text-center mb-2">
{{--                        <div class="title">--}}
{{--                            <h2>ANGEL CITY</h2>--}}
{{--                        </div>--}}

                        <a href="{{route('car-home')}}">Learn More</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div style="background: url({{asset('/images/moto/diablo-IV-cat-sfondo-en-V2-4505521766442.jpg')}}) no-repeat center center;"  class="card card_moto text-center">
{{--                        <div class="title">--}}
{{--                            <h2>DIABLO IV</h2>--}}
{{--                        </div>--}}

                        <a href="{{route('moto-home')}}">Learn More</a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div style="background: url({{asset('/images/moto/diablo-supercorsa-SP-cat-sfondo-v3-new-4505502645912.jpg')}}) no-repeat center center;"  class="card card_moto text-center">
{{--                        <div class="title">--}}
{{--                            <h2>DIABLO SUPERCORSA</h2>--}}
{{--                        </div>--}}

                        <a href="{{route('moto-home')}}">Learn More</a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div style="background: url({{asset('/images/moto/DiabloRossoCorsaII_BoxImage.jpg')}}) no-repeat center center;" class="card card_moto text-center">
{{--                        <div class="title">--}}
{{--                            <h2>Diablo RossoCorsa II</h2>--}}
{{--                        </div>--}}

                        <a href="{{route('moto-home')}}">Learn More</a>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <!--===============================
=            Moto  Latrst Product Slider           =
================================-->
    <section class="trends">
        <div class="latest_product_background"></div>
        <div class="latest_product_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                        <h2 class="latest_product_title">Latest Tyres</h2>
                        <div class="latest_product_text">
                            <p>Latest Moto Tyres</p>
                        </div>
                        <div class="latest_product_slider_nav">
                            <div class="latest_product_prev latest_product_nav"><i class="fas fa-angle-left ml-auto"></i>
                            </div>
                            <div class="latest_product_next latest_product_nav"><i class="fas fa-angle-right ml-auto"></i>
                            </div>
                        </div>
                </div>
                <div class="col-lg-9">
                    <div class="latest_product_slider_container">
                        <div class="owl-carousel owl-theme latest_product_slider">

                            @if (count($tyres) > 0)
                                @foreach ($tyres as $tyre)
                            <div class="owl-item">
                                <div class="card latest_product_item is_new">
                                    <div class="latest_product_image d-flex flex-column align-items-center justify-content-center">
                                        <img class="img-fluid" alt="" src="@if($tyre->thumbnail){{ $tyre->thumbnail->getUrl() }}@endif"></div>
                                    <div class="latest_product_content">
                                        <div class="latest_product_category"><a href="#">Category</a></div>
                                        <div class="latest_product_info clearfix">
                                            <div class="latest_product_name"><a href="#">{{ $tyre->title ?? '' }}</a></div>
                                            <div class="latest_product_price">{{ $tyre->size ?? '' }}</div>
                                        </div>
                                        <div class="mt-2"><a href="{{ route('moto-tyre', [$tyre->id]) }}" class="btn btn-yellow">VIEW DETAILS</a></div>
                                    </div>
                                    <ul class="latest_product_marks">
                                        <li class="latest_product_mark latest_product_discount">-25%</li>
                                        <li class="latest_product_mark latest_product_new">new</li>
                                    </ul>

                                </div>
                            </div>
                                @endforeach
                            @endif




                        </div>
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
    <!-- partial -->
    <section class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align: center;"class="text-center">SOCIAL <strong>WALL</strong></h2>
                </div>

            </div>
            <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/2465456b2c6f52afa5280be0806aaeff.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
        </div>
    </section>

@endsection



@section('scripts')
    <script type="text/javascript">
        function get_models_by_brand() {
            var brand_id = $('#brand_id').val();

            $.get('{{ route('get_moto_models_by_brand') }}', {
                _token: '{{ csrf_token() }}',
                brand_id: brand_id
            }, function (data) {
                console.log(data);
                $('#model_id').html(null);


                $('#model_id').append('<option value="">Select Model</option>')
                for (var i = 0; i < data.length; i++) {
                    $('#model_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].model
                    }));
                }

            });
        }

        $('#brand_id').on('change', function () {
            get_models_by_brand();
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
