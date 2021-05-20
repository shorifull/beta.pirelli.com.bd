@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.motoModel.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.moto-models.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                            <label class="required" for="model">{{ trans('cruds.motoModel.fields.model') }}</label>
                            <input class="form-control" type="text" name="model" id="model" value="{{ old('model', '') }}" required>
                            @if($errors->has('model'))
                                <span class="help-block" role="alert">{{ $errors->first('model') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoModel.fields.model_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('moto_brand') ? 'has-error' : '' }}">
                            <label class="required" for="moto_brand_id">{{ trans('cruds.motoModel.fields.moto_brand') }}</label>
                            <select class="form-control select2" name="moto_brand_id" id="moto_brand_id" required>
                                @foreach($moto_brands as $id => $entry)
                                    <option value="{{ $id }}" {{ old('moto_brand_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('moto_brand'))
                                <span class="help-block" role="alert">{{ $errors->first('moto_brand') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoModel.fields.moto_brand_helper') }}</span>
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