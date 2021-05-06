@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.modelCombination.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.model-combinations.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.modelCombination.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modelCombination.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                            <label class="required" for="brand_id">{{ trans('cruds.modelCombination.fields.brand') }}</label>
                            <select class="form-control select2" name="brand_id" id="brand_id" required>
                                @foreach($brands as $id => $entry)
                                    <option value="{{ $id }}" {{ old('brand_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand'))
                                <span class="help-block" role="alert">{{ $errors->first('brand') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modelCombination.fields.brand_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('car_model') ? 'has-error' : '' }}">
                            <label for="car_model_id">{{ trans('cruds.modelCombination.fields.car_model') }}</label>
                            <select class="form-control select2" name="car_model_id" id="car_model_id">
                                @foreach($car_models as $id => $entry)
                                    <option value="{{ $id }}" {{ old('car_model_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('car_model'))
                                <span class="help-block" role="alert">{{ $errors->first('car_model') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modelCombination.fields.car_model_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('years') ? 'has-error' : '' }}">
                            <label class="required" for="years">{{ trans('cruds.modelCombination.fields.year') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="years[]" id="years" multiple required>
                                @foreach($years as $id => $year)
                                    <option value="{{ $id }}" {{ in_array($id, old('years', [])) ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('years'))
                                <span class="help-block" role="alert">{{ $errors->first('years') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modelCombination.fields.year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('engine') ? 'has-error' : '' }}">
                            <label class="required" for="engine_id">{{ trans('cruds.modelCombination.fields.engine') }}</label>
                            <select class="form-control select2" name="engine_id" id="engine_id" required>
                                @foreach($engines as $id => $entry)
                                    <option value="{{ $id }}" {{ old('engine_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('engine'))
                                <span class="help-block" role="alert">{{ $errors->first('engine') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modelCombination.fields.engine_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('chassis') ? 'has-error' : '' }}">
                            <label class="required" for="chassis_id">{{ trans('cruds.modelCombination.fields.chassis') }}</label>
                            <select class="form-control select2" name="chassis_id" id="chassis_id" required>
                                @foreach($chassis as $id => $entry)
                                    <option value="{{ $id }}" {{ old('chassis_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('chassis'))
                                <span class="help-block" role="alert">{{ $errors->first('chassis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modelCombination.fields.chassis_helper') }}</span>
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