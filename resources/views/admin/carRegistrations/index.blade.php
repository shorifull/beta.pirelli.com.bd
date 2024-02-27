@extends('layouts.admin')
@section('content')
<div class="content">
    @can('car_registration_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.car-registrations.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.carRegistration.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.carRegistration.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CarRegistration">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.id') }}
                                    </th>
                                    
                                      <th>
                                        Status
                                    </th>
                                    
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.zip') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.date_purchased') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.invoice_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.invoice_attachment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_dot') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.product_quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.carRegistration.fields.retailer') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carRegistrations as $key => $carRegistration)
                                    <tr data-entry-id="{{ $carRegistration->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $carRegistration->id ?? '' }}
                                        </td>
                                               <td id="{{ $carRegistration->id ?? '' }}">
                                            @if($carRegistration->is_approved == 1)
                                                <button type="button"  class="btn btn-xs btn-success">Approved</button>
                                            @else
                                                <button type="button" onclick="changeStatus({{ $carRegistration->id ?? '' }})" class="btn btn-xs btn-warning">Pending</button>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $carRegistration->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->city->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->zip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->date_purchased ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->invoice_number ?? '' }}
                                        </td>
                                        <td>
                                            @if($carRegistration->invoice_attachment)
                                                <a href="{{ $carRegistration->invoice_attachment->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $carRegistration->product_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->product_size->size ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->product_dot ?? '' }}
                                        </td>
                                        <td>
                                            {{ $carRegistration->product_quantity ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($carRegistration->photos as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $carRegistration->retailer->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('car_registration_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.car-registrations.show', $carRegistration->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('car_registration_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.car-registrations.edit', $carRegistration->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('car_registration_delete')
                                                <form action="{{ route('admin.car-registrations.destroy', $carRegistration->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('car_registration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.car-registrations.massDestroy') }}",
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
  let table = $('.datatable-CarRegistration:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  

  
})

  function changeStatus(id) {
          
            $.post('{{ route('admin.car-registrations.warranty-status-change') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                if(data.is_approved==1) {
                    $('td#'+id).html('<button type="button"  class="btn btn-xs btn-success">Approved</button>')
                   
                }
           
            });
     
      
      
  }

</script>
@endsection