@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.carRegistration.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.car-registrations.update", [$carRegistration->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label for="first_name">{{ trans('cruds.carRegistration.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $carRegistration->first_name) }}">
                            @if($errors->has('first_name'))
                                <span class="help-block" role="alert">{{ $errors->first('first_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label for="last_name">{{ trans('cruds.carRegistration.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $carRegistration->last_name) }}">
                            @if($errors->has('last_name'))
                                <span class="help-block" role="alert">{{ $errors->first('last_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.carRegistration.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $carRegistration->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="required" for="phone">{{ trans('cruds.carRegistration.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $carRegistration->phone) }}" required>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label class="required" for="city_id">{{ trans('cruds.carRegistration.fields.city') }}</label>
                            <select class="form-control select2" name="city_id" id="city_id" required>
                                @foreach($cities as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $carRegistration->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city'))
                                <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('zip') ? 'has-error' : '' }}">
                            <label class="required" for="zip">{{ trans('cruds.carRegistration.fields.zip') }}</label>
                            <input class="form-control" type="text" name="zip" id="zip" value="{{ old('zip', $carRegistration->zip) }}" required>
                            @if($errors->has('zip'))
                                <span class="help-block" role="alert">{{ $errors->first('zip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.zip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.carRegistration.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $carRegistration->address) }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_purchased') ? 'has-error' : '' }}">
                            <label class="required" for="date_purchased">{{ trans('cruds.carRegistration.fields.date_purchased') }}</label>
                            <input class="form-control date" type="text" name="date_purchased" id="date_purchased" value="{{ old('date_purchased', $carRegistration->date_purchased) }}" required>
                            @if($errors->has('date_purchased'))
                                <span class="help-block" role="alert">{{ $errors->first('date_purchased') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.date_purchased_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
                            <label class="required" for="invoice_number">{{ trans('cruds.carRegistration.fields.invoice_number') }}</label>
                            <input class="form-control" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $carRegistration->invoice_number) }}" required>
                            @if($errors->has('invoice_number'))
                                <span class="help-block" role="alert">{{ $errors->first('invoice_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.invoice_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('invoice_attachment') ? 'has-error' : '' }}">
                            <label class="required" for="invoice_attachment">{{ trans('cruds.carRegistration.fields.invoice_attachment') }}</label>
                            <div class="needsclick dropzone" id="invoice_attachment-dropzone">
                            </div>
                            @if($errors->has('invoice_attachment'))
                                <span class="help-block" role="alert">{{ $errors->first('invoice_attachment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.invoice_attachment_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
                            <label class="required" for="product_name_id">{{ trans('cruds.carRegistration.fields.product_name') }}</label>
                            <select class="form-control select2" name="product_name_id" id="product_name_id" required>
                                @foreach($product_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('product_name_id') ? old('product_name_id') : $carRegistration->product_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_name'))
                                <span class="help-block" role="alert">{{ $errors->first('product_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.product_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_size') ? 'has-error' : '' }}">
                            <label class="required" for="product_size_id">{{ trans('cruds.carRegistration.fields.product_size') }}</label>
                            <select class="form-control select2" name="product_size_id" id="product_size_id" required>
                                @foreach($product_sizes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('product_size_id') ? old('product_size_id') : $carRegistration->product_size->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_size'))
                                <span class="help-block" role="alert">{{ $errors->first('product_size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.product_size_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_dot') ? 'has-error' : '' }}">
                            <label for="product_dot">{{ trans('cruds.carRegistration.fields.product_dot') }}</label>
                            <input class="form-control" type="text" name="product_dot" id="product_dot" value="{{ old('product_dot', $carRegistration->product_dot) }}">
                            @if($errors->has('product_dot'))
                                <span class="help-block" role="alert">{{ $errors->first('product_dot') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.product_dot_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_quantity') ? 'has-error' : '' }}">
                            <label class="required" for="product_quantity">{{ trans('cruds.carRegistration.fields.product_quantity') }}</label>
                            <input class="form-control" type="number" name="product_quantity" id="product_quantity" value="{{ old('product_quantity', $carRegistration->product_quantity) }}" step="1" required>
                            @if($errors->has('product_quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('product_quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.product_quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                            <label for="photos">{{ trans('cruds.carRegistration.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('retailer') ? 'has-error' : '' }}">
                            <label for="retailer_id">{{ trans('cruds.carRegistration.fields.retailer') }}</label>
                            <select class="form-control select2" name="retailer_id" id="retailer_id">
                                @foreach($retailers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('retailer_id') ? old('retailer_id') : $carRegistration->retailer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('retailer'))
                                <span class="help-block" role="alert">{{ $errors->first('retailer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.carRegistration.fields.retailer_helper') }}</span>
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
    url: '{{ route('admin.car-registrations.storeMedia') }}',
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
@if(isset($carRegistration) && $carRegistration->invoice_attachment)
      var file = {!! json_encode($carRegistration->invoice_attachment) !!}
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
    url: '{{ route('admin.car-registrations.storeMedia') }}',
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
@if(isset($carRegistration) && $carRegistration->photos)
      var files = {!! json_encode($carRegistration->photos) !!}
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