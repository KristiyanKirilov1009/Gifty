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
<form action="{{ route('admin.'.$module.'.update', ['product' => $product]) }}" method="POST" id="form" enctype="multipart/form-data" onsubmit="clearStyle(event)">
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
                    <option value="{{ $child->id }}" {{ $product->category->id == $child->id ? 'selected' : ''}}>{{ $child->name }}</option>
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
            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" placeholder="{{ __('admin.'.$module.'.fields.sku.placeholder') }}">
            <div class="invalid-feedback">
            @error('sku') {{ $message }} @enderror
            </div>
        </div>

        <div class="translated-fields">
            <div class="tab-content">
                <div class="form-group">
                    <label for="name">{{ __('admin.'.$module.'.fields.name.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="{{ __('admin.'.$module.'.fields.name.placeholder') }}">
                    <div class="invalid-feedback">
                    @error('name') {{ $message }} @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="slug">{{ __('admin.'.$module.'.fields.slug.title') }}</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" placeholder="{{ __('admin.'.$module.'.fields.slug.placeholder') }}">
                    <div class="invalid-feedback">
                    @error('slug') {{ $message }} @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">{{ __('admin.'.$module.'.fields.description.title') }}<small class="font-weight-bolder text-danger">*</small></label>
                    <x-adminlte-text-editor id="description" class="form-control @error('description') is-invalid @enderror" name="description" igroup-size="sm" placeholder="Write some text..." :config="$config" enable-old-support >
                        {{ $product->description }}
                    </x-adminlte-text-editor>
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
                    <option value="{{$case->value}}" {{ old('availability', $product->availability) == $case->value ? 'selected' : '' }}>{{$case->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
            @error('availability') {{ $message }} @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="price">{{ __('admin.'.$module.'.fields.price.title') }}<small class="font-weight-bolder text-danger">*</small></label>
            <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', number_format($product->price, 2)) }}" min="0.01" step=".01" />
            <div class="invalid-feedback">
            @error('price') {{ $message }} @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="quantity">{{ __('admin.'.$module.'.fields.quantity.title') }}<small class="font-weight-bolder text-danger">*</small></label>
            <input type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $product->quantity) }}" min="1" />
            <div class="invalid-feedback">
            @error('quantity') {{ $message }} @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="minimum">{{ __('admin.'.$module.'.fields.minimum.title') }}<small class="font-weight-bolder text-danger">*</small></label>
            <input type="number" id="minimum" class="form-control @error('minimum') is-invalid @enderror" name="minimum" value="{{ old('minimum', $product->minimum) }}" min="1" />
            <div class="invalid-feedback">
            @error('minimum') {{ $message }} @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="is_hidden">{{ __('admin.'.$module.'.fields.is_hidden.title') }}<small class="font-weight-bolder text-danger">*</small></label>
            <select class="select2bs4 w-100 @error('is_hidden') is-invalid @enderror" name="is_hidden">
                <option value="0" {{ !old('is_hidden', $product->is_hidden) == 0 ? 'selected' : ''}}>{{ __('Visible') }}</option>
                <option value="1" {{ old('is_hidden', $product->is_hidden) == 1 ? 'selected' : ''}}>{{ __('Hidden') }}</option>
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
                @foreach($product->images as $image)
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="custom-file mr-2">
                            <input type="file" name="images[{{ $image->id }}]" class="custom-file-input" id="inputGroupFile{{ $image->id }}" data-preview="#imagePreview{{ $image->id }}" accept="image/*">
                            
                            <label class="custom-file-label" for="inputGroupFile{{ $image->id }}">{{ $image->name }}</label>
                        </div>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmModal" data-url="{{ route('admin.products.deleteImage', ['product' => $product ,'image' => $image]) }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ Storage::url($image?->filepath) }}" width="100" id="imagePreview{{ $image->id }}" class="" alt="{{ $image->name }}">
                    </div>
                </div>
                @endforeach
                @for($i = $product->images->count(); $i < 6; $i++)
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="images[0{{$i}}]" class="custom-file-input" id="inputGroupFile0{{ $i }}" data-preview="#imagePreview0{{ $i }}" accept="image/*">
                            <label class="custom-file-label" for="inputGroupFile0{{ $i }}">{{ __('Choose file') }}</label>
                        </div>
                    </div>
                        <div class="d-flex justify-content-center mb-3">
                        <img src="" width="100" id="imagePreview0{{ $i }}" class="d-none" alt="Image name">
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="form-group mt-5">
        <button type="submit" class="btn btn-success">{{ __('buttons.update') }}</button>
        <a href="{{ route('admin.'.$module.'.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
    </div>
</form>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('modals.confirm.delete.title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ trans('modals.confirm.delete.body') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('buttons.cancel') }}</button>
                <form id="delete" action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ trans('buttons.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
        });

        function clearStyle(event) {

            // Get the content before removing format
            let contentBefore = $('#description').summernote('code'); 
            console.log('Before removing format:', contentBefore);

            // Remove formatting
            $('#description').summernote('removeFormat');
            // $('#description').summernote('foreColor', 'red');

            // Get the content after removing format
            let contentAfter = $('#description').summernote('code');
            console.log('After removing format:', contentAfter);
        }

        $('#confirmModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            $('#delete').attr('action', button.data('url'));
        });
    </script>
@endpush