@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.deviceManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.device-managements.update", [$deviceManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="ap_mikrotik_default_username">{{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_username') }}</label>
                <input class="form-control {{ $errors->has('ap_mikrotik_default_username') ? 'is-invalid' : '' }}" type="text" name="ap_mikrotik_default_username" id="ap_mikrotik_default_username" value="{{ old('ap_mikrotik_default_username', $deviceManagement->ap_mikrotik_default_username) }}">
                @if($errors->has('ap_mikrotik_default_username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_mikrotik_default_username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_mikrotik_default_password">{{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_password') }}</label>
                <input class="form-control {{ $errors->has('ap_mikrotik_default_password') ? 'is-invalid' : '' }}" type="text" name="ap_mikrotik_default_password" id="ap_mikrotik_default_password" value="{{ old('ap_mikrotik_default_password', $deviceManagement->ap_mikrotik_default_password) }}">
                @if($errors->has('ap_mikrotik_default_password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_mikrotik_default_password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mikrotik_api_default_port">{{ trans('cruds.deviceManagement.fields.mikrotik_api_default_port') }}</label>
                <input class="form-control {{ $errors->has('mikrotik_api_default_port') ? 'is-invalid' : '' }}" type="text" name="mikrotik_api_default_port" id="mikrotik_api_default_port" value="{{ old('mikrotik_api_default_port', $deviceManagement->mikrotik_api_default_port) }}">
                @if($errors->has('mikrotik_api_default_port'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mikrotik_api_default_port') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deviceManagement.fields.mikrotik_api_default_port_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ap_mikrotik_default_ssh">{{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_ssh') }}</label>
                <input class="form-control {{ $errors->has('ap_mikrotik_default_ssh') ? 'is-invalid' : '' }}" type="text" name="ap_mikrotik_default_ssh" id="ap_mikrotik_default_ssh" value="{{ old('ap_mikrotik_default_ssh', $deviceManagement->ap_mikrotik_default_ssh) }}">
                @if($errors->has('ap_mikrotik_default_ssh'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ap_mikrotik_default_ssh') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_ssh_helper') }}</span>
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