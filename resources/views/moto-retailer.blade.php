@extends('layouts.main')



@section('content')
    <section>
        <div id="map-canvas" style="height: 480px; width: 100%; position: relative; overflow: hidden;"></div>
    </section>

    <section class="section mt-5">
        <div class="container">
            <form class="" id="search-form" action="{{ route('moto-retailer-list') }}" method="GET">
                <div class="search-widget">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input class="form-control input-lg" type="text" name="search"
                                   placeholder="Search Retailers"
                                   @isset($sort_search) value="{{ $sort_search}}" @endisset>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">

                                <select class="form-control sortSelect" id="city_id"
                                        data-placeholder="Select City" name="city_id">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                                @isset($city_id) @if ($city_id == $city->id) selected @endif @endisset>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="learn-more-btn">
                                Search
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">

                @foreach ($retailers as $key => $retailer)
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                              @if($retailer->banner)
                                    <img src="{{ asset($retailer->banner->getUrl()) }}" class="img-fluid" alt="#">
                              @endif
                           
                            <div class="featured-title-box">
                                <h6 style="font-family:'gotham-bold';font-weight:bold;"> {{$retailer->name ?? ''}}</h6>
                                <hr>
                                <!--<p>{{$retailer->city->name ?? ''}} </p> <span>• </span>-->
                                <!--<p>{{$retailer->vehicle_type->name ?? ''}}</p> <span> • </span>-->
                               

                                <ul>
                                    <li>
                                        <p>{{$retailer->location ?? ''}}</p>
                                    </li>
                                    <li>
                                        <p><a href="tel:{{$retailer->phone ?? ''}}">{{$retailer->phone ?? ''}}</a></p>
                                    </li>
                                    <li>
                                        <a class="learn-more-btn" href="https://maps.google.com/?q={{$retailer->latitude ?? ''}},{{$retailer->longitude ?? ''}}" target="_blank">View Map</a>
                                    </li>
                                    <!--<li><span class="icon-link"></span>-->
                                    <!--    <p>{{$retailer->facebook ?? ''}}</p>-->
                                    <!--</li>-->
                                </ul>
                                <hr>
                                <p>{{\Illuminate\Support\Str::limit($retailer->description,100)}}</p>
{{--                                <div class="bottom-icons">--}}
{{--                                    <div class="closed-now">View Details</div>--}}
{{--                                    <span class="ti-heart"></span>--}}
{{--                                    <span class="ti-bookmark"></span>--}}
{{--                                </div>--}}
                            </div>
                    
                    </div>
                </div>
                @endforeach

            </div>
            <div class="products-pagination p-3">
                <nav aria-label="Center aligned pagination">
                    <ul class="pagination justify-content-center">
                        {{ $retailers->links() }}
                    </ul>
                </nav>
            </div>
        </div>

    </section>

@endsection

@section('scripts')
    <script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'></script>
    <script defer>
        function initialize() {
            var mapOptions = {
                zoom: 12,
                minZoom: 6,
                maxZoom: 17,
                zoomControl:true,
                zoomControlOptions: {
                    style:google.maps.ZoomControlStyle.DEFAULT
                },
                center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                panControl:false,
                mapTypeControl:false,
                scaleControl:false,
                overviewMapControl:false,
                rotateControl:false
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            var image = new google.maps.MarkerImage("images/google-map-pin.png", null, null, null, new google.maps.Size(40,52));
            var places = @json($mapRetailers);

            for(place in places)
            {
                place = places[place];
                if(place.latitude && place.longitude)
                {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(place.latitude, place.longitude),
                        icon:image,
                        map: map,
                        title: place.name
                    });
                    var infowindow = new google.maps.InfoWindow();
                    google.maps.event.addListener(marker, 'click', (function (marker, place) {
                        return function () {
                            infowindow.setContent(generateContent(place))
                            infowindow.open(map, marker);
                        }
                    })(marker, place));
                }
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        function generateContent(place)
        {
            var content = `
            <div class="gd-bubble" style="">
                <div class="gd-bubble-inside">
                    <div class="geodir-bubble_desc">
                    <div class="geodir-bubble_image">
                        <div class="geodir-post-slider">
                            <div class="geodir-image-container geodir-image-sizes-medium_large ">
                                <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
                                    <ul class="geodir-post-image geodir-images clearfix">
                                        <li>
                                            <div class="geodir-post-title">
                                                <h6 class="geodir-entry-title">
                                                    <a href="https://maps.google.com/?q={{$retailer->latitude ?? ''}},{{$retailer->longitude ?? ''}}" title="View: `+place.name+`">`+place.name+`</a>
                                                </h6>
                                                
                                                
                                            </div>
                                            {{--<a href="{{ route('retailer', '') }}/`+place.id+`"><img src="`+place.thumbnail+`" alt="`+place.name+`" class="align size-medium_large" width="1400" height="930"></a>--}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="geodir-bubble-meta-side">
                    <div class="geodir-output-location">
                    <div class="geodir-output-location geodir-output-location-mapbubble">
                        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
                            <i class="fas fa-minus" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Place Title: </span></span>`+place.name+`</div>
                        <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            <span class="geodir_post_meta_icon geodir-i-address"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">`+place.address+`</span>
                            <br>
                            
                        </div>
                        <p><a href="tel:{{$retailer->phone ?? ''}}">{{$retailer->phone ?? ''}}</a></p>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>`;

            return content;

        }
    </script>
@endsection
