@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vehicle_type') ? 'has-error' : '' }}">
                            <label for="vehicle_type_id">{{ trans('cruds.product.fields.vehicle_type') }}</label>
                            <select class="form-control select2" name="vehicle_type_id" id="vehicle_type_id">
                                @foreach($vehicle_types as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('vehicle_type_id') ? old('vehicle_type_id') : $product->vehicle_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vehicle_type'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.vehicle_type_helper') }}</span>
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