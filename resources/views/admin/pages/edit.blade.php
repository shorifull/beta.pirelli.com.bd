@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.page.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.pages.update", [$page->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('page_name') ? 'has-error' : '' }}">
                            <label class="required" for="page_name">{{ trans('cruds.page.fields.page_name') }}</label>
                            <input class="form-control" type="text" name="page_name" id="page_name" value="{{ old('page_name', $page->page_name) }}" required>
                            @if($errors->has('page_name'))
                                <span class="help-block" role="alert">{{ $errors->first('page_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.page_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('page_slug') ? 'has-error' : '' }}">
                            <label for="page_slug">{{ trans('cruds.page.fields.page_slug') }}</label>
                            <input class="form-control" type="text" name="page_slug" id="page_slug" value="{{ old('page_slug', $page->page_slug) }}">
                            @if($errors->has('page_slug'))
                                <span class="help-block" role="alert">{{ $errors->first('page_slug') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.page_slug_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('page_content') ? 'has-error' : '' }}">
                            <label for="page_content">{{ trans('cruds.page.fields.page_content') }}</label>
                            <textarea class="form-control ckeditor" name="page_content" id="page_content">{!! old('page_content', $page->page_content) !!}</textarea>
                            @if($errors->has('page_content'))
                                <span class="help-block" role="alert">{{ $errors->first('page_content') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.page_content_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
                            <label for="banner">{{ trans('cruds.page.fields.banner') }}</label>
                            <div class="needsclick dropzone" id="banner-dropzone">
                            </div>
                            @if($errors->has('banner'))
                                <span class="help-block" role="alert">{{ $errors->first('banner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.banner_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.page.fields.active') }}</label>
                            @foreach(App\Models\Page::ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="active_{{ $key }}" name="active" value="{{ $key }}" {{ old('active', $page->active) === (string) $key ? 'checked' : '' }}>
                                    <label for="active_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('active'))
                                <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                            <label for="meta_title">{{ trans('cruds.page.fields.meta_title') }}</label>
                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $page->meta_title) }}">
                            @if($errors->has('meta_title'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.meta_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                            <label for="meta_keywords">{{ trans('cruds.page.fields.meta_keywords') }}</label>
                            <textarea class="form-control" name="meta_keywords" id="meta_keywords">{{ old('meta_keywords', $page->meta_keywords) }}</textarea>
                            @if($errors->has('meta_keywords'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_keywords') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.meta_keywords_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                            <label for="meta_description">{{ trans('cruds.page.fields.meta_description') }}</label>
                            <textarea class="form-control" name="meta_description" id="meta_description">{{ old('meta_description', $page->meta_description) }}</textarea>
                            @if($errors->has('meta_description'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.meta_description_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.pages.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $page->id ?? 0 }}');
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
    Dropzone.options.bannerDropzone = {
    url: '{{ route('admin.pages.storeMedia') }}',
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
      $('form').find('input[name="banner"]').remove()
      $('form').append('<input type="hidden" name="banner" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($page) && $page->banner)
      var file = {!! json_encode($page->banner) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner" value="' + file.file_name + '">')
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