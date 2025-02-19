<form class="template_form form" method="POST" action="{{ route('admin.solution.template.add') }}" autocomplete="off"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="solution_id" value="{{ $solution->id }}">
    @php
        $industryIds = isset($solution->industry_id) ? json_decode($solution->industry_id, true) : [];
    @endphp
    <div class="row">
        @if ($solution->solution_template == "template_two")
            <div class="col-lg-12 mb-7">
                <x-metronic.label class="form-label required">Title</x-metronic.label>
                <x-metronic.input type="text" name="row_two_title" class="mb-2 form-control" placeholder="Title"
                    :value="old('row_two_title', $solution->row_two_title)">
                </x-metronic.input>

            </div>
        @endif
        <div class="col-lg-5 mb-7">
            <x-metronic.label class="form-label required">Solution Name</x-metronic.label>
            <x-metronic.input type="text" name="name" class="mb-2 form-control"
                placeholder="Solution name recommended" :value="old('name', $solution->name)">
            </x-metronic.input>
            <div class="text-muted fs-7">
                A Solution name is required and recommended to be unique.
            </div>
        </div>
        @if ($solution->solution_template == "template_two")
            <div class="col-lg-12 mb-7">
                <x-metronic.label class="form-label required">Header</x-metronic.label>
                <textarea name="row_two_header" class="mb-2 form-control" rows="3" placeholder="Header">{{ old('row_two_header', $solution->row_two_header) }}
                </textarea>
            </div>
        @endif
        <div class="col-lg-7 mb-7">
            <x-metronic.label for="industry_id" class="form-label required">
                {{ __('Select industry') }}</x-metronic.label>
            <x-metronic.select-option id="industry_id" class="mb-2 form-control select" name="industry_id[]" multiple
                multiselect-search="true" multiselect-select-all="true" data-control="select2"
                data-placeholder="Select an option" data-allow-clear="true">
                @foreach ($industries as $industry)
                    <option value="{{ $industry->id }}" @selected(is_array($industryIds) && in_array($industry->id, $industryIds))>{{ $industry->title }}
                    </option>
                @endforeach
            </x-metronic.select-option>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-5">
            <x-metronic.label for="thumbnail_image"
                class="form-label required">{{ __('Thumbnail Image') }}</x-metronic.label>
            <x-metronic.file-input id="thumbnail_image" name="thumbnail_image" :source="asset('storage/'.$solution->thumbnail_image)"
                :value="old('thumbnail_image')"></x-metronic.file-input>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-5">
            <x-metronic.label for="banner_image"
                class="form-label required">{{ __('Banner Image') }}</x-metronic.label>
            <x-metronic.file-input id="banner_image" name="banner_image" :source="asset('storage/'.$solution->banner_image)"  :value="old('banner_image')"></x-metronic.file-input>
        </div>
        @if ($solution->solution_template == "template_two")
            <div class="col-lg-4 col-md-6 col-12 mb-5">
                <x-metronic.label for="icon"
                    class="form-label required mb-3">{{ __('Icon') }}</x-metronic.label>
                <x-metronic.file-input id="icon" name="icon"
                    :value="old('icon')"></x-metronic.file-input>
            </div>
        @endif

        <div class="col-lg-4 col-md-6 mb-5">
            <x-metronic.label for="status" class="form-label required">
                {{ __('Select a Status ') }}</x-metronic.label>
            <x-metronic.select-option id="status" name="status" data-hide-search="true"
                data-placeholder="Select an option" required>
                <option></option>
                <option value="active" @selected($solution->status == "active" )>Publish</option>
                <option value="inactive" @selected($solution->status == "inactive" )>Unpublished</option>
                <option value="draft" @selected($solution->status == "draft" )>Draft</option>
            </x-metronic.select-option>
        </div>

    </div>
</form>
