
<form action="{{ route('admin.'.$module.'.update', ['role' => $role]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">{{ trans('admin.'.$module.'.fields.name.title') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}" placeholder="{{ trans('admin.'.$module.'.fields.name.placeholder') }}">
        <div class="invalid-feedback">
        @error('name') {{ $message }} @enderror
        </div>
    </div>

    <div class="form-group mt-5">
        <button type="submit" class="btn btn-success">{{ __('buttons.update') }}</button>
            <a href="{{ route('admin.'.$module.'.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
    </div>
</form>
