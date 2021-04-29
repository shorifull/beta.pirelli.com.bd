@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.retailer.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.retailers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('vehicle_type') ? 'has-error' : '' }}">
                            <label class="required" for="vehicle_type_id">{{ trans('cruds.retailer.fields.vehicle_type') }}</label>
                            <select class="form-control select2" name="vehicle_type_id" id="vehicle_type_id" required>
                                @foreach($vehicle_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('vehicle_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vehicle_type'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.vehicle_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_name') ? 'has-error' : '' }}">
                            <label class="required" for="shop_name">{{ trans('cruds.retailer.fields.shop_name') }}</label>
                            <input class="form-control" type="text" name="shop_name" id="shop_name" value="{{ old('shop_name', '') }}" required>
                            @if($errors->has('shop_name'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.shop_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.retailer.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label class="required" for="city_id">{{ trans('cruds.retailer.fields.city') }}</label>
                            <select class="form-control select2" name="city_id" id="city_id" required>
                                @foreach($cities as $id => $entry)
                                    <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city'))
                                <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.city_helper') }}</span>
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