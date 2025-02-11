<div class="row">
    <div class="col-lg-3">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-0 mb-3 mb-md-0 fs-6">
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link active btn btn-flex btn-active-success w-100" data-bs-toggle="tab" href="#template_one_section_one">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_one.png') }}" alt="">
                    </div>
                </a>
            </li>
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-flex btn-active-info w-100" data-bs-toggle="tab" href="#template_one_section_two">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_two.png') }}" alt="">
                    </div>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab" href="#template_one_section_three">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_three.png') }}" alt="">
                    </div>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab" href="#template_one_section_four">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_four.png') }}" alt="">
                    </div>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link btn btn-flex btn-active-danger w-100" data-bs-toggle="tab" href="#template_one_section_five">
                    <div class="d-flex flex-column align-items-start">
                        <img src="{{ asset('images/solution/template_one/section_five.png') }}" alt="">
                    </div>
                </a>
            </li>

    </div>
    <div class="col-lg-3">
        <div class="col-lg-12 mb-7">
            <x-metronic.label class="form-label required">Row Two Title</x-metronic.label>
            <x-metronic.input type="text" name="row_two_title" class="mb-2 form-control" placeholder="Row Two Title"
                :value="old('row_two_title')">
            </x-metronic.input>

        </div>
        <div class="col-lg-12 mb-7">
            <x-metronic.label class="form-label required">Row Two Header</x-metronic.label>
            <textarea name="row_two_header" class="mb-2 form-control" placeholder="Row Two Header">
                {{ old('row_two_header', $solution->row_two_header) }}
            </textarea>
        </div>
    </div>
</div>
