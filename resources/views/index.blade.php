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
                                            <select name="brand_id" class="form-control form-control-lg" id="brand_id" placeholder="Brand">
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
                                            <select name="model_id" class="form-control form-control-lg" id="model_id" placeholder="Select Model">

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
