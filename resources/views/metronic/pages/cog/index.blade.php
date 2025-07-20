{{-- <x-admin-app-layout :title="'Quotation :-' . $rfq->rfq_code"> --}}
<x-admin-app-layout>
    <div class="bg-white d-flex align-items-center justify-content-center">
        <div class="px-0 container-fluid">
            <form id="quotationForm" action="{{ route('rfq-manage.store') }}" method="POST" enctype="multipart/form-data"
                style="overflow-x: none">
                @csrf
                <input type="hidden" name="rfq_id" value="{{ $rfq->id }}">
                <input type="hidden" name="rfq_code" value="{{ $rfq->rfq_code }}">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="my-10 mt-5 text-start">
                            <h1 class="mb-0 rfq-title fw-bold text-primary">
                                {{ $rfq->rfq_code ?? 'RFQ Code' }}
                            </h1>
                            <div class="mt-2 text-primary">
                                <p class="mb-0">{{ $rfq->name ?? 'Unknown' }} | {{ $rfq->designation ?? 'Unknown' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="my-10 mt-5 text-end">
                            <h5 class="mb-0 rfq-title fw-bold text-primary">Client Type : <span class="badge bg-primary"><i class="fas fa-user-shield pe-2"></i> {{ ucfirst($rfq->client_type) ?? 'Unknown' }}</span>
                                {{-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#clientTYpe"
                                class="p-2 text-center btn btn-secondary">
                                <i class="fas fa-user-tie fs-3 ps-1"></i>
                            </a> --}}
                            </h5>
                        </div>
                    </div>
                    <div class="my-4 col-lg-7" id="mysetting">
                        @include('metronic.pages.cog.partials.setting')
                    </div>
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
                            <div>
                                <div class="text-end d-flex align-items-center justify-content-end">
                                    <div class="form-check d-flex justify-content-end align-items-center">
                                        <label class="form-check-label me-10 text-danger" for="flexCheckVAT">
                                            VAT/GST
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckVAT" />
                                    </div>

                                    <div class="form-check d-flex justify-content-end align-items-center">
                                        <label class="form-check-label me-10 pe-2 text-danger" for="flexCheckDiscount">
                                            <span title="Special Discount">Special Discount</span>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDiscount" />
                                    </div>
                                </div>
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


    <!-- Client Type Modal End -->

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
    </div>
    @include('metronic.pages.cog.partials.script')
    
</x-admin-app-layout>
