@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.poolManagementRadiu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pool-management-radius.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.id') }}
                        </th>
                        <td>
                            {{ $poolManagementRadiu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.radius_pool_name') }}
                        </th>
                        <td>
                            {{ $poolManagementRadiu->radius_pool_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.ip_ranges') }}
                        </th>
                        <td>
                            {{ $poolManagementRadiu->ip_ranges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.radius_ip_nas') }}
                        </th>
                        <td>
                            {{ $poolManagementRadiu->radius_ip_nas->nas_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolManagementRadiu.fields.ip_radius_status') }}
                        </th>
                        <td>
                            {{ App\Models\PoolManagementRadiu::IP_RADIUS_STATUS_RADIO[$poolManagementRadiu->ip_radius_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pool-management-radius.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection