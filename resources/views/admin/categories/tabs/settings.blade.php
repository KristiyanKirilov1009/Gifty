
<form action="{{ route('admin.'.$module.'.update', ['category' => $category]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="parent_id">{{ trans('admin.'.$module.'.fields.parent_id.title') }}</label>
        <select class="select2bs4 w-100" name="parent_id" id="parent_id">
            <option value="">{{ trans('admin.'.$module.'.fields.parent_id.placeholder') }}</option>
            @foreach($categories as $cat)
                @if($category->parent_id === $cat->id)
                    <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                @else
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">{{ __('admin.'.$module.'.fields.name.title') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="{{ __('admin.'.$module.'.fields.name.placeholder') }}">
        <div class="invalid-feedback">
        @error('name') {{ $message }} @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="slug">{{ __('admin.'.$module.'.fields.slug.title') }}</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" placeholder="{{ __('admin.'.$module.'.fields.slug.placeholder') }}">
    </div>
    <div class="form-group">
        <label for="image">{{ __('admin.'.$module.'.fields.image.title') }} (препоръчано съотношение 1х1) <small class="font-weight-bolder text-danger">*</small></label>
        <div class="col-12">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile{{ $category->image?->id }}" data-preview="#imagePreview{{ $category->image?->id }}" accept="image/*">
                    <label class="custom-file-label" for="inputGroupFile{{ $category->image?->id }}">{{ $category->image?->name ?? 'Choose file' }}</label>
                </div>
            </div>
                <div class="d-flex justify-content-center mb-3">
                <img src="{{ Storage::url($category->image?->filepath) }}" width="100" id="imagePreview{{ $category->image?->id }}" class="" alt="{{ $category->image?->name }}">
            </div>
        </div>
    </div>

    <div class="form-group mt-5">
        <button type="submit" class="btn btn-success">{{ __('buttons.update') }}</button>
            <a href="{{ route('admin.'.$module.'.index') }}" class="btn btn-secondary">{{ __('buttons.cancel') }}</a>
    </div>
</form>

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
</script>
@endpush
