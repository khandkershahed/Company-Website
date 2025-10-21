<x-admin-app-layout :title="'Add New Brand'">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="mt-4 border-0 shadow-sm card rounded-3">

                {{-- ===== Header Section ===== --}}
                <div class="p-8 border-0 card-header d-flex justify-content-between align-items-center bg-light">
                    <div>
                        <h4 class="mb-0 fw-bold text-dark">Add New Brand</h4>
                        <small class="text-muted">Fill in the information below to add a new brand.</small>
                    </div>
                    <a href="{{ route('admin.brand.index') }}" class="shadow-sm btn btn-light-info fw-semibold">
                        <i class="fa-solid fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                {{-- ===== Form Section ===== --}}
                <div class="p-10 card-body">
                    <form class="form" action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">
                            {{-- Brand Name --}}
                            <div class="mb-5 col-lg-12">
                                <x-metronic.label for="title" class="fw-bold fs-6 required">Brand Name</x-metronic.label>
                                <x-metronic.input id="title" type="text" name="title" :value="old('title')"
                                    placeholder="Enter brand name" required></x-metronic.input>
                                <small class="text-muted">e.g., Nike, Apple, Samsung</small>
                            </div>

                            {{-- Brand Logo --}}
                            <div class="mb-5 col-lg-12">
                                <x-metronic.label for="image" class="fw-bold fs-6">Brand Logo</x-metronic.label>
                                <x-metronic.file-input id="image" name="image" :value="old('image')"></x-metronic.file-input>
                                <small class="text-muted">Recommended: 200x200px transparent background</small>
                            </div>

                            {{-- Category --}}
                            <div class="mb-5 col-lg-12">
                                <x-metronic.label for="category" class="fw-bold fs-6 required">Select Category</x-metronic.label>
                                <x-metronic.select-option id="category" name="category" data-hide-search="true"
                                    data-allow-clear="true" data-placeholder="Choose a category">
                                    <option></option>
                                    <option value="Top">Top</option>
                                    <option value="Featured">Featured</option>
                                    <option value="Others">Others</option>
                                </x-metronic.select-option>
                            </div>

                            {{-- Status --}}
                            <div class="mb-5 col-lg-12">
                                <x-metronic.label for="status" class="fw-bold fs-6 required">Select Status</x-metronic.label>
                                <x-metronic.select-option id="status" name="status" data-hide-search="true"
                                    data-placeholder="Choose status">
                                    <option></option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </x-metronic.select-option>
                            </div>

                            {{-- Optional Description (modern textarea style) --}}
                            {{-- <div class="mb-5 col-lg-12">
                <x-metronic.label for="description" class="fw-bold fs-6">Description</x-metronic.label>
                <x-metronic.textarea id="description" name="description" placeholder="Write a short description..." rows="3"></x-metronic.textarea>
            </div> --}}
                        </div>

                        {{-- ===== Submit Button ===== --}}
                        <div class="mt-10 text-end">
                            <button type="submit" class="p-5 shadow-sm btn btn-primary fw-semibold">
                                <i class="fa-solid fa-paper-plane me-2"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Optional Custom Styling ===== --}}
    <style>
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        }

        .form-control,
        .form-select {
            border-radius: 0.5rem !important;
            padding: 0.75rem 1rem !important;
            border-color: #e3e3e3;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1) !important;
        }

        label.required::after {
            content: "*";
            color: #dc3545;
            margin-left: 4px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #0d6efd, #007bff);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0b5ed7, #0069d9);
        }

        .btn-light-info {
            color: #0dcaf0;
            background-color: #e5f8fc;
            border: none;
        }

        .btn-light-info:hover {
            background-color: #d0f2fa;
        }
    </style>
</x-admin-app-layout>