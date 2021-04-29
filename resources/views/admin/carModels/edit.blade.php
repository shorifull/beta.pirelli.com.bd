@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.carModel.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.car-models.update", [$carModel->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                            <label class="required" for="brand_id">{{ trans('cruds.carModel.fields.brand') }}</label>
                            <select class="form-control select2" name="brand_id" id="brand_id" required>
                                @foreach($brands as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('brand_id') ? old('brand_id') : $carModel->brand->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand'))
                                <span class="help-block" role="alert">{{ $errors->first('brand') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carModel.fields.brand_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                            <label class="required" for="model">{{ trans('cruds.carModel.fields.model') }}</label>
                            <input class="form-control" type="text" name="model" id="model" value="{{ old('model', $carModel->model) }}" required>
                            @if($errors->has('model'))
                                <span class="help-block" role="alert">{{ $errors->first('model') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carModel.fields.model_helper') }}</span>
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