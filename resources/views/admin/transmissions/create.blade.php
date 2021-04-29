@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.transmission.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.transmissions.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('transmission') ? 'has-error' : '' }}">
                            <label class="required" for="transmission">{{ trans('cruds.transmission.fields.transmission') }}</label>
                            <input class="form-control" type="text" name="transmission" id="transmission" value="{{ old('transmission', '') }}" required>
                            @if($errors->has('transmission'))
                                <span class="help-block" role="alert">{{ $errors->first('transmission') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transmission.fields.transmission_helper') }}</span>
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