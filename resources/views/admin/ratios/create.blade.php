@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.ratio.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.ratios.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('ratio') ? 'has-error' : '' }}">
                            <label class="required" for="ratio">{{ trans('cruds.ratio.fields.ratio') }}</label>
                            <input class="form-control" type="number" name="ratio" id="ratio" value="{{ old('ratio', '') }}" step="1" required>
                            @if($errors->has('ratio'))
                                <span class="help-block" role="alert">{{ $errors->first('ratio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ratio.fields.ratio_helper') }}</span>
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