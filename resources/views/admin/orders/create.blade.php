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

                <form action="{{ route('admin.'.$module.'.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('admin.'.$module.'.fields.name.title') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('admin.'.$module.'.fields.name.placeholder') }}">
                            <div class="invalid-feedback">
                                @error('name') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ __('admin.'.$module.'.fields.slug.title') }}</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" placeholder="{{ __('admin.'.$module.'.fields.slug.placeholder') }}">
                            <div class="invalid-feedback">
                                @error('slug') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('buttons.submit') }}</button>
                        <a href="{{ route('admin.'.$module.'.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
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
