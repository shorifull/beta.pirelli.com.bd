@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.chassis.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.chassis.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('chassis') ? 'has-error' : '' }}">
                            <label class="required" for="chassis">{{ trans('cruds.chassis.fields.chassis') }}</label>
                            <input class="form-control" type="text" name="chassis" id="chassis" value="{{ old('chassis', '') }}" required>
                            @if($errors->has('chassis'))
                                <span class="help-block" role="alert">{{ $errors->first('chassis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.chassis.fields.chassis_helper') }}</span>
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