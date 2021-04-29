@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.header.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $header->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.favicon') }}
                                    </th>
                                    <td>
                                        @if($header->favicon)
                                            <a href="{{ $header->favicon->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->favicon->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($header->logo)
                                            <a href="{{ $header->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.meta_title') }}
                                    </th>
                                    <td>
                                        {{ $header->meta_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.meta_keyword') }}
                                    </th>
                                    <td>
                                        {{ $header->meta_keyword }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.meta_description') }}
                                    </th>
                                    <td>
                                        {{ $header->meta_description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
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