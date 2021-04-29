@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.contact.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.contacts.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('contact_address') ? 'has-error' : '' }}">
                            <label for="contact_address">{{ trans('cruds.contact.fields.contact_address') }}</label>
                            <textarea class="form-control" name="contact_address" id="contact_address">{{ old('contact_address') }}</textarea>
                            @if($errors->has('contact_address'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.contact_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_email') ? 'has-error' : '' }}">
                            <label for="contact_email">{{ trans('cruds.contact.fields.contact_email') }}</label>
                            <input class="form-control" type="text" name="contact_email" id="contact_email" value="{{ old('contact_email', '') }}">
                            @if($errors->has('contact_email'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.contact_email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_phone_number') ? 'has-error' : '' }}">
                            <label for="contact_phone_number">{{ trans('cruds.contact.fields.contact_phone_number') }}</label>
                            <input class="form-control" type="text" name="contact_phone_number" id="contact_phone_number" value="{{ old('contact_phone_number', '') }}">
                            @if($errors->has('contact_phone_number'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_phone_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.contact_phone_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_fax_number') ? 'has-error' : '' }}">
                            <label for="contact_fax_number">{{ trans('cruds.contact.fields.contact_fax_number') }}</label>
                            <input class="form-control" type="text" name="contact_fax_number" id="contact_fax_number" value="{{ old('contact_fax_number', '') }}">
                            @if($errors->has('contact_fax_number'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_fax_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.contact_fax_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_map_i_frame') ? 'has-error' : '' }}">
                            <label for="contact_map_i_frame">{{ trans('cruds.contact.fields.contact_map_i_frame') }}</label>
                            <textarea class="form-control" name="contact_map_i_frame" id="contact_map_i_frame">{{ old('contact_map_i_frame') }}</textarea>
                            @if($errors->has('contact_map_i_frame'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_map_i_frame') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.contact_map_i_frame_helper') }}</span>
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