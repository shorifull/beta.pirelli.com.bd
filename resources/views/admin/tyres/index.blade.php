@extends('layouts.admin')
@section('content')
<div class="content">
    @can('tyre_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tyres.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tyre.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.tyre.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Tyre">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.model_combination') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.series') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.width') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.ratio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.thumbnail') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.tyre.fields.banner') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tyres as $key => $tyre)
                                    <tr data-entry-id="{{ $tyre->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $tyre->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tyre->title ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($tyre->model_combinations as $key => $modelCombination)
                                                <span class="label label-info label-many">    {{ $modelCombination->brand->brand }} :
                                                {{$modelCombination->car_model->model}} : {{$modelCombination->engine->engine}}</span>
                                            @endforeach

                                        </td>
                                        <td>
                                            
                                        <span class="label label-info label-many">{{ $tyre->series }}</span>
                                           
                                        </td>
                                        <td>
                                            {{ $tyre->width->width ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tyre->ratio->ratio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tyre->size->size ?? '' }}
                                        </td>
                                        <td>
                                            @if($tyre->thumbnail)
                                                <a href="{{ $tyre->thumbnail->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $tyre->thumbnail->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($tyre->banner)
                                                <a href="{{ $tyre->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $tyre->banner->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('tyre_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('car-tyre', [$tyre->slug]) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('tyre_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.tyres.edit', $tyre->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('tyre_delete')
                                                <form action="{{ route('admin.tyres.destroy', $tyre->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tyre_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tyres.massDestroy') }}",
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
  let table = $('.datatable-Tyre:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
