@extends('layouts.admin')
@section('content')
<div class="content">
    @can('social_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.socials.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.social.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.social.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Social">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.facebook') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.twitter') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.linked_in') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.google_plus') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.pinterest') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.you_tube') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.instagram') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.tumblr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.flickr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.reddit') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.snapchat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.whats_app') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.social.fields.quora') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($socials as $key => $social)
                                    <tr data-entry-id="{{ $social->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $social->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->facebook ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->twitter ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->linked_in ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->google_plus ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->pinterest ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->you_tube ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->instagram ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->tumblr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->flickr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->reddit ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->snapchat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->whats_app ?? '' }}
                                        </td>
                                        <td>
                                            {{ $social->quora ?? '' }}
                                        </td>
                                        <td>
                                            @can('social_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.socials.show', $social->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('social_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.socials.edit', $social->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('social_delete')
                                                <form action="{{ route('admin.socials.destroy', $social->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('social_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.socials.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Social:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection