@extends('layouts.admin')
@section('content')
<div class="content">
    @can('home_slider_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.home-sliders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.homeSlider.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.homeSlider.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-HomeSlider">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.short_description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.button_label') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.button_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.activated') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($homeSliders as $key => $homeSlider)
                                    <tr data-entry-id="{{ $homeSlider->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $homeSlider->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->short_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->button_label ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->button_url ?? '' }}
                                        </td>
                                        <td>
                                            @if($homeSlider->image)
                                                <a href="{{ $homeSlider->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $homeSlider->image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ App\Models\HomeSlider::ACTIVATED_RADIO[$homeSlider->activated] ?? '' }}
                                        </td>
                                        <td>
                                            @can('home_slider_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.home-sliders.show', $homeSlider->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('home_slider_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.home-sliders.edit', $homeSlider->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('home_slider_delete')
                                                <form action="{{ route('admin.home-sliders.destroy', $homeSlider->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('home_slider_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.home-sliders.massDestroy') }}",
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
  let table = $('.datatable-HomeSlider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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