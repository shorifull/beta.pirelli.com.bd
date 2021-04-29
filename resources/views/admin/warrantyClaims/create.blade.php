@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.warrantyClaim.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.warranty-claims.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
                            <label class="required" for="invoice_number">{{ trans('cruds.warrantyClaim.fields.invoice_number') }}</label>
                            <input class="form-control" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', '') }}" required>
                            @if($errors->has('invoice_number'))
                                <span class="help-block" role="alert">{{ $errors->first('invoice_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.warrantyClaim.fields.invoice_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('invoice_attachment') ? 'has-error' : '' }}">
                            <label for="invoice_attachment">{{ trans('cruds.warrantyClaim.fields.invoice_attachment') }}</label>
                            <div class="needsclick dropzone" id="invoice_attachment-dropzone">
                            </div>
                            @if($errors->has('invoice_attachment'))
                                <span class="help-block" role="alert">{{ $errors->first('invoice_attachment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.warrantyClaim.fields.invoice_attachment_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
                            <label class="required" for="product_name_id">{{ trans('cruds.warrantyClaim.fields.product_name') }}</label>
                            <select class="form-control select2" name="product_name_id" id="product_name_id" required>
                                @foreach($product_names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_name'))
                                <span class="help-block" role="alert">{{ $errors->first('product_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.warrantyClaim.fields.product_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_size') ? 'has-error' : '' }}">
                            <label class="required" for="product_size_id">{{ trans('cruds.warrantyClaim.fields.product_size') }}</label>
                            <select class="form-control select2" name="product_size_id" id="product_size_id" required>
                                @foreach($product_sizes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_size_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_size'))
                                <span class="help-block" role="alert">{{ $errors->first('product_size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.warrantyClaim.fields.product_size_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                            <label for="photos">{{ trans('cruds.warrantyClaim.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.warrantyClaim.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('retailer') ? 'has-error' : '' }}">
                            <label for="retailer_id">{{ trans('cruds.warrantyClaim.fields.retailer') }}</label>
                            <select class="form-control select2" name="retailer_id" id="retailer_id">
                                @foreach($retailers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('retailer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('retailer'))
                                <span class="help-block" role="alert">{{ $errors->first('retailer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.warrantyClaim.fields.retailer_helper') }}</span>
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
    Dropzone.options.invoiceAttachmentDropzone = {
    url: '{{ route('admin.warranty-claims.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="invoice_attachment"]').remove()
      $('form').append('<input type="hidden" name="invoice_attachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="invoice_attachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($warrantyClaim) && $warrantyClaim->invoice_attachment)
      var file = {!! json_encode($warrantyClaim->invoice_attachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="invoice_attachment" value="' + file.file_name + '">')
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
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.warranty-claims.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($warrantyClaim) && $warrantyClaim->photos)
      var files = {!! json_encode($warrantyClaim->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
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