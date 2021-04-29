@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.warrantyClaim.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.warranty-claims.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $warrantyClaim->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.invoice_number') }}
                                    </th>
                                    <td>
                                        {{ $warrantyClaim->invoice_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.invoice_attachment') }}
                                    </th>
                                    <td>
                                        @if($warrantyClaim->invoice_attachment)
                                            <a href="{{ $warrantyClaim->invoice_attachment->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.product_name') }}
                                    </th>
                                    <td>
                                        {{ $warrantyClaim->product_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.product_size') }}
                                    </th>
                                    <td>
                                        {{ $warrantyClaim->product_size->size ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.photos') }}
                                    </th>
                                    <td>
                                        @foreach($warrantyClaim->photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.retailer') }}
                                    </th>
                                    <td>
                                        {{ $warrantyClaim->retailer->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.warranty-claims.index') }}">
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