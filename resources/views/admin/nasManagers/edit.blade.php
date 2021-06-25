@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.nasManager.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.nas-managers.update", [$nasManager->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nas_sube_id">{{ trans('cruds.nasManager.fields.nas_sube') }}</label>
                <select class="form-control select2 {{ $errors->has('nas_sube') ? 'is-invalid' : '' }}" name="nas_sube_id" id="nas_sube_id">
                    @foreach($nas_subes as $id => $nas_sube)
                        <option value="{{ $id }}" {{ (old('nas_sube_id') ? old('nas_sube_id') : $nasManager->nas_sube->id ?? '') == $id ? 'selected' : '' }}>{{ $nas_sube }}</option>
                    @endforeach
                </select>
                @if($errors->has('nas_sube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_sube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_sube_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nas_name">{{ trans('cruds.nasManager.fields.nas_name') }}</label>
                <input class="form-control {{ $errors->has('nas_name') ? 'is-invalid' : '' }}" type="text" name="nas_name" id="nas_name" value="{{ old('nas_name', $nasManager->nas_name) }}" required>
                @if($errors->has('nas_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nas_ip_address">{{ trans('cruds.nasManager.fields.nas_ip_address') }}</label>
                <input class="form-control {{ $errors->has('nas_ip_address') ? 'is-invalid' : '' }}" type="text" name="nas_ip_address" id="nas_ip_address" value="{{ old('nas_ip_address', $nasManager->nas_ip_address) }}">
                @if($errors->has('nas_ip_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_ip_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nas_username">{{ trans('cruds.nasManager.fields.nas_username') }}</label>
                <input class="form-control {{ $errors->has('nas_username') ? 'is-invalid' : '' }}" type="text" name="nas_username" id="nas_username" value="{{ old('nas_username', $nasManager->nas_username) }}">
                @if($errors->has('nas_username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nas_password">{{ trans('cruds.nasManager.fields.nas_password') }}</label>
                <input class="form-control {{ $errors->has('nas_password') ? 'is-invalid' : '' }}" type="password" name="nas_password" id="nas_password">
                @if($errors->has('nas_password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.nasManager.fields.nas_marka_model') }}</label>
                <select class="form-control {{ $errors->has('nas_marka_model') ? 'is-invalid' : '' }}" name="nas_marka_model" id="nas_marka_model">
                    <option value disabled {{ old('nas_marka_model', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\NasManager::NAS_MARKA_MODEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nas_marka_model', $nasManager->nas_marka_model) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nas_marka_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_marka_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_marka_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.nasManager.fields.mikrotik_api_version') }}</label>
                <select class="form-control {{ $errors->has('mikrotik_api_version') ? 'is-invalid' : '' }}" name="mikrotik_api_version" id="mikrotik_api_version">
                    <option value disabled {{ old('mikrotik_api_version', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\NasManager::MIKROTIK_API_VERSION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mikrotik_api_version', $nasManager->mikrotik_api_version) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mikrotik_api_version'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mikrotik_api_version') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.mikrotik_api_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nas_ssh_port">{{ trans('cruds.nasManager.fields.nas_ssh_port') }}</label>
                <input class="form-control {{ $errors->has('nas_ssh_port') ? 'is-invalid' : '' }}" type="number" name="nas_ssh_port" id="nas_ssh_port" value="{{ old('nas_ssh_port', $nasManager->nas_ssh_port) }}" step="1">
                @if($errors->has('nas_ssh_port'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_ssh_port') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_ssh_port_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nas_api_port">{{ trans('cruds.nasManager.fields.nas_api_port') }}</label>
                <input class="form-control {{ $errors->has('nas_api_port') ? 'is-invalid' : '' }}" type="number" name="nas_api_port" id="nas_api_port" value="{{ old('nas_api_port', $nasManager->nas_api_port) }}" step="1">
                @if($errors->has('nas_api_port'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_api_port') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_api_port_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('nas_permission_yonet') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="nas_permission_yonet" value="0">
                    <input class="form-check-input" type="checkbox" name="nas_permission_yonet" id="nas_permission_yonet" value="1" {{ $nasManager->nas_permission_yonet || old('nas_permission_yonet', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="nas_permission_yonet">{{ trans('cruds.nasManager.fields.nas_permission_yonet') }}</label>
                </div>
                @if($errors->has('nas_permission_yonet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_permission_yonet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_permission_yonet_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.nasManager.fields.nas_status') }}</label>
                <select class="form-control {{ $errors->has('nas_status') ? 'is-invalid' : '' }}" name="nas_status" id="nas_status">
                    <option value disabled {{ old('nas_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\NasManager::NAS_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nas_status', $nasManager->nas_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nas_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nas_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.nas_status_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('ap_monitor') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="ap_monitor" value="0">
                    <input class="form-check-input" type="checkbox" name="ap_monitor" id="ap_monitor" value="1" {{ $nasManager->ap_monitor || old('ap_monitor', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="ap_monitor">{{ trans('cruds.nasManager.fields.ap_monitor') }}</label>
                </div>
                @if($errors->has('ap_monitor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_monitor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.ap_monitor_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.nasManager.fields.auto_backup') }}</label>
                @foreach(App\Models\NasManager::AUTO_BACKUP_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('auto_backup') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="auto_backup_{{ $key }}" name="auto_backup" value="{{ $key }}" {{ old('auto_backup', $nasManager->auto_backup) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="auto_backup_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('auto_backup'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_backup') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nasManager.fields.auto_backup_helper') }}</span>
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