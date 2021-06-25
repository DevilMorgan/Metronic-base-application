@extends('layouts.admin')
@section('content')
@can('pool_management_radiu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pool-management-radius.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.poolManagementRadiu.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.poolManagementRadiu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PoolManagementRadiu">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.radius_pool_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.ip_ranges') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.radius_ip_nas') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.ip_radius_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poolManagementRadius as $key => $poolManagementRadiu)
                        <tr data-entry-id="{{ $poolManagementRadiu->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $poolManagementRadiu->id ?? '' }}
                            </td>
                            <td>
                                {{ $poolManagementRadiu->radius_pool_name ?? '' }}
                            </td>
                            <td>
                                {{ $poolManagementRadiu->ip_ranges ?? '' }}
                            </td>
                            <td>
                                {{ $poolManagementRadiu->radius_ip_nas->nas_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PoolManagementRadiu::IP_RADIUS_STATUS_RADIO[$poolManagementRadiu->ip_radius_status] ?? '' }}
                            </td>
                            <td>
                                @can('pool_management_radiu_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pool-management-radius.show', $poolManagementRadiu->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pool_management_radiu_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pool-management-radius.edit', $poolManagementRadiu->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pool_management_radiu_delete')
                                    <form action="{{ route('admin.pool-management-radius.destroy', $poolManagementRadiu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pool_management_radiu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pool-management-radius.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-PoolManagementRadiu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection