<style>
    .search_titles {
        font-size: 17px;
        color: #ae0a46 !important;
        text-transform: capitalize;
    }

    button:focus,
    input:focus {
        outline: none;
        box-shadow: none;
    }
</style>


@if (
    (is_countable($brands) && count($brands) > 0) ||
        (is_countable($categorys) && count($categorys) > 0) ||
        (is_countable($solutions) && count($solutions) > 0) ||
        (is_countable($industries) && count($industries) > 0) ||
        (is_countable($products) && count($products) > 0) ||
        (is_countable($blogs) && count($blogs) > 0) ||
        (is_countable($storys) && count($storys) > 0) ||
        (is_countable($tech_glossys) && count($tech_glossys) > 0))
    <div class="card-body">
        <div class="row">
            <div class="col-12 p-2 d-lg-none mb-3">
                @if (count($products) > 0)
                    <!-- First Product Start -->
                    @foreach ($products as $product)
                        <div class="row m-0 p-2 rounded-0  bg-white rounded-0 d-flex align-items-center"
                            style="border-bottom: 2px solid #dee2e6;">
                            <div class="col-2 m-0 p-0">
                                <img class="" height="50px" width="50px" src="{{ asset($product->thumbnail) }}"
                                    alt="{{ $product->name }}">
                            </div>
                            <div class="col-10 col-sm-12 ps-lg-2 ps-4">
                                <a class="search_titles"
                                    href="{{ route('product.details', ['id' => $product->slug]) }}">
                                    <h6 class="my-1" style="color: #ae0a46;">
                                        {{ $product->name }}
                                    </h6>
                                </a>
                            </div>

                        </div>
                    @endforeach
                    <!-- First Product End -->
                @else
                    <div class="col-md-12 col-sm-12">
                        <div class="row m-0 p-2 shadow-lg bg-white border rounded d-flex align-items-center">
                            <h4 class="text-danger text-center">No Product Found. Search again.
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="row mb-4">
                    @if (is_countable($brands) && count($brands) > 0)
                        <div class="col-lg-6 col-5">
                            <h5 class="fw-bold border-bottom pb-2">Brands</h5>
                            @foreach ($brands as $brand)
                                <h6><a class="search_titles"
                                        href="{{ route('brand.overview', $brand->slug) }}">{{ $brand->title }}</a></h6>
                            @endforeach
                        </div>
                    @endif
                    @if (is_countable($categorys) && count($categorys) > 0)
                        <div class="col-lg-6 col-7">
                            <h5 class="fw-bold border-bottom pb-2">Categorys</h5>
                            @foreach ($categorys as $category)
                                <h6><a class="search_titles"
                                        href="{{ route('category.html', $category->slug) }}">{{ $category->title }}</a>
                                </h6>
                            @endforeach
                            @foreach ($subcategorys as $subcategory)
                                <h6><a class="search_titles"
                                        href="{{ route('category.html', $subcategory->slug) }}">{{ $subcategory->title }}</a>
                                </h6>
                            @endforeach
                            @foreach ($subsubcategorys as $subsubcategory)
                                <h6><a class="search_titles"
                                        href="{{ route('category.html', $subsubcategory->slug) }}">{{ $subsubcategory->title }}</a>
                                </h6>
                            @endforeach
                        </div>
                    @endif


                </div>

                <div class="row mt-2 mb-4">
                    @if (is_countable($industries) && count($industries) > 0)
                        <div class="col-lg-6 col-5">
                            <h5 class="fw-bold border-bottom pb-2">Industries</h5>
                            @foreach ($industries as $industrie)
                                <h6>
                                    <a class="search_titles"
                                        href="{{ route('industry.details', $industrie->slug) }}">{{ $industrie->title }}</a>
                                </h6>
                            @endforeach
                        </div>
                    @endif
                    @if (is_countable($solutions) && count($solutions) > 0)
                        <div class="col-lg-6 col-7">
                            <h5 class="fw-bold border-bottom pb-2">Solutions</h5>
                            @foreach ($solutions as $solution)
                                <h6><a class="search_titles"
                                        href="{{ route('solution.details', $solution->slug) }}">{{ $solution->name }}</a>
                                </h6>
                            @endforeach
                        </div>
                    @endif

                </div>

                @if (is_countable($blogs) && count($blogs) > 0)
                    <div class="row mt-2 mb-4">
                        <h5 class="fw-bold border-bottom pb-2">Blogs</h5>
                        @foreach ($blogs as $blog)
                            <h6>
                                <a class="search_titles"href="{{ route('blog.details', $blog->id) }}">
                                    {{-- {{ $blog->title }} --}}
                                    {{-- {{ Illuminate\Support\Str::limit($blog->title, $limit = 11, $end = '...') }} --}}
                                    {{ implode(' ', array_slice(str_word_count($blog->title, 1), 0, 9)) }}...
                                </a>
                            </h6>
                        @endforeach
                    </div>
                @endif
                @if (is_countable($storys) && count($storys) > 0)
                    <div class="row mt-2 mb-4">
                        <h5 class="fw-bold border-bottom pb-2">Client storys</h5>
                        @foreach ($storys as $story)
                            <h6><a class="search_titles" href="{{ route('story.details', $story->id) }}">
                                    {{-- {{ $story->title }} --}}
                                    {{ implode(' ', array_slice(str_word_count($story->title, 1), 0, 9)) }}...
                                </a>
                            </h6>
                        @endforeach
                    </div>
                @endif
                @if (is_countable($tech_glossys) && count($tech_glossys) > 0)
                    <div class="row mt-2 mb-4">
                        <h5 class="fw-bold border-bottom pb-2">Tech Glossary</h5>
                        @foreach ($tech_glossys as $tech_glossy)
                            <h6><a class="search_titles" href="{{ route('techglossy.details', $tech_glossy) }}">
                                    {{-- {{ $tech_glossy->title }} --}}
                                    {{ implode(' ', array_slice(str_word_count($tech_glossy->title, 1), 0, 9)) }}...
                                </a>
                            </h6>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-lg-6 d-lg-block d-sm-none">
                <h5 class="fw-bold border-bottom pb-2">Products</h5>
                @if (count($products) > 0)
                    <!-- First Product Start -->
                    @foreach ($products as $product)
                        <div class="row m-0 p-0 rounded-0  bg-white rounded-0 d-flex align-items-center"
                            style="border-bottom: 2px solid #dee2e6;">
                            <div class="col-md-3 p-0 py-1">
                                <img class="img-fluid img-responsive rounded-0 product-image"
                                    src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}"
                                    onerror="this.onerror=null; this.src='{{ asset('frontend/images/no-img-png.png') }}';">
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div class="row d-flex align-items-center py-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <a class="search_titles"
                                            href="{{ route('product.details', ['id' => $product->slug]) }}">
                                            <h6 style="color: #ae0a46;">
                                                {{ $product->name }}</h6>
                                        </a>
                                        <p class="fw-normal">SKU#: {{ $product->sku_code ?? 'NO SKU' }}</p>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        {{-- <div>
                                            @if ($product->qty > 0)
                                                <h6 class="text-success font-number text-end"
                                                    style="font-size:13px; text-transform:capitalize;">
                                                    <i class="fa-solid fa-circle-check"
                                                        style="font-size:15px !important;"></i>
                                                    in stock
                                                </h6>
                                            @else
                                                <p class="text-end text-success mb-2"
                                                    style="font-size:13px; text-transform:capitalize;"><i
                                                        class="fa-solid fa-box-open"></i>
                                                    {{ ucfirst($product->stock) }}</p>
                                            @endif
                                        </div> --}}
                                        {{-- <div>
                                            <a class="search-details"
                                                href="{{ route('product.details', ['id' => $product->slug]) }}"><i
                                                    class="fa-solid fa-circle-info pe-1 pt-1"></i>Details</a>
                                        </div> --}}
                                        <div>
                                            @if ($product->rfq != 1)
                                                @if (!empty($product->discount))
                                                    <h3 class="mr-1 font-number text-end">$
                                                        {{ $product->discount }}</h3>
                                                    <span class="strike-text">$
                                                        {{ $product->price }}</span>
                                                @else
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <small class="text-info me-2"
                                                            style="font-size: 13px;">USD</small>
                                                        <h5 class="mr-1 font-number text-end">$
                                                            {{ $product->price }}</h5>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-lg-10">
                                        <div class="d-flex justify-content-between align-items-center mt-4">
                                            <div class="d-flex align-items-center">
                                                <div class="pe-2">
                                                    {{-- <a class="search-btn-price"
                                                        href="{{ route('product.details', ['id' => $product->slug]) }}">Ask
                                                        For Price</a> --}}
                                                    <a href="javascript:void(0)" class="search-btn-price"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#rfq{{ $product->id }}">
                                                        Ask For Price
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-flex border" style="height: 2.6rem;">
                                                <input type="text" name="quantity" value="1" readonly="true"
                                                    style="width: 3rem; padding: 5px 10px;"
                                                    class="quantity-box border-0" id="quantity-{{ $product->id }}"
                                                    data-product-id="{{ $product->id }}">
                                                <!-- Store product ID for later use -->

                                                <div class="quantity-selectors-container">
                                                    <div class="quantity-selectors selectorbox-{{ $product->id }}"
                                                        style="display: inline-grid;">
                                                        <button type="button" class="increment-quantity border-0"
                                                            aria-label="Add one" data-direction="1"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa-solid fa-plus" style="color: #7a7577"></i>
                                                        </button>
                                                        <button type="button" class="decrement-quantity border-0"
                                                            aria-label="Subtract one" data-direction="-1" disabled
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa-solid fa-minus" style="color: #7a7577"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                            <div>
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
                                                    class="header_cart_button px-3 py-2 text-black bg-transparent border btn-color cart_button_text{{ $product->id }} border-0"
                                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                    data-quantity="1">
                                                    {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                </button>
                                                {{-- <a class="search-btns pb-2 bg-transparent border-0"
                                                    style="color: rgb(10 51 113);"
                                                    href="{{ route('product.details', ['id' => $product->slug]) }}"><i
                                                        class="fa-solid fa-plus pe-2"></i>Add RFQ
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                    @endforeach
                    <!-- First Product End -->
                @else
                    <div class="col-md-12 col-sm-12">
                        <div class="row m-0 p-2 shadow-lg bg-white border rounded d-flex align-items-center">
                            <h4 class="text-danger text-center">No Product Found. Search again.
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="text-center p-4">
        <h4 style="color: #ae0a46;"> Nothing Found ! Search again.</h4>
    </div>

@endif



<script>
    

    $(document).ready(function() {

        $('.increment-quantity').on('click', function() {
            var productId = $(this).data('product-id');
            var quantityBox = $('#quantity-' + productId);
            var selectorBox = $('.selectorbox-' + productId);
            var currentQuantity = parseInt(quantityBox.val());
            var newQuantity = currentQuantity + 1;

            // Update quantity value
            quantityBox.val(newQuantity);

            // Enable decrement button if quantity > 1
            if (newQuantity > 1) {
                selectorBox.find('.decrement-quantity').removeAttr("disabled");
            }
        });

        // Decrement quantity
        $('.decrement-quantity').on('click', function() {
            var productId = $(this).data('product-id');
            var quantityBox = $('#quantity-' + productId);
            var currentQuantity = parseInt(quantityBox.val());

            if (currentQuantity > 1) {
                var newQuantity = currentQuantity - 1;
                quantityBox.val(newQuantity);
            }

            // Disable decrement button if quantity is 1
            if (parseInt(quantityBox.val()) <= 1) {
                $(this).prop('disabled', true);
            }
        });
        // Add to cart function (modified to use the correct quantity for each product)
        function addToCart(event, button) {
            event.preventDefault(); // Prevent page reload if the button is inside a form
            var id = $(button).data('id');
            var name = $(button).data('name');
            var quantity = $('#quantity-' + id).val(); // Get quantity based on product ID
            var button_text = $('.cart_button_text' + id);
            var cart_header = $('.miniRFQQTY');
            var offcanvasRFQ = $('.offcanvasRFQ');

            var formData = {
                product_id: id,
                name: name,
                qty: quantity
            };

            $.ajax({
                url: "{{ route('add.cart') }}", // Update with your route
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.exists) {
                        // Product is already in the cart
                        Swal.fire({
                            icon: 'info',
                            title: 'Product Already in RFQ List',
                            text: 'This product is already in your added RFQ List.',
                        });
                    } else {
                        // Product added to the cart successfully
                        cart_header.empty();
                        cart_header.append(
                            '<span class="miniRFQQTY" style="line-height: 0;font-family: PhpDebugbarFontAwesome;">' +
                            response.cartHeader + '</span>');
                        button_text.html('✓ Added'); // Update button text
                        Swal.fire({
                            icon: 'success',
                            title: 'Added To RFQ Successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        offcanvasRFQ.offcanvas('show');
                        offcanvasRFQ.html(response.html);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Bind the click event for the "Add to Cart" buttons
        $(".header_cart_button").on("click", function(event) {
            addToCart(event, this);
        });
    });
</script>


{{-- <script>
    $(document).ready(function() {
        function addToCart(event, button) {
            event.preventDefault(); // Prevent page reload if the button is inside a form
            var id = $(button).data('id');
            var name = $(button).data('name');
            var quantity = $(button).data('quantity');
            var button_text = $('.cart_button_text' + id);
            var cart_header = $('.miniRFQQTY');
            var offcanvasRFQ = $('.offcanvasRFQ');

            var formData = {
                product_id: id,
                name: name,
                qty: quantity
            };

            $.ajax({
                url: "{{ route('add.cart') }}", // Update with your route
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.exists) {
                        // Product is already in the cart
                        Swal.fire({
                            icon: 'info',
                            title: 'Product Already in RFQ List',
                            text: 'This product is already in your added RFQ List.',
                        });
                    } else {
                        // Product added to the cart successfully
                        cart_header.empty();
                        cart_header.append(
                            '<span class="miniRFQQTY" style="line-height: 0;font-family: PhpDebugbarFontAwesome;">' +
                            response.cartHeader + '</span>');
                        button_text.html('✓ Added'); // Update button text
                        Swal.fire({
                            icon: 'success',
                            title: 'Added To RFQ Successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        offcanvasRFQ.offcanvas('show');
                        offcanvasRFQ.html(response.html);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Bind the click event for the "Add to Cart" buttons
        $(".header_cart_button").on("click", function(event) {
            addToCart(event, this);
        });
    });
    $("button").on("click", function(ev) {
        var currentQty = $('input[name="quantity"]').val();
        var qtyDirection = $(this).data("direction");
        var newQty = 0;

        if (qtyDirection == "1") {
            newQty = parseInt(currentQty) + 1;
        } else if (qtyDirection == "-1") {
            newQty = parseInt(currentQty) - 1;
        }

        // make decrement disabled at 1
        if (newQty == 1) {
            $(".decrement-quantity").attr("disabled", "disabled");
        }

        // remove disabled attribute on subtract
        if (newQty > 1) {
            $(".decrement-quantity").removeAttr("disabled");
        }

        if (newQty > 0) {
            newQty = newQty.toString();
            $('input[name="quantity"]').val(newQty);
        } else {
            $('input[name="quantity"]').val("1");
        }
    });
</script> --}}
