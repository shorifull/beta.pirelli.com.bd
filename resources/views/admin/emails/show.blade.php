@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.email.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.emails.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $email->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.send_email_from') }}
                                    </th>
                                    <td>
                                        {{ $email->send_email_from }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.receive_email_to') }}
                                    </th>
                                    <td>
                                        {{ $email->receive_email_to }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.smtp_activated') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Email::SMTP_ACTIVATED_SELECT[$email->smtp_activated] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.smtp_ssl') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Email::SMTP_SSL_SELECT[$email->smtp_ssl] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.smtp_host') }}
                                    </th>
                                    <td>
                                        {{ $email->smtp_host }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.smtp_port') }}
                                    </th>
                                    <td>
                                        {{ $email->smtp_port }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.smtp_username') }}
                                    </th>
                                    <td>
                                        {{ $email->smtp_username }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.smtp_password') }}
                                    </th>
                                    <td>
                                        {{ $email->smtp_password }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.emails.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection