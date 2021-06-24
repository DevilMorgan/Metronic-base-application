@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productTag.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-tags.update", [$productTag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.productTag.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $productTag->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productTag.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.productTag.fields.urun_cinsi') }}</label>
                @foreach(App\Models\ProductTag::URUN_CINSI_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('urun_cinsi') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="urun_cinsi_{{ $key }}" name="urun_cinsi" value="{{ $key }}" {{ old('urun_cinsi', $productTag->urun_cinsi) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="urun_cinsi_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('urun_cinsi'))
                    <span class="text-danger">{{ $errors->first('urun_cinsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productTag.fields.urun_cinsi_helper') }}</span>
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