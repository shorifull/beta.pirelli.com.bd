@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.modelCombination.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.model-combinations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modelCombination.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $modelCombination->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modelCombination.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $modelCombination->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modelCombination.fields.brand') }}
                                    </th>
                                    <td>
                                        {{ $modelCombination->brand->brand ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modelCombination.fields.car_model') }}
                                    </th>
                                    <td>
                                        {{ $modelCombination->car_model->model ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modelCombination.fields.year') }}
                                    </th>
                                    <td>
                                        @foreach($modelCombination->years as $key => $year)
                                            <span class="label label-info">{{ $year->year }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modelCombination.fields.engine') }}
                                    </th>
                                    <td>
                                        {{ $modelCombination->engine->engine ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modelCombination.fields.chassis') }}
                                    </th>
                                    <!--<td>-->
                                    <!--    {{ $modelCombination->chassis->chassis ?? '' }}-->
                                    <!--</td>-->
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.model-combinations.index') }}">
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