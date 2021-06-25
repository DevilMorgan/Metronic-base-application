@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.apManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ap-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $apManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_name') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_ip_address') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_username') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_marka_model') }}
                        </th>
                        <td>
                            {{ App\Models\ApManagement::AP_MARKA_MODEL_SELECT[$apManagement->ap_marka_model] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.mikrotik_api_version') }}
                        </th>
                        <td>
                            {{ App\Models\ApManagement::MIKROTIK_API_VERSION_SELECT[$apManagement->mikrotik_api_version] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_ssh_port') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_ssh_port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_api_port') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_api_port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_permission_yonet') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $apManagement->ap_permission_yonet ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_status') }}
                        </th>
                        <td>
                            {{ App\Models\ApManagement::AP_STATUS_SELECT[$apManagement->ap_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_monitor') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $apManagement->ap_monitor ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_avarage_1_day') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_avarage_1_day }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_last_ping') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_last_ping }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_port_speed') }}
                        </th>
                        <td>
                            {{ App\Models\ApManagement::AP_PORT_SPEED_SELECT[$apManagement->ap_port_speed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.last_frequency') }}
                        </th>
                        <td>
                            {{ $apManagement->last_frequency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.auto_backup') }}
                        </th>
                        <td>
                            {{ App\Models\ApManagement::AUTO_BACKUP_RADIO[$apManagement->auto_backup] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_vlan') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_vlan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_max_wlan_register') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_max_wlan_register }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_max_pppoe') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_max_pppoe }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_switch_port_number') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_switch_port_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_installation_date') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_installation_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apManagement.fields.ap_station') }}
                        </th>
                        <td>
                            {{ $apManagement->ap_station->station_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ap-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection