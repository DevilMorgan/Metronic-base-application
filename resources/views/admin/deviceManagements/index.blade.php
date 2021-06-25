@extends('layouts.admin')
@section('content')
@can('device_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.device-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.deviceManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.deviceManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DeviceManagement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_username') }}
                        </th>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_password') }}
                        </th>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.mikrotik_api_default_port') }}
                        </th>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_ssh') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deviceManagements as $key => $deviceManagement)
                        <tr data-entry-id="{{ $deviceManagement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $deviceManagement->id ?? '' }}
                            </td>
                            <td>
                                {{ $deviceManagement->ap_mikrotik_default_username ?? '' }}
                            </td>
                            <td>
                                {{ $deviceManagement->ap_mikrotik_default_password ?? '' }}
                            </td>
                            <td>
                                {{ $deviceManagement->mikrotik_api_default_port ?? '' }}
                            </td>
                            <td>
                                {{ $deviceManagement->ap_mikrotik_default_ssh ?? '' }}
                            </td>
                            <td>
                                @can('device_management_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.device-managements.show', $deviceManagement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('device_management_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.device-managements.edit', $deviceManagement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('device_management_delete')
                                    <form action="{{ route('admin.device-managements.destroy', $deviceManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('device_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.device-managements.massDestroy') }}",
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
  let table = $('.datatable-DeviceManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection