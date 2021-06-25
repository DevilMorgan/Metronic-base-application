@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.stationManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.station-managements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="station_name">{{ trans('cruds.stationManagement.fields.station_name') }}</label>
                <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text" name="station_name" id="station_name" value="{{ old('station_name', '') }}">
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
                        <option value="{{ $key }}" {{ old('station_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <input class="form-control {{ $errors->has('station_alici_ip') ? 'is-invalid' : '' }}" type="text" name="station_alici_ip" id="station_alici_ip" value="{{ old('station_alici_ip', '') }}">
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
                        <input class="form-check-input" type="radio" id="monitor_status_{{ $key }}" name="monitor_status" value="{{ $key }}" {{ old('monitor_status', 'Varsayılan değer Monitor Edilsin') === (string) $key ? 'checked' : '' }}>
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
                <label for="station_installation">{{ trans('cruds.stationManagement.fields.station_installation') }}</label>
                <input class="form-control date {{ $errors->has('station_installation') ? 'is-invalid' : '' }}" type="text" name="station_installation" id="station_installation" value="{{ old('station_installation') }}">
                @if($errors->has('station_installation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_installation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_installation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_contact_person">{{ trans('cruds.stationManagement.fields.station_contact_person') }}</label>
                <input class="form-control {{ $errors->has('station_contact_person') ? 'is-invalid' : '' }}" type="text" name="station_contact_person" id="station_contact_person" value="{{ old('station_contact_person', '') }}">
                @if($errors->has('station_contact_person'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station_contact_person') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.station_contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_contact_phone">{{ trans('cruds.stationManagement.fields.station_contact_phone') }}</label>
                <input class="form-control {{ $errors->has('station_contact_phone') ? 'is-invalid' : '' }}" type="number" name="station_contact_phone" id="station_contact_phone" value="{{ old('station_contact_phone', '') }}" step="1">
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
                        <option value="{{ $id }}" {{ old('station_nas_id') == $id ? 'selected' : '' }}>{{ $station_nas }}</option>
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
                        <option value="{{ $id }}" {{ old('station_sube_id') == $id ? 'selected' : '' }}>{{ $station_sube }}</option>
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