@extends('layouts.main')

@section('content')
     <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('moto-home')}}">Moto</a></li>
                    </ol>
                </nav>
            </div>
           
    <section class="section">
        <div class="container">
          
                @if (count($tyres) > 0)
                <h2><span>{{count($tyres) }} Results</span> For Your Search</h2>
              
                  <div class="row mb-3">
                    @foreach ($tyres as $tyre)
                        <div class="card col-md-4 mb-3">
                            <a href="{{ route('moto-tyre', [$tyre->slug]) }}"> <h5 class="card-title text-center font-weight-bold mt-3">{{ $tyre->title ?? '' }}</h5></a>
                           
                             @if($tyre->thumbnail)
                                    <a style="max-width:180px;margin:0 auto;" href="{{ route('moto-tyre', [$tyre->slug]) }}"><img class='img-fluid' src="{{ $tyre->thumbnail->getUrl() }}" width="auto" height="auto" /> </a>
                                @endif
                             
                               <div class="card-body text-center mx-auto">

                                          <h4 class="card-text"> {{$tyre->moto_width->width ?? ''}}/{{$tyre->moto_ratio->ratio ?? ''}}R{{$tyre->moto_size->size ?? ''}}</h4>
                                         <p class="card-text"> {{$tyre->tagline ?? ''}}</p>
                                        <a href="{{ route('moto-tyre', [$tyre->slug]) }}" class="btn btn-yellow">VIEW DETAILS</a>
                                    </div>

                        </div>
                    @endforeach
                    </div>
                     {{ $tyres->appends(request()->all())->links() }}
               
                
                @else
                      <h2><span>No Result Found</span> For Your Search</h2>
                @endif

            

           

        </div>
    </section>


@stop
