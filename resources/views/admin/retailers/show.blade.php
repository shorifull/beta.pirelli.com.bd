@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.show') }} {{ trans('cruds.retailer.title') }}
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.retailers.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.retailer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $retailer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.retailer.fields.vehicle_type') }}
                                    </th>
                                    <td>
                                        {{ $retailer->vehicle_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.retailer.fields.shop_name') }}
                                    </th>
                                    <td>
                                        {{ $retailer->shop_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.retailer.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $retailer->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.retailer.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $retailer->city->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.retailer.fields.banner') }}
                                    </th>
                                    <td>
                                        @if($retailer->banner)
                                            <a href="{{ $retailer->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $retailer->banner->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.retailers.index') }}">
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
