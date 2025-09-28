{{-- <x-admin-app-layout :title="'Quotation :-' . $rfq->rfq_code"> --}}
<x-admin-app-layout>
    <link href="{{ asset('backend/assets/input-tags/css/tagsinput.css') }}" rel="stylesheet">
    <div class="bg-white d-flex align-items-center justify-content-center">
        <div class="px-0 container-fluid">
            <form id="quotationForm" action="{{ route('rfq-manage.store') }}" method="POST" enctype="multipart/form-data"
                style="overflow-x: none">
                @csrf
                <input type="hidden" name="rfq_id" value="{{ $rfq->id }}">
                <input type="hidden" name="rfq_code" value="{{ $rfq->rfq_code }}">
                <div class="row align-items-center px-4">
                    <div class="col-lg-6">
                        <div class="my-10 mt-5 text-start">
                            <h1 class="mb-0 rfq-title fw-bold text-primary">
                                RFQ#{{ $rfq->rfq_code ?? 'RFQ Code' }} @if ($rfq->status == 'quoted') (<span
                                    class="badge bg-success px-2 py-3">Quoted</span>)
                                @endif
                            </h1>
                            <div class="mt-2 text-primary">
                                <p class="mb-0">{{ $rfq->name ?? 'Unknown' }} | {{ $rfq->designation ?? 'Unknown' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="my-10 mt-5 text-end">
                            <h5 class="mb-0 rfq-title fw-bold text-primary">Client Type : <span
                                    class="badge bg-primary"><i class="fas fa-user-shield pe-2"></i>
                                    {{ ucfirst($rfq->client_type) ?? 'Unknown' }}</span>
                                {{-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#clientTYpe"
                                class="p-2 text-center btn btn-secondary">
                                <i class="fas fa-user-tie fs-3 ps-1"></i>
                            </a> --}}
                            </h5>
                        </div>
                    </div>
                    <div class="my-4 col-12">
                        <div class="row" id="mysetting">
                            @include('metronic.pages.cog.partials.setting')
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="mt-8 col-lg-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <ul class="border-0 nav nav-tabs nav-line-tabs nav-stretch fs-6 justify-content-start">
                                <li class="nav-item">
                                    <a class="nav-link bypass-nav active" data-bs-toggle="tab" href="#cog">Cost Of
                                        Good</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bypass-nav" data-bs-toggle="tab" href="#quotation">Quotation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bypass-nav" data-bs-toggle="tab" href="#source">Source</a>
                                </li>
                            </ul>
                            <div class="d-flex align-items-center">
                                <!-- VAT/GST as Button -->
                                <label
                                    class="border btn btn-outline-danger bg-light rounded-1 d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input me-2 rounded-circle"
                                        name="vat_display" value="1" id="vat_display" autocomplete="off"
                                        @checked(optional($quotation)->vat_display == '1') />
                                    VAT/GST
                                </label>

                                <!-- Special Discount as Button -->
                                <label
                                    class="border btn btn-outline-danger bg-light rounded-1 d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input me-2 rounded-circle"
                                        name="special_discount_display" value="1" id="special_discount_display"
                                        autocomplete="off" @checked(optional($quotation)->special_discount_display == '1') />
                                    Special Discount
                                </label>
                            </div>

                        </div>
                        <div class="border-0 shadow-none card rounded-0">
                            <div class="p-0 card-body">
                                <div class="tab-content" id="myTabContent">
                                    <!-- COG Start -->
                                    <div class="tab-pane fade show active" id="cog" role="tabpanel">
                                        @include('metronic.pages.cog.partials.cog')
                                    </div>
                                    <!-- COG end -->
                                    <!-- Quotation Start -->
                                    <div class="shadow-none tab-pane fade" id="quotation" role="tabpanel">
                                        @include('metronic.pages.cog.partials.quotation')
                                    </div>
                                    <!-- Quotation End -->
                                    <!-- Source Start -->
                                    <div class="tab-pane fade" id="source" role="tabpanel">
                                        @include('metronic.pages.cog.partials.source')
                                    </div>
                                    <!-- Source end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Client Type Modal Start -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="quotationMail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Email Where Quotation will send</h5>
                    <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"> X
                    </button>
                </div>
                <form id="quotationMailForm" action="{{ route('bypass_quotation.send') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="loader" style="display: none;">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="preloader-spinner" src="{{ asset('/images/simple.gif') }}" alt="Loading..."
                                    style="width: 200px; padding-top: 150px; padding-bottom: 150px;">
                            </div>
                        </div>
                        <div class="container p-2 mx-2 submit_modal_container">
                            <div class="row">
                                <div class="mb-1">
                                    <label class="form-label" for="basicpill-firstname-input">Quotation Receiver
                                        Email</label>
                                    <input type="hidden" name="rfq_id" value="{{ $rfq->id }}">
                                    <input type="email" maxlength="250" class="form-control form-control-sm"
                                        value="{{ optional($quotation)->receiver_email ?? $rfq->email }}"
                                        placeholder="demo@example.com" name="receiver_email" />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basicpill-firstname-input">Quotation Receiver Email
                                        (CC)</label>
                                    <input type="text" name="receiver_cc_email"
                                        class="form-control visually-hidden"
                                        value="{{ optional($quotation)->receiver_cc_email }}" data-role="tagsinput"
                                        placeholder="demo@example.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info from-prevent-multiple-submits"
                            style="padding: 10px;">Send</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Client Type Modal End -->


    @include('metronic.pages.cog.partials.script')

</x-admin-app-layout>
