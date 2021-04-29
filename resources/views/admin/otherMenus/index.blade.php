@extends('layouts.admin')
@section('content')
<div class="content">
    @can('other_menu_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.other-menus.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.otherMenu.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.otherMenu.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-OtherMenu">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.otherMenu.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.otherMenu.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.otherMenu.fields.order') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.otherMenu.fields.url') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($otherMenus as $key => $otherMenu)
                                    <tr data-entry-id="{{ $otherMenu->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $otherMenu->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $otherMenu->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $otherMenu->order ?? '' }}
                                        </td>
                                        <td>
                                            {{ $otherMenu->url ?? '' }}
                                        </td>
                                        <td>
                                            @can('other_menu_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.other-menus.show', $otherMenu->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('other_menu_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.other-menus.edit', $otherMenu->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('other_menu_delete')
                                                <form action="{{ route('admin.other-menus.destroy', $otherMenu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('other_menu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.other-menus.massDestroy') }}",
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
  let table = $('.datatable-OtherMenu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection