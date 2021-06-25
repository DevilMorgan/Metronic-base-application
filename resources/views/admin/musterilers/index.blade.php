@extends('layouts.admin')
@section('content')
@can('musteriler_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.musterilers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.musteriler.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.musteriler.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Musteriler">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.website') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.iletisim_sms_izin') }}
                        </th>
                        <th>
                            {{ trans('cruds.musteriler.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($musterilers as $key => $musteriler)
                        <tr data-entry-id="{{ $musteriler->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $musteriler->id ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->email ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->phone ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->address ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->website ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Musteriler::ILETISIM_SMS_IZIN_SELECT[$musteriler->iletisim_sms_izin] ?? '' }}
                            </td>
                            <td>
                                {{ $musteriler->description ?? '' }}
                            </td>
                            <td>
                                @can('musteriler_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.musterilers.show', $musteriler->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('musteriler_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.musterilers.edit', $musteriler->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('musteriler_delete')
                                    <form action="{{ route('admin.musterilers.destroy', $musteriler->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('musteriler_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.musterilers.massDestroy') }}",
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
    pageLength: 50,
  });
  let table = $('.datatable-Musteriler:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection