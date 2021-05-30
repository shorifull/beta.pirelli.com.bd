@extends('layouts.main')

@section('content')
    <div class="section" class="section">
        <div class="row">
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('car-home')}}">Car</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="container">
            <div class="row mb-3">
                @if (count($tyres) > 0)
                    @foreach ($tyres as $tyre)

                        <div class="card col-md-5 col-10 mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    @if($tyre->thumbnail)
                                        <img class='img-fluid' src="{{ $tyre->thumbnail->getUrl() }}" width="auto" height="auto" />
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body text-center mx-auto">

                                        <h5 class="card-title font-weight-bold">{{ $tyre->title ?? '' }}</h5>
                                        <p class="card-text"> {!! $tyre->short_description !!}</p>
                                        <a href="{{ route('car-tyre', [$tyre->id]) }}" class="btn btn-yellow">VIEW DETAILS</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif

            </div>

            {{ $tyres->appends(request()->all())->links() }}

        </div>
    </section>


@stop
