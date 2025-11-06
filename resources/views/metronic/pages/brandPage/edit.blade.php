<x-admin-app-layout :title="'BrandPage Edit'">
    <div class="container-fluid px-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Edit BrandPage</h3>
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
                <form method="post" action="{{ route('admin.brandPage.update', $brandPage->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="py-2">
                        <div class="row g-2 p-1 mb-5">
                            <div class="col-lg-6">
                                <p class="text-center text-secondary text-info pb-0 mb-5 fw-bolder fs-4"
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
                                                    <option value="{{ $brand->id }}" @selected($brand->id == $brandPage->brand_id)>
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
                                            <x-metronic.file-input id="brand_logo" name="brand_logo" :source="asset('storage/' . $brandPage->brand_logo)"
                                                :value="old('brand_logo')"></x-metronic.file-input>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5 gx-0">
                                        <div class="col-lg-12 mb-5">
                                            <x-metronic.label for="banner_image" class="fw-bold fs-6">Banner
                                                Image</x-metronic.label>
                                            <x-metronic.file-input id="banner_image" name="banner_image"
                                                :source="asset('storage/' . $brandPage->banner_image)" :value="old('banner_image')"></x-metronic.file-input>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Banner Header <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="header" id="" class="form-control" rows="7" placeholder="Banner Header" required>{{ $brandPage->header }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <x-metronic.label for="status"
                                                class="col-form-label required fw-bold fs-6">
                                                {{ __('Select Status ') }}</x-metronic.label>
                                            <select class="form-select form-select-dark" id="status" name="status"
                                                data-control="select2" data-allow-clear="true" data-hide-search="true"
                                                data-placeholder="Select an option">
                                                <option></option>
                                                <option value="active" @selected($brandPage->status == 'active')>Active
                                                </option>
                                                <option value="inactive" @selected($brandPage->status == 'inactive')>Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    {{--  --}}
                                </div>
                                <p class="text-center text-secondary text-info pb-0 mb-5 fw-bolder fs-4"
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
                                                id="title" value="{{ $brandPage->row_one_title }}"
                                                placeholder="Row One Title" />
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
                                                    <option value="{{ $solution_card->id }}"
                                                        @selected($solution_card->id == $brandPage->solution_card_one_id)>
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
                                                    <option value="{{ $solution_card->id }}"
                                                        @selected($solution_card->id == $brandPage->solution_card_two_id)>
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
                                                    <option value="{{ $solution_card->id }}"
                                                        @selected($solution_card->id == $brandPage->solution_card_three_id)>
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
                                            <textarea name="row_one_header" id="header" class="form-control" rows="4">{{ $brandPage->row_one_header }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-center text-secondary text-info pb-0 mb-5 fw-bolder fs-4"
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
                                                    <option value="{{ $row->id }}" @selected($row->id == $brandPage->row_four_id)>
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
                                                    <option value="{{ $row->id }}" @selected($row->id == $brandPage->row_five_id)>
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
                                                :value="old('row_six_image')" :source="asset('storage/' . $brandPage->row_six_image)"></x-metronic.file-input>
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
                                                id="title" placeholder="Row Six Title"
                                                value="{{ $brandPage->row_six_title }}" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Six header <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="row_six_header" id="" class="form-control" rows="8" placeholder="Row Six header"
                                                required>{{ $brandPage->row_six_header }}</textarea>
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
                                                    <option value="{{ $row->id }}" @selected($row->id == $brandPage->row_seven_id)>
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
                                                    <option value="{{ $row->id }}" @selected($row->id == $brandPage->row_eight_id)>
                                                        {{ $row->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <p class="text-center text-secondary text-info pb-0 mb-5 fw-bolder fs-4"
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
                                                id="title" placeholder="Row Nine Title"
                                                value="{{ $brandPage->row_nine_title }}" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Row Nine header</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="row_nine_header" id="" class="form-control" rows="8" placeholder="Row Nine header">{{ $brandPage->row_nine_header }}</textarea>
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
