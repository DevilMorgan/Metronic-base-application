@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.nasManager.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nas-managers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.id') }}
                        </th>
                        <td>
                            {{ $nasManager->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_sube') }}
                        </th>
                        <td>
                            {{ $nasManager->nas_sube->sube_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_name') }}
                        </th>
                        <td>
                            {{ $nasManager->nas_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_ip_address') }}
                        </th>
                        <td>
                            {{ $nasManager->nas_ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_username') }}
                        </th>
                        <td>
                            {{ $nasManager->nas_username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_marka_model') }}
                        </th>
                        <td>
                            {{ App\Models\NasManager::NAS_MARKA_MODEL_SELECT[$nasManager->nas_marka_model] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.mikrotik_api_version') }}
                        </th>
                        <td>
                            {{ App\Models\NasManager::MIKROTIK_API_VERSION_SELECT[$nasManager->mikrotik_api_version] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_ssh_port') }}
                        </th>
                        <td>
                            {{ $nasManager->nas_ssh_port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_api_port') }}
                        </th>
                        <td>
                            {{ $nasManager->nas_api_port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_permission_yonet') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $nasManager->nas_permission_yonet ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.nas_status') }}
                        </th>
                        <td>
                            {{ App\Models\NasManager::NAS_STATUS_SELECT[$nasManager->nas_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.ap_monitor') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $nasManager->ap_monitor ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nasManager.fields.auto_backup') }}
                        </th>
                        <td>
                            {{ App\Models\NasManager::AUTO_BACKUP_RADIO[$nasManager->auto_backup] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nas-managers.index') }}">
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
            <a class="nav-link" href="#station_nas_station_managements" role="tab" data-toggle="tab">
                {{ trans('cruds.stationManagement.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="station_nas_station_managements">
            @includeIf('admin.nasManagers.relationships.stationNasStationManagements', ['stationManagements' => $nasManager->stationNasStationManagements])
        </div>
    </div>
</div>

@endsection