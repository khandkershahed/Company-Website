@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.site-setting.index') }}" class="breadcrumb-item">Site Settings</a>
                        <span class="breadcrumb-item active">Office Location Management</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <div>
                        <a href="http://127.0.0.1:3000/admin/blog/create" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <span>Site Setting</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addOfficeLocation"
                            class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="ph-plus me-1" style="font-size: 10px;"></i>
                                <span>Add Office Location</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h5 class="text-center">Office Location</h5>
                    <div>
                        <table class="table officeLocationDT table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th width="10%">Id</th>
                                    <th width="20%">Name</th>
                                    <th width="25%">Mobile Number</th>
                                    <th width="35%">Address</th>
                                    <th width="10%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($officeLocations)
                                    @foreach ($officeLocations as $key => $officeLocation)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $officeLocation->name }}</td>
                                            <td>{{ $officeLocation->mobile_number }}</td>
                                            <td class="text-start">{{ $officeLocation->address }}</td>
                                            <td>
                                                <a href="" class="text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editOfficeLocation{{ $officeLocation->id }}">
                                                    <i class="fa-solid fa-pen-to-square dash-icons text-primary"></i>
                                                </a>
                                                <a href="{{ route('office-location.destroy', [$officeLocation->id]) }}"
                                                    class="text-danger delete">
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
        {{-- Add Success Modal --}}
        <div id="addOfficeLocation" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header p-1 py-2 px-3">
                        <h6 class="modal-title text-white">Add Office Locations</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form method="post" action="{{ route('office-location.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                {{--  --}}
                                <div class="row mt-2 mb-1">
                                    <div class="col-sm-4">
                                        <span>Name</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control form-control-sm"
                                            maxlength="100" placeholder="Enter Name" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row  mb-1">
                                    <div class="col-sm-4">
                                        <span>Mobile Number</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobile_number" class="form-control form-control-sm"
                                            maxlength="100" placeholder="Enter Mobile Number" />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row  mb-1">
                                    <div class="col-sm-4">
                                        <span>Whatsapp Number</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="whatsapp_number" class="form-control form-control-sm"
                                            maxlength="100" placeholder="Enter Whatsapp Number" />
                                    </div>
                                </div>
                                <div class="row  mb-1">
                                    <div class="col-sm-4">
                                        <span>Office Email</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="email" name="email_id" class="form-control form-control-sm"
                                            maxlength="100" placeholder="Enter Office Email" />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row  mb-1">
                                    <div class="col-sm-4">
                                        <span>Zip Code</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="zip_code" class="form-control form-control-sm"
                                            maxlength="100" placeholder="Enter Zip Code" />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row  mb-1">
                                    <div class="col-sm-4">
                                        <span>Country</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <select name="country_id" class="form-control select"
                                            data-placeholder="Chose country name" required>
                                            <option></option>
                                            @foreach ($countrys as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row  mb-1">
                                    <div class="col-sm-4">
                                        <span>Address</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea name="address" placeholder="Enter Address" id="" class="form-control" cols="3"
                                            rows="2" required></textarea>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                            <div class="modal-footer border-0 pb-0 pe-0 pt-0">
                                <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                    style="padding: 5px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add Success Modal End --}}

        {{-- Edit Success Modal --}}
        @foreach ($officeLocations as $officeLocation)
            <div id="editOfficeLocation{{ $officeLocation->id }}" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title text-white">Edit Office Locations</h6>
                            <a type="button" data-bs-dismiss="modal">
                                <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                            </a>
                        </div>
                        <div class="modal-body p-0 px-2">
                            <form method="post" action="{{ route('office-location.update', $officeLocation->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    {{--  --}}
                                    <div class="row mt-2 mb-1">
                                        <div class="col-sm-4">
                                            <span>Name</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $officeLocation->name }}" name="name"
                                                class="form-control form-control-sm" maxlength="100" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mt-2 mb-1">
                                        <div class="col-sm-4">
                                            <span>Mobile Number</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="mobile_number"
                                                class="form-control form-control-sm"
                                                value="{{ $officeLocation->mobile_number }}" maxlength="100" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mt-2 mb-1">
                                        <div class="col-sm-4">
                                            <span>Whatsapp Number</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="whatsapp_number"
                                                class="form-control form-control-sm"
                                                value="{{ $officeLocation->whatsapp_number }}" maxlength="100" />
                                        </div>
                                    </div>
                                    <div class="row  mb-1">
                                        <div class="col-sm-4">
                                            <span>Office Email</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="email" name="email_id" class="form-control form-control-sm"
                                                value="{{ $officeLocation->email_id }}" maxlength="100"
                                                placeholder="Enter Office Email" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mt-2 mb-1">
                                        <div class="col-sm-4">
                                            <span>Zip Code</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="zip_code" class="form-control form-control-sm"
                                                value="{{ $officeLocation->zip_code }}" maxlength="100" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mt-2 mb-1">
                                        <div class="col-sm-4">
                                            <span>Country</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="country_id" class="form-control select"
                                                data-placeholder="Chose country name " req>
                                                @foreach ($countrys as $country)
                                                    <option @selected($country->id == $officeLocation->country_id) value="{{ $country->id }}">
                                                        {{ $country->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mt-2 mb-1">
                                        <div class="col-sm-4">
                                            <span>Address</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea name="address" id="" class="form-control" cols="3" rows="2">{{ $officeLocation->address }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                    <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                        style="padding: 5px;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Edit Success Modal End --}}
    </div>
@endsection
@once
    @push('scripts')
        <script type="text/javascript">
            $('.officeLocationDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [4],
                }, ],
            });
        </script>
    @endpush
@endonce
