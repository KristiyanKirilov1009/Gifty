@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', __('admin.' . $module . '.pages.edit.subtitle'))
@section('content_header_title', __('admin.' . $module . '.pages.edit.content_header_title'))
@section('content_header_subtitle', __('admin.' . $module . '.pages.edit.content_header_subtitle'))

{{-- Content body: main page content --}}

@php
$activeTab = 'settings';
if(session('tab')){
    $activeTab = session('tab');
}
@endphp

@section('content_body')
<div class="row">
    <div class="col-12">
        <!-- Relation and additional settings -->
         <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link {{ $activeTab == 'settings' ? 'active' : '' }}" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane {{ $activeTab == 'settings' ? 'active' : '' }}" id="settings">
                        <div class="row">
                            <div class="col-6">
                                @include('admin.' . $module . '.tabs.settings')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
    </div>

</div>
@stop

{{-- Push extra CSS --}}

@push('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" hretimef="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
{{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush
