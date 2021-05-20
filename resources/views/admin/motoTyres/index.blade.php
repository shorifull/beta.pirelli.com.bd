@extends('layouts.admin')
@section('content')
<div class="content">
    @can('moto_tyre_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.moto-tyres.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.motoTyre.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.motoTyre.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MotoTyre">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_brand') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_model') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_engine') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_width') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.moto_ratio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.thumbnail') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoTyre.fields.banner') }}
                                    </th>

                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($motoTyres as $key => $motoTyre)
                                    <tr data-entry-id="{{ $motoTyre->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $motoTyre->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoTyre->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoTyre->moto_brand->brand ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoTyre->moto_model->model ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoTyre->moto_engine->engine ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoTyre->moto_width->width ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoTyre->moto_size->size ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoTyre->moto_ratio->ratio ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($motoTyre->categories as $key => $item)
                                                <span class="label label-info label-many">{{ $item->category }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($motoTyre->thumbnail)
                                                <a href="{{ $motoTyre->thumbnail->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $motoTyre->thumbnail->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($motoTyre->banner)
                                                <a href="{{ $motoTyre->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $motoTyre->banner->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('moto_tyre_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.moto-tyres.show', $motoTyre->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('moto_tyre_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.moto-tyres.edit', $motoTyre->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('moto_tyre_delete')
                                                <form action="{{ route('admin.moto-tyres.destroy', $motoTyre->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('moto_tyre_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.moto-tyres.massDestroy') }}",
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
  let table = $('.datatable-MotoTyre:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })

})

</script>
@endsection
