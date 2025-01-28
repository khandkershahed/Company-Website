<x-admin-app-layout :title="'Brand Add'">
    <div class="card card-flash">

        <div class="card-header mt-6">
            <div class="card-title"></div>


            <div class="card-toolbar">

                <a href="{{ route('admin.brand.index') }}" class="btn btn-light-info">

                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span>

                    Back to the list
                </a>
            </div>
        </div>
        <div class="card-body pt-0">

            <form class="form" action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="title"
                            class="col-form-label fw-bold fs-6 required">{{ __('Name') }}
                        </x-metronic.label>
                        <x-metronic.input id="title" type="text" name="title" :value="old('title')"
                            placeholder="Enter the Name" required></x-metronic.input>
                    </div>

                    {{-- <div class="col-lg-6 mb-7">
                        <x-metronic.label for="url"
                            class="col-form-label fw-bold fs-6 required">{{ __('Url') }}
                        </x-metronic.label>
                        <x-metronic.input id="url" type="url" name="url" :value="old('url')"
                            placeholder="Enter the Url"></x-metronic.input>
                    </div> --}}

                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="image" class="col-form-label fw-bold fs-6 ">{{ __('Logo') }}
                        </x-metronic.label>
                        <x-metronic.file-input id="image" name="image" :value="old('image')"></x-metronic.file-input>
                    </div>
                    {{-- <div class="col-lg-4 mb-7">
                        <x-metronic.label for="image"
                            class="col-form-label fw-bold fs-6">{{ __('Thumbnail Image') }}
                        </x-metronic.label>
                        <x-metronic.file-input id="image" name="image" :value="old('image')"></x-metronic.file-input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="banner_image"
                            class="col-form-label fw-bold fs-6 ">{{ __('Banner Image') }}
                        </x-metronic.label>
                        <x-metronic.file-input id="banner_image" :value="old('banner_image')" name="banner_image"></x-metronic.file-input>
                    </div> --}}
                    {{-- <div class="col-lg-8 mb-7">
                        <x-metronic.label for="description" class="col-form-label fw-bold fs-6 ">{{ __('Description') }}
                        </x-metronic.label>
                        <x-metronic.textarea id="description" name="description"></x-metronic.textarea>
                    </div> --}}
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="category" class="col-form-label required fw-bold fs-6">
                            {{ __('Select a Category ') }}</x-metronic.label>
                        <x-metronic.select-option id="category" name="category" data-hide-search="true" data-allow-clear="true"
                            data-placeholder="Select an option">
                            <option></option>
                            <option value="Top">Top</option>
                            <option value="Featured">Featured</option>
                            <option value="Others">Others</option>
                        </x-metronic.select-option>
                    </div>
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="status" class="col-form-label required fw-bold fs-6">
                            {{ __('Select a Status ') }}</x-metronic.label>
                        <x-metronic.select-option id="status" name="status" data-hide-search="true"
                            data-placeholder="Select an option">
                            <option></option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </x-metronic.select-option>
                    </div>


                </div>
                <div class="text-center pt-15">
                    <x-metronic.button type="submit" class="primary">
                        {{ __('Submit') }}
                    </x-metronic.button>
                </div>

            </form>

        </div>
    </div>
</x-admin-app-layout>
