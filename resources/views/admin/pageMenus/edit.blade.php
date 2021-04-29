@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.pageMenu.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.page-menus.update", [$pageMenu->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('page') ? 'has-error' : '' }}">
                            <label class="required" for="page_id">{{ trans('cruds.pageMenu.fields.page') }}</label>
                            <select class="form-control select2" name="page_id" id="page_id" required>
                                @foreach($pages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('page_id') ? old('page_id') : $pageMenu->page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('page'))
                                <span class="help-block" role="alert">{{ $errors->first('page') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pageMenu.fields.page_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                            <label class="required" for="order">{{ trans('cruds.pageMenu.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', $pageMenu->order) }}" step="1" required>
                            @if($errors->has('order'))
                                <span class="help-block" role="alert">{{ $errors->first('order') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pageMenu.fields.order_helper') }}</span>
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