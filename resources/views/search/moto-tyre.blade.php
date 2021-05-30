@extends('layouts.main')

@section('content')
    <div class="section" class="section">
        <div class="row">
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('moto-home')}}">Moto</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tyre Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <section class="py-5 bg-light tyre-details">
        <div class="container">
            <!-- Row  -->
            <div class="row ">
                <div class="col-lg-6">
                    <img src="@if($tyre->thumbnail){{ $tyre->thumbnail->getUrl() }}@endif" class="img-fluid"
                         alt="wrappixel"/>
                </div>
                <div class="col-lg-6">
                    <div class="">
                        <span class="badge badge-info rounded-pill px-3 py-1 font-weight-light">Pirelli Moto Tyre</span>
                        <h3 class="my-3 text-uppercase">{{ $tyre->title ?? '' }}</h3>
                        <p class="op-8">{!! $tyre->long_description !!}</p>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card card-shadow border-0 mb-3">
                                    <div class="card-body">
                                        <div class="row p-3">
                                            <div class="col-6 border-right">
                                                <h3 class="mb-0 font-weight-light">BRAND</h3>
                                                <h6 class="text-muted font-weight-light">{{ $tyre->moto_brand->brand ?? '' }}</h6>
                                            </div>
                                            <div class="col-6 text-right border-left">
                                                <h3 class="mb-0 font-weight-light">MODEL</h3>
                                                <h6 class="text-muted font-weight-light">{{ $tyre->moto_model->model ?? '' }}</h6>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <a class="btn btn-success-gradiant btn-md btn-block" href="#f34"><span>Contact Now</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </section>

    <!-- Video Banner -->
    <section id="video-banner" class="section"
             style="background-image:url(@if($tyre->banner){{ $tyre->banner->getUrl()}}@endif)">
        <div class="container right-position">
            <!-- Start Row -->
            <div class="row">'
                <div class="col-md-12 col-sm-12">
                    <div class="video-promo-content text-center">

                        <a id="play-video" class="video-play-button video-popup" href="{{ $tyre->video ?? '' }}">
                            <span></span>
                        </a>

                    </div>
                </div>
            </div>
            {{--End Row--}}
        </div>
    </section>
    <!-- Video Banner -->
    <div class="section tyre-bottom-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4"><a href="#features">Features</a></div>
                <div class="col-md-4"><a href="#specifications">Specifications</a></div>
                <div class="col-md-4"><a href="#warranty">Warranty</a></div>
            </div>
        </div>
    </div>

    <section id="features" class="tyre-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {!! $tyre->features !!}
                </div>
            </div>
        </div>
    </section>
{{--    <section id="specifications">Specifications</section>--}}


    <section id="warranty" class="py-5 bottom-cta">
        <div class="container">
            <!-- Row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="mb-3 text-dark font-weight-bold">WARRANTY</h2>
                    <p class="font-weight-medium text-dark op-8">This product is covered by our standard 5 year manufacture warranty </p>
                    <a class="btn btn-danger-gradiant btn-md border-0 text-white mt-3 text-uppercase" href="#"><span>Find Out More</span></a>
                </div>
            </div>
            <!-- Row -->
        </div>
    </section>

@stop

@section('scripts')
    <script type="text/javascript">
        $('.video-popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });

        $('ul.nav').find('a').click(function () {
            var $href = $(this).attr('href');
            var $anchor = $('#' + $href).offset();
            $('body').animate({scrollTop: $anchor.top});
            return false;
        });

    </script>

@endsection
