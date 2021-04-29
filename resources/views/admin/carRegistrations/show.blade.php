@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.carRegistration.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.car-registrations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->city->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.zip') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->zip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.date_purchased') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->date_purchased }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.invoice_number') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->invoice_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.invoice_attachment') }}
                                    </th>
                                    <td>
                                        @if($carRegistration->invoice_attachment)
                                            <a href="{{ $carRegistration->invoice_attachment->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_name') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->product_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_size') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->product_size->size ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_dot') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->product_dot }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_quantity') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->product_quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.photos') }}
                                    </th>
                                    <td>
                                        @foreach($carRegistration->photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.retailer') }}
                                    </th>
                                    <td>
                                        {{ $carRegistration->retailer->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.car-registrations.index') }}">
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