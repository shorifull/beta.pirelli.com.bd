@extends('layouts.admin')
@section('content')
<div class="content">
    @can('moto_registration_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.moto-registrations.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.motoRegistration.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.motoRegistration.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MotoRegistration">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.zip') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.date_purchased') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.invoice_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.invoice_attachment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_dot') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.product_quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.motoRegistration.fields.retailer') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($motoRegistrations as $key => $motoRegistration)
                                    <tr data-entry-id="{{ $motoRegistration->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $motoRegistration->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->city->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->zip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->date_purchased ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->invoice_number ?? '' }}
                                        </td>
                                        <td>
                                            @if($motoRegistration->invoice_attachment)
                                                <a href="{{ $motoRegistration->invoice_attachment->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $motoRegistration->product_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->product_size->size ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->product_dot ?? '' }}
                                        </td>
                                        <td>
                                            {{ $motoRegistration->product_quantity ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($motoRegistration->photos as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $motoRegistration->retailer->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('moto_registration_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.moto-registrations.show', $motoRegistration->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('moto_registration_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.moto-registrations.edit', $motoRegistration->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('moto_registration_delete')
                                                <form action="{{ route('admin.moto-registrations.destroy', $motoRegistration->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('moto_registration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.moto-registrations.massDestroy') }}",
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
  let table = $('.datatable-MotoRegistration:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection