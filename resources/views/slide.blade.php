<?php
<div id="carouselMoto" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
@foreach($motoSliders as $key => $motoSlider)
                        <li data-target="#carouselMoto" data-slide-to="@if($motoSlider->image){{ $motoSlider->id}}@endif"></li>
@endforeach
                </ol>
                <div class="carousel-inner">
@foreach($motoSliders as $key => $motoSlider)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="@if($motoSlider->image){{ $motoSlider->image->getUrl()}} @endif" alt=" {{ $motoSlider->title ?? '' }}">
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
?>
