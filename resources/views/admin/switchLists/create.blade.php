@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.switchList.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.switch-lists.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="switch_name">{{ trans('cruds.switchList.fields.switch_name') }}</label>
                <input class="form-control {{ $errors->has('switch_name') ? 'is-invalid' : '' }}" type="text" name="switch_name" id="switch_name" value="{{ old('switch_name', '') }}">
                @if($errors->has('switch_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('switch_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.switchList.fields.switch_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="switch_ip_address">{{ trans('cruds.switchList.fields.switch_ip_address') }}</label>
                <input class="form-control {{ $errors->has('switch_ip_address') ? 'is-invalid' : '' }}" type="text" name="switch_ip_address" id="switch_ip_address" value="{{ old('switch_ip_address', '') }}">
                @if($errors->has('switch_ip_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('switch_ip_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.switchList.fields.switch_ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.switchList.fields.switch_marka') }}</label>
                <select class="form-control {{ $errors->has('switch_marka') ? 'is-invalid' : '' }}" name="switch_marka" id="switch_marka">
                    <option value disabled {{ old('switch_marka', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SwitchList::SWITCH_MARKA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('switch_marka', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('switch_marka'))
                    <div class="invalid-feedback">
                        {{ $errors->first('switch_marka') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.switchList.fields.switch_marka_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="switch_port_sayisi">{{ trans('cruds.switchList.fields.switch_port_sayisi') }}</label>
                <input class="form-control {{ $errors->has('switch_port_sayisi') ? 'is-invalid' : '' }}" type="text" name="switch_port_sayisi" id="switch_port_sayisi" value="{{ old('switch_port_sayisi', '') }}">
                @if($errors->has('switch_port_sayisi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('switch_port_sayisi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.switchList.fields.switch_port_sayisi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.switchList.fields.switch_status') }}</label>
                <select class="form-control {{ $errors->has('switch_status') ? 'is-invalid' : '' }}" name="switch_status" id="switch_status">
                    <option value disabled {{ old('switch_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SwitchList::SWITCH_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('switch_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('switch_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('switch_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.switchList.fields.switch_status_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('switch_api_izin') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="switch_api_izin" value="0">
                    <input class="form-check-input" type="checkbox" name="switch_api_izin" id="switch_api_izin" value="1" {{ old('switch_api_izin', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="switch_api_izin">{{ trans('cruds.switchList.fields.switch_api_izin') }}</label>
                </div>
                @if($errors->has('switch_api_izin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('switch_api_izin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.switchList.fields.switch_api_izin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="switch_notlar">{{ trans('cruds.switchList.fields.switch_notlar') }}</label>
                <input class="form-control {{ $errors->has('switch_notlar') ? 'is-invalid' : '' }}" type="text" name="switch_notlar" id="switch_notlar" value="{{ old('switch_notlar', '') }}">
                @if($errors->has('switch_notlar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('switch_notlar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.switchList.fields.switch_notlar_helper') }}</span>
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