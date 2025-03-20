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
                  @if(Auth::user()->hasRole('super-admin'))
                  <li class="nav-item"><a class="nav-link {{ $activeTab == 'roles' ? 'active' : '' }}" href="#roles" data-toggle="tab">Roles</a></li>
                  @endif
                  <li class="nav-item"><a class="nav-link {{ $activeTab == 'orders' ? 'active' : '' }}" href="#orders" data-toggle="tab">Orders</a></li>
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
                    <!-- /.tab-pane -->
                    @if(Auth::user()->hasRole('super-admin'))
                    <div class="tab-pane {{ $activeTab == 'roles' ? 'active' : '' }}" id="roles">
                        <div class="row">
                            <div class="col-6">
                                @include('admin.' . $module . '.tabs.roles')
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    @endif
                    <div class="tab-pane {{ $activeTab == 'orders' ? 'active' : '' }}" id="orders">
                        <div class="row">
                            <div class="col-6">
                                @include('admin.' . $module . '.tabs.settings')
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
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
