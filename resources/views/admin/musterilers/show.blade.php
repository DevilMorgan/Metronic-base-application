@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.musteriler.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musterilers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.id') }}
                        </th>
                        <td>
                            {{ $musteriler->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.first_name') }}
                        </th>
                        <td>
                            {{ $musteriler->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.last_name') }}
                        </th>
                        <td>
                            {{ $musteriler->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.email') }}
                        </th>
                        <td>
                            {{ $musteriler->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.phone') }}
                        </th>
                        <td>
                            {{ $musteriler->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.address') }}
                        </th>
                        <td>
                            {{ $musteriler->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.website') }}
                        </th>
                        <td>
                            {{ $musteriler->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.iletisim_sms_izin') }}
                        </th>
                        <td>
                            {{ App\Models\Musteriler::ILETISIM_SMS_IZIN_SELECT[$musteriler->iletisim_sms_izin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.description') }}
                        </th>
                        <td>
                            {{ $musteriler->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musterilers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection