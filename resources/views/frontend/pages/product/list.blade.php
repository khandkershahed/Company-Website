<style>
    /* Modern Vertical Quantity Selector */
    .qty-container {
        display: flex;
        align-items: center;
    }

    .quantity-box {
        width: 50px;
        height: 40px;
        text-align: center;
        font-size: 16px;
        font-weight: 500;
        border: 1px solid #ddd;
        background-color: #f7f7f7;
        pointer-events: none;
        /* readonly */
    }

    .quantity-selectors {
        display: flex;
        flex-direction: column;
        background-color: #f7f7f7;
        border: 1px solid #e0e0e0;
    }

    .quantity-btn {
        width: 30px;
        height: 17px;
        border: none;
        background-color:  transparent !important;
        color: #555;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.2s;
        border-radius: 4px;
        margin: 1px 0;
    }

    .quantity-btn:hover {
        background-color: #e0e0e0;
    }

    .quantity-btn:disabled {
        background-color: #f9f9f9;
        color: #bbb;
        cursor: not-allowed;
    }

    .quantity-btn i {
        pointer-events: none;
        font-size: 14px;
    }
</style>
<header class="px-0 pb-2 mb-2 shadow-sm product_showing">
    <div class="form-inline ">
        {{-- <span class="mr-md-auto">
            {{ is_countable($products) && count($products) > 0 ? $products->count() : 'No' }} Items found
        </span> --}}
        <div class="d-flex justify-content-start align-items-center">
            <div class="me-3">
                <select class="show form-select rounded-0 product_btn_dropdown" name="show"
                    data-placeholder="Results Per Page" onchange="perpageFilter();" aria-label="Default select example">
                    <option value="">Default Show</option>
                    <option value="10" @selected(!empty($_GET['show']) && $_GET['show']=='10' )>
                        Per Page: 10</option>
                    <option value="15" @selected(!empty($_GET['show']) && $_GET['show']=='15' )>
                        Per Page: 15</option>
                    <option value="25" @selected(!empty($_GET['show']) && $_GET['show']=='25' )>
                        Per Page: 25</option>
                    <option value="50" @selected(!empty($_GET['show']) && $_GET['show']=='50' )>
                        Per Page: 50</option>
                </select>
            </div>
            <div class="">
                <select class="form-select rounded-0" name="sortBy" style="width: 78%;" onchange="sortByFilter();"
                    data-placeholder="Results Per Page" aria-label="Default select example">
                    <option value="">Default Sorting</option>
                    <option value="titleASC" @selected(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleASC' )>Ascending By Name
                    </option>
                    <option value="titleDESC" @selected(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleDESC' )>Descending By Name
                    </option>
                    <option value="priceASC" @selected(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceASC' )> Price (Low to High)
                    </option>
                    <option value="priceDESC" @selected(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceDESC' )> Price (High to Low)
                    </option>
                    <option value="newProduct" @selected(!empty($_GET['sortBy']) && $_GET['sortBy']=='newProduct' )> New Products
                    </option>
                    <option value="priceAvailable" @selected(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceAvailable' )> Price Available
                    </option>
                </select>
            </div>
        </div>
    </div>
</header>
<div class="d-flex justify-content-center row">

    @if (count($products) > 0)
    <!-- First Product Start -->
    @foreach ($products as $product)
    <div class="col-md-12 col-sm-12">
        <div class="px-0 m-0 row rounded-2 d-flex align-items-center shop-product">
            <div class="px-0 col-md-3">
                <img class="img-fluid img-responsive rounded-2 product-image"
                    src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}"
                    onerror="this.onerror=null; this.src='{{ asset('frontend/images/no-shop-imge.png') }}';">
            </div>
            <div class="px-4 col-md-9 col-sm-12">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-8 col-sm-12">
                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                            <h5 class="" style="color: #ae0a46;">
                                {{ $product->name }}
                            </h5>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        @if ($product->qty > 0)
                        <h6 class="text-success font-number text-end"
                            style="font-size:16px; text-transform:capitalize;">
                            <i class="fa-solid fa-circle-check" style="font-size:15px !important;"></i> in
                            stock
                        </h6>
                        @else
                        <h6 class="text-end text-success"
                            style="font-size:20px; text-transform:capitalize;">
                            {{ ucfirst($product->stock) }}
                        </h6>
                        @endif
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="mt-1 col-lg-8 col-sm-12">
                        <div>
                            <span style="font-size: 12px;">
                                SKU #: {{ $product->sku_code }} |
                                MF #: {{ $product->mf_code }}
                                @if (!empty($product->product_code))
                                | NG #: {{ $product->product_code }}
                                @endif
                            </span>
                            <br>
                            {{-- <p>
                                        {!! Str::limit($product->short_desc, 180) !!}
                                    </p> --}}
                        </div>
                    </div>
                    <div class="mt-1 text-center col-lg-4 col-sm-12">
                        <div class="text-end">
                            @if ($product->rfq != 1)
                            @if (!empty($product->discount))
                            <h3 class="mr-1 font-number text-end">$
                                {{ $product->discount }}
                            </h3>
                            <span class="strike-text">$
                                {{ $product->price }}</span>
                            @else
                            <div class="d-flex justify-content-end align-items-center">
                                <small class="text-info me-2" style="font-size: 18px;">USD</small>
                                <h4 class="mr-1 font-number text-end">$
                                    {{ $product->price }}
                                </h4>
                            </div>
                            @endif
                            @endif
                        </div>
                        @if ($product->rfq != 1)
                        <div class="row gx-0 d-flex align-items-center justify-content-end">
                            <div class="col-lg-6">
                                <div class="qty-container d-flex justify-content-end"
                                    style="margin-right: -0.5rem;
                                                    position: relative;
                                                    z-index: 999;">
                                    <input type="text" name="qty" value="1" class="input-qty" />
                                    <span class="d-flex flex-column">
                                        <button class="text-white qty-btn-plus btn rounded-0 qty-btn"
                                            type="button"><i class="fa fa-chevron-up"></i></button>
                                        <button class="mr-1 text-white qty-btn-minus btn rounded-0 qty-btn"
                                            type="button"><i class="fa fa-chevron-down"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div
                                    class="d-flex justify-content-end cart_quantity_button{{ $product->id }}">
                                    <a href="javascript:void(0);"
                                        class="common_button effect01 add_to_cart_quantity"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                        style="padding:10px 8px;">Add to RFQ</a>
                                </div>
                            </div>
                        </div>
                        {{-- @else
                                    <div class="mt-2 details_btn">
                                         <a href="{{ route('product.details', $product->slug) }}"
                        class="common_button effect01">Details <i
                            class="fa-solid fa-circle-info ps-2"></i></a>
                    </div> --}}
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-4 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center ">
                                        {{-- <a class="search-btn-price me-2" --}}
                                        <a class="px-3 py-2 mt-0 text-black bg-transparent border btn-color popular_product-button me-2"
                                            href="{{ route('askForPrice',$product->slug) }}">Ask
                                            For Price</a>
                                    </div>
                                    <!-- Example Product Qty Selector -->
                                    <div class="qty-container">
                                        <input type="text" class="quantity-box" value="1" readonly>
                                        <div class="quantity-selectors">
                                            <button type="button" class="quantity-btn increment-quantity"><i class="fa-solid fa-plus"></i></button>
                                            <button type="button" class="quantity-btn decrement-quantity" disabled><i class="fa-solid fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    {{-- <a class="pb-2 bg-transparent border-0 text-end" --}}
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
                                    <button
                                        class="header_cart_button search-btn-price add_to_cart cart_button_text{{ $product->id }}"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                        data-quantity="1" onclick="addToCart(event, this)">
                                        {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endforeach
<!-- First Product End -->
@else
<div class="col-md-12 col-sm-12">
    <div class="p-2 m-0 bg-white border rounded shadow-lg row d-flex align-items-center">
        <h4 class="text-center text-danger">No Product Found. Search again.
        </h4>
    </div>
</div>
@endif

</div>

@if (count($products) > 9)
<nav aria-label="Page navigation example" class="mt-3 d-flex justify-content-center">
    <ul class="pagination" id="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
@endif
<script>
    document.querySelectorAll('.qty-container').forEach(container => {
        const input = container.querySelector('.quantity-box');
        const btnPlus = container.querySelector('.increment-quantity');
        const btnMinus = container.querySelector('.decrement-quantity');

        btnPlus.addEventListener('click', () => {
            let current = parseInt(input.value);
            input.value = current + 1;
            btnMinus.disabled = false;
        });

        btnMinus.addEventListener('click', () => {
            let current = parseInt(input.value);
            if (current > 1) {
                input.value = current - 1;
            }
            if (input.value == 1) {
                btnMinus.disabled = true;
            }
        });
    });
</script>

<script>
    // var buttonPlus = $(".qty-btn-plus");
    // var buttonMinus = $(".qty-btn-minus");

    // var incrementPlus = buttonPlus.click(function() {
    //     var $n = $(this)
    //         .parent(".qty-container")
    //         .find(".input-qty");
    //     $n.val(Number($n.val()) + 1);
    // });

    // var incrementMinus = buttonMinus.click(function() {
    //     var $n = $(this)
    //         .parent(".qty-container")
    //         .find(".input-qty");
    //     var amount = Number($n.val());
    //     if (amount > 0) {
    //         $n.val(amount - 1);
    //     }
    // });
    // var buttonPlus = $(".qty-btn-plus");
    // var buttonMinus = $(".qty-btn-minus");

    // var incrementPlus = buttonPlus.click(function() {
    //     var $n = $(this) // This refers to the button that was clicked
    //         .closest(".qty-container") // Find the closest parent .qty-container
    //         .find(".input-qty"); // Find the specific .input-qty inside this container
    //     $n.val(Number($n.val()) + 1); // Increase the value of the input
    // });

    // var incrementMinus = buttonMinus.click(function() {
    //     var $n = $(this) // This refers to the button that was clicked
    //         .closest(".qty-container") // Find the closest parent .qty-container
    //         .find(".input-qty"); // Find the specific .input-qty inside this container
    //     var amount = Number($n.val());
    //     if (amount > 0) {
    //         $n.val(amount - 1); // Decrease the value of the input if it's greater than 0
    //     }
    // });
</script>
