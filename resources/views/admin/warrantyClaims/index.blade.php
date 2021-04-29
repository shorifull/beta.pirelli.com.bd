@extends('layouts.admin')
@section('content')
<div class="content">
    @can('warranty_claim_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.warranty-claims.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.warrantyClaim.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.warrantyClaim.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-WarrantyClaim">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.invoice_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.invoice_attachment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.product_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.product_size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.warrantyClaim.fields.retailer') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($warrantyClaims as $key => $warrantyClaim)
                                    <tr data-entry-id="{{ $warrantyClaim->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $warrantyClaim->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $warrantyClaim->invoice_number ?? '' }}
                                        </td>
                                        <td>
                                            @if($warrantyClaim->invoice_attachment)
                                                <a href="{{ $warrantyClaim->invoice_attachment->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $warrantyClaim->product_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $warrantyClaim->product_size->size ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($warrantyClaim->photos as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $warrantyClaim->retailer->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('warranty_claim_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.warranty-claims.show', $warrantyClaim->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('warranty_claim_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.warranty-claims.edit', $warrantyClaim->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('warranty_claim_delete')
                                                <form action="{{ route('admin.warranty-claims.destroy', $warrantyClaim->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('warranty_claim_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.warranty-claims.massDestroy') }}",
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
  let table = $('.datatable-WarrantyClaim:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection