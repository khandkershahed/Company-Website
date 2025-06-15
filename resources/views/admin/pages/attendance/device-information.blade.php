@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <div class="d-flex justify-content-between align-items-center shadow-sm">
            <div class="page-header-content d-lg-flex">
                <div class="d-flex px-2">
                    <div class="breadcrumb py-2">
                        <a href="" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Device Information</span>
                    </div>
                    <a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
            <!-- Basic tabs -->
            <div>
                <a href="" class="btn navigation_btn">
                    <div class="d-flex align-items-center ">
                        <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                        <span>Back To Device Set Ip</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 border-0 shadow-sm">
                            <h4 class="pb-0 mb-0 text-uppercase">Device Information</h4>
                        </div>
                        <div class="card-body pt-0">
                            <p class="px-1 pt-0 pb-0 mb-0 devider-text text-center">Device information</p>
                            <div class="row border p-3">
                                <div class="col-lg-4 boder-left">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">IP :</p>
                                        <p class="p-0 m-0">{{ $deviceip }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Name :</p>
                                        <p class="p-0 m-0">{{ $devicedeviceName }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Version :</p>
                                        <p class="p-0 m-0">{{ $deviceVersion }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Serial Number :</p>
                                        <p class="p-0 m-0">{{ $deviceserialNumber }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 boder-left">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">OS Version :</p>
                                        <p class="p-0 m-0">{{ $deviceOSVersion }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Platform :</p>
                                        <p class="p-0 m-0">{{ $devicePlatform }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Fm Version :</p>
                                        <p class="p-0 m-0">{{ $devicefmVersion }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Time :</p>
                                        <p class="p-0 m-0">{{ $devicegetTime }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Work Code :</p>
                                        <p class="p-0 m-0">{{ $deviceworkCode }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">SSR :</p>
                                        <p class="p-0 m-0">{{ $devicessr }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="main_color fw-bold p-0 m-0">Epin Width :</p>
                                        <p class="p-0 m-0">{{ $devicepinWidth }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
