@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.deviceManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.device-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $deviceManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_username') }}
                        </th>
                        <td>
                            {{ $deviceManagement->ap_mikrotik_default_username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_password') }}
                        </th>
                        <td>
                            {{ $deviceManagement->ap_mikrotik_default_password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.mikrotik_api_default_port') }}
                        </th>
                        <td>
                            {{ $deviceManagement->mikrotik_api_default_port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deviceManagement.fields.ap_mikrotik_default_ssh') }}
                        </th>
                        <td>
                            {{ $deviceManagement->ap_mikrotik_default_ssh }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.device-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection