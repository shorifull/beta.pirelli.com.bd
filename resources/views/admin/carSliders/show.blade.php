@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.carSlider.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.car-sliders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $carSlider->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $carSlider->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.short_description') }}
                                    </th>
                                    <td>
                                        {{ $carSlider->short_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.long_description') }}
                                    </th>
                                    <td>
                                        {!! $carSlider->long_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.button_label') }}
                                    </th>
                                    <td>
                                        {{ $carSlider->button_label }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.button_url') }}
                                    </th>
                                    <td>
                                        {{ $carSlider->button_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.image') }}
                                    </th>
                                    <td>
                                        @if($carSlider->image)
                                            <a href="{{ $carSlider->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $carSlider->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.carSlider.fields.activated') }}
                                    </th>
                                    <td>
                                        {{ App\Models\CarSlider::ACTIVATED_RADIO[$carSlider->activated] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.car-sliders.index') }}">
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