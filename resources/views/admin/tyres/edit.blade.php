@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.tyre.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tyres.update", [$tyre->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">{{ trans('cruds.tyre.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $tyre->title) }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tagline') ? 'has-error' : '' }}">
                            <label for="tagline">{{ trans('cruds.tyre.fields.tagline') }}</label>
                            <input class="form-control" type="text" name="tagline" id="tagline" value="{{ old('tagline', $tyre->tagline) }}">
                            @if($errors->has('tagline'))
                                <span class="help-block" role="alert">{{ $errors->first('tagline') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.tagline_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('model_combinations') ? 'has-error' : '' }}">
                            <label for="model_combinations">{{ trans('cruds.tyre.fields.model_combination') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="model_combinations[]" id="model_combinations" multiple>
                                @foreach($model_combinations as $id => $model_combination)
                                    <option value="{{ $model_combination->id }}" {{ (in_array($model_combination->id, old('model_combinations', [])) || $tyre->model_combinations->contains($model_combination->id)) ? 'selected' : '' }}>{{ $model_combination->brand->brand }} :
                                        {{$model_combination->car_model->model}} : {{$model_combination->engine->engine}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('model_combinations'))
                                <span class="help-block" role="alert">{{ $errors->first('model_combinations') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.model_combination_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('categoys') ? 'has-error' : '' }}">
                            <label for="categoys">{{ trans('cruds.tyre.fields.categoy') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="categoys[]" id="categoys" multiple>
                                @foreach($categoys as $id => $categoy)
                                    <option value="{{ $id }}" {{ (in_array($id, old('categoys', [])) || $tyre->categoys->contains($id)) ? 'selected' : '' }}>{{ $categoy }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categoys'))
                                <span class="help-block" role="alert">{{ $errors->first('categoys') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.categoy_helper') }}</span>
                        </div>
                        
                        
                        <div class="form-group {{ $errors->has('series') ? 'has-error' : '' }}">
                            <label for="series">{{ trans('cruds.tyre.fields.series') }}</label>
                            <select class="form-control" name="series" id="series">
                            
                              @foreach(App\Models\Tyre::SERIES as $id => $series)
                             
                              <option value="{{ $id }}" {{ (old('series') ? old('series') : $tyre->series ?? '') == $id ? 'selected' : '' }}>{{ $series }}</option>
                              
                              @endforeach
                            </select>
                            @if($errors->has('series'))
                                <span class="help-block" role="alert">{{ $errors->first('series') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.series_helper') }}</span>
                        </div>
                        
                        
                        <div class="form-group {{ $errors->has('width') ? 'has-error' : '' }}">
                            <label for="width_id">{{ trans('cruds.tyre.fields.width') }}</label>
                            <select class="form-control select2" name="width_id" id="width_id">
                                @foreach($widths as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('width_id') ? old('width_id') : $tyre->width->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('width'))
                                <span class="help-block" role="alert">{{ $errors->first('width') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.width_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('ratio') ? 'has-error' : '' }}">
                            <label for="ratio_id">{{ trans('cruds.tyre.fields.ratio') }}</label>
                            <select class="form-control select2" name="ratio_id" id="ratio_id">
                                @foreach($ratios as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('ratio_id') ? old('ratio_id') : $tyre->ratio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ratio'))
                                <span class="help-block" role="alert">{{ $errors->first('ratio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.ratio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                            <label for="size_id">{{ trans('cruds.tyre.fields.size') }}</label>
                            <select class="form-control select2" name="size_id" id="size_id">
                                @foreach($sizes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('size_id') ? old('size_id') : $tyre->size->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('size'))
                                <span class="help-block" role="alert">{{ $errors->first('size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.size_helper') }}</span>
                        </div>
                        
                        
                        <div class="form-group {{ $errors->has('dry') ? 'has-error' : '' }}">
                            <label for="dry_id">{{ trans('cruds.tyre.fields.dry') }}</label>
                            <select class="form-control" name="dry_id" id="dry_id">
                            
                              @foreach(App\Models\Tyre::PERFORMANCES as $id => $performance)
                             
                              <option value="{{ $id }}" {{ (old('dry_id') ? old('dry_id') : $tyre->dry_id ?? '') == $id ? 'selected' : '' }}>{{ $performance }}</option>
                              
                              @endforeach
                            </select>
                            @if($errors->has('dry'))
                                <span class="help-block" role="alert">{{ $errors->first('dry') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.dry_helper') }}</span>
                        </div>
                        
                               <div class="form-group {{ $errors->has('wet') ? 'has-error' : '' }}">
                            <label for="wet_id">{{ trans('cruds.tyre.fields.wet') }}</label>
                            <select class="form-control" name="wet_id" id="wet_id">
                           @foreach(App\Models\Tyre::PERFORMANCES as $id => $performance)
                             
                              <option value="{{ $id }}" {{ (old('wet_id') ? old('wet_id') : $tyre->wet_id ?? '') == $id ? 'selected' : '' }}>{{ $performance }}</option>
                              @endforeach
                            </select>
                            @if($errors->has('wet'))
                                <span class="help-block" role="alert">{{ $errors->first('wet') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.wet_helper') }}</span>
                        </div>
                        
                               <div class="form-group {{ $errors->has('sport') ? 'has-error' : '' }}">
                            <label for="sport_id">{{ trans('cruds.tyre.fields.sport') }}</label>
                            <select class="form-control" name="sport_id" id="sport_id">
                       @foreach(App\Models\Tyre::PERFORMANCES as $id => $performance)
                             
                              <option value="{{ $id }}" {{ (old('sport_id') ? old('sport_id') : $tyre->sport_id ?? '') == $id ? 'selected' : '' }}>{{ $performance }}</option>
                              @endforeach
                            </select>
                            @if($errors->has('sport'))
                                <span class="help-block" role="alert">{{ $errors->first('sport') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.sport_helper') }}</span>
                        </div>
                               <div class="form-group {{ $errors->has('comfort') ? 'has-error' : '' }}">
                            <label for="comfort_id">{{ trans('cruds.tyre.fields.comfort') }}</label>
                            <select class="form-control" name="comfort_id" id="comfort_id">
                            @foreach(App\Models\Tyre::PERFORMANCES as $id => $performance)
                             
                              <option value="{{ $id }}" {{ (old('comfort_id') ? old('comfort_id') : $tyre->comfort_id ?? '') == $id ? 'selected' : '' }}>{{ $performance }}</option>
                              @endforeach
                            </select>
                            @if($errors->has('comfort'))
                                <span class="help-block" role="alert">{{ $errors->first('comfort') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.comfort_helper') }}</span>
                        </div>
                        
                               <div class="form-group {{ $errors->has('mileage') ? 'has-error' : '' }}">
                            <label for="mileage_id">{{ trans('cruds.tyre.fields.mileage') }}</label>
                            <select class="form-control" name="mileage_id" id="mileage_id">
                         @foreach(App\Models\Tyre::PERFORMANCES as $id => $performance)
                             
                              <option value="{{ $id }}" {{ (old('mileage_id') ? old('mileage_id') : $tyre->mileage_id ?? '') == $id ? 'selected' : '' }}>{{ $performance }}</option>
                              @endforeach
                            </select>
                            @if($errors->has('mileage'))
                                <span class="help-block" role="alert">{{ $errors->first('mileage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.mileage_helper') }}</span>
                        </div>
                        
                        
                        <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description">{{ trans('cruds.tyre.fields.short_description') }}</label>
                            <textarea class="form-control ckeditor" name="short_description" id="short_description">{!! old('short_description', $tyre->short_description) !!}</textarea>
                            @if($errors->has('short_description'))
                                <span class="help-block" role="alert">{{ $errors->first('short_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.short_description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('long_description') ? 'has-error' : '' }}">
                            <label for="long_description">{{ trans('cruds.tyre.fields.long_description') }}</label>
                            <textarea class="form-control ckeditor" name="long_description" id="long_description">{!! old('long_description', $tyre->long_description) !!}</textarea>
                            @if($errors->has('long_description'))
                                <span class="help-block" role="alert">{{ $errors->first('long_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.long_description_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('advantages') ? 'has-error' : '' }}">
                            <label for="advantages">{{ trans('cruds.tyre.fields.advantages') }}</label>
                            <textarea class="form-control ckeditor" name="advantages" id="advantages">{!! old('advantages', $tyre->advantages) !!}</textarea>
                            @if($errors->has('advantages'))
                                <span class="help-block" role="alert">{{ $errors->first('advantages') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.advantages_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                            <label for="thumbnail">{{ trans('cruds.tyre.fields.thumbnail') }}</label>
                            <div class="needsclick dropzone" id="thumbnail-dropzone">
                            </div>
                            @if($errors->has('thumbnail'))
                                <span class="help-block" role="alert">{{ $errors->first('thumbnail') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.thumbnail_helper') }}</span>
                        </div>
                   
                        <div class="form-group {{ $errors->has('gallery') ? 'has-error' : '' }}">
                            <label for="gallery">{{ trans('cruds.tyre.fields.gallery') }}</label>
                            <div class="needsclick dropzone" id="gallery-dropzone">
                            </div>
                            @if($errors->has('gallery'))
                                <span class="help-block" role="alert">{{ $errors->first('gallery') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.gallery_helper') }}</span>
                        </div>
                  
                        <div class="form-group {{ $errors->has('features') ? 'has-error' : '' }}">
                            <label for="features">{{ trans('cruds.tyre.fields.features') }}</label>
                            <textarea class="form-control ckeditor" name="features" id="features">{!! old('features', $tyre->features) !!}</textarea>
                            @if($errors->has('features'))
                                <span class="help-block" role="alert">{{ $errors->first('features') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.features_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">
                            <label for="specifications">{{ trans('cruds.tyre.fields.specifications') }}</label>
                            <textarea class="form-control ckeditor" name="specifications" id="specifications">{!! old('specifications', $tyre->specifications) !!}</textarea>
                            @if($errors->has('specifications'))
                                <span class="help-block" role="alert">{{ $errors->first('specifications') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.specifications_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('warranty') ? 'has-error' : '' }}">
                            <label for="warranty">{{ trans('cruds.tyre.fields.warranty') }}</label>
                            <textarea class="form-control ckeditor" name="warranty" id="warranty">{!! old('warranty', $tyre->warranty) !!}</textarea>
                            @if($errors->has('warranty'))
                                <span class="help-block" role="alert">{{ $errors->first('warranty') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.warranty_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                            <label for="video">{{ trans('cruds.tyre.fields.video') }}</label>
                            <textarea class="form-control" name="video" id="video">{!! old('video', $tyre->video) !!}</textarea>
                            @if($errors->has('video'))
                                <span class="help-block" role="alert">{{ $errors->first('video') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.video_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
                            <label for="banner">{{ trans('cruds.tyre.fields.banner') }}</label>
                            <div class="needsclick dropzone" id="banner-dropzone">
                            </div>
                            @if($errors->has('banner'))
                                <span class="help-block" role="alert">{{ $errors->first('banner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.banner_helper') }}</span>
                        </div>
                        
                          <h4>Tyre Technology</h4>
                        <hr>
                        
                  <div class="form-group {{ $errors->has('technology_runflat') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="technology_runflat" value="0">
                                <input type="checkbox" name="technology_runflat" id="technology_runflat" value="1" {{ $tyre->technology_runflat || old('technology_runflat', 0) === 1 ? 'checked' : '' }}>
                                <label for="technology_runflat" style="font-weight: 400">{{ trans('cruds.tyre.fields.technology_runflat') }}</label>
                            </div>
                            @if($errors->has('technology_runflat'))
                                <span class="help-block" role="alert">{{ $errors->first('technology_runflat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.technology_runflat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('technology_pncs') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="technology_pncs" value="0">
                                <input type="checkbox" name="technology_pncs" id="technology_pncs" value="1" {{ $tyre->technology_pncs || old('technology_pncs', 0) === 1 ? 'checked' : '' }}>
                                <label for="technology_pncs" style="font-weight: 400">{{ trans('cruds.tyre.fields.technology_pncs') }}</label>
                            </div>
                            @if($errors->has('technology_pncs'))
                                <span class="help-block" role="alert">{{ $errors->first('technology_pncs') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.technology_pncs_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('technology_seal_inside') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="technology_seal_inside" value="0">
                                <input type="checkbox" name="technology_seal_inside" id="technology_seal_inside" value="1" {{ $tyre->technology_seal_inside || old('technology_seal_inside', 0) === 1 ? 'checked' : '' }}>
                                <label for="technology_seal_inside" style="font-weight: 400">{{ trans('cruds.tyre.fields.technology_seal_inside') }}</label>
                            </div>
                            @if($errors->has('technology_seal_inside'))
                                <span class="help-block" role="alert">{{ $errors->first('technology_seal_inside') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tyre.fields.technology_seal_inside_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.tyres.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $tyre->id ?? 0 }}');
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
    url: '{{ route('admin.tyres.storeMedia') }}',
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
@if(isset($tyre) && $tyre->thumbnail)
      var file = {!! json_encode($tyre->thumbnail) !!}
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
    url: '{{ route('admin.tyres.storeMedia') }}',
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
@if(isset($tyre) && $tyre->banner)
      var file = {!! json_encode($tyre->banner) !!}
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
    url: '{{ route('admin.tyres.storeMedia') }}',
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
@if(isset($tyre) && $tyre->gallery)
      var files = {!! json_encode($tyre->gallery) !!}
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
