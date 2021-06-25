@extends('layouts.admin')
@section('content')
@can('ap_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ap-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.apManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.apManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ApManagement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_ip_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_username') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_marka_model') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_permission_yonet') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_avarage_1_day') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_last_ping') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_port_speed') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.last_frequency') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.auto_backup') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_vlan') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_max_wlan_register') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_max_pppoe') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_switch_port_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_station') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apManagements as $key => $apManagement)
                        <tr data-entry-id="{{ $apManagement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $apManagement->id ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_name ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_ip_address ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_username ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ApManagement::AP_MARKA_MODEL_SELECT[$apManagement->ap_marka_model] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $apManagement->ap_permission_yonet ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $apManagement->ap_permission_yonet ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ App\Models\ApManagement::AP_STATUS_SELECT[$apManagement->ap_status] ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_avarage_1_day ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_last_ping ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ApManagement::AP_PORT_SPEED_SELECT[$apManagement->ap_port_speed] ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->last_frequency ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ApManagement::AUTO_BACKUP_RADIO[$apManagement->auto_backup] ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_vlan ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_max_wlan_register ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_max_pppoe ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_switch_port_number ?? '' }}
                            </td>
                            <td>
                                {{ $apManagement->ap_station->station_name ?? '' }}
                            </td>
                            <td>
                                @can('ap_management_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ap-managements.show', $apManagement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ap_management_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ap-managements.edit', $apManagement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ap_management_delete')
                                    <form action="{{ route('admin.ap-managements.destroy', $apManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ap_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ap-managements.massDestroy') }}",
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
  let table = $('.datatable-ApManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
