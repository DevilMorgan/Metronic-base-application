@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.poolManagementMikrotik.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pool-management-mikrotiks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mikrotik_pool_name">{{ trans('cruds.poolManagementMikrotik.fields.mikrotik_pool_name') }}</label>
                <input class="form-control {{ $errors->has('mikrotik_pool_name') ? 'is-invalid' : '' }}" type="text" name="mikrotik_pool_name" id="mikrotik_pool_name" value="{{ old('mikrotik_pool_name', '') }}">
                @if($errors->has('mikrotik_pool_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mikrotik_pool_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolManagementMikrotik.fields.mikrotik_pool_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mikrotik_pool_range">{{ trans('cruds.poolManagementMikrotik.fields.mikrotik_pool_range') }}</label>
                <input class="form-control {{ $errors->has('mikrotik_pool_range') ? 'is-invalid' : '' }}" type="text" name="mikrotik_pool_range" id="mikrotik_pool_range" value="{{ old('mikrotik_pool_range', '') }}">
                @if($errors->has('mikrotik_pool_range'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mikrotik_pool_range') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolManagementMikrotik.fields.mikrotik_pool_range_helper') }}</span>
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