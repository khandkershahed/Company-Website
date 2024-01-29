@extends('admin.master')
@section('content')
    <style>
        .sticky1 {
            transform: rotate(-3.5deg);
            -webkit-transform: rotate(-3.5deg);
            -moz-transform: rotate(-3.5deg);
        }

        .delete-btns {
            width: 30px;
            height: 30px;
        }

        .delete-btns:hover {
            transform: scale(1.5);
            transition: 0.5s;
        }

        .delete {
            width: 30px;
            height: 30px;
        }

        .delete:hover {
            transform: scale(1.5);
            transition: 0.5s;
        }

        .pin-img:hover {
            transform: scale(1.5);
            transition: 0.5s;
        }

        .notes-1 {
            background-color: rgb(211, 240, 253);
        }

        .notes-2 {
            background-color: #d8ffd5
        }

        .notes-3 {
            background-color: #fde1e1;
        }

        .notes-4 {
            background-color: #ffddea;
        }

        .card-headers-border {
            border-bottom: 1px solid white;
            background-color: inherit;
        }

        .notes {
            height: 50vh;
            overflow: auto;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .notes::-webkit-scrollbar {
            width: 2px;
        }

        .notes::-webkit-scrollbar-track {
            box-shadow: none;
        }

        .notes::-webkit-scrollbar-thumb {
            background-color: white;
            outline: 0px solid slategrey;
        }

        .post-date {
            font-size: 15px;
            color: black;
        }

        .main-bg-image {
            background: #ebe5e5;
            /* background-image: url(https://img.freepik.com/free-photo/design-space-paper-textured-background_53876-41739.jpg?t=st=1695545104~exp=1695545704~hmac=221f4ccaa726b7b105d726d7060ba06ef13b3cb78e229dc59212eb8701649c9b); */
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <span class="breadcrumb-item active">Notice Board</span>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
                <div>
                    <a href="javascript:void(0);" class="btn navigation_btn" data-bs-toggle="modal"
                        data-bs-target="#noticeAdd">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-plus me-1" style="font-size: 14px;"></i>
                            <span>Add Notice</span>
                        </div>
                    </a>
                    <a href="{{ route('notice.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-plus me-1" style="font-size: 14px;"></i>
                            <span>All Notices</span>
                        </div>
                    </a>
                    <a href="javascript:void(0);" id="resetButton" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-redo me-1" style="font-size: 14px;"></i>
                            <span>Rearrange Cards</span>
                        </div>
                    </a>
                </div>
                <!-- Basic tabs -->
            </div>
        </div>
        <div class="container-fluid main-bg-image">
            <div class="container-fluid p-5">
                {{-- first Row --}}
                <div class="row">
                    @foreach ($notices as $notice)
                        @php
                            $randomClass = 'notes-' . rand(1, 4);
                        @endphp
                        <div id="card-{{ $notice->id }}" class="col-lg-4 col-sm-12 draggable-card">
                            <div class="card sticky1 notes {{ $randomClass }} rounded-0 text-white">
                                <div
                                    class="card-header sticky-top card-headers-border py-2 my-0 d-flex justify-content-between align-content-center">
                                    <div>
                                        <img class="pin-img"
                                            src="https://www.pngall.com/wp-content/uploads/4/Red-Pin-PNG-Clipart.png"
                                            width="30px" height="30px" alt="">
                                    </div>
                                    <div>
                                        @if (auth()->check() && in_array('hr', json_decode(auth()->user()->department, true)))
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#notice_{{ $notice->id }}"
                                                class="text-info p-1 bg-light rounded-circle me-1">
                                                <i class="fa-solid fa-pencil text-info"></i>
                                            </a>
                                            <a href="{{ route('notice.destroy', $notice->id) }}"
                                                class="btn btn-light rounded-circle delete">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </a>
                                        @endif
                                        <a href="javascript:void(0);" class="btn btn-light rounded-circle delete-btns"
                                            data-card-id="{{ $notice->id }}">
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="card-header border-0 py-0 my-0">
                                    <h4 class="mb-0 text-black">{{ $notice->title }}</h4>
                                    <p class="p-0 m-0 post-date">
                                        Post On<span class="ms-2 text-black">{{ $notice->publish_date }}</span>
                                    </p>
                                </div>
                                <div class="card-body pt-0 mt-0 text-black">
                                    <p class="ps-0 text-black">{!! $notice->content !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.notice.notice_modals')
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {

            $(".draggable-card").draggable();

            $(".delete-btns").click(function(e) {
                e.preventDefault();

                var cardId = $(this).data('card-id');
                $("#card-" + cardId).remove();
            });

            $("#resetButton").click(function() {

                // Reset the positions of all draggable cards
                $(".draggable-card").css({
                    top: 0,
                    left: 0
                });
            });
        });
    </script>
@endpush
