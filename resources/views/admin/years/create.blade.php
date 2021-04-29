@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.year.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.years.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                            <label class="required" for="year">{{ trans('cruds.year.fields.year') }}</label>
                            <input class="form-control" type="number" name="year" id="year" value="{{ old('year', '') }}" step="1" required>
                            @if($errors->has('year'))
                                <span class="help-block" role="alert">{{ $errors->first('year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.year.fields.year_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection