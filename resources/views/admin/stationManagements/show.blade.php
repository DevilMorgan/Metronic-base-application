@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stationManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.station-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $stationManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_name') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_status') }}
                        </th>
                        <td>
                            {{ App\Models\StationManagement::STATION_STATUS_SELECT[$stationManagement->station_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_alici_ip') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_alici_ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.avarage_ping_1_day') }}
                        </th>
                        <td>
                            {{ $stationManagement->avarage_ping_1_day }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.last_ping') }}
                        </th>
                        <td>
                            {{ $stationManagement->last_ping }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.monitor_status') }}
                        </th>
                        <td>
                            {{ App\Models\StationManagement::MONITOR_STATUS_RADIO[$stationManagement->monitor_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_connection_type') }}
                        </th>
                        <td>
                            {{ App\Models\StationManagement::STATION_CONNECTION_TYPE_SELECT[$stationManagement->station_connection_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_port_speed') }}
                        </th>
                        <td>
                            {{ App\Models\StationManagement::STATION_PORT_SPEED_SELECT[$stationManagement->station_port_speed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_capacity_speed') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_capacity_speed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_max_ap') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_max_ap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_max_cpe') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_max_cpe }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_max_pppoe') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_max_pppoe }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_device_type') }}
                        </th>
                        <td>
                            {{ App\Models\StationManagement::STATION_DEVICE_TYPE_SELECT[$stationManagement->station_device_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_switch_port_number') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_switch_port_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_maps_latitude') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_maps_latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_maps_longitude') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_maps_longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_installation') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_installation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_contact_person') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_contact_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_contact_phone') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_contact_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_nas') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_nas->nas_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stationManagement.fields.station_sube') }}
                        </th>
                        <td>
                            {{ $stationManagement->station_sube->sube_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.station-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#ap_station_ap_managements" role="tab" data-toggle="tab">
                {{ trans('cruds.apManagement.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ap_station_ap_managements">
            @includeIf('admin.stationManagements.relationships.apStationApManagements', ['apManagements' => $stationManagement->apStationApManagements])
        </div>
    </div>
</div>

@endsection