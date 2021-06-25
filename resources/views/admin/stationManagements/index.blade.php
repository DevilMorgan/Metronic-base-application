@extends('layouts.admin')
@section('content')
@can('station_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.station-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.stationManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.stationManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StationManagement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_alici_ip') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.avarage_ping_1_day') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.last_ping') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.monitor_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_connection_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_device_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_switch_port_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_contact_person') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_contact_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_nas') }}
                        </th>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_sube') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stationManagements as $key => $stationManagement)
                        <tr data-entry-id="{{ $stationManagement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stationManagement->id ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\StationManagement::STATION_STATUS_SELECT[$stationManagement->station_status] ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_alici_ip ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->avarage_ping_1_day ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->last_ping ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\StationManagement::MONITOR_STATUS_RADIO[$stationManagement->monitor_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\StationManagement::STATION_CONNECTION_TYPE_SELECT[$stationManagement->station_connection_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\StationManagement::STATION_DEVICE_TYPE_SELECT[$stationManagement->station_device_type] ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_switch_port_number ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_contact_person ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_contact_phone ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_nas->nas_name ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_sube->sube_name ?? '' }}
                            </td>
                            <td>
                                {{ $stationManagement->station_sube->name ?? '' }}
                            </td>
                            <td>
                                @can('station_management_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.station-managements.show', $stationManagement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('station_management_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.station-managements.edit', $stationManagement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('station_management_delete')
                                    <form action="{{ route('admin.station-managements.destroy', $stationManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('station_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.station-managements.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-StationManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection