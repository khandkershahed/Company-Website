
<x-admin-app-layout :title="'Brand Edit'">
    <div class="card card-flash">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <div class="card-title"></div>

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{ route('admin.brand.index') }}" class="btn btn-light-info">
                    <!--begin::Svg Icon | path: brands/duotune/general/gen035.svg-->
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
                    <!--end::Svg Icon-->Back to the list
                </a>
            </div>
        </div>
        <div class="card-body pt-0">
            <!--begin::Form-->
            <form class="form" action="{{ route('admin.brand.update', $brand->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Input group-->
                <div class="row">
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="title"
                            class="col-form-label fw-bold fs-6 required">{{ __('Name') }}
                        </x-metronic.label>

                        <x-metronic.input id="title" type="text" name="title" :value="old('title', $brand->title)"
                            placeholder="Enter the title" required></x-metronic.input>
                    </div>

                    {{-- <div class="col-lg-6 mb-7">
                        <x-metronic.label for="url"
                            class="col-form-label fw-bold fs-6 required">{{ __('Url') }}
                        </x-metronic.label>

                        <x-metronic.input id="url" type="url" name="url" :value="old('url', $brand->url)"
                            placeholder="Enter the Url"></x-metronic.input>
                    </div> --}}

                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="logo" class="col-form-label fw-bold fs-6 ">{{ __('Logo') }}
                        </x-metronic.label>

                        <x-metronic.file-input id="logo" name="logo" :source="asset('storage/requestImg/' . $brand->image)" :value="old('logo', $brand->logo)"></x-metronic.file-input>
                    </div>
                    {{-- <div class="col-lg-4 mb-7">
                        <x-metronic.label for="image"
                            class="col-form-label fw-bold fs-6 required">{{ __('Thumbnail Image') }}
                        </x-metronic.label>

                        <x-metronic.file-input id="image" name="image" :source="asset('storage/'.$brand->image)" :value="old('image', $brand->image)"></x-metronic.file-input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="banner_image"
                            class="col-form-label fw-bold fs-6 ">{{ __('Banner Image') }}
                        </x-metronic.label>

                        <x-metronic.file-input id="banner_image" :source="asset('storage/'.$brand->banner_image)" :value="old('banner_image', $brand->banner_image)" name="banner_image"></x-metronic.file-input>
                    </div>
                    <div class="col-lg-8 mb-7">
                        <x-metronic.label for="description"
                            class="col-form-label fw-bold fs-6 ">{{ __('Description') }}
                        </x-metronic.label>

                        <x-metronic.textarea id="description" name="description">{{ old('description', $brand->description) }}</x-metronic.textarea>
                    </div> --}}
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="category" class="col-form-label required fw-bold fs-6">
                            {{ __('Select a Category ') }}</x-metronic.label>
                        <x-metronic.select-option id="category" name="category" data-hide-search="true" data-allow-clear="true"
                            data-placeholder="Select an option">
                            <option></option>
                            <option value="Top" {{ old('category',$brand->category) == 'Top' ? 'selected' : '' }}>Top
                            </option>
                            <option value="Featured" {{ old('category',$brand->category) == 'Featured' ? 'selected' : '' }}>
                                Featured</option>
                            <option value="Others" {{ old('category',$brand->category) == 'Others' ? 'selected' : '' }}>
                                Others</option>
                        </x-metronic.select-option>
                    </div>
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="status" class="col-form-label required fw-bold fs-6">
                            {{ __('Select a Status ') }}</x-metronic.label>
                        <x-metronic.select-option id="status" name="status" data-hide-search="true"
                            data-placeholder="Select an option">
                            <option></option>
                            <option value="active" @selected($brand->status == 'active')>Active</option>
                            <option value="inactive" @selected($brand->status == 'inactive')>Inactive</option>
                        </x-metronic.select-option>
                    </div>


                </div>
                <div class="text-center pt-15">
                    <x-metronic.button type="submit" class="primary">
                        {{ __('Submit') }}
                    </x-metronic.button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</x-admin-app-layout>
