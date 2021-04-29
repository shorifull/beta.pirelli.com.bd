@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.motoSlider.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.moto-sliders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $motoSlider->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $motoSlider->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.short_description') }}
                                    </th>
                                    <td>
                                        {{ $motoSlider->short_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.long_description') }}
                                    </th>
                                    <td>
                                        {!! $motoSlider->long_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.button_label') }}
                                    </th>
                                    <td>
                                        {{ $motoSlider->button_label }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.button_url') }}
                                    </th>
                                    <td>
                                        {{ $motoSlider->button_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.image') }}
                                    </th>
                                    <td>
                                        @if($motoSlider->image)
                                            <a href="{{ $motoSlider->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $motoSlider->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.activated') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MotoSlider::ACTIVATED_RADIO[$motoSlider->activated] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.moto-sliders.index') }}">
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