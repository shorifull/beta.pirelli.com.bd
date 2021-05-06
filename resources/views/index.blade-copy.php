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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
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
                                <div class="form-group col-md-3">
                                    <select name="width_id" class="form-control form-control-lg" placeholder="Width">
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
                                <div class="form-group col-md-3">
                                    <select name="ratio_id" class="form-control form-control-lg" placeholder="Ratio">
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

                                <div class="form-group col-md-3">
                                    <select name="size_id" class="form-control form-control-lg" placeholder="Size">
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
        function get_models_by_make(){
            var make_id = $('#make_id').val();

            $.get('{{ route('modelcombinations.get_models_by_make') }}',{_token:'{{ csrf_token() }}', make_id:make_id}, function(data){
                console.log(data);
                $('#model_id').html(null);
                $('#year_id').html(null);
                $('#engine_id').html(null);

                $('#model_id').append('<option value="">Select Model</option>')
                for (var i = 0; i < data.length; i++) {
                    $('#model_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
               
            });
        }

        $('#make_id').on('change', function() {
            get_models_by_make();
        });

        $('#model_id').on('change', function() {
            var model_id = $('#model_id').val();

            $.get('{{ route('modelcombinations.get_years_by_model') }}',{_token:'{{ csrf_token() }}', model_id:model_id}, function(data){
                console.log(data);
                $('#year_id').html(null);
                $('#engine_id').html(null);

                $('#year_id').append('<option value="">Select Model</option>')
                for (var i = 0; i < data.length; i++) {
                    $('#year_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
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

                $('#engine_id').append('<option value="">Select Model</option>')
                for (var i = 0; i < data.length; i++) {
                    $('#engine_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));

                }
            });
        });

        function filter() {
            $('#search-form').submit();
        }


    </script>
@endsection
