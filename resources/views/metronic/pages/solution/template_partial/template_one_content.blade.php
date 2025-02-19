<div class="row">
    <div class="col-lg-2">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column  mb-3 mb-md-0 fs-6">
            <li class="nav-item mb-7">
                <a class="nav-link active btn btn-flex btn-active-success p-1" data-bs-toggle="tab"
                    href="#template_one_section_one">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_one.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>

            <li class="nav-item mb-7">
                <a class="nav-link btn btn-flex btn-active-info p-1" data-bs-toggle="tab"
                    href="#template_one_section_two">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_two.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>

            <li class="nav-item mb-7">
                <a class="nav-link btn btn-flex btn-active-danger p-1" data-bs-toggle="tab"
                    href="#template_one_section_three">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_three.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>

            <li class="nav-item mb-7">
                <a class="nav-link btn btn-flex btn-active-danger p-1" data-bs-toggle="tab"
                    href="#template_one_section_four">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_four.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>
            {{-- <li class="nav-item mb-7">
                <a class="nav-link btn btn-flex btn-active-danger p-1" data-bs-toggle="tab"
                    href="#template_one_section_five">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_five.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li> --}}

    </div>
    <div class="col-lg-10">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="template_one_section_one" role="tabpanel">
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Title</x-metronic.label>
                    <x-metronic.input type="text" name="row_two_title" class="mb-2 form-control" placeholder="Title"
                        :value="old('row_two_title', $solution->row_two_title)">
                    </x-metronic.input>

                </div>
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Header</x-metronic.label>
                    <textarea name="row_two_header" class="mb-2 form-control" rows="8" placeholder="Header">{{ old('row_two_header', $solution->row_two_header) }}
                    </textarea>
                </div>
            </div>

            <div class="tab-pane fade" id="template_one_section_two" role="tabpanel">
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Section Header</x-metronic.label>
                    <x-metronic.input type="text" name="header" class="mb-2 form-control"
                        placeholder="Section Header" :value="old('header', $solution->header)">
                    </x-metronic.input>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column One Image</x-metronic.label>
                            <x-metronic.file-input id="row_two_column_one_image" name="row_two_column_one_image"
                                :source="asset('storage/' . $solution->row_two_column_one_image)" :value="old('row_two_column_one_image')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column One Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_one_title" class="mb-2 form-control"
                                placeholder="Column One Title" :value="old('row_two_column_one_title', $solution->row_two_column_one_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column One Description</x-metronic.label>
                            <textarea name="row_two_column_one_description" rows="5" class="mb-2 form-control" placeholder="Header">{{ old('row_two_column_one_description', $solution->row_two_column_one_description) }}
                            </textarea>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column One Link</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_one_link" class="mb-2 form-control"
                                placeholder="Column One Link" :value="old('row_two_column_one_link', $solution->row_two_column_one_link)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column two Image</x-metronic.label>
                            <x-metronic.file-input id="row_two_column_two_image" name="row_two_column_two_image"
                                :source="asset('storage/' . $solution->row_two_column_two_image)" :value="old('row_two_column_two_image')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column two Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_two_title" class="mb-2 form-control"
                                placeholder="Column two Title" :value="old('row_two_column_two_title', $solution->row_two_column_two_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column two Description</x-metronic.label>
                            <textarea name="row_two_column_two_description" rows="5" class="mb-2 form-control" placeholder="Header">{{ old('row_two_column_two_description', $solution->row_two_column_two_description) }}
                            </textarea>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column two Link</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_two_link" class="mb-2 form-control"
                                placeholder="Column two Link" :value="old('row_two_column_two_link', $solution->row_two_column_two_link)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column three Image</x-metronic.label>
                            <x-metronic.file-input id="row_two_column_three_image" name="row_two_column_three_image"
                                :source="asset('storage/' . $solution->row_two_column_three_image)" :value="old('row_two_column_three_image')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column three Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_three_title"
                                class="mb-2 form-control" placeholder="Column three Title" :value="old('row_two_column_three_title', $solution->row_two_column_three_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column three Description</x-metronic.label>
                            <textarea name="row_two_column_three_description" rows="5" class="mb-2 form-control" placeholder="Header">{{ old('row_two_column_three_description', $solution->row_two_column_three_description) }}
                            </textarea>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column three Link</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_three_link"
                                class="mb-2 form-control" placeholder="Column three Link" :value="old('row_two_column_three_link', $solution->row_two_column_three_link)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column four Image</x-metronic.label>
                            <x-metronic.file-input id="row_two_column_four_image" name="row_two_column_four_image"
                                :source="asset('storage/' . $solution->row_two_column_four_image)" :value="old('row_two_column_four_image')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column four Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_four_title"
                                class="mb-2 form-control" placeholder="Column four Title" :value="old('row_two_column_four_title', $solution->row_two_column_four_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column four Description</x-metronic.label>
                            <textarea name="row_two_column_four_description" rows="5" class="mb-2 form-control" placeholder="Header">{{ old('row_two_column_four_description', $solution->row_two_column_four_description) }}
                            </textarea>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Column four Link</x-metronic.label>
                            <x-metronic.input type="text" name="row_two_column_four_link"
                                class="mb-2 form-control" placeholder="Column four Link" :value="old('row_two_column_four_link', $solution->row_two_column_four_link)">
                            </x-metronic.input>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="template_one_section_three" role="tabpanel">
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Title</x-metronic.label>
                    <x-metronic.input type="text" name="row_three_title" class="mb-2 form-control"
                        placeholder="Title" :value="old('row_three_title', $solution->row_three_title)">
                    </x-metronic.input>

                </div>
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Header</x-metronic.label>
                    <textarea name="row_three_header" rows="8" class="mb-2 form-control" placeholder="Header">{{ old('row_three_header', $solution->row_three_header) }}
                    </textarea>
                </div>
            </div>
            <div class="tab-pane fade" id="template_one_section_four" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-lg-6 border mb-7">
                        <h5 class="my-5 text-center">Tab One</h5>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Badge</x-metronic.label>
                            <x-metronic.input type="text" name="row_five_badge" class="mb-2 form-control"
                                placeholder="Badge" :value="old('row_five_badge', $solution->row_five_badge)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Image</x-metronic.label>
                            <x-metronic.file-input id="row_five_image" name="row_five_image" :source="asset('storage/' . $solution->row_five_image)"
                                :value="old('row_five_image')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_five_title" class="mb-2 form-control"
                                placeholder="Title" :value="old('row_five_title', $solution->row_five_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Description</x-metronic.label>
                            <textarea name="row_five_description" rows="8" class="mb-2 form-control" placeholder="Description">{{ old('row_five_description', $solution->row_five_description) }}
                            </textarea>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Link</x-metronic.label>
                            <x-metronic.input type="text" name="row_five_link" class="mb-2 form-control"
                                placeholder="Link" :value="old('row_five_link', $solution->row_five_link)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Button Name</x-metronic.label>
                            <x-metronic.input type="text" name="row_five_btn_name" class="mb-2 form-control"
                                placeholder="Button Name" :value="old('row_five_btn_name', $solution->row_five_btn_name)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 border mb-7">
                        <h5 class="my-5 text-center">Tab Two</h5>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Badge</x-metronic.label>
                            <x-metronic.input type="text" name="row_six_badge" class="mb-2 form-control"
                                placeholder="Badge" :value="old('row_six_badge', $solution->row_six_badge)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Image</x-metronic.label>
                            <x-metronic.file-input id="row_six_image" name="row_six_image" :source="asset('storage/' . $solution->row_six_image)"
                                :value="old('row_six_image')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_six_title" class="mb-2 form-control"
                                placeholder="Title" :value="old('row_six_title', $solution->row_six_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Description</x-metronic.label>
                            <textarea name="row_six_description" rows="8" class="mb-2 form-control" placeholder="Description">{{ old('row_six_description', $solution->row_six_description) }}
                            </textarea>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Link</x-metronic.label>
                            <x-metronic.input type="text" name="row_six_link" class="mb-2 form-control"
                                placeholder="Link" :value="old('row_six_link', $solution->row_six_link)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Button Name</x-metronic.label>
                            <x-metronic.input type="text" name="row_six_btn_name" class="mb-2 form-control"
                                placeholder="Button Name" :value="old('row_six_btn_name', $solution->row_six_btn_name)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 border mb-7">
                        <h5 class="my-5 text-center">Tab Three</h5>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Badge</x-metronic.label>
                            <x-metronic.input type="text" name="row_seven_badge" class="mb-2 form-control"
                                placeholder="Badge" :value="old('row_seven_badge', $solution->row_seven_badge)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Image</x-metronic.label>
                            <x-metronic.file-input id="row_seven_image" name="row_seven_image" :source="asset('storage/' . $solution->row_seven_image)"
                                :value="old('row_seven_image')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_seven_title" class="mb-2 form-control"
                                placeholder="Title" :value="old('row_seven_title', $solution->row_seven_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Description</x-metronic.label>
                            <textarea name="row_seven_description" rows="8" class="mb-2 form-control" placeholder="Description">{{ old('row_seven_description', $solution->row_seven_description) }}
                            </textarea>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Link</x-metronic.label>
                            <x-metronic.input type="text" name="row_seven_link" class="mb-2 form-control"
                                placeholder="Link" :value="old('row_seven_link', $solution->row_seven_link)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Button Name</x-metronic.label>
                            <x-metronic.input type="text" name="row_seven_btn_name" class="mb-2 form-control"
                                placeholder="Button Name" :value="old('row_seven_btn_name', $solution->row_seven_btn_name)">
                            </x-metronic.input>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="template_one_section_five" role="tabpanel">
            </div>
        </div>

    </div>
</div>
