<x-admin-app-layout :title="'BrandPage Create'">
    <div class="container-fluid px-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Add BrandPage</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.brandPage.index') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info me-5">Back to the List</a>
                    <a href="{{ route('admin.row.create') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info me-5">Rows</a>
                    <a href="{{ route('solutionCard.create') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Cards</a>
                </div>
            </div>
            <div class="card-body">
                <form id="myform" method="post" action="{{ route('admin.brandPage.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!--Banner Section-->
                    <div class="py-2">
                        <div class="row g-2 p-1 mb-5">
                            <div class="col-lg-6">
                                <p class="text-center text-secondary pb-0 mb-0"
                                    style="border-bottom: 1px solid #247297;">
                                    Banner Row</p>
                                <div class="px-2 bg-light p-2">
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Select Brand <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="brand_id"
                                                class="form-select form-select-dark" data-control="select2"
                                                data-container-css-class="select-sm" data-placeholder="Chose Type"
                                                required>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">
                                                        {{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5 gx-0">
                                        <div class="col-lg-12 mb-5">
                                            <x-metronic.label for="brand_logo" class="fw-bold fs-6">Brand
                                                Logo</x-metronic.label>
                                            <x-metronic.file-input id="brand_logo" name="brand_logo"
                                                :value="old('brand_logo')"></x-metronic.file-input>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5 gx-0">
                                        <div class="col-lg-12 mb-5">
                                            <x-metronic.label for="banner_image" class="fw-bold fs-6">Banner
                                                Image</x-metronic.label>
                                            <x-metronic.file-input id="banner_image" name="banner_image"
                                                :value="old('banner_image')"></x-metronic.file-input>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Banner Header <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="header" id="" class="form-control" cols="30" rows="3" placeholder="Banner Header"
                                                required></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <p class="text-center text-secondary pb-0 mb-0"
                                    style="border-bottom: 1px solid #247297;">
                                    Card Row</p>
                                <div class="px-2 bg-light p-2">
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>One Title</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <input type="text" name="row_one_title"
                                                class="form-control form-control-sm maxlength" maxlength="255"
                                                id="title" placeholder="Row One Title" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Card One</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="solution_card_one_id"
                                                data-placeholder="Select card One.."
                                                class="form-select form-select-dark" data-control="select2">
                                                <option></option>
                                                @foreach ($solution_cards as $solution_card)
                                                    <option value="{{ $solution_card->id }}">
                                                        {{ $solution_card->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Card Two</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="solution_card_two_id"
                                                data-placeholder="Select Card two" class="form-select form-select-dark"
                                                data-control="select2">
                                                <option></option>
                                                @foreach ($solution_cards as $solution_card)
                                                    <option value="{{ $solution_card->id }}">
                                                        {{ $solution_card->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Card Three</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="solution_card_three_id"
                                                data-placeholder="Select Card Three.."
                                                class="form-select form-select-dark" data-control="select2">
                                                <option></option>
                                                @foreach ($solution_cards as $solution_card)
                                                    <option value="{{ $solution_card->id }}">
                                                        {{ $solution_card->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>One Header</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="row_one_header" id="header" class="form-control" cols="30" rows="1"></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-center text-secondary pb-0 mb-0"
                                    style="border-bottom: 1px solid #247297;">
                                    Row Area</p>
                                <div class="px-2 bg-light p-2">
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Four</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="row_four_id"
                                                data-placeholder="Select row_four.."
                                                class="form-select form-select-dark" data-control="select2">
                                                <option></option>
                                                @foreach ($rows as $row)
                                                    <option value="{{ $row->id }}">
                                                        {{ $row->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Five</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="row_five_id"
                                                data-placeholder="Select Row Five.."
                                                class="form-select form-select-dark" data-control="select2">
                                                <option></option>
                                                @foreach ($rows as $row)
                                                    <option value="{{ $row->id }}">
                                                        {{ $row->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5 gx-0">
                                        <div class="col-lg-12 mb-5">
                                            <x-metronic.label for="row_six_image" class="fw-bold fs-6">Row Six
                                                Background Img</x-metronic.label>
                                            <x-metronic.file-input id="row_six_image" name="row_six_image"
                                                :value="old('row_six_image')"></x-metronic.file-input>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Six Title</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <input type="text" name="row_six_title"
                                                class="form-control form-control-sm maxlength" maxlength="250"
                                                id="title" placeholder="Row Six Title" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Six header <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="row_six_header" id="" class="form-control" cols="30" rows="2"
                                                placeholder="Row Six header" required></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Select Row Seven</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="row_seven_id"
                                                data-placeholder="Select Row Seven.."
                                                class="form-select form-select-dark" data-control="select2">
                                                <option></option>
                                                @foreach ($rows as $row)
                                                    <option class="form-control" value="{{ $row->id }}">
                                                        {{ $row->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Select Row Eight</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select data-allow-clear="true" name="row_eight_id"
                                                data-placeholder="Select Row Eight.."
                                                class="form-select form-select-dark" data-control="select2">
                                                <option></option>
                                                @foreach ($rows as $row)
                                                    <option class="form-control" value="{{ $row->id }}">
                                                        {{ $row->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <p class="text-center text-secondary pb-0 mb-0"
                                    style="border-bottom: 1px solid #247297;">
                                    Row Area</p>
                                <div class="px-2 bg-light p-2">
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Nine Title</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <input type="text" name="row_nine_title"
                                                class="form-control form-control-sm maxlength" maxlength="255"
                                                id="title" placeholder="Row One Title" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Nine header</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="row_nine_header" id="" class="form-control" cols="30" rows="2"
                                                placeholder="Row Six header"></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                        <div class="p-2 float-end mt-5">
                            <button type="submit" class="btn btn-primary from-prevent-multiple-submits"
                                id="submitbtn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>
