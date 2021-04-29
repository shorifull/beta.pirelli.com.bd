@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.header.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.headers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                            <label for="favicon">{{ trans('cruds.header.fields.favicon') }}</label>
                            <div class="needsclick dropzone" id="favicon-dropzone">
                            </div>
                            @if($errors->has('favicon'))
                                <span class="help-block" role="alert">{{ $errors->first('favicon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.favicon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                            <label for="logo">{{ trans('cruds.header.fields.logo') }}</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <span class="help-block" role="alert">{{ $errors->first('logo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                            <label for="meta_title">{{ trans('cruds.header.fields.meta_title') }}</label>
                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}">
                            @if($errors->has('meta_title'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.meta_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_keyword') ? 'has-error' : '' }}">
                            <label for="meta_keyword">{{ trans('cruds.header.fields.meta_keyword') }}</label>
                            <textarea class="form-control" name="meta_keyword" id="meta_keyword">{{ old('meta_keyword') }}</textarea>
                            @if($errors->has('meta_keyword'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_keyword') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.meta_keyword_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                            <label for="meta_description">{{ trans('cruds.header.fields.meta_description') }}</label>
                            <textarea class="form-control" name="meta_description" id="meta_description">{{ old('meta_description') }}</textarea>
                            @if($errors->has('meta_description'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.meta_description_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.faviconDropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="favicon"]').remove()
      $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->favicon)
      var file = {!! json_encode($header->favicon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->logo)
      var file = {!! json_encode($header->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection