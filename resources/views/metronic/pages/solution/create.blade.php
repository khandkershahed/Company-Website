<x-admin-app-layout :title="'Solution Create'">
    @include('metronic.pages.solution.partials.style')
    <section>
        <div class="container-fluid px-0">
            <div class="row main-preview">
                <div class="card">
                    <div class="card-header align-items-center p-3 px-4">
                        <div>
                            <h3 class="card-title">Solution Create</h3>
                        </div>
                        <div>
                            <a href="{{ route('admin.solution-cms.index') }}"
                                class="btn btn-light-primary btn-active-primary p-3 px-4"> Back to the list</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <form class="template_form form" method="POST"
                            action="{{ route('admin.solution.template.add') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5 mb-7">
                                    <x-metronic.label class="form-label required">Solution Name</x-metronic.label>
                                    <x-metronic.input type="text" name="name" class="mb-2 form-control"
                                        placeholder="Solution name recommended" :value="old('name')">
                                    </x-metronic.input>
                                    <div class="text-muted fs-7">
                                        A Solution name is and recommended to be unique.
                                    </div>
                                </div>

                                <div class="col-lg-7 mb-7">
                                    <x-metronic.label for="industry_id" class="form-label required">
                                        {{ __('Select industry') }}</x-metronic.label>
                                    <x-metronic.select-option id="industry_id" class="mb-2 form-control select"
                                        name="industry_id[]" multiple multiselect-search="true"
                                        multiselect-select-all="true" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true">
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->title }}
                                            </option>
                                        @endforeach
                                    </x-metronic.select-option>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-metronic.label class="form-label required">Choose Template</x-metronic.label>
                                    <x-solution.template :templates="[
                                        [
                                            'value' => 'template-one',
                                            'image' => 'frontend/images/solution_template/template_one.png',
                                        ],
                                        [
                                            'value' => 'template-two',
                                            'image' => 'frontend/images/solution_template/template_two.png',
                                        ],
                                        [
                                            'value' => 'template-three',
                                            'image' => 'frontend/images/solution_template/template_three.png',
                                        ],
                                        [
                                            'value' => 'template-four',
                                            'image' => 'frontend/images/solution_template/template_four.png',
                                        ],
                                    ]" />
                                </div>
                            </div>


                            <div class="d-flex justify-content-end">
                                <button type="submit"
                                    class="kt_docs_formvalidation_text_submit btn btn-primary mt-6 me-2">
                                    <span class="indicator-label">
                                        Next
                                    </span>
                                    <span class="indicator-progress" style="display: none;">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-admin-app-layout>
