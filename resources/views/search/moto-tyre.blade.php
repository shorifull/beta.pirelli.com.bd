@extends('layouts.main')

@section('content')

            
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('car-home')}}">Car</a></li>
     <li class="breadcrumb-item active" aria-current="page">Tyre Details</li>
  </ol>
</nav>




    <section class="py-5 bg-light tyre-details">
        <div class="container">
            <!-- Row  -->
            <div class="row ">
                <div class="col-lg-6">
                
                    <div id="gallery" class="owl-carousel">
                       
                       @if($tyre->thumbnail)
                       <div data-thumb="{{ $tyre->thumbnail->getUrl() }}">
                                <img class="d-block w-100" src="{{ $tyre->thumbnail->getUrl() }}"
                                     alt="1">
                            </div>
                            
                      @endif
                            
                            
                     @foreach($tyre->gallery as $key => $productGallery)
                            <div class="item" data-thumb="{{ $tyre->thumbnail->getUrl() }}">
                                <img class="d-block w-100" src="{{$productGallery->getUrl() ?? ''}}"
                                     alt="1">
                            </div>
                        @endforeach
                 
                </div>
         
                                         
                         
                         
                         
                         
                         
                </div>
                <div class="col-lg-6">
                    <div class="">
                        
                        <h3 class="my-3 text-uppercase">{{ $tyre->title ?? '' }}</h3>
                        <p>{{ $tyre->tagline}}</p>
                        <p class="op-8">{!! $tyre->short_description !!}</p>
                        
                        <p class="op-8">{!! $tyre->long_description !!}</p>
                        
                        <div class="row mt-3">
                            <div class="col-md-12">
                                    <div class="div">
                                        <div class="row">
                                        
                                            <div class="col-lg-12 text-center mt-2">
                                                <a class="btn get-quote-btn" href="{{route('contact')}}"><span>Get Quote</span></a>
                                                 <a class="btn call-now-btn" href="tel:+01400-440440"><span>Call Now</span></a>
                                                 <a class="btn find-dealer-btn" href="{{ route('moto-retailer-list')}}"><span>Find Your Dealer</span></a>
                                            </div>
                                         
                                            
                                        </div>
                                        <!--<div class="row mt-2">-->
                                        <!--    <div class="col-lg-12 text-center">-->
                                        <!--        <a class="btn btn-lg find-dealer-btn" href="{{ route('car-retailer-list')}}"><span>Find Your Dealer</span></a>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </section>




<div class="section tyre-bottom-section">    
    <div class="container">
         
          
        <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                         <li class="nav-item">
    <a class="nav-link" id="pills-applications-tab" data-toggle="pill" href="#pills-applications" role="tab" aria-controls="pills-applications" aria-selected="true">Moto Applications</a>
  </li>
                 <li class="nav-item">
                <a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="false">Specifications</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features" aria-selected="true">Features</a>
              </li>
  
           
              <li class="nav-item">
                <a class="nav-link" id="pills-advantages-tab" data-toggle="pill" href="#pills-advantages" role="tab" aria-controls="pills-advantages" aria-selected="false">Advantages</a>
              </li>
            </ul>
    
    </div>
</div>
<section class="section tyre-bottom-section-content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
                    <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="pills-applications" role="tabpanel" aria-labelledby="pills-applications-tab">
                        <ul>
                            @if($tyre->moto_model)
                                                   
                                                        <li>{{ $tyre->moto_brand->brand ?? '' }} ({{ $tyre->moto_model->model ?? '' }} {{ $tyre->moto_engine->engine ?? '' }})
                                                 
                                                        
                                                        </li>
                                                  
                                                @endif
                     </ul>
              </div>
              <div class="tab-pane fade show active" id="pills-features" role="tabpanel" aria-labelledby="pills-features-tab"> {!! $tyre->features !!}</div>
              <div class="tab-pane fade" id="pills-specifications" role="tabpanel" aria-labelledby="pills-specifications-tab">{!! $tyre->specifications !!}</div>
              <div class="tab-pane fade" id="pills-advantages" role="tabpanel" aria-labelledby="pills-advantages-tab">
                    {!! $tyre->advantages !!}
              </div>
            </div>
        </div>
    </div>
