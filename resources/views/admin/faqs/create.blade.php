@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.faq.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.faqs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('faq_title') ? 'has-error' : '' }}">
                            <label class="required" for="faq_title">{{ trans('cruds.faq.fields.faq_title') }}</label>
                            <input class="form-control" type="text" name="faq_title" id="faq_title" value="{{ old('faq_title', '') }}" required>
                            @if($errors->has('faq_title'))
                                <span class="help-block" role="alert">{{ $errors->first('faq_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.faq.fields.faq_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('faq_content') ? 'has-error' : '' }}">
                            <label for="faq_content">{{ trans('cruds.faq.fields.faq_content') }}</label>
                            <textarea class="form-control ckeditor" name="faq_content" id="faq_content">{!! old('faq_content') !!}</textarea>
                            @if($errors->has('faq_content'))
                                <span class="help-block" role="alert">{{ $errors->first('faq_content') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.faq.fields.faq_content_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('faq_category') ? 'has-error' : '' }}">
                            <label class="required" for="faq_category_id">{{ trans('cruds.faq.fields.faq_category') }}</label>
                            <select class="form-control select2" name="faq_category_id" id="faq_category_id" required>
                                @foreach($faq_categories as $id => $entry)
                                    <option value="{{ $id }}" {{ old('faq_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('faq_category'))
                                <span class="help-block" role="alert">{{ $errors->first('faq_category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.faq.fields.faq_category_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.faqs.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $faq->id ?? 0 }}');
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

@endsection