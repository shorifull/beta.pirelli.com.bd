@extends('layouts.admin')
@section('content')
<div class="content">
    @can('moto_slider_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.moto-sliders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.motoSlider.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.motoSlider.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MotoSlider">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.short_description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.button_label') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.button_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoSlider.fields.activated') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($motoSliders as $key => $motoSlider)
                                    <tr data-entry-id="{{ $motoSlider->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $motoSlider->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoSlider->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoSlider->short_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoSlider->button_label ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoSlider->button_url ?? '' }}
                                        </td>
                                        <td>
                                            @if($motoSlider->image)
                                                <a href="{{ $motoSlider->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $motoSlider->image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ App\Models\MotoSlider::ACTIVATED_RADIO[$motoSlider->activated] ?? '' }}
                                        </td>
                                        <td>
                                            @can('moto_slider_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.moto-sliders.show', $motoSlider->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('moto_slider_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.moto-sliders.edit', $motoSlider->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('moto_slider_delete')
                                                <form action="{{ route('admin.moto-sliders.destroy', $motoSlider->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('moto_slider_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.moto-sliders.massDestroy') }}",
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
  let table = $('.datatable-MotoSlider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection