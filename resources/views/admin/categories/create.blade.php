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

                <form action="{{ route('admin.'.$module.'.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">{{ trans('admin.'.$module.'.fields.parent_id.title') }}</label>
                            <select class="select2bs4 w-100" name="parent_id">
                                <option value="">{{ trans('admin.'.$module.'.fields.parent_id.placeholder') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

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
                        
                        <div class="form-group">
                            <label for="image">{{ __('admin.'.$module.'.fields.image.title') }} (препоръчано съотношение 1х1) <small class="font-weight-bolder text-danger">*</small></label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" data-preview="#imagePreview04" accept="image/*">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                                <div class="d-flex justify-content-center mb-3">
                                <img src="" width="100" id="imagePreview04" class="d-none" alt="Main Image">
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
    <script>
        $(document).ready(function(){
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    readURL(this);
                });

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        var preview = $(input).data('preview');

                        reader.onload = function (e) {
                            $(preview).attr('src', e.target.result);
                            $(preview).removeClass('d-none');
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            });
        </script>
@endpush
