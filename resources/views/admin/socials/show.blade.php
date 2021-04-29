@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.social.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.socials.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $social->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.facebook') }}
                                    </th>
                                    <td>
                                        {{ $social->facebook }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.twitter') }}
                                    </th>
                                    <td>
                                        {{ $social->twitter }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.linked_in') }}
                                    </th>
                                    <td>
                                        {{ $social->linked_in }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.google_plus') }}
                                    </th>
                                    <td>
                                        {{ $social->google_plus }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.pinterest') }}
                                    </th>
                                    <td>
                                        {{ $social->pinterest }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.you_tube') }}
                                    </th>
                                    <td>
                                        {{ $social->you_tube }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.instagram') }}
                                    </th>
                                    <td>
                                        {{ $social->instagram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.tumblr') }}
                                    </th>
                                    <td>
                                        {{ $social->tumblr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.flickr') }}
                                    </th>
                                    <td>
                                        {{ $social->flickr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.reddit') }}
                                    </th>
                                    <td>
                                        {{ $social->reddit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.snapchat') }}
                                    </th>
                                    <td>
                                        {{ $social->snapchat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.whats_app') }}
                                    </th>
                                    <td>
                                        {{ $social->whats_app }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.quora') }}
                                    </th>
                                    <td>
                                        {{ $social->quora }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.socials.index') }}">
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