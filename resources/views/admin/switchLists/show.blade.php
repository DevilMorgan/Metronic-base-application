@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.switchList.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.switch-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.id') }}
                        </th>
                        <td>
                            {{ $switchList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.switch_name') }}
                        </th>
                        <td>
                            {{ $switchList->switch_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.switch_ip_address') }}
                        </th>
                        <td>
                            {{ $switchList->switch_ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.switch_marka') }}
                        </th>
                        <td>
                            {{ App\Models\SwitchList::SWITCH_MARKA_SELECT[$switchList->switch_marka] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.switch_port_sayisi') }}
                        </th>
                        <td>
                            {{ $switchList->switch_port_sayisi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.switch_status') }}
                        </th>
                        <td>
                            {{ App\Models\SwitchList::SWITCH_STATUS_SELECT[$switchList->switch_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.switch_api_izin') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $switchList->switch_api_izin ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.switchList.fields.switch_notlar') }}
                        </th>
                        <td>
                            {{ $switchList->switch_notlar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.switch-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection