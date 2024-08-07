@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.motoWidth.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.moto-widths.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('width') ? 'has-error' : '' }}">
                            <label class="required" for="width">{{ trans('cruds.motoWidth.fields.width') }}</label>
                            <input class="form-control" type="number" name="width" id="width" value="{{ old('width', '') }}" step="1" required>
                            @if($errors->has('width'))
                                <span class="help-block" role="alert">{{ $errors->first('width') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoWidth.fields.width_helper') }}</span>
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