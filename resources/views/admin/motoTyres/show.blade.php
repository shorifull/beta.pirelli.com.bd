@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.motoTyre.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.moto-tyres.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_brand') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->moto_brand->brand ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_model') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->moto_model->model ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_engine') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->moto_engine->engine ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_width') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->moto_width->width ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_size') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->moto_size->size ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_ratio') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->moto_ratio->ratio ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.category') }}
                                    </th>
                                    <td>
                                        @foreach($motoTyre->categories as $key => $category)
                                            <span class="label label-info">{{ $category->category }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.short_description') }}
                                    </th>
                                    <td>
                                        {!! $motoTyre->short_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.long_description') }}
                                    </th>
                                    <td>
                                        {!! $motoTyre->long_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.thumbnail') }}
                                    </th>
                                    <td>
                                        @if($motoTyre->thumbnail)
                                            <a href="{{ $motoTyre->thumbnail->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $motoTyre->thumbnail->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.banner') }}
                                    </th>
                                    <td>
                                        @if($motoTyre->banner)
                                            <a href="{{ $motoTyre->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $motoTyre->banner->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.features') }}
                                    </th>
                                    <td>
                                        {!! $motoTyre->features !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.specifications') }}
                                    </th>
                                    <td>
                                        {!! $motoTyre->specifications !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.warranty') }}
                                    </th>
                                    <td>
                                        {!! $motoTyre->warranty !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.video') }}
                                    </th>
                                    <td>
                                        {{ $motoTyre->video }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.moto-tyres.index') }}">
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