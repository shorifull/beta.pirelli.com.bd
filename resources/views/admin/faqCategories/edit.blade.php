@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.faqCategory.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.faq-categories.update", [$faqCategory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('faq_category') ? 'has-error' : '' }}">
                            <label for="faq_category">{{ trans('cruds.faqCategory.fields.faq_category') }}</label>
                            <input class="form-control" type="text" name="faq_category" id="faq_category" value="{{ old('faq_category', $faqCategory->faq_category) }}">
                            @if($errors->has('faq_category'))
                                <span class="help-block" role="alert">{{ $errors->first('faq_category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.faqCategory.fields.faq_category_helper') }}</span>
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