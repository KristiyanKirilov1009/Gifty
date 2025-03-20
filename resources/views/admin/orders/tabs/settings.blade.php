
<form action="{{ route('admin.'.$module.'.update', ['brand' => $brand]) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">{{ __('admin.'.$module.'.fields.name.title') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $brand->name) }}" placeholder="{{ __('admin.'.$module.'.fields.name.placeholder') }}">
        <div class="invalid-feedback">
        @error('name') {{ $message }} @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="slug">{{ __('admin.'.$module.'.fields.slug.title') }}</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $brand->slug) }}" placeholder="{{ __('admin.'.$module.'.fields.slug.placeholder') }}">
        <div class="invalid-feedback">
        @error('slug') {{ $message }} @enderror
        </div>
    </div>

    <div class="form-group mt-5">
        <button type="submit" class="btn btn-success">{{ __('buttons.update') }}</button>
            <a href="{{ route('admin.'.$module.'.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
    </div>
</form>
