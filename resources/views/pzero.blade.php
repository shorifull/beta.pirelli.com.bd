@extends('layouts.main')

@section('content')
 <section class="pzero-header" id="pzero-header" >
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                 <h1 class="text-center"><span style="color:#fff;font-weight:800;">PIRELLI P ZERO™</span></h1>
                <h1 class="text-center"><span style="color:#fff;font-weight:800;">PRODUCT FAMILY </span></h1>
           
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



 <section style="background: #f1f1f1;padding:50px 0;" class="py-5">
        <div class="container mt-3">
            
        
            <div class="row">
                   <div class="col-md-5">
                    <img class="img-fluid" src="{{asset('/images/car/pzero-vecchio-3-4.webp')}}" >

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                       <h3 style="margin:10px 0px;" class="technology-section-title">P ZERO</h3>
            <h3 style="text-align:left;font-family:'gotham-black'">Sporting performance for every vehicle</h3>     
            <p>A milestone in the development of the Pirelli range, P ZERO™ has been chosen as original equipment for
            the most performance oriented and powerful models on the market. Its asymmetric tread pattern improves 
            braking performance and enhances handling and control. Excellent in wet conditions with improved safety 
            in potential aquaplaning situations. Its new nano-composite compound ensures maximum grip and stability. 
            The structural integrity of the tyre improves steering response, which is essential in sports driving, and also ensures uniform tread wear. 
            The special “s-shaped” grooves in the tread area deliver lower cabin noise levels, enhancing driver comfort.</p>

                </div>
             
            </div>
        </div>
    </section>

    <!-- Progress bar --> 
        <section id="progress-bar">
                <div class="container">
                    <h3 style="font-family:'gotham-black', sans-serif;color:#fff;font-weight:bold;" class="mb-5 mt-5">PERFORMANCE</h3>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2 col-sm-6">
                    <div class="progress circle8">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><span class="label">8</span><br> DRY</div>
                    </div>
                </div>
                
                <div class="col-md-2 col-sm-6">
                    <div class="progress circle9">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><span class="label">9</span><br> WET</div>
                    </div>
                </div>
                
                 <div class="col-md-2 col-sm-6">
                    <div class="progress circle8">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><span class="label">8</span><br> SPORT</div>
                    </div>
                </div>
                
                
                <div class="col-md-2 col-sm-6">
                    <div class="progress circle7">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><span class="label">7</span><br>COMFORT</div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="progress circle7">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><span class="label">7</span><br> MILEAGE</div>
                    </div>
                </div>
                  <div class="col-md-1"></div>

                <div class="pzero-homologation mt-5">
                    	 <h3 style="font-family:'gotham-black', sans-serif;color:#fff;font-weight:bold;" class="mb-3 mt-5">HOMOLOGATION</h3>
						
							<div class="label">Alfa Romeo</div>
						
							<div class="label">Aston Martin</div>
						
							<div class="label">Audi</div>
						
							<div class="label">BMW</div>
						
							<div class="label">Bentley</div>
						
							<div class="label">Dallara</div>
						
							<div class="label">Ferrari</div>
						
							<div class="label">Jaguar</div>
						
							<div class="label">Lamborghini</div>
						
							<div class="label">Land Rover</div>
						
							<div class="label">Maserati</div>
						
							<div class="label">Mc Laren</div>
						
							<div class="label">Mercedes</div>
						
							<div class="label">Porsche</div>
						
							<div class="label">Volvo</div>
						
					</div>
				
				   <p class="text-white mt-3">An Original Equipment tyre is a custom-made product developed for a specific car model, to ensure the perfect tyre for every customer.</p>
            </div>
        </div>
        
        </section> 
        
        
    <section class="section">
        <div class="container">
         
               <h3 style="font-family:'gotham-black', sans-serif;color:#000;font-weight:bold;" class="mb-5 mt-5">P ZERO FAMILY</h3>
            
            <div class="row mb-3">
                @if (count($tyres) > 0)
                    @foreach ($tyres as $tyre)
                        <div class="card col-md-4">
                            <a href="{{ route('car-tyre', [$tyre->slug]) }}"> <h5 class="card-title text-center font-weight-bold mt-3">{{ $tyre->title ?? '' }}</h5></a>
                           
                             @if($tyre->thumbnail)
                                    <a style="max-width:180px;margin:0 auto;" href="{{ route('car-tyre', [$tyre->slug]) }}"><img class='img-fluid' src="{{ $tyre->thumbnail->getUrl() }}" width="auto" height="auto" /> </a>
                                @endif
                             
                               <div class="card-body text-center mx-auto">

                                          <!--<h4 class="card-text"> {{$tyre->width->width ?? ''}}/{{$tyre->ratio->ratio ?? ''}}R{{$tyre->size->size ?? ''}}</h4>-->
                                         <p class="card-text"> {{$tyre->tagline ?? ''}}</p>
                                        <a href="{{ route('car-tyre', [$tyre->slug]) }}" class="btn btn-yellow">VIEW DETAILS</a>
                                    </div>

                        </div>
                    @endforeach
                @endif

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
    
    <section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                 <h1 class="text-center"><span style="color:#000;font-weight:800;">P ZERO™ DETAILS</span></h1>
                  <img class="img-fluid" src="{{asset('/images/car/pzero_vecchio_base.jpeg')}}" >

            </div>
        </div>
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
