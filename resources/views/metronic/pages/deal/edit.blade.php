<x-admin-app-layout :title="'Edit Deal Form'">
    {{-- Include CSS specific to the deal form --}}
    @include('metronic.pages.deal.partials.deal_css')

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="px-0 app-container container-fluid px-lg-auto">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="mt-4">
                        {{-- Main container for the form --}}
                        <div id="full-process-box"> {{-- Keep ID if your global JS uses it --}}
                            <div class="mt-5 row justify-content-center">
                                <div class="col-lg-12">
                                    {{-- Page Title --}}
                                    <div class="mb-5 text-center">
                                        <h1 class="mb-0 rfq-title fw-bold text-primary">Edit Deal Information</h1>
                                        <div class="mt-2">
                                            <p class="mb-0 fs-7 text-muted">
                                                Update the form below to modify the deal (RFQ Code: <span class="fw-bold">{{ $rfq->rfq_code }}</span>).<br>
                                                Review the details, confirm accuracy, and save changes or save as a draft.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-0 mx-0 col-lg-10 col-12 px-lg-auto">
                                    {{-- Card container for the form --}}
                                    <div class="border shadow-sm card">
                                        {{-- Card Header with Sales Manager and Deal Info --}}
                                        <div class="py-10 mx-0 row g-0 align-items-center card-header" style="background-color: #0b6476">
                                            <div class="col-lg-3 ps-5">
                                                <h4 class="text-white fw-bold mb-1 fs-6"> Sales Manager Details </h4>
                                                <ul class="mb-0 text-white ps-0 fs-7" style="list-style-type: none">
                                                    <li><span class="text-gray-400 fw-semibold me-1">Name:</span><span class="text-white fw-semibold">{{ Auth::user()->name }}</span></li>
                                                    <li><span class="text-gray-400 fw-semibold me-1">Email:</span><a href="mailto:{{ Auth::user()->email }}" class="text-white text-hover-primary fw-semibold">{{ Auth::user()->email }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="text-center text-white col-lg-7 ps-0">
                                                {{-- Placeholder if needed --}}
                                            </div>
                                            <div class="text-white col-lg-2 pe-5 text-end">
                                                <h4 class="text-white fw-bold mb-1 fs-6"> Deal Information </h4>
                                                <p class="mb-1 pe-2 fs-7">
                                                    <span class="fw-semibold">Date:</span>
                                                    <span class="text-white">{{ $rfq->created_at->format('d M, Y') }}</span>
                                                </p>
                                                {{-- Removed draft toggle button from header for edit view --}}
                                            </div>
                                        </div>

                                        {{-- Include the Form Partial, passing the $rfq data --}}
                                        {{-- This partial now contains the <form> tag itself --}}
                                        @include('metronic.pages.deal.partials.deal_form', ['rfq' => $rfq])

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Removed the #draft-box section assuming it's not needed for edit view --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Push scripts to the stack defined in your layout --}}
    @push('scripts')
        {{-- Include jQuery Validation and Repeater libraries --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

        {{-- Include the deal-specific JavaScript file --}}
        @include('metronic.pages.deal.partials.deal_js_edit')
    @endpush

</x-admin-app-layout>
