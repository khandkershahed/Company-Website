<div class="offcanvas-header rfq-head-bg">
    <h5 class="text-center text-white">All RFQ Product Added In Query!</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
        style="background: #ae0a46;padding-bottom: 18px;padding-left: 12px;padding-right: 15px;">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>

<div class="offcanvas-body p-0">
    <div class="container-fluid px-0">
        <div class="row ps-4">
            <div class="col-lg-10">
                <div class="row mt-4">
                    @if ($cart_items)
                        @foreach ($cart_items as $cart_item)
                            @php
                                $productRFQ = App\Models\Admin\Product::where('id', $cart_item->id)->first([
                                    'id',
                                    'thumbnail',
                                    'name',
                                ]);
                            @endphp
                            <div class="col-lg-2 mb-4">
                                <div style="margin-top: -30px;">
                                    <div class="remove-box">
                                        <a href="javascript:void(0);" class="remove-rfq text-danger"
                                            id="{{ $cart_item->rowId }}" onClick='deleteRFQRow(event, this, this.id)'>
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                    </div>
                                    <div class="card text-center border-0 rfq-cards">
                                        <div class="d-flex align-items-center">
                                            <div class="rfq-imgs">
                                                <img src="{{ !empty(optional($productRFQ)->thumbnail) && file_exists(public_path(optional($productRFQ)->thumbnail)) ? asset(optional($productRFQ)->thumbnail) : asset('frontend/images/random-no-img.png') }}"
                                                    class="" alt="">
                                            </div>
                                            <div class="card-body border"
                                                style="text-align: start;width: 100%;padding-left: 15px; height: 85px;display: flex;align-items: center;">
                                                <small class="card-title fw-normal text-start">
                                                    {{ implode(' ', array_slice(explode(' ', optional($productRFQ)->name), 0, 3)) }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4 class="text-warning">No Product is in the RFQ List. Add some.</h4>
                    @endif
                </div>
            </div>
            <div class="col-lg-2 ">
                <div class="text-center fixed-column" style="padding: 30px !important;">
                    <p>Check all added RFQ in one place, hit the button to show all added RFQ.</p>
                    <a href="{{ route('rfq') }}" class="btn-color">Submit RFQ</a>
                </div>
            </div>
        </div>
    </div>
</div>
