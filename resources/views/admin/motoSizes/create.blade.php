@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.motoSize.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.moto-sizes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                            <label class="required" for="size">{{ trans('cruds.motoSize.fields.size') }}</label>
                            <input class="form-control" type="number" name="size" id="size" value="{{ old('size', '') }}" step="1" required>
                            @if($errors->has('size'))
                                <span class="help-block" role="alert">{{ $errors->first('size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoSize.fields.size_helper') }}</span>
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