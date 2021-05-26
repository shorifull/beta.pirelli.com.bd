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

                        <div class="card col-md-3 col-10 mt-5"> <img class='img-thumbnail' src="@if($tyre->thumbnail){{ $tyre->thumbnail->getUrl() }}@endif" width="auto" height="auto" />
                            <div class="card-body text-center mx-auto">

                                    <h5 class="card-title font-weight-bold">{{ $tyre->title ?? '' }}</h5>
                                    <p class="card-text"> {!! $tyre->short_description !!}</p>
                                    <a href="#" class="btn btn-yellow">VIEW DETAILS</a>
                            </div>
                        </div>
                            @endforeach
                        @endif

                    </div>

            {{ $tyres->appends(request()->all())->links() }}

	</div>
</section>


@stop
