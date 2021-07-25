@extends('layouts.admin')
@section('content')
    <div class="content">
        @can('retailer_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('admin.retailers.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.retailer.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.retailer.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Retailer">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.retailer.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.retailer.fields.vehicle_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.retailer.fields.shop_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.retailer.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.retailer.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.retailer.fields.banner') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($retailers as $key => $retailer)
                                    <tr data-entry-id="{{ $retailer->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $retailer->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $retailer->vehicle_type->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $retailer->shop_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $retailer->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $retailer->city->name ?? '' }}
                                        </td>
                                        <td>
                                            @if($retailer->banner)
                                                <a href="{{ $retailer->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $retailer->banner->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('retailer_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.retailers.show', $retailer->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('retailer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.retailers.edit', $retailer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('retailer_delete')
                                                <form action="{{ route('admin.retailers.destroy', $retailer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                @can('retailer_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.retailers.massDestroy') }}",
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
            let table = $('.datatable-Retailer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
