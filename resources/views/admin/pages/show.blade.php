@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.page.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $page->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.page_name') }}
                                    </th>
                                    <td>
                                        {{ $page->page_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.page_slug') }}
                                    </th>
                                    <td>
                                        {{ $page->page_slug }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.page_content') }}
                                    </th>
                                    <td>
                                        {!! $page->page_content !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.banner') }}
                                    </th>
                                    <td>
                                        @if($page->banner)
                                            <a href="{{ $page->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $page->banner->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Page::ACTIVE_RADIO[$page->active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.meta_title') }}
                                    </th>
                                    <td>
                                        {{ $page->meta_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.meta_keywords') }}
                                    </th>
                                    <td>
                                        {{ $page->meta_keywords }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.meta_description') }}
                                    </th>
                                    <td>
                                        {{ $page->meta_description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
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