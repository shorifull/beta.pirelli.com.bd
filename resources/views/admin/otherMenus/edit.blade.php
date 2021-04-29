@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.otherMenu.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.other-menus.update", [$otherMenu->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.otherMenu.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $otherMenu->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.otherMenu.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                            <label for="order">{{ trans('cruds.otherMenu.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', $otherMenu->order) }}" step="1">
                            @if($errors->has('order'))
                                <span class="help-block" role="alert">{{ $errors->first('order') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.otherMenu.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                            <label for="url">{{ trans('cruds.otherMenu.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', $otherMenu->url) }}">
                            @if($errors->has('url'))
                                <span class="help-block" role="alert">{{ $errors->first('url') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.otherMenu.fields.url_helper') }}</span>
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