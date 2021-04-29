@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.productSize.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.product-sizes.update", [$productSize->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                            <label class="required" for="size">{{ trans('cruds.productSize.fields.size') }}</label>
                            <input class="form-control" type="text" name="size" id="size" value="{{ old('size', $productSize->size) }}" required>
                            @if($errors->has('size'))
                                <span class="help-block" role="alert">{{ $errors->first('size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productSize.fields.size_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product') ? 'has-error' : '' }}">
                            <label class="required" for="product_id">{{ trans('cruds.productSize.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $productSize->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <span class="help-block" role="alert">{{ $errors->first('product') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productSize.fields.product_helper') }}</span>
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