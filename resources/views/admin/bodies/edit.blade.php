@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.body.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.bodies.update", [$body->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                            <label class="required" for="body">{{ trans('cruds.body.fields.body') }}</label>
                            <input class="form-control" type="text" name="body" id="body" value="{{ old('body', $body->body) }}" required>
                            @if($errors->has('body'))
                                <span class="help-block" role="alert">{{ $errors->first('body') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.body.fields.body_helper') }}</span>
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