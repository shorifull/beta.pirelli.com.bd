@extends('layouts.main')

@section('content')
    <!--===============================
=            Hero Area            =
================================-->

    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Lorem Ipsum is simply dummy </h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to brand a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                    </div>
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form action="{{ route('search') }}" method="GET">

                            <div class="form-row">
{{--                                <div class="form-group col-md-4">--}}
{{--                                    <input type="text" name="search" value="{{ old('search') }}" class="form-control" placeholder="Search company" />--}}
{{--                                    <p class="help-block"></p>--}}
{{--                                    @if($errors->has('name'))--}}
{{--                                        <p class="help-block">--}}
{{--                                            {{ $errors->first('name') }}--}}
{{--                                        </p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                                <div class="form-group col-md-2">
                                    <select name="brand" class="form-control form-control-lg" id="brand_id" placeholder="Brand">
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
                                    <select name="model" class="form-control form-control-lg" id="model_id" placeholder="Select Model">

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
                                    <select name="year" class="form-control form-control-lg" id="year_id" placeholder="Year">
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
                                    <select name="engine" class="form-control form-control-lg" id="engine_id" placeholder="Engine">
                                        @foreach ($search_engines as $engine)
                                            <option value="{{ $engine->id }}">{{ $engine->engine }}</option>
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
                                    <button type="submit"
                                            class="btn btn-main">
                                        Search Now
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <!--==========================================
    =            All Category Section            =
    ===========================================-->

{{--    <section class=" section">--}}
{{--        <!-- Container Start -->--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <!-- Section title -->--}}
{{--                    <div class="section-title">--}}
{{--                        <h2>All Categories</h2>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                    @foreach ($categories_all->take(8) as $category_all)--}}
{{--                        <!-- Category list -->--}}
{{--                            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
{{--                                <div class="category-block">--}}
{{--                                    <div class="header">--}}
{{--                                        <i class="{{ $category_all->icon }} icon-bg-{{ $category_all->id }}"></i>--}}
{{--                                        <h4>--}}
{{--                                            <a href="{{ route('category', [$category_all->id]) }}">{{ $category_all->name }} <p style="display: inline">({{ $category_all->companies->count() }})</p></a>--}}

{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                    <ul class="category-list">--}}
{{--                                        @foreach ( $category_all->companies->shuffle()->take(4) as $singleCompany)--}}
{{--                                            <li><a href="{{ route('company', [$singleCompany->id]) }}">{{ $singleCompany->name}} </a></li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div> <!-- /Category List -->--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Container End -->--}}
{{--    </section>--}}
@endsection

@section('scripts')
    <script type="text/javascript">
        function get_models_by_brand(){
            var brand_id = $('#brand_id').val();

            $.get('{{ route('modelcombinations.get_models_by_brand') }}',{_token:'{{ csrf_token() }}', brand_id:brand_id}, function(data){
                console.log(data);
                $('#model_id').html(null);
                $('#year_id').html(null);
                $('#engine_id').html(null);

                $('#model_id').append('<option value="">Select Model</option>')
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


    </script>
@endsection
