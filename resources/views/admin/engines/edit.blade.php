@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.engine.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.engines.update", [$engine->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('engine') ? 'has-error' : '' }}">
                            <label class="required" for="engine">{{ trans('cruds.engine.fields.engine') }}</label>
                            <input class="form-control" type="text" name="engine" id="engine" value="{{ old('engine', $engine->engine) }}" required>
                            @if($errors->has('engine'))
                                <span class="help-block" role="alert">{{ $errors->first('engine') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.engine.fields.engine_helper') }}</span>
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