@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Marketing DMAR Management</span>
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
        <div class="content pt-0 w-75 mx-auto">
            <div class="d-flex align-items-center py-2">
                {{-- Add Details Start --}}
                <div class="text-success nav-link cat-tab3"
                    style="position: relative;
                    z-index: 999;
                    margin-bottom: -40px;">
                    <a href="{{ route('admin.marketing-dmar.create') }}">
                        <div class="d-flex align-items-center">
                            <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Add Solution Details">
                                <i class="ph-plus icons_design"></i> </span>
                            <span class="ms-1" style="color: #247297;">Add</span>
                        </div>
                    </a>
                    <div class="text-center" style="margin-left: 300px">
                        <h5 class="ms-1" style="color: #247297;">Marketing DMAR</h5>
                    </div>
                </div>
                {{-- Add Details End --}}
            </div>
            <div>
                <table class="table marketingDMRMain table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="10%">Id</th>
                            <th width="40%">Marketing Manager Name</th>
                            <th width="15%">Month</th>
                            <th width="20%">Area</th>
                            <th width="15%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($MarketingDmars)
                            @foreach ($MarketingDmars as $key => $MarketingDmar)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ App\Models\User::where('id', $MarketingDmar->marketing_manager_id)->value('name') }}
                                    </td>
                                    <td>{{ ucfirst($MarketingDmar->month) }}</td>
                                    <td>{{ ucfirst($MarketingDmar->area) }}</td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#addnewsLetter"
                                            class="text-primary">
                                            <i class="fa-solid fa-circle-info me-2 p-1 rounded-circle text-primary"></i>
                                        </a>
                                        <a href="{{ route('admin.marketing-dmar.edit', [$MarketingDmar->id]) }}"
                                            class="text-primary">
                                            <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                        </a>
                                        <a href="{{ route('marketing-dmar.destroy', [$MarketingDmar->id]) }}"
                                            class="text-danger delete">
                                            <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
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
            {{-- All Marketing DMR Modal --}}
            <div id="addnewsLetter" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title text-white">Add News Letter</h6>
                            <a type="button" data-bs-dismiss="modal">
                                <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                            </a>
                        </div>
                        <div class="modal-body p-0 px-2">
                            <table class="table marketingDMR table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th width="6%">Id</th>
                                        <th width="6%">Marketing Manager Name</th>
                                        <th width="6%">Month</th>
                                        <th width="6%">Area</th>
                                        <th width="6%">Sector</th>
                                        <th width="6%">Company Name</th>
                                        <th width="6%">Activity</th>
                                        <th width="6%">Current_Status</th>
                                        <th width="6%">Solution</th>
                                        <th width="6%">Product</th>
                                        <th width="6%">Phone</th>
                                        <th width="6%">Contact</th>
                                        <th width="6%">Comments_By_Sales</th>
                                        <th width="6%">Comments_By_Ceo</th>
                                        <th width="6%">Action_On_Fail</th>
                                        <th width="6%" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($MarketingDmars)
                                        @foreach ($MarketingDmars as $key => $MarketingDmar)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ App\Models\User::where('id', $MarketingDmar->marketing_manager_id)->value('name') }}
                                                </td>
                                                <td>{{ ucfirst($MarketingDmar->month) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->area) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->sector) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->company_name) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->activity) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->current_status) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->solution) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->product) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->phone) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->contact) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->comments_by_sales) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->comments_by_ceo) }}</td>
                                                <td>{{ ucfirst($MarketingDmar->action_on_fail) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.marketing-dmar.edit', [$MarketingDmar->id]) }}"
                                                        class="text-primary">
                                                        <i
                                                            class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                                    </a>
                                                    <a href="{{ route('marketing-dmar.destroy', [$MarketingDmar->id]) }}"
                                                        class="text-danger delete">
                                                        <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
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
            {{-- Add Success Modal End --}}
@endsection
@once
    @push('scripts')
        <script type="text/javascript">
            $('.marketingDMRMain').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [4],
                }, ],
            });
        </script>
        <script type="text/javascript">
            $('.marketingDMR').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [16],
                }, ],
            });
        </script>
    @endpush
@endonce
