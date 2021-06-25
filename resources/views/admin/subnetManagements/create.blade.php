@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subnetManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subnet-managements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="subnet_name">{{ trans('cruds.subnetManagement.fields.subnet_name') }}</label>
                <input class="form-control {{ $errors->has('subnet_name') ? 'is-invalid' : '' }}" type="text" name="subnet_name" id="subnet_name" value="{{ old('subnet_name', '') }}">
                @if($errors->has('subnet_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subnet_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subnetManagement.fields.subnet_name_helper') }}</span>
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