@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.retailer.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.retailers.update", [$retailer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('vehicle_type') ? 'has-error' : '' }}">
                            <label class="required" for="vehicle_type_id">{{ trans('cruds.retailer.fields.vehicle_type') }}</label>
                            <select class="form-control select2" name="vehicle_type_id" id="vehicle_type_id" required>
                                @foreach($vehicle_types as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('vehicle_type_id') ? old('vehicle_type_id') : $retailer->vehicle_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vehicle_type'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.vehicle_type_helper') }}</span>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="categories">{{ trans('cruds.retailer.fields.categories') }}</label>--}}
{{--                            <div style="padding-bottom: 4px">--}}
{{--                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>--}}
{{--                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>--}}
{{--                            </div>--}}
{{--                            <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>--}}
{{--                                @foreach($categories as $id => $categories)--}}
{{--                                    <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $retailer->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @if($errors->has('categories'))--}}
{{--                                <div class="invalid-feedback">--}}
{{--                                    {{ $errors->first('categories') }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            <span class="help-block">{{ trans('cruds.retailer.fields.categories_helper') }}</span>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.retailer.fields.description') }}</label>
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $retailer->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
                            <label for="banner">{{ trans('cruds.retailer.fields.banner') }}</label>
                            <div class="needsclick dropzone" id="banner-dropzone">
                            </div>
                            @if($errors->has('banner'))
                                <span class="help-block" role="alert">{{ $errors->first('banner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.banner_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.retailer.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $retailer->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.name_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="required" for="phone">{{ trans('cruds.retailer.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $retailer->phone) }}" required>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.phone_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label class="required" for="city_id">{{ trans('cruds.retailer.fields.city') }}</label>
                            <select class="form-control select2" name="city_id" id="city_id" required>
                                @foreach($cities as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $retailer->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city'))
                                <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.city_helper') }}</span>
                        </div>
                               <div class="form-group">
                            <label for="location">{{ trans('cruds.retailer.fields.location') }}</label>
                            <textarea class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" name="location" id="location">{{ old('location', $retailer->location) }}</textarea>
                            @if($errors->has('location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.retailer.fields.address') }}</label>
                            <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $retailer->address) }}">
                            <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude', $retailer->latitude) ?? '0' }}" />
                            <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude', $retailer->longitude) ?? '0' }}" />
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.address_helper') }}</span>
                        </div>
                        <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $retailer->active || old('active', 0) === 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">{{ trans('cruds.retailer.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.retailer.fields.active_helper') }}</span>
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
    <script src="/js/mapInput.js"></script>
    <script>
        Dropzone.options.bannerDropzone = {
            url: '{{ route('admin.retailers.storeMedia') }}',
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
                    @if(isset($retailer) && $retailer->banner)
                var file = {!! json_encode($retailer->banner) !!}
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
