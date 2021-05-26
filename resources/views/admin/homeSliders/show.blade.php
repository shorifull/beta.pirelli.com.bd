@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.homeSlider.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.home-sliders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $homeSlider->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $homeSlider->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.short_description') }}
                                    </th>
                                    <td>
                                        {{ $homeSlider->short_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.long_description') }}
                                    </th>
                                    <td>
                                        {!! $homeSlider->long_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.button_label') }}
                                    </th>
                                    <td>
                                        {{ $homeSlider->button_label }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.button_url') }}
                                    </th>
                                    <td>
                                        {{ $homeSlider->button_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.image') }}
                                    </th>
                                    <td>
                                        @if($homeSlider->image)
                                            <a href="{{ $homeSlider->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $homeSlider->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.activated') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HomeSlider::ACTIVATED_RADIO[$homeSlider->activated] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.home-sliders.index') }}">
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