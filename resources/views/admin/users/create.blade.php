@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', __('admin.' . $module . '.pages.create.subtitle'))
@section('content_header_title', __('admin.' . $module . '.pages.create.content_header_title'))
@section('content_header_subtitle', __('admin.' . $module . '.pages.create.content_header_subtitle'))

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-6">
            <div class="card card-primary card-outline elevation-3">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.' . $module . '.pages.create.content_card_title')}}</h3>
                </div>

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ trans('admin.users.fields.name.title') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ trans('admin.users.fields.name.placeholder') }}">
                            <div class="invalid-feedback">
                            @error('name') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('admin.users.fields.email.title') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ trans('admin.users.fields.email.placeholder') }}">
                            <div class="invalid-feedback">
                                @error('email') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('admin.users.fields.phone.title') }}</label>
                            <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('admin.users.fields.phone.placeholder') }}">
                            <div class="invalid-feedback">
                                @error('phone') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ trans('admin.users.fields.password.title') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="{{ trans('admin.users.fields.password.placeholder') }}">
                            <div class="invalid-feedback">
                                @error('password') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="active" name="active">
                            <label class="custom-control-label" for="active">{{ __('Active') }}</label>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('buttons.submit') }}</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-6">

        </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush
