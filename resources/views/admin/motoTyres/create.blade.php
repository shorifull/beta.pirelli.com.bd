@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.motoTyre.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.moto-tyres.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('cruds.motoTyre.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tagline') ? 'has-error' : '' }}">
                            <label for="tagline">{{ trans('cruds.motoTyre.fields.tagline') }}</label>
                            <input class="form-control" type="text" name="tagline" id="tagline" value="{{ old('tagline', '') }}">
                            @if($errors->has('tagline'))
                                <span class="help-block" role="alert">{{ $errors->first('tagline') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.tagline_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('moto_brand') ? 'has-error' : '' }}">
                            <label class="required" for="moto_brand_id">{{ trans('cruds.motoTyre.fields.moto_brand') }}</label>
                            <select class="form-control select2" name="moto_brand_id" id="moto_brand_id" required>
                                @foreach($moto_brands as $id => $entry)
                                    <option value="{{ $id }}" {{ old('moto_brand_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('moto_brand'))
                                <span class="help-block" role="alert">{{ $errors->first('moto_brand') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.moto_brand_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('moto_model') ? 'has-error' : '' }}">
                            <label class="required" for="moto_model_id">{{ trans('cruds.motoTyre.fields.moto_model') }}</label>
                            <select class="form-control select2" name="moto_model_id" id="moto_model_id" required>
                                @foreach($moto_models as $id => $entry)
                                    <option value="{{ $id }}" {{ old('moto_model_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('moto_model'))
                                <span class="help-block" role="alert">{{ $errors->first('moto_model') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.moto_model_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('moto_engine') ? 'has-error' : '' }}">
                            <label class="required" for="moto_engine_id">{{ trans('cruds.motoTyre.fields.moto_engine') }}</label>
                            <select class="form-control select2" name="moto_engine_id" id="moto_engine_id" required>
                                @foreach($moto_engines as $id => $entry)
                                    <option value="{{ $id }}" {{ old('moto_engine_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('moto_engine'))
                                <span class="help-block" role="alert">{{ $errors->first('moto_engine') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.moto_engine_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('moto_width') ? 'has-error' : '' }}">
                            <label for="moto_width_id">{{ trans('cruds.motoTyre.fields.moto_width') }}</label>
                            <select class="form-control select2" name="moto_width_id" id="moto_width_id">
                                @foreach($moto_widths as $id => $entry)
                                    <option value="{{ $id }}" {{ old('moto_width_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('moto_width'))
                                <span class="help-block" role="alert">{{ $errors->first('moto_width') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.moto_width_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('moto_size') ? 'has-error' : '' }}">
                            <label for="moto_size_id">{{ trans('cruds.motoTyre.fields.moto_size') }}</label>
                            <select class="form-control select2" name="moto_size_id" id="moto_size_id">
                                @foreach($moto_sizes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('moto_size_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('moto_size'))
                                <span class="help-block" role="alert">{{ $errors->first('moto_size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.moto_size_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('moto_ratio') ? 'has-error' : '' }}">
                            <label for="moto_ratio_id">{{ trans('cruds.motoTyre.fields.moto_ratio') }}</label>
                            <select class="form-control select2" name="moto_ratio_id" id="moto_ratio_id">
                                @foreach($moto_ratios as $id => $entry)
                                    <option value="{{ $id }}" {{ old('moto_ratio_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('moto_ratio'))
                                <span class="help-block" role="alert">{{ $errors->first('moto_ratio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.moto_ratio_helper') }}</span>
                        </div>
                
                        <div class="form-group {{ $errors->has('pattern') ? 'has-error' : '' }}">
                            <label for="pattern">{{ trans('cruds.motoTyre.fields.pattern') }}</label>
                            <select class="form-control" name="pattern" id="pattern">
                            
                              @foreach(App\Models\MotoTyre::PATTERN as $id => $pattern)
                             
                              <option value="{{ $id }}" {{ (old('pattern') ? old('pattern') : $motoTyre->pattern ?? '') == $id ? 'selected' : '' }}>{{ $pattern }}</option>
                              
                              @endforeach
                            </select>
                            @if($errors->has('pattern'))
                                <span class="help-block" role="alert">{{ $errors->first('pattern') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.pattern_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                            <label for="categories">{{ trans('cruds.motoTyre.fields.category') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="categories[]" id="categories" multiple>
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categories'))
                                <span class="help-block" role="alert">{{ $errors->first('categories') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description">{{ trans('cruds.motoTyre.fields.short_description') }}</label>
                            <textarea class="form-control ckeditor" name="short_description" id="short_description">{!! old('short_description') !!}</textarea>
                            @if($errors->has('short_description'))
                                <span class="help-block" role="alert">{{ $errors->first('short_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.short_description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('long_description') ? 'has-error' : '' }}">
                            <label for="long_description">{{ trans('cruds.motoTyre.fields.long_description') }}</label>
                            <textarea class="form-control ckeditor" name="long_description" id="long_description">{!! old('long_description') !!}</textarea>
                            @if($errors->has('long_description'))
                                <span class="help-block" role="alert">{{ $errors->first('long_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.long_description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                            <label for="thumbnail">{{ trans('cruds.motoTyre.fields.thumbnail') }}</label>
                            <div class="needsclick dropzone" id="thumbnail-dropzone">
                            </div>
                            @if($errors->has('thumbnail'))
                                <span class="help-block" role="alert">{{ $errors->first('thumbnail') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.thumbnail_helper') }}</span>
                        </div>
                         <div class="form-group {{ $errors->has('gallery') ? 'has-error' : '' }}">
                            <label for="gallery">{{ trans('cruds.motoTyre.fields.gallery') }}</label>
                            <div class="needsclick dropzone" id="gallery-dropzone">
                            </div>
                            @if($errors->has('gallery'))
                                <span class="help-block" role="alert">{{ $errors->first('gallery') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.gallery_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
                            <label for="banner">{{ trans('cruds.motoTyre.fields.banner') }}</label>
                            <div class="needsclick dropzone" id="banner-dropzone">
                            </div>
                            @if($errors->has('banner'))
                                <span class="help-block" role="alert">{{ $errors->first('banner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.banner_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('features') ? 'has-error' : '' }}">
                            <label for="features">{{ trans('cruds.motoTyre.fields.features') }}</label>
                            <textarea class="form-control ckeditor" name="features" id="features">{!! old('features') !!}</textarea>
                            @if($errors->has('features'))
                                <span class="help-block" role="alert">{{ $errors->first('features') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.features_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">
                            <label for="specifications">{{ trans('cruds.motoTyre.fields.specifications') }}</label>
                            <textarea class="form-control ckeditor" name="specifications" id="specifications">{!! old('specifications') !!}</textarea>
                            @if($errors->has('specifications'))
                                <span class="help-block" role="alert">{{ $errors->first('specifications') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.specifications_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('advantages') ? 'has-error' : '' }}">
                            <label for="advantages">{{ trans('cruds.tyre.fields.advantages') }}</label>
                            <textarea class="form-control ckeditor" name="advantages" id="advantages">{!! old('advantages') !!}</textarea>
                            @if($errors->has('advantages'))
                                <span class="help-block" role="alert">{{ $errors->first('advantages') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.advantages_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('warranty') ? 'has-error' : '' }}">
                            <label for="warranty">{{ trans('cruds.motoTyre.fields.warranty') }}</label>
                            <textarea class="form-control ckeditor" name="warranty" id="warranty">{!! old('warranty') !!}</textarea>
                            @if($errors->has('warranty'))
                                <span class="help-block" role="alert">{{ $errors->first('warranty') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.warranty_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                            <label for="video">{{ trans('cruds.motoTyre.fields.video') }}</label>
                            <textarea class="form-control" name="video" id="video">{{ old('video') }}</textarea>
                            @if($errors->has('video'))
                                <span class="help-block" role="alert">{{ $errors->first('video') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.motoTyre.fields.video_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.moto-tyres.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $motoTyre->id ?? 0 }}');
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
    Dropzone.options.thumbnailDropzone = {
    url: '{{ route('admin.moto-tyres.storeMedia') }}',
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
      $('form').find('input[name="thumbnail"]').remove()
      $('form').append('<input type="hidden" name="thumbnail" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="thumbnail"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($motoTyre) && $motoTyre->thumbnail)
      var file = {!! json_encode($motoTyre->thumbnail) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="thumbnail" value="' + file.file_name + '">')
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
    Dropzone.options.bannerDropzone = {
    url: '{{ route('admin.moto-tyres.storeMedia') }}',
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
@if(isset($motoTyre) && $motoTyre->banner)
      var file = {!! json_encode($motoTyre->banner) !!}
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
<script>
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.moto-tyres.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1080,
      height: 1080
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($motoTyre) && $motoTyre->gallery)
      var files = {!! json_encode($motoTyre->gallery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
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