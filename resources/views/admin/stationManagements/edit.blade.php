@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stationManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.station-managements.update", [$stationManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="station_name">{{ trans('cruds.stationManagement.fields.station_name') }}</label>
                <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text" name="station_name" id="station_name" value="{{ old('station_name', $stationManagement->station_name) }}">
                @if($errors->has('station_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.stationManagement.fields.station_status') }}</label>
                <select class="form-control {{ $errors->has('station_status') ? 'is-invalid' : '' }}" name="station_status" id="station_status" required>
                    <option value disabled {{ old('station_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StationManagement::STATION_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('station_status', $stationManagement->station_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('station_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_alici_ip">{{ trans('cruds.stationManagement.fields.station_alici_ip') }}</label>
                <input class="form-control {{ $errors->has('station_alici_ip') ? 'is-invalid' : '' }}" type="text" name="station_alici_ip" id="station_alici_ip" value="{{ old('station_alici_ip', $stationManagement->station_alici_ip) }}">
                @if($errors->has('station_alici_ip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_alici_ip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_alici_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.stationManagement.fields.monitor_status') }}</label>
                @foreach(App\Models\StationManagement::MONITOR_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('monitor_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="monitor_status_{{ $key }}" name="monitor_status" value="{{ $key }}" {{ old('monitor_status', $stationManagement->monitor_status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="monitor_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('monitor_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monitor_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.monitor_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.stationManagement.fields.station_connection_type') }}</label>
                <select class="form-control {{ $errors->has('station_connection_type') ? 'is-invalid' : '' }}" name="station_connection_type" id="station_connection_type">
                    <option value disabled {{ old('station_connection_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StationManagement::STATION_CONNECTION_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('station_connection_type', $stationManagement->station_connection_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('station_connection_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_connection_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_connection_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.stationManagement.fields.station_port_speed') }}</label>
                <select class="form-control {{ $errors->has('station_port_speed') ? 'is-invalid' : '' }}" name="station_port_speed" id="station_port_speed">
                    <option value disabled {{ old('station_port_speed', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StationManagement::STATION_PORT_SPEED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('station_port_speed', $stationManagement->station_port_speed) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('station_port_speed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_port_speed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_port_speed_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_capacity_speed">{{ trans('cruds.stationManagement.fields.station_capacity_speed') }}</label>
                <input class="form-control {{ $errors->has('station_capacity_speed') ? 'is-invalid' : '' }}" type="text" name="station_capacity_speed" id="station_capacity_speed" value="{{ old('station_capacity_speed', $stationManagement->station_capacity_speed) }}">
                @if($errors->has('station_capacity_speed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_capacity_speed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_capacity_speed_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_max_ap">{{ trans('cruds.stationManagement.fields.station_max_ap') }}</label>
                <input class="form-control {{ $errors->has('station_max_ap') ? 'is-invalid' : '' }}" type="number" name="station_max_ap" id="station_max_ap" value="{{ old('station_max_ap', $stationManagement->station_max_ap) }}" step="1">
                @if($errors->has('station_max_ap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_max_ap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_max_ap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_max_cpe">{{ trans('cruds.stationManagement.fields.station_max_cpe') }}</label>
                <input class="form-control {{ $errors->has('station_max_cpe') ? 'is-invalid' : '' }}" type="number" name="station_max_cpe" id="station_max_cpe" value="{{ old('station_max_cpe', $stationManagement->station_max_cpe) }}" step="1">
                @if($errors->has('station_max_cpe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_max_cpe') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_max_cpe_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_max_pppoe">{{ trans('cruds.stationManagement.fields.station_max_pppoe') }}</label>
                <input class="form-control {{ $errors->has('station_max_pppoe') ? 'is-invalid' : '' }}" type="number" name="station_max_pppoe" id="station_max_pppoe" value="{{ old('station_max_pppoe', $stationManagement->station_max_pppoe) }}" step="1">
                @if($errors->has('station_max_pppoe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_max_pppoe') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_max_pppoe_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.stationManagement.fields.station_device_type') }}</label>
                <select class="form-control {{ $errors->has('station_device_type') ? 'is-invalid' : '' }}" name="station_device_type" id="station_device_type">
                    <option value disabled {{ old('station_device_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StationManagement::STATION_DEVICE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('station_device_type', $stationManagement->station_device_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('station_device_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_device_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_device_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_switch_port_number">{{ trans('cruds.stationManagement.fields.station_switch_port_number') }}</label>
                <input class="form-control {{ $errors->has('station_switch_port_number') ? 'is-invalid' : '' }}" type="number" name="station_switch_port_number" id="station_switch_port_number" value="{{ old('station_switch_port_number', $stationManagement->station_switch_port_number) }}" step="1">
                @if($errors->has('station_switch_port_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_switch_port_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_switch_port_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_maps_latitude">{{ trans('cruds.stationManagement.fields.station_maps_latitude') }}</label>
                <input class="form-control {{ $errors->has('station_maps_latitude') ? 'is-invalid' : '' }}" type="text" name="station_maps_latitude" id="station_maps_latitude" value="{{ old('station_maps_latitude', $stationManagement->station_maps_latitude) }}">
                @if($errors->has('station_maps_latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_maps_latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_maps_latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_maps_longitude">{{ trans('cruds.stationManagement.fields.station_maps_longitude') }}</label>
                <input class="form-control {{ $errors->has('station_maps_longitude') ? 'is-invalid' : '' }}" type="text" name="station_maps_longitude" id="station_maps_longitude" value="{{ old('station_maps_longitude', $stationManagement->station_maps_longitude) }}">
                @if($errors->has('station_maps_longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_maps_longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_maps_longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_installation">{{ trans('cruds.stationManagement.fields.station_installation') }}</label>
                <input class="form-control date {{ $errors->has('station_installation') ? 'is-invalid' : '' }}" type="text" name="station_installation" id="station_installation" value="{{ old('station_installation', $stationManagement->station_installation) }}">
                @if($errors->has('station_installation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_installation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_installation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_contact_person">{{ trans('cruds.stationManagement.fields.station_contact_person') }}</label>
                <input class="form-control {{ $errors->has('station_contact_person') ? 'is-invalid' : '' }}" type="text" name="station_contact_person" id="station_contact_person" value="{{ old('station_contact_person', $stationManagement->station_contact_person) }}">
                @if($errors->has('station_contact_person'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_contact_person') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_contact_phone">{{ trans('cruds.stationManagement.fields.station_contact_phone') }}</label>
                <input class="form-control {{ $errors->has('station_contact_phone') ? 'is-invalid' : '' }}" type="number" name="station_contact_phone" id="station_contact_phone" value="{{ old('station_contact_phone', $stationManagement->station_contact_phone) }}" step="1">
                @if($errors->has('station_contact_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_contact_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_contact_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_nas_id">{{ trans('cruds.stationManagement.fields.station_nas') }}</label>
                <select class="form-control select2 {{ $errors->has('station_nas') ? 'is-invalid' : '' }}" name="station_nas_id" id="station_nas_id">
                    @foreach($station_nas as $id => $station_nas)
                        <option value="{{ $id }}" {{ (old('station_nas_id') ? old('station_nas_id') : $stationManagement->station_nas->id ?? '') == $id ? 'selected' : '' }}>{{ $station_nas }}</option>
                    @endforeach
                </select>
                @if($errors->has('station_nas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_nas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_nas_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_sube_id">{{ trans('cruds.stationManagement.fields.station_sube') }}</label>
                <select class="form-control select2 {{ $errors->has('station_sube') ? 'is-invalid' : '' }}" name="station_sube_id" id="station_sube_id">
                    @foreach($station_subes as $id => $station_sube)
                        <option value="{{ $id }}" {{ (old('station_sube_id') ? old('station_sube_id') : $stationManagement->station_sube->id ?? '') == $id ? 'selected' : '' }}>{{ $station_sube }}</option>
                    @endforeach
                </select>
                @if($errors->has('station_sube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_sube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_sube_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection