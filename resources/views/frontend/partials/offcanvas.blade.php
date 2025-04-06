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
            <div class="col-lg-9">
                <div class="row mt-4 pb-5">
                    @if ($cart_items)
                        @foreach ($cart_items as $cart_item)
                            @php
                                $productRFQ = App\Models\Admin\Product::where('id', $cart_item->id)->first([
                                    'id',
                                    'thumbnail',
                                    'name',
                                ]);
                            @endphp
                            <div class="col-lg-12">
                                <div>
                                    <div class="card text-center border-0 rfq-cards">
                                        <div class="d-flex align-items-center">
                                            <div class="card-body"
                                                style="text-align: start; width: 100%; padding-left: 15px; height: 100%; display: flex; align-items: center; justify-content: space-around; border-bottom: 1px solid #eee">

                                                {{-- SL No. --}}
                                                <small class="fw-normal text-start me-3">
                                                    {{ $loop->iteration ?? '1' }}.
                                                </small>

                                                {{-- Name --}}
                                                <small class="fw-normal text-start me-3" style="flex: 1;">
                                                    {{ $productRFQ->name }}
                                                </small>

                                                {{-- Quantity --}}
                                                <small class="fw-normal text-start me-5">
                                                    Qty: {{ $productRFQ->quantity ?? 'N/A' }}
                                                </small>
                                                <small>
                                                    <a href="javascript:void(0);"
                                                        class="remove-rfq rounded-0 text-danger"
                                                        id="{{ $cart_item->rowId }}"
                                                        onClick='deleteRFQRow(event, this, this.id)'>
                                                        <i class="fas fa-trash-can"></i>
                                                    </a>
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
            <div class="col-lg-3 ">
                <div class="text-center fixed-column" style="padding: 30px !important;">
                    <p>Check all added RFQ in one place, hit the button to show all added RFQ.</p>
                    <a href="{{ route('rfq') }}" class="btn-color">Submit RFQ</a>
                </div>
            </div>
        </div>
    </div>
</div>
