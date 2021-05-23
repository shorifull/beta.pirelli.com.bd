@extends('layouts.main')

@section('content')


    <div class="section" class="section">
        <div class="container">
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('moto-home')}}">Moto</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search</li>
                    </ol>
                </nav>
                <h3>{{ $tyres->count() }} Tyres Found</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
					<div class="row mb-3">
                        @if (count($tyres) > 0)
                            @foreach ($tyres as $tyre)
                                <div class="col-sm-12 col-lg-6 col-md-6 mt-2">
                                    <div class="border single-tyre">
                                        <div class="row"  style="padding:10px;">
                                            <div class="col-sm-12 col-lg-6 col-md-6">
                                                <h5 class="card-title"> {{ $tyre->title ?? '' }}</h5>
                                                @if($tyre->thumbnail)
                                                    <img class="img-fluid" src="{{ $tyre->thumbnail->getUrl() }}" alt="Tyre Thumb">
                                                @endif

                                            </div>
                                            <div class="col-sm-12 col-lg-6 col-md-6">
                                                <p class="card-text">  {!! $tyre->short_description !!} </p>
                                                <a href="#" class="btn btn-yellow">View Tyre Details</a>
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