</div>
</section>

   <section id="warranty" class="py-3 bottom-cta">
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-3 text-dark font-weight-bold">WARRANTY</h2>
                    <p class="font-weight-medium text-dark op-8">This product is covered by our standard 6 months manufacture warranty </p>
                    
                </div>
                <div class="col-md-4">
                    
                     <a class="btn btn-secondary btn-lg learn-more-btn mt-4" href="{{ route('warranty-register-car')}}">Find Out More <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- Row -->
        </div>
    </section>
    
@if($tyre->technology_runflat == 1 ||  $tyre->technology_pncs == 1 || $tyre->technology_seal_inside == 1 )
    <section class="section car-tyre-technology-section">
            <div class="container">
                 <h3 style="font-family:'gotham-black', sans-serif;color:#fff;font-weight:bold;" class="mb-5">TECHNOLOGY</h3>
                <div class="row">
                    <div class="col-md-12">
                        
                        
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @if($tyre->technology_runflat == 1)
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-runflat-tab" data-toggle="pill" href="#pills-runflat" role="tab" aria-controls="pills-runflat" aria-selected="true">Run Flat</a>
                      </li>
                      @endif
                   @if($tyre->technology_pncs == 1)
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-pncs-tab" data-toggle="pill" href="#pills-pncs" role="tab" aria-controls="pills-pncs" aria-selected="false">PNCS</a>
                      </li>
                  @endif
                   @if($tyre->technology_seal_inside == 1)
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-seal-tab" data-toggle="pill" href="#pills-seal" role="tab" aria-controls="pills-seal" aria-selected="false">SEAL INSIDE</a>
                      </li>
                   @endif
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
@endif


    <!-- Video Banner -->
    <section id="video-banner" class="section"
             style="background-image:url(@if($tyre->banner){{ $tyre->banner->getUrl()}}@endif)">
        <div class="container right-position">
            <!-- Start Row -->
            <div class="row">'
                <div class="col-md-12 col-sm-12">
                    <div class="video-promo-content text-center">
                        
                        

                        <a id="play-video" class="video-play-button video-popup" href="{{ $tyre->video ?? 'https://www.youtube.com/watch?v=HT_heAi1Yvc' }}">
                            <span></span>
                        </a>

                    </div>
                </div>
            </div>
            {{--End Row--}}
        </div>
    </section>
    
    <!-- Video Banner -->
    
    
    <section id="size" class="wow">

  <div class="container">

    <div class="section-header">
      <h2>AVAILABLE SIZES FOR YOU</h2>
   
    </div>
    
  

    <div class="row justify-content-center">
      <div class="col-lg-9">
          <ul id="size-list">
            @foreach($front_tyres as $size)
              <li>
                <a data-toggle="collapse" class="collapsed" href="#size{{ $size->id }}">{{ $size->moto_size->size }}" <i class="fa fa-minus-circle"></i></a>
                <div id="size{{ $size->id }}" class="collapse" data-parent="#size-list">
                  <p>
                    {{$size->moto_width->width ?? ''}}/{{$size->moto_ratio->ratio ?? ''}}R{{$size->moto_size->size ?? ''}}
                  </p>
                </div>
              </li>
            @endforeach
  
          </ul>
      </div>
    </div>

  </div>

</section>


                  

  


    <!--<section id="warranty" class="py-5 bottom-cta">-->
    <!--    <div class="container">-->
            <!-- Row -->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-md-7 text-center">-->
    <!--                <h2 class="mb-3 text-dark font-weight-bold">WARRANTY</h2>-->
    <!--                <p class="font-weight-medium text-dark op-8">This product is covered by our standard 5 year manufacture warranty </p>-->
    <!--                <a class="btn btn-danger-gradiant btn-md border-0 text-white mt-3 text-uppercase" href="#"><span>Find Out More</span></a>-->
    <!--            </div>-->
    <!--        </div>-->
            <!-- Row -->
    <!--    </div>-->
    <!--</section>-->

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
        
        $(document).ready(function() {
 
  $("#gallery").owlCarousel({
 
      navigation : false, // Show next and prev buttons
      dots:false,
      slideSpeed : 300,
      paginationSpeed : 400,
      thumbs: true,
      thumbImage: true,
      thumbContainerClass: 'owl-thumbs',
      thumbItemClass: 'owl-thumb-item',
      items : 1, 
      itemsDesktop : false,
      itemsDesktopSmall : false,
      itemsTablet: false,
      itemsMobile : false
 
  });
 
});

    </script>

@endsection
