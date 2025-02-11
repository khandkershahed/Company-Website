<form class="template_form form" method="POST" action="{{ route('admin.solution.template.add') }}" autocomplete="off"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="solution_id" value="{{ $solution->id }}">
    <div class="row">
        {{-- <div class="fv-row mb-5">
            <x-metronic.label class="required fw-semibold fs-6 mb-3">Gallery Name</x-metronic.label>
            <x-metronic.input type="text" class="form-control form-control-solid form-control-sm"
                name="gallery_title" id="gallery_title" required placeholder="Gallery Name"
                :value="old('gallery_title')" />
        </div> --}}
        <div class="col-lg-4 col-md-6 col-12 mb-5">
            <x-metronic.label for="banner_image"
                class="col-form-label fw-bold fs-6 mb-3">{{ __('Banner Image') }}</x-metronic.label>
            <x-metronic.file-input id="banner_image" name="banner_image"
                :value="old('banner_image')"></x-metronic.file-input>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-5">
            <x-metronic.label for="thumbnail_image"
                class="col-form-label fw-bold fs-6 mb-3">{{ __('Thumbnail Image') }}</x-metronic.label>
            <x-metronic.file-input id="thumbnail_image" name="thumbnail_image"
                :value="old('thumbnail_image')"></x-metronic.file-input>
        </div>
        {{-- <div class="col-lg-4 col-md-6 col-12 mb-5">
            <x-metronic.label for="icon"
                class="col-form-label fw-bold fs-6 mb-3">{{ __('Icon') }}</x-metronic.label>
            <x-metronic.file-input id="icon" name="icon"
                :value="old('icon')"></x-metronic.file-input>
        </div> --}}
    </div>
</form>
