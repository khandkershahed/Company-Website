<div class="tab-pane fade show active" id="category">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center py-1 px-4 mt-3 rounded-1" style="background-color: #247297">
                <div>
                    <h5 class="mb-0 text-white">Category Management</h5>
                </div>
                <div>
                    <a href="" data-bs-toggle="modal" data-bs-target="#categoryAdd">
                        <div class="d-flex align-items-center">
                            <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Add Category">
                                <i class="ph-plus text-white"></i> </span>
                            <span class="ms-1 text-white">Add Category</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div>
                <table class="table category  table-bordered table-hover datatable-highlight text-center ">
                    <thead>
                        <tr>
                            <th width="5%">Sl</th>
                            <th width="15%">Image</th>
                            <th width="15%">Banner Image</th>
                            <th width="35%">Name</th>
                            <th width="10%">Status</th>
                            <th width="20%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categorys)
                            @foreach ($categorys as $key => $category)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td><img src="{{ asset('storage/' . $category->image) }}" alt="" width="30px"
                                            height="30px"></td>
                                    <td><img src="{{ asset('storage/' . $category->banner_image) }}" alt=""
                                            width="40px" height="25px"></td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        @if ($category->status == 'active')
                                            <span class="text-success">Active</span>
                                        @else
                                            <span class="text-info">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#update_category_{{ $category->slug }}">
                                            <i class="fa-solid fa-pen-to-square me-2 dash-icons text-primary"></i>
                                        </a>
                                        <!---Category Edit modal--->
                                        <div id="update_category_{{ $category->slug }}" class="modal fade" tabindex="-1"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Category Update Form</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body border br-7">
                                                        {{-- @php
                                                            $category = App\Models\Admin\Category::where('slug', $category->slug)->first();
                                                        @endphp --}}
                                                        <form method="post"
                                                            action="{{ route('category.update', $category->id) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="row mb-1">
                                                                <div class="col-sm-4 text-start">
                                                                    <span>Category Name</span>
                                                                </div>
                                                                <div class="col-sm-8 text-start">
                                                                    <input type="text" name="title"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="100" value="{{ $category->title }}"
                                                                        required />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <div class="col-sm-4 text-start">
                                                                    <span>Category Image</span>
                                                                </div>
                                                                <div class="col-sm-6 text-start">

                                                                    <input type="file" name="image"
                                                                        class="form-control form-control-sm" id="image"
                                                                        accept="image/*" />
                                                                </div>
                                                                <div class="col-sm-2 text-end">
                                                                    <img class="rounded-circle"
                                                                        src="{{ asset('storage/' . $category->image) }}"
                                                                        width="40" height="40" alt=""
                                                                        id="showImage">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <div class="col-sm-4 text-start">
                                                                    <span>Category Banner
                                                                        Image</span>
                                                                </div>
                                                                <div class="col-sm-6 text-start">

                                                                    <input type="file" name="banner_image"
                                                                        class="form-control form-control-sm" id="image"
                                                                        accept="image/*" />
                                                                </div>
                                                                <div class="col-sm-2 text-end">
                                                                    <img class="rounded-circle"
                                                                        src="{{ asset('storage/' . $category->banner_image) }}"
                                                                        width="40" height="40" alt=""
                                                                        id="showImage">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <div class="col-sm-4 text-start">
                                                                    <span>Category Status</span>
                                                                </div>
                                                                <div class="col-sm-8 text-start d-flex">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="active"
                                                                            id="flexRadioDefault1"
                                                                            {{ $category->status == 'active' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            Active
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="inactive"
                                                                            id="flexRadioDefault2"
                                                                            {{ $category->status == 'inactive' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            Inactive
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 text-end">
                                                                    <button type="submit" class="text-white btn btn-sm"
                                                                        style="background-color:#247297 !important; padding: 5px 12px 5px;">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Category Modal End --}}
                                        <a href="{{ route('category.destroy', [$category->id]) }}"
                                            class="text-danger delete mx-2">
                                            <i class="fa-solid fa-trash dash-icons text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
