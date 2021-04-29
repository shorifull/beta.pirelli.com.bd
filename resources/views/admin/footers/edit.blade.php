@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.footer.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.footers.update", [$footer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('footer_about_us') ? 'has-error' : '' }}">
                            <label for="footer_about_us">{{ trans('cruds.footer.fields.footer_about_us') }}</label>
                            <textarea class="form-control" name="footer_about_us" id="footer_about_us">{{ old('footer_about_us', $footer->footer_about_us) }}</textarea>
                            @if($errors->has('footer_about_us'))
                                <span class="help-block" role="alert">{{ $errors->first('footer_about_us') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.footer.fields.footer_about_us_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('footer_copyright') ? 'has-error' : '' }}">
                            <label for="footer_copyright">{{ trans('cruds.footer.fields.footer_copyright') }}</label>
                            <input class="form-control" type="text" name="footer_copyright" id="footer_copyright" value="{{ old('footer_copyright', $footer->footer_copyright) }}">
                            @if($errors->has('footer_copyright'))
                                <span class="help-block" role="alert">{{ $errors->first('footer_copyright') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.footer.fields.footer_copyright_helper') }}</span>
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