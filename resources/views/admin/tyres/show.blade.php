@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.tyre.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tyres.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $tyre->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $tyre->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.model_combination') }}
                                    </th>
                                    <td>
                                        @foreach($tyre->model_combinations as $key => $model_combination)
                                            <span class="label label-info">{{ $model_combination->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.categoy') }}
                                    </th>
                                    <td>
                                        @foreach($tyre->categoys as $key => $categoy)
                                            <span class="label label-info">{{ $categoy->category }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.width') }}
                                    </th>
                                    <td>
                                        {{ $tyre->width->width ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.ratio') }}
                                    </th>
                                    <td>
                                        {{ $tyre->ratio->ratio ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.size') }}
                                    </th>
                                    <td>
                                        {{ $tyre->size->size ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.short_description') }}
                                    </th>
                                    <td>
                                        {!! $tyre->short_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.long_description') }}
                                    </th>
                                    <td>
                                        {!! $tyre->long_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.thumbnail') }}
                                    </th>
                                    <td>
                                        @if($tyre->thumbnail)
                                            <a href="{{ $tyre->thumbnail->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $tyre->thumbnail->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.banner') }}
                                    </th>
                                    <td>
                                        @if($tyre->banner)
                                            <a href="{{ $tyre->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $tyre->banner->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.features') }}
                                    </th>
                                    <td>
                                        {!! $tyre->features !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.specifications') }}
                                    </th>
                                    <td>
                                        {!! $tyre->specifications !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.warranty') }}
                                    </th>
                                    <td>
                                        {!! $tyre->warranty !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tyre.fields.video') }}
                                    </th>
                                    <td>
                                        {!! $tyre->video !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tyres.index') }}">
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
