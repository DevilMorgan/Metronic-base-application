@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teams.update", [$team->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="sube_sehir">{{ trans('cruds.team.fields.sube_sehir') }}</label>
                <input class="form-control {{ $errors->has('sube_sehir') ? 'is-invalid' : '' }}" type="text" name="sube_sehir" id="sube_sehir" value="{{ old('sube_sehir', $team->sube_sehir) }}">
                @if($errors->has('sube_sehir'))
                    <span class="text-danger">{{ $errors->first('sube_sehir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.sube_sehir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sube_kodu">{{ trans('cruds.team.fields.sube_kodu') }}</label>
                <input class="form-control {{ $errors->has('sube_kodu') ? 'is-invalid' : '' }}" type="number" name="sube_kodu" id="sube_kodu" value="{{ old('sube_kodu', $team->sube_kodu) }}" step="1">
                @if($errors->has('sube_kodu'))
                    <span class="text-danger">{{ $errors->first('sube_kodu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.sube_kodu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.team.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $team->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.name_helper') }}</span>
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