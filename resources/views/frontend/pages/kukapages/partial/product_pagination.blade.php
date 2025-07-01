<style>
    .page-link {
        height: 42px;
        padding-top: 8px;
    }
</style>
<div class="row mt-2" id="products-container">
    @foreach ($products as $product)
        <div class="custom-col-5 col-sm-6 col-md-4 brand_prduct">
            <div class="card rounded-0 border-0" style="box-shadow: var(--custom-shadow)">
                <div class="card-body" style="height:23rem;">
                    {{-- <div class="new-video">
                        <div class="icon-small video"></div>
                    </div> --}}
                    <a href="{{ route('product.details', $product->slug) }}">
                        <div class="image-section">
                            <img src="{{ file_exists($product->thumbnail) ? asset($product->thumbnail) : asset('upload/no_image.jpg') }}"
                                alt="" width="100%" height="180px;">
                        </div>
                    </a>

                    <div class="content-section text-center py-3">
                        <a href="{{ route('product.details', $product->slug) }}" class="mb-2">
                            <p class="pb-0 text-muted brandpage_product_title mb-2">
                                {{ Str::words($product->name, 15) }}</p>
                        </a>
                        <div>
                            <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                {{ $product->getCategoryName() }}</span>
                            <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                {{ $product->sku_code }}</span>
                            {{-- <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                {{ $product->product_code }}</span> --}}
                            @if ($product->price_status == 'price' && !empty($product->price))
                                <span style="font-size: 14px"><i class="fa-solid fa-tag ms-2"></i> USD
                                    {{ $product->price }}</span>
                            @endif
                        </div>
                        {{-- <span style="font-size: 10px"><i class="fa-solid fa-tag"></i> KR 4 AGILUS</span> --}}
                        @if ($product->rfq == 1)
                            <div class="d-flex justify-content-center">
                                {{-- <button class="btn-color special_btn" data-bs-toggle="modal"
                                    data-bs-target="#rfq{{ $product->id }}">Ask For Price</button> --}}
                                @php
                                    $cart_items = Cart::content();
                                    $productInCart = false;

                                    foreach ($cart_items as $item) {
                                        if ($item->id == $product->id) {
                                            $productInCart = true;
                                            break;
                                        }
                                    }
                                @endphp

                                <button class="px-3 py-2 btn-color popular_product-button add_to_cart"
                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-quantity="1">
                                    {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                </button>
                            </div>
                        @elseif ($product->price_status && $product->price_status == 'rfq')
                            <div class="d-flex justify-content-center">
                                {{-- <button class="btn-color special_btn" data-bs-toggle="modal"
                                    data-bs-target="#rfq{{ $product->id }}">Ask For Price</button> --}}
                                <button class="px-3 py-2 btn-color popular_product-button add_to_cart"
                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-quantity="1">
                                    {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                </button>
                            </div>
                        @elseif ($product->price_status && $product->price_status == 'offer_price')
                            <div class="d-flex justify-content-center">
                                <button class="btn-color special_btn" data-bs-toggle="modal"
                                    data-bs-target="#rfq{{ $product->id }}">Your Price</button>
                            </div>
                        @else
                            <div class="d-flex justify-content-center" class="cart_button{{ $product->id }}">
                                <a href="{{ route('product.details', $product->slug) }}"
                                    class="btn-color special_btn">Details</a>
                                {{-- <button class="btn-color special_btn add_to_cart" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-quantity="1">Add to Cart</button> --}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-3">
    <div id="pagination-links">
        {!! $products->render() !!}
        {{-- {{ $products->links() }} --}}
    </div>
</div>
