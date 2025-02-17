<div class="row">
    <div class="col-lg-3">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column  mb-3 mb-md-0 fs-6">
            <li class="nav-item mb-3">
                <a class="nav-link active btn btn-flex btn-active-success w-100" data-bs-toggle="tab"
                    href="#template_one_section_one">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_one.png') }}" alt=""
                            width="250px">
                    </div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-info w-100" data-bs-toggle="tab"
                    href="#template_one_section_two">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_two.png') }}" alt=""
                            width="250px">
                    </div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab"
                    href="#template_one_section_three">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_three.png') }}" alt=""
                            width="250px">
                    </div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab"
                    href="#template_one_section_four">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_four.png') }}" alt=""
                            width="250px">
                    </div>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab"
                    href="#template_one_section_five">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_five.png') }}" alt=""
                            width="250px">
                    </div>
                </a>
            </li>

    </div>
    <div class="col-lg-9">
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
                    <x-metronic.label class="form-label required">Title</x-metronic.label>
                    <x-metronic.input type="text" name="row_five_title" class="mb-2 form-control" placeholder="Title"
                        :value="old('row_five_title', $solution->row_five_title)">
                    </x-metronic.input>

                </div>
            </div>

            <div class="tab-pane fade" id="template_one_section_three" role="tabpanel">
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Title</x-metronic.label>
                    <x-metronic.input type="text" name="row_three_title" class="mb-2 form-control" placeholder="Title"
                        :value="old('row_three_title', $solution->row_three_title)">
                    </x-metronic.input>

                </div>
                <div class="col-lg-12 mb-7">
                    <x-metronic.label class="form-label required">Header</x-metronic.label>
                    <textarea name="row_three_header" rows="8" class="mb-2 form-control" placeholder="Header">{{ old('row_three_header', $solution->row_three_header) }}
                    </textarea>
                </div>
            </div>
            <div class="tab-pane fade" id="template_one_section_four" role="tabpanel">
            </div>
            <div class="tab-pane fade" id="template_one_section_five" role="tabpanel">
            </div>
        </div>

    </div>
</div>
