@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.brand.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.brands.update", [$brand->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                            <label class="required" for="brand">{{ trans('cruds.brand.fields.brand') }}</label>
                            <input class="form-control" type="text" name="brand" id="brand" value="{{ old('brand', $brand->brand) }}" required>
                            @if($errors->has('brand'))
                                <span class="help-block" role="alert">{{ $errors->first('brand') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.brand.fields.brand_helper') }}</span>
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