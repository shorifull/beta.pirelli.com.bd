@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.homeSlider.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.home-sliders.update", [$homeSlider->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('cruds.homeSlider.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $homeSlider->title) }}">
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.homeSlider.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description">{{ trans('cruds.homeSlider.fields.short_description') }}</label>
                            <textarea class="form-control" name="short_description" id="short_description">{{ old('short_description', $homeSlider->short_description) }}</textarea>
                            @if($errors->has('short_description'))
                                <span class="help-block" role="alert">{{ $errors->first('short_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.homeSlider.fields.short_description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('long_description') ? 'has-error' : '' }}">
                            <label for="long_description">{{ trans('cruds.homeSlider.fields.long_description') }}</label>
                            <textarea class="form-control ckeditor" name="long_description" id="long_description">{!! old('long_description', $homeSlider->long_description) !!}</textarea>
                            @if($errors->has('long_description'))
                                <span class="help-block" role="alert">{{ $errors->first('long_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.homeSlider.fields.long_description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('button_label') ? 'has-error' : '' }}">
                            <label for="button_label">{{ trans('cruds.homeSlider.fields.button_label') }}</label>
                            <input class="form-control" type="text" name="button_label" id="button_label" value="{{ old('button_label', $homeSlider->button_label) }}">
                            @if($errors->has('button_label'))
                                <span class="help-block" role="alert">{{ $errors->first('button_label') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.homeSlider.fields.button_label_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('button_url') ? 'has-error' : '' }}">
                            <label for="button_url">{{ trans('cruds.homeSlider.fields.button_url') }}</label>
                            <input class="form-control" type="text" name="button_url" id="button_url" value="{{ old('button_url', $homeSlider->button_url) }}">
                            @if($errors->has('button_url'))
                                <span class="help-block" role="alert">{{ $errors->first('button_url') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.homeSlider.fields.button_url_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">{{ trans('cruds.homeSlider.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.homeSlider.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('activated') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.homeSlider.fields.activated') }}</label>
                            @foreach(App\Models\HomeSlider::ACTIVATED_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="activated_{{ $key }}" name="activated" value="{{ $key }}" {{ old('activated', $homeSlider->activated) === (string) $key ? 'checked' : '' }}>
                                    <label for="activated_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('activated'))
                                <span class="help-block" role="alert">{{ $errors->first('activated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.homeSlider.fields.activated_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.home-sliders.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $homeSlider->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.home-sliders.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($homeSlider) && $homeSlider->image)
      var file = {!! json_encode($homeSlider->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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