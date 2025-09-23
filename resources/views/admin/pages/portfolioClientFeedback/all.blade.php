@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Contents</a>
                        <a href="" class="breadcrumb-item">Portfolio Client FeedBack</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content pt-0 w-75 mx-auto">
            <!-- Highlighting rows and columns -->
            <div class="d-flex align-items-center py-2">
                {{-- Add Tax Vat Modal --}}
                <div class="text-success nav-link cat-tab3"
                    style="position: relative;
                    z-index: 999;
                    margin-bottom: -39px;">
                    <a data-bs-toggle="modal" data-bs-target="#portfolioClientFeedbackAdd" type="button"
                        class="mx-3 btn btn-sm btn-info custom_btn btn-labeled btn-labeled-start float-start">
                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                            <i class="icon-plus2"></i>
                        </span>
                        Add
                    </a>

                    <div class="text-center" style="margin-left:4.5rem;">
                        <h5 class="ms-1 mb-0" style="color: #247297;">Portfolio Client Feedback</h5>
                    </div>
                </div>


            </div>
            <div>
                <table class="table portfolioClientFBDT table-bordered table-hover datatable-highlight text-center ">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="10%">Image</th>
                            <th width="20%">Name</th>
                            <th width="35%">Description</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolioClientFeedbacks as $key => $item)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td>
                                    <img src="{{asset('storage/'.$item->image)}}"
                                        alt="" width="25" height="25">
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{!!$item->description!!}</td>
                                <td>
                                    <a href="#" class="text-primary" data-bs-toggle="modal"
                                        data-bs-target="#portfolioClientFeedbackEdit{{$item->id}}">
                                        <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                        {{-- Edit Expense Modal --}}
                                        <div id="portfolioClientFeedbackEdit{{$item->id}}" class="modal fade" tabindex="-1">
                                            <div class="modal-dialog  modal-dialog-centered modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header  text-white" style="background-color: #247297">
                                                        <h5 class="modal-title text-white">Edit Portfolio Client Feedback
                                                        </h5>
                                                        <a type="button" data-bs-dismiss="modal"> <i class="ph ph-x text-white"
                                                                style="font-weight: 800;font-size: 10px;"></i></a>
                                                    </div>
                                                    <div class="modal-body p-0 px-2">
                                                        <form action="{{route('portfolio-client-feedback.update',$item->id)}}" method="post"
                                                            class="from-prevent-multiple-submits pt-2"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mt-2">
                                                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Portfolio Details Id</label>
                                                                    <select name="portfolio_details_id" class="form-control form-select-sm select"
                                                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                                                        data-placeholder="Chose Portfolio Client Feedback Details Id" required>
                                                                        <option></option>
                                                                        @foreach ($portfolioDetails as $portfolio)
                                                                            <option value="{{$portfolio->id}}" @selected($portfolio->id == $item->portfolio_details_id )>{{$portfolio->banner_title}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>

                                                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Name</label>
                                                                    <div class="input-group">
                                                                        <input name="name" value="{{$item->name}}" type="text" class="form-control form-control-sm"
                                                                            placeholder="Enter Portfolio Client Feedback Name" required
                                                                            style="padding: 2px 10px 0px 10px;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Image</label>
                                                                    <input name="image" value="{{$item->image}}" type="file" class="form-control form-control-sm"
                                                                        placeholder="Enter Portfolio Client Feedback Image">
                                                                </div>
                                                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Description</label>
                                                                    <textarea class="form-control form-control-sm" name="description" rows="3"
                                                                    placeholder="Enter Portfolio Client Feedback Description">{!!$item->description!!}</textarea>

                                                                </div>
                                                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Start Mark</label>
                                                                    <input name="star_mark" value="{{$item->star_mark}}" type="number" class="form-control form-control-sm"
                                                                        placeholder="Enter Portfolio Client Feedback Start Mark" required>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                                <button type="button" class="submit_close_btn "
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="submit_btn from-prevent-multiple-submits"
                                                                    style="padding: 4px 9px;">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit Tax Modal End --}}
                                    </a>
                                    <a href="" class="text-danger delete">
                                        <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /highlighting rows and columns -->
        </div>
        <!-- /content area End-->
        {{-- add Tax Modal Content --}}
        <div id="portfolioClientFeedbackAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header  text-white" style="background-color: #247297">
                        <h5 class="modal-title">Add Portfolio Client Feedback</h5>
                        <a type="button" data-bs-dismiss="modal"> <i class="ph ph-x text-white"
                                style="font-weight: 800;font-size: 10px;"></i></a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{route('portfolio-client-feedback.store')}}" method="post" class="from-prevent-multiple-submits pt-2"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2">

                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Portfolio Details Id</label>
                                    <select name="portfolio_details_id" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Chose Portfolio Client Feedback Details Id" required>
                                        <option></option>
                                        @foreach ($portfolioDetails as $item)
                                            <option value="{{$item->id}}">{{$item->banner_title}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Name</label>
                                    <div class="input-group">
                                        <input name="name" type="text" class="form-control form-control-sm"
                                            placeholder="Enter Portfolio Client Feedback Name" required
                                            style="padding: 2px 10px 0px 10px;">
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Image</label>
                                    <input name="image" type="file" class="form-control form-control-sm"
                                        placeholder="Enter Portfolio Client Feedback Image" required>
                                </div>
                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Description</label>
                                    <textarea class="form-control form-control-sm" name="description" rows="3"
                                    placeholder="Enter Portfolio Client Feedback Description"></textarea>

                                </div>
                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                    <label class="col-form-label col-lg-3 p-0 text-start text-muted">Start Mark</label>
                                    <input name="star_mark" type="number" class="form-control form-control-sm"
                                        placeholder="Enter Portfolio Client Feedback Start Mark" required>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                <button type="button" class="submit_close_btn " data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                    style="padding: 4px 9px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add Expense Modal End --}}
    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.portfolioClientFBDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [1, 4],
                }, ],
            });
        </script>
    @endpush
@endonce
