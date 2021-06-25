@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.apManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ap-managements.update", [$apManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="ap_name">{{ trans('cruds.apManagement.fields.ap_name') }}</label>
                <input class="form-control {{ $errors->has('ap_name') ? 'is-invalid' : '' }}" type="text" name="ap_name" id="ap_name" value="{{ old('ap_name', $apManagement->ap_name) }}" required>
                @if($errors->has('ap_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_ip_address">{{ trans('cruds.apManagement.fields.ap_ip_address') }}</label>
                <input class="form-control {{ $errors->has('ap_ip_address') ? 'is-invalid' : '' }}" type="text" name="ap_ip_address" id="ap_ip_address" value="{{ old('ap_ip_address', $apManagement->ap_ip_address) }}">
                @if($errors->has('ap_ip_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_ip_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_username">{{ trans('cruds.apManagement.fields.ap_username') }}</label>
                <input class="form-control {{ $errors->has('ap_username') ? 'is-invalid' : '' }}" type="text" name="ap_username" id="ap_username" value="{{ old('ap_username', $apManagement->ap_username) }}">
                @if($errors->has('ap_username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_password">{{ trans('cruds.apManagement.fields.ap_password') }}</label>
                <input class="form-control {{ $errors->has('ap_password') ? 'is-invalid' : '' }}" type="password" name="ap_password" id="ap_password">
                @if($errors->has('ap_password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.apManagement.fields.ap_marka_model') }}</label>
                <select class="form-control {{ $errors->has('ap_marka_model') ? 'is-invalid' : '' }}" name="ap_marka_model" id="ap_marka_model">
                    <option value disabled {{ old('ap_marka_model', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ApManagement::AP_MARKA_MODEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ap_marka_model', $apManagement->ap_marka_model) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ap_marka_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_marka_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_marka_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.apManagement.fields.mikrotik_api_version') }}</label>
                <select class="form-control {{ $errors->has('mikrotik_api_version') ? 'is-invalid' : '' }}" name="mikrotik_api_version" id="mikrotik_api_version">
                    <option value disabled {{ old('mikrotik_api_version', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ApManagement::MIKROTIK_API_VERSION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mikrotik_api_version', $apManagement->mikrotik_api_version) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mikrotik_api_version'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mikrotik_api_version') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.mikrotik_api_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_ssh_port">{{ trans('cruds.apManagement.fields.ap_ssh_port') }}</label>
                <input class="form-control {{ $errors->has('ap_ssh_port') ? 'is-invalid' : '' }}" type="number" name="ap_ssh_port" id="ap_ssh_port" value="{{ old('ap_ssh_port', $apManagement->ap_ssh_port) }}" step="1">
                @if($errors->has('ap_ssh_port'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_ssh_port') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_ssh_port_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_api_port">{{ trans('cruds.apManagement.fields.ap_api_port') }}</label>
                <input class="form-control {{ $errors->has('ap_api_port') ? 'is-invalid' : '' }}" type="number" name="ap_api_port" id="ap_api_port" value="{{ old('ap_api_port', $apManagement->ap_api_port) }}" step="1">
                @if($errors->has('ap_api_port'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_api_port') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_api_port_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('ap_permission_yonet') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="ap_permission_yonet" value="0">
                    <input class="form-check-input" type="checkbox" name="ap_permission_yonet" id="ap_permission_yonet" value="1" {{ $apManagement->ap_permission_yonet || old('ap_permission_yonet', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="ap_permission_yonet">{{ trans('cruds.apManagement.fields.ap_permission_yonet') }}</label>
                </div>
                @if($errors->has('ap_permission_yonet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_permission_yonet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_permission_yonet_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.apManagement.fields.ap_status') }}</label>
                <select class="form-control {{ $errors->has('ap_status') ? 'is-invalid' : '' }}" name="ap_status" id="ap_status">
                    <option value disabled {{ old('ap_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ApManagement::AP_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ap_status', $apManagement->ap_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ap_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_status_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('ap_monitor') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="ap_monitor" value="0">
                    <input class="form-check-input" type="checkbox" name="ap_monitor" id="ap_monitor" value="1" {{ $apManagement->ap_monitor || old('ap_monitor', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="ap_monitor">{{ trans('cruds.apManagement.fields.ap_monitor') }}</label>
                </div>
                @if($errors->has('ap_monitor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_monitor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_monitor_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.apManagement.fields.ap_port_speed') }}</label>
                <select class="form-control {{ $errors->has('ap_port_speed') ? 'is-invalid' : '' }}" name="ap_port_speed" id="ap_port_speed">
                    <option value disabled {{ old('ap_port_speed', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ApManagement::AP_PORT_SPEED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ap_port_speed', $apManagement->ap_port_speed) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ap_port_speed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_port_speed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_port_speed_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.apManagement.fields.auto_backup') }}</label>
                @foreach(App\Models\ApManagement::AUTO_BACKUP_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('auto_backup') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="auto_backup_{{ $key }}" name="auto_backup" value="{{ $key }}" {{ old('auto_backup', $apManagement->auto_backup) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="auto_backup_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('auto_backup'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_backup') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.auto_backup_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_vlan">{{ trans('cruds.apManagement.fields.ap_vlan') }}</label>
                <input class="form-control {{ $errors->has('ap_vlan') ? 'is-invalid' : '' }}" type="number" name="ap_vlan" id="ap_vlan" value="{{ old('ap_vlan', $apManagement->ap_vlan) }}" step="1">
                @if($errors->has('ap_vlan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_vlan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_vlan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_max_wlan_register">{{ trans('cruds.apManagement.fields.ap_max_wlan_register') }}</label>
                <input class="form-control {{ $errors->has('ap_max_wlan_register') ? 'is-invalid' : '' }}" type="number" name="ap_max_wlan_register" id="ap_max_wlan_register" value="{{ old('ap_max_wlan_register', $apManagement->ap_max_wlan_register) }}" step="1">
                @if($errors->has('ap_max_wlan_register'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_max_wlan_register') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_max_wlan_register_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_max_pppoe">{{ trans('cruds.apManagement.fields.ap_max_pppoe') }}</label>
                <input class="form-control {{ $errors->has('ap_max_pppoe') ? 'is-invalid' : '' }}" type="number" name="ap_max_pppoe" id="ap_max_pppoe" value="{{ old('ap_max_pppoe', $apManagement->ap_max_pppoe) }}" step="1">
                @if($errors->has('ap_max_pppoe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_max_pppoe') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_max_pppoe_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_switch_port_number">{{ trans('cruds.apManagement.fields.ap_switch_port_number') }}</label>
                <input class="form-control {{ $errors->has('ap_switch_port_number') ? 'is-invalid' : '' }}" type="number" name="ap_switch_port_number" id="ap_switch_port_number" value="{{ old('ap_switch_port_number', $apManagement->ap_switch_port_number) }}" step="1">
                @if($errors->has('ap_switch_port_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_switch_port_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_switch_port_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_installation_date">{{ trans('cruds.apManagement.fields.ap_installation_date') }}</label>
                <input class="form-control date {{ $errors->has('ap_installation_date') ? 'is-invalid' : '' }}" type="text" name="ap_installation_date" id="ap_installation_date" value="{{ old('ap_installation_date', $apManagement->ap_installation_date) }}">
                @if($errors->has('ap_installation_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_installation_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_installation_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_station_id">{{ trans('cruds.apManagement.fields.ap_station') }}</label>
                <select class="form-control select2 {{ $errors->has('ap_station') ? 'is-invalid' : '' }}" name="ap_station_id" id="ap_station_id">
                    @foreach($ap_stations as $id => $ap_station)
                        <option value="{{ $id }}" {{ (old('ap_station_id') ? old('ap_station_id') : $apManagement->ap_station->id ?? '') == $id ? 'selected' : '' }}>{{ $ap_station }}</option>
                    @endforeach
                </select>
                @if($errors->has('ap_station'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_station') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apManagement.fields.ap_station_helper') }}</span>
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