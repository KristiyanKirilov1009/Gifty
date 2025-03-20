@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', __('admin.' . $module . '.pages.create.subtitle'))
@section('content_header_title', __('admin.' . $module . '.pages.create.content_header_title'))
@section('content_header_subtitle', __('admin.' . $module . '.pages.create.content_header_subtitle'))

{{-- Text Editor config --}}
@php
$config = [
    "height" => "100",
    "toolbar" => [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
]
@endphp

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-6">
            <div class="card card-primary card-outline elevation-3">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.' . $module . '.pages.create.content_card_title')}}</h3>
                </div>

                <form action="{{ route('admin.'.$module.'.store') }}" method="POST" enctype="multipart/form-data" onsubmit="clearStyle(event)"> 
                    @csrf
                    <div class="card-body">
                        <!-- Main Settings Section  -->
                        <h5 class="font-weight-bold">Main Settings</h5>
                        <hr />

                        <div class="form-group w-100">
                            <label for="category_id">{{ trans('admin.'.$module.'.fields.category_id.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                            <select class="select2bs4 w-100 @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="{{ old('category_id') }}">{{ trans('admin.'.$module.'.fields.category_id.placeholder') }}</option>
                                @foreach($categories->where('parent_id', null) as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach($category->children as $child)
                                    <option value="{{ $child->id }}" {{old('category_id') == $child->id ? 'selected' : ''}}>{{ $child->name }}</option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            @error('category_id') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sku">{{ __('admin.'.$module.'.fields.sku.title') }}</label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}" placeholder="{{ __('admin.'.$module.'.fields.sku.placeholder') }}">
                            <div class="invalid-feedback">
                            @error('sku') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="translated-fields">
                            <div class="tab-content">
                                <div class="form-group">
                                    <label for="name">{{ __('admin.'.$module.'.fields.name.title') }}<small class="font-weight-bolder text-danger">*</small></label>
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
                                    <label for="description">{{ __('admin.'.$module.'.fields.description.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                                    <x-adminlte-text-editor id="description" class="form-control @error('description') is-invalid @enderror" name="description" igroup-size="sm" placeholder="Write some text..." :config="$config" enable-old-support />
                                    <div class="invalid-feedback">
                                    @error('description') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Availability Section -->
                        <h5 class="font-weight-bold mt-5">Availability</h5>
                        <hr />

                        <div class="form-group">
                            <label for="availability">{{ __('admin.'.$module.'.fields.availability.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                            <select class="select2bs4 w-100 @error('availability') is-invalid @enderror" name="availability">
                                <option value="">{{ trans('admin.'.$module.'.fields.availability.placeholder') }}</option>
                                @foreach(\App\Enums\Availability::cases() as $case)
                                    <option value="{{$case->value}}" {{ old('availability') == $case->value ? 'selected' : '' }}>{{$case->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            @error('availability') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price">{{ __('admin.'.$module.'.fields.price.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                            <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" min="0.01" step=".01" />
                            <div class="invalid-feedback">
                            @error('price') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quantity">{{ __('admin.'.$module.'.fields.quantity.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                            <input type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" min="1" />
                            <div class="invalid-feedback">
                            @error('quantity') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="minimum">{{ __('admin.'.$module.'.fields.minimum.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                            <input type="number" id="minimum" class="form-control @error('minimum') is-invalid @enderror" name="minimum" value=1 min="1" />
                            <div class="invalid-feedback">
                            @error('minimum') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_hidden">{{ __('admin.'.$module.'.fields.is_hidden.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                            <select class="select2bs4 w-100 @error('is_hidden') is-invalid @enderror" name="is_hidden">
                                <option value="0" {{ !old('is_hidden') == 0 ? 'selected' : ''}}>{{ __('Visible') }}</option>
                                <option value="1" {{ old('is_hidden') == 1 ? 'selected' : ''}}>{{ __('Hidden') }}</option>
                            </select>
                            <div class="invalid-feedback">
                            @error('is_hidden') {{ $message }} @enderror
                            </div>
                        </div>
                        
                        <!-- Images Section -->
                        <h5 class="font-weight-bold mt-5">Images</h5>
                        <hr />

                        <div class="fileupload-section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile01" data-preview="#imagePreview01" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                     <div class="d-flex justify-content-center mb-3">
                                        <img src="" width="100" id="imagePreview01" class="d-none" alt="Main Image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile02" data-preview="#imagePreview02" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                    </div>
                                     <div class="d-flex justify-content-center mb-3">
                                        <img src="" width="100" id="imagePreview02" class="d-none" alt="Main Image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile03"  data-preview="#imagePreview03" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                        </div>
                                    </div>
                                     <div class="d-flex justify-content-center mb-3">
                                        <img src="" width="100" id="imagePreview03" class="d-none" alt="Main Image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile04" data-preview="#imagePreview04" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                    </div>
                                     <div class="d-flex justify-content-center mb-3">
                                        <img src="" width="100" id="imagePreview04" class="d-none" alt="Main Image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile05" data-preview="#imagePreview05" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile05">Choose file</label>
                                        </div>
                                    </div>
                                     <div class="d-flex justify-content-center mb-3">
                                        <img src="" width="100" id="imagePreview05" class="d-none" alt="Main Image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile06" data-preview="#imagePreview06" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile06">Choose file</label>
                                        </div>
                                    </div>
                                     <div class="d-flex justify-content-center mb-3">
                                        <img src="" width="100" id="imagePreview06" class="d-none" alt="Main Image">
                                    </div>
                                </div>
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

            function clearStyle(event)
            {
                event.preventDefault();
                // $('#description').summernote('clear');
                console.log('opaaaaa')
            }
        });
    </script>
@endpush
