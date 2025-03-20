@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Users')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Details')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Welcome to User Details page.</p>
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
