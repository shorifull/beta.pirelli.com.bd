@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.motoRegistration.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.moto-registrations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->city->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.zip') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->zip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.date_purchased') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->date_purchased }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.invoice_number') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->invoice_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.invoice_attachment') }}
                                    </th>
                                    <td>
                                        @if($motoRegistration->invoice_attachment)
                                            <a href="{{ $motoRegistration->invoice_attachment->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_name') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->product_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_size') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->product_size->size ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_dot') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->product_dot }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_quantity') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->product_quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.photos') }}
                                    </th>
                                    <td>
                                        @foreach($motoRegistration->photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.retailer') }}
                                    </th>
                                    <td>
                                        {{ $motoRegistration->retailer->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.moto-registrations.index') }}">
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