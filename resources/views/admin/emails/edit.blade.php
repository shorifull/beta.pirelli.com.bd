@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.email.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.emails.update", [$email->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('send_email_from') ? 'has-error' : '' }}">
                            <label for="send_email_from">{{ trans('cruds.email.fields.send_email_from') }}</label>
                            <input class="form-control" type="text" name="send_email_from" id="send_email_from" value="{{ old('send_email_from', $email->send_email_from) }}">
                            @if($errors->has('send_email_from'))
                                <span class="help-block" role="alert">{{ $errors->first('send_email_from') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.send_email_from_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('receive_email_to') ? 'has-error' : '' }}">
                            <label for="receive_email_to">{{ trans('cruds.email.fields.receive_email_to') }}</label>
                            <input class="form-control" type="text" name="receive_email_to" id="receive_email_to" value="{{ old('receive_email_to', $email->receive_email_to) }}">
                            @if($errors->has('receive_email_to'))
                                <span class="help-block" role="alert">{{ $errors->first('receive_email_to') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.receive_email_to_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('smtp_activated') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.email.fields.smtp_activated') }}</label>
                            <select class="form-control" name="smtp_activated" id="smtp_activated">
                                <option value disabled {{ old('smtp_activated', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Email::SMTP_ACTIVATED_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('smtp_activated', $email->smtp_activated) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('smtp_activated'))
                                <span class="help-block" role="alert">{{ $errors->first('smtp_activated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.smtp_activated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('smtp_ssl') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.email.fields.smtp_ssl') }}</label>
                            <select class="form-control" name="smtp_ssl" id="smtp_ssl">
                                <option value disabled {{ old('smtp_ssl', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Email::SMTP_SSL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('smtp_ssl', $email->smtp_ssl) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('smtp_ssl'))
                                <span class="help-block" role="alert">{{ $errors->first('smtp_ssl') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.smtp_ssl_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('smtp_host') ? 'has-error' : '' }}">
                            <label for="smtp_host">{{ trans('cruds.email.fields.smtp_host') }}</label>
                            <input class="form-control" type="text" name="smtp_host" id="smtp_host" value="{{ old('smtp_host', $email->smtp_host) }}">
                            @if($errors->has('smtp_host'))
                                <span class="help-block" role="alert">{{ $errors->first('smtp_host') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.smtp_host_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('smtp_port') ? 'has-error' : '' }}">
                            <label for="smtp_port">{{ trans('cruds.email.fields.smtp_port') }}</label>
                            <input class="form-control" type="text" name="smtp_port" id="smtp_port" value="{{ old('smtp_port', $email->smtp_port) }}">
                            @if($errors->has('smtp_port'))
                                <span class="help-block" role="alert">{{ $errors->first('smtp_port') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.smtp_port_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('smtp_username') ? 'has-error' : '' }}">
                            <label for="smtp_username">{{ trans('cruds.email.fields.smtp_username') }}</label>
                            <input class="form-control" type="text" name="smtp_username" id="smtp_username" value="{{ old('smtp_username', $email->smtp_username) }}">
                            @if($errors->has('smtp_username'))
                                <span class="help-block" role="alert">{{ $errors->first('smtp_username') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.smtp_username_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('smtp_password') ? 'has-error' : '' }}">
                            <label for="smtp_password">{{ trans('cruds.email.fields.smtp_password') }}</label>
                            <input class="form-control" type="text" name="smtp_password" id="smtp_password" value="{{ old('smtp_password', $email->smtp_password) }}">
                            @if($errors->has('smtp_password'))
                                <span class="help-block" role="alert">{{ $errors->first('smtp_password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.email.fields.smtp_password_helper') }}</span>
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