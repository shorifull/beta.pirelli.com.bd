@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.social.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.socials.update", [$social->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                            <label for="facebook">{{ trans('cruds.social.fields.facebook') }}</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', $social->facebook) }}">
                            @if($errors->has('facebook'))
                                <span class="help-block" role="alert">{{ $errors->first('facebook') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.facebook_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                            <label for="twitter">{{ trans('cruds.social.fields.twitter') }}</label>
                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ old('twitter', $social->twitter) }}">
                            @if($errors->has('twitter'))
                                <span class="help-block" role="alert">{{ $errors->first('twitter') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.twitter_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('linked_in') ? 'has-error' : '' }}">
                            <label for="linked_in">{{ trans('cruds.social.fields.linked_in') }}</label>
                            <input class="form-control" type="text" name="linked_in" id="linked_in" value="{{ old('linked_in', $social->linked_in) }}">
                            @if($errors->has('linked_in'))
                                <span class="help-block" role="alert">{{ $errors->first('linked_in') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.linked_in_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('google_plus') ? 'has-error' : '' }}">
                            <label for="google_plus">{{ trans('cruds.social.fields.google_plus') }}</label>
                            <input class="form-control" type="text" name="google_plus" id="google_plus" value="{{ old('google_plus', $social->google_plus) }}">
                            @if($errors->has('google_plus'))
                                <span class="help-block" role="alert">{{ $errors->first('google_plus') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.google_plus_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pinterest') ? 'has-error' : '' }}">
                            <label for="pinterest">{{ trans('cruds.social.fields.pinterest') }}</label>
                            <input class="form-control" type="text" name="pinterest" id="pinterest" value="{{ old('pinterest', $social->pinterest) }}">
                            @if($errors->has('pinterest'))
                                <span class="help-block" role="alert">{{ $errors->first('pinterest') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.pinterest_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('you_tube') ? 'has-error' : '' }}">
                            <label for="you_tube">{{ trans('cruds.social.fields.you_tube') }}</label>
                            <input class="form-control" type="text" name="you_tube" id="you_tube" value="{{ old('you_tube', $social->you_tube) }}">
                            @if($errors->has('you_tube'))
                                <span class="help-block" role="alert">{{ $errors->first('you_tube') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.you_tube_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                            <label for="instagram">{{ trans('cruds.social.fields.instagram') }}</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', $social->instagram) }}">
                            @if($errors->has('instagram'))
                                <span class="help-block" role="alert">{{ $errors->first('instagram') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.instagram_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tumblr') ? 'has-error' : '' }}">
                            <label for="tumblr">{{ trans('cruds.social.fields.tumblr') }}</label>
                            <input class="form-control" type="text" name="tumblr" id="tumblr" value="{{ old('tumblr', $social->tumblr) }}">
                            @if($errors->has('tumblr'))
                                <span class="help-block" role="alert">{{ $errors->first('tumblr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.tumblr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('flickr') ? 'has-error' : '' }}">
                            <label for="flickr">{{ trans('cruds.social.fields.flickr') }}</label>
                            <input class="form-control" type="text" name="flickr" id="flickr" value="{{ old('flickr', $social->flickr) }}">
                            @if($errors->has('flickr'))
                                <span class="help-block" role="alert">{{ $errors->first('flickr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.flickr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reddit') ? 'has-error' : '' }}">
                            <label for="reddit">{{ trans('cruds.social.fields.reddit') }}</label>
                            <input class="form-control" type="text" name="reddit" id="reddit" value="{{ old('reddit', $social->reddit) }}">
                            @if($errors->has('reddit'))
                                <span class="help-block" role="alert">{{ $errors->first('reddit') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.reddit_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('snapchat') ? 'has-error' : '' }}">
                            <label for="snapchat">{{ trans('cruds.social.fields.snapchat') }}</label>
                            <input class="form-control" type="text" name="snapchat" id="snapchat" value="{{ old('snapchat', $social->snapchat) }}">
                            @if($errors->has('snapchat'))
                                <span class="help-block" role="alert">{{ $errors->first('snapchat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.snapchat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : '' }}">
                            <label for="whats_app">{{ trans('cruds.social.fields.whats_app') }}</label>
                            <input class="form-control" type="text" name="whats_app" id="whats_app" value="{{ old('whats_app', $social->whats_app) }}">
                            @if($errors->has('whats_app'))
                                <span class="help-block" role="alert">{{ $errors->first('whats_app') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.whats_app_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quora') ? 'has-error' : '' }}">
                            <label for="quora">{{ trans('cruds.social.fields.quora') }}</label>
                            <input class="form-control" type="text" name="quora" id="quora" value="{{ old('quora', $social->quora) }}">
                            @if($errors->has('quora'))
                                <span class="help-block" role="alert">{{ $errors->first('quora') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.social.fields.quora_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection