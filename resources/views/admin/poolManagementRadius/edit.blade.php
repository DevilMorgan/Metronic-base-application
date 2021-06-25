@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.poolManagementRadiu.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pool-management-radius.update", [$poolManagementRadiu->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="radius_pool_name">{{ trans('cruds.poolManagementRadiu.fields.radius_pool_name') }}</label>
                <input class="form-control {{ $errors->has('radius_pool_name') ? 'is-invalid' : '' }}" type="text" name="radius_pool_name" id="radius_pool_name" value="{{ old('radius_pool_name', $poolManagementRadiu->radius_pool_name) }}">
                @if($errors->has('radius_pool_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('radius_pool_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolManagementRadiu.fields.radius_pool_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ip_ranges">{{ trans('cruds.poolManagementRadiu.fields.ip_ranges') }}</label>
                <input class="form-control {{ $errors->has('ip_ranges') ? 'is-invalid' : '' }}" type="text" name="ip_ranges" id="ip_ranges" value="{{ old('ip_ranges', $poolManagementRadiu->ip_ranges) }}">
                @if($errors->has('ip_ranges'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ip_ranges') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolManagementRadiu.fields.ip_ranges_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="radius_ip_nas_id">{{ trans('cruds.poolManagementRadiu.fields.radius_ip_nas') }}</label>
                <select class="form-control select2 {{ $errors->has('radius_ip_nas') ? 'is-invalid' : '' }}" name="radius_ip_nas_id" id="radius_ip_nas_id">
                    @foreach($radius_ip_nas as $id => $radius_ip_nas)
                        <option value="{{ $id }}" {{ (old('radius_ip_nas_id') ? old('radius_ip_nas_id') : $poolManagementRadiu->radius_ip_nas->id ?? '') == $id ? 'selected' : '' }}>{{ $radius_ip_nas }}</option>
                    @endforeach
                </select>
                @if($errors->has('radius_ip_nas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('radius_ip_nas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolManagementRadiu.fields.radius_ip_nas_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.poolManagementRadiu.fields.ip_radius_status') }}</label>
                @foreach(App\Models\PoolManagementRadiu::IP_RADIUS_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('ip_radius_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="ip_radius_status_{{ $key }}" name="ip_radius_status" value="{{ $key }}" {{ old('ip_radius_status', $poolManagementRadiu->ip_radius_status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="ip_radius_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('ip_radius_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ip_radius_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolManagementRadiu.fields.ip_radius_status_helper') }}</span>
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