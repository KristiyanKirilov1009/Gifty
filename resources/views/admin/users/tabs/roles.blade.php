<form action="{{ route('admin.users.toggleRoles', ['user' => $user->id]) }}" method="POST">
    @csrf

    <div class="row row-cols-4">
        @foreach($roles as $role)
            <div class="col form-group clearfix">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="checkboxPrimary{{ $role->id }}" {{ $user->hasRole($role->slug) ? 'checked' : '' }} name="roles[]" value="{{ $role->id }}">
                    <label for="checkboxPrimary{{ $role->id }}">{{ $role->name }}</label>
                </div>
            </div>
        @endforeach
    </div>

    <div class="form-group mt-5">
        <button type="submit" class="btn btn-success">{{ __('buttons.update') }}</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
    </div>
</form>
