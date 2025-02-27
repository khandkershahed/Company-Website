<div class="row">
    <div class="col-lg-3">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column  mb-3 mb-md-0 fs-6">
            <li class="nav-item mb-3">
                <a class="nav-link active btn btn-flex btn-active-info w-100" data-bs-toggle="tab"
                    href="#template_two_section_two">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_two/section_two.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-primary w-100" data-bs-toggle="tab"
                    href="#template_two_section_three">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_two/section_three.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-success w-100" data-bs-toggle="tab"
                    href="#template_two_section_four">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_two/section_four.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab"
                    href="#template_two_section_five">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_two/section_five.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-secondary w-100" data-bs-toggle="tab" href="#counter">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_two/counter.png') }}" alt=""
                            width="180px">
                    </div>
                </a>
            </li>

    </div>
    <div class="col-lg-9">
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="template_two_section_two" role="tabpanel">
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


            <div class="tab-pane fade" id="template_two_section_three" role="tabpanel">
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Title</x-metronic.label>
                    <x-metronic.input type="text" name="row_five_title" class="mb-2 form-control"
                        placeholder="Title" :value="old('row_five_title', $solution->row_five_title)">
                    </x-metronic.input>
                </div>
            </div>
            <div class="tab-pane fade" id="template_two_section_four" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label class="form-label">Big Image</x-metronic.label>
                        <x-metronic.file-input id="row_four_big_image" name="row_four_big_image" :source="asset('storage/' . $solution->row_four_big_image)"
                            :value="old('row_four_big_image')"></x-metronic.file-input>
                    </div>
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label class="form-label">Small Image</x-metronic.label>
                        <x-metronic.file-input id="row_four_small_image" name="row_four_small_image"
                            :source="asset('storage/' . $solution->row_four_small_image)" :value="old('row_four_small_image')"></x-metronic.file-input>
                    </div>
                    <div class="col-lg-12 mb-7">
                        <x-metronic.label class="form-label required">Badge</x-metronic.label>
                        <x-metronic.input type="text" name="row_four_badge" class="mb-2 form-control"
                            placeholder="Badge" :value="old('row_four_badge', $solution->row_four_badge)">
                        </x-metronic.input>

                    </div>
                    <div class="col-lg-12 mb-7">
                        <x-metronic.label class="form-label required">Title</x-metronic.label>
                        <x-metronic.input type="text" name="row_four_title" class="mb-2 form-control"
                            placeholder="Title" :value="old('row_four_title', $solution->row_four_title)">
                        </x-metronic.input>

                    </div>
                    <div class="col-lg-12 mb-7">
                        <x-metronic.label class="form-label required">Description</x-metronic.label>
                        <textarea name="row_four_header" rows="8" class="mb-2 form-control" placeholder="Description">{{ old('row_four_header', $solution->row_four_header) }}
                        </textarea>
                    </div>
                    <div class="col-lg-12 mb-7">
                        <x-metronic.label class="form-label">Video Link</x-metronic.label>
                        <x-metronic.input type="text" name="row_four_link" class="mb-2 form-control"
                            placeholder="Link" :value="old('row_four_link', $solution->row_four_link)">
                        </x-metronic.input>

                    </div>
                    <div class="col-lg-12 mb-7">
                        <x-metronic.label class="form-label">Button Name</x-metronic.label>
                        <x-metronic.input type="text" name="row_four_button_name" class="mb-2 form-control"
                            placeholder="Title" :value="old('row_four_button_name', $solution->row_four_button_name)">
                        </x-metronic.input>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="template_two_section_five" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 mb-7 border p-5">
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Title</x-metronic.label>
                            <x-metronic.input type="text" name="row_four_col_one_title" class="mb-2 form-control"
                                placeholder="Title" :value="old('row_four_col_one_title', $solution->row_four_col_one_title)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Description</x-metronic.label>
                            <textarea name="row_four_col_one_description" rows="8" class="ckeditor mb-2 form-control" placeholder="Description">{{ old('row_four_col_one_description', $solution->row_four_col_one_description) }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-7 border p-5">
                        <div class="mb-7">
                            <x-metronic.label class="form-label required">Description</x-metronic.label>
                            <textarea name="row_four_col_two_description" rows="8" class="ckeditor mb-2 form-control" placeholder="Description">{{ old('row_four_col_two_description', $solution->row_four_col_two_description) }}
                        </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="counter" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter One Icon</x-metronic.label>
                            <x-metronic.file-input id="count_one_icon" name="count_one_icon" :source="asset('storage/' . $solution->count_one_icon)"
                                :value="old('count_one_icon')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter One Number</x-metronic.label>
                            <x-metronic.input type="text" name="count_one_number" class="mb-2 form-control"
                                placeholder="Counter One Number" :value="old('count_one_number', $solution->count_one_number)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter One text</x-metronic.label>
                            <x-metronic.input type="text" name="count_one_text" class="mb-2 form-control"
                                placeholder="Counter One Text" :value="old('count_one_text', $solution->count_one_text)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter two Icon</x-metronic.label>
                            <x-metronic.file-input id="count_two_icon" name="count_two_icon" :source="asset('storage/' . $solution->count_two_icon)"
                                :value="old('count_two_icon')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter two Number</x-metronic.label>
                            <x-metronic.input type="text" name="count_two_number" class="mb-2 form-control"
                                placeholder="Counter two Number" :value="old('count_two_number', $solution->count_two_number)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter two text</x-metronic.label>
                            <x-metronic.input type="text" name="count_two_text" class="mb-2 form-control"
                                placeholder="Counter two Text" :value="old('count_two_text', $solution->count_two_text)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter three Icon</x-metronic.label>
                            <x-metronic.file-input id="count_three_icon" name="count_three_icon" :source="asset('storage/' . $solution->count_three_icon)"
                                :value="old('count_three_icon')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter three Number</x-metronic.label>
                            <x-metronic.input type="text" name="count_three_number" class="mb-2 form-control"
                                placeholder="Counter three Number" :value="old('count_three_number', $solution->count_three_number)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter three text</x-metronic.label>
                            <x-metronic.input type="text" name="count_three_text" class="mb-2 form-control"
                                placeholder="Counter three Text" :value="old('count_three_text', $solution->count_three_text)">
                            </x-metronic.input>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-7 border">
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter four Icon</x-metronic.label>
                            <x-metronic.file-input id="count_four_icon" name="count_four_icon" :source="asset('storage/' . $solution->count_four_icon)"
                                :value="old('count_four_icon')"></x-metronic.file-input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter four Number</x-metronic.label>
                            <x-metronic.input type="text" name="count_four_number" class="mb-2 form-control"
                                placeholder="Counter four Number" :value="old('count_four_number', $solution->count_four_number)">
                            </x-metronic.input>
                        </div>
                        <div class="mb-7">
                            <x-metronic.label class="form-label">Counter four text</x-metronic.label>
                            <x-metronic.input type="text" name="count_four_text" class="mb-2 form-control"
                                placeholder="Counter four Text" :value="old('count_four_text', $solution->count_four_text)">
                            </x-metronic.input>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
