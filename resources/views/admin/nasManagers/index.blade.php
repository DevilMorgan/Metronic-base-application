@extends('layouts.admin')
@section('content')
@can('nas_manager_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.nas-managers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.nasManager.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.nasManager.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-NasManager">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_sube') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.sube_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_ip_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_username') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_marka_model') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_permission_yonet') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.nasManager.fields.auto_backup') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nasManagers as $key => $nasManager)
                        <tr data-entry-id="{{ $nasManager->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $nasManager->id ?? '' }}
                            </td>
                            <td>
                                {{ $nasManager->nas_sube->sube_name ?? '' }}
                            </td>
                            <td>
                                {{ $nasManager->nas_sube->sube_name ?? '' }}
                            </td>
                            <td>
                                {{ $nasManager->nas_name ?? '' }}
                            </td>
                            <td>
                                {{ $nasManager->nas_ip_address ?? '' }}
                            </td>
                            <td>
                                {{ $nasManager->nas_username ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\NasManager::NAS_MARKA_MODEL_SELECT[$nasManager->nas_marka_model] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $nasManager->nas_permission_yonet ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $nasManager->nas_permission_yonet ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ App\Models\NasManager::NAS_STATUS_SELECT[$nasManager->nas_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\NasManager::AUTO_BACKUP_RADIO[$nasManager->auto_backup] ?? '' }}
                            </td>
                            <td>
                                @can('nas_manager_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.nas-managers.show', $nasManager->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('nas_manager_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.nas-managers.edit', $nasManager->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('nas_manager_delete')
                                    <form action="{{ route('admin.nas-managers.destroy', $nasManager->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('nas_manager_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.nas-managers.massDestroy') }}",
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
  let table = $('.datatable-NasManager:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection