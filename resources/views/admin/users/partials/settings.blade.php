<div class="card card-primary card-outline elevation-3">
    <div class="card-header">
        <h3 class="card-title">{{ __('admin.' . $module . '.pages.edit.content_card_title') }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">{{ trans('admin.users.fields.name.title') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="{{ trans('admin.users.fields.name.placeholder') }}">
                <div class="invalid-feedback">
                @error('name') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('admin.users.fields.email.title') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="{{ trans('admin.users.fields.email.placeholder') }}">
                <div class="invalid-feedback">
                    @error('email') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('admin.users.fields.phone.title') }}</label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="{{ trans('admin.users.fields.phone.placeholder') }}">
                <div class="invalid-feedback">
                    @error('phone') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('admin.users.fields.password.title') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ trans('admin.users.fields.password.placeholder') }}">
                <div class="invalid-feedback">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="custom-control custom-switch">
                @if($user->email_verified_at !== null)
                    <input type="checkbox" class="custom-control-input" id="active" name="active" checked>
                @else
                    <input type="checkbox" class="custom-control-input" id="active" name="active" >
                @endif
                <label class="custom-control-label" for="active">{{ __('Active') }}</label>
            </div>

            <div class="form-group mt-5">
                <button type="submit" class="btn btn-success">{{ __('buttons.update') }}</button>
                 <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
            </div>
        </form>
    </div>
    <!-- <div class="card-footer">
        <button type="submit" class="btn btn-success">{{ __('buttons.update') }}</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
    </div> -->
</div>
