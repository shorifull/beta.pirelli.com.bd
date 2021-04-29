@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.size.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sizes.update", [$size->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('with') ? 'has-error' : '' }}">
                            <label for="with">{{ trans('cruds.size.fields.with') }}</label>
                            <input class="form-control" type="number" name="with" id="with" value="{{ old('with', $size->with) }}" step="1">
                            @if($errors->has('with'))
                                <span class="help-block" role="alert">{{ $errors->first('with') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.size.fields.with_helper') }}</span>
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