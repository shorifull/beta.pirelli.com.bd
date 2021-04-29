@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.fuel.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.fuels.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fuel') ? 'has-error' : '' }}">
                            <label class="required" for="fuel">{{ trans('cruds.fuel.fields.fuel') }}</label>
                            <input class="form-control" type="text" name="fuel" id="fuel" value="{{ old('fuel', '') }}" required>
                            @if($errors->has('fuel'))
                                <span class="help-block" role="alert">{{ $errors->first('fuel') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fuel.fields.fuel_helper') }}</span>
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