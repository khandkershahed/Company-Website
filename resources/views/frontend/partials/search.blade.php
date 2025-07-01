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
            <div class="p-2 mb-3 col-12 d-lg-none">
                @if (count($products) > 0)
                    <!-- First Product Start -->
                    @foreach ($products as $product)
                        <div class="p-2 m-0 bg-white row rounded-0 d-flex align-items-center"
                            style="border-bottom: 2px solid #dee2e6;">
                            <div class="p-0 m-0 col-2">
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
                        <div class="p-2 m-0 bg-white border rounded shadow-lg row d-flex align-items-center">
                            <h4 class="text-center text-danger">No Product Found. Search again.
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="mb-4 row">
                    @if (is_countable($brands) && count($brands) > 0)
                        <div class="col-lg-6 col-5">
                            <h5 class="pb-2 fw-bold border-bottom">Brands</h5>
                            @foreach ($brands as $brand)
                                <h6><a class="search_titles"
                                        href="{{ route('brand.overview', $brand->slug) }}">{{ $brand->title }}</a></h6>
                            @endforeach
                        </div>
                    @endif
                    @if (is_countable($categorys) && count($categorys) > 0)
                        <div class="col-lg-6 col-7">
                            <h5 class="pb-2 fw-bold border-bottom">Categorys</h5>
                            @foreach ($categorys as $category)
                                <h6><a class="search_titles"
                                        href="{{ route('category.details', $category->slug) }}">{{ $category->title }}</a>
                                </h6>
                            @endforeach
                            @foreach ($subcategorys as $subcategory)
                                <h6><a class="search_titles"
                                        href="{{ route('category.details', $subcategory->slug) }}">{{ $subcategory->title }}</a>
                                </h6>
                            @endforeach
                            @foreach ($subsubcategorys as $subsubcategory)
                                <h6><a class="search_titles"
                                        href="{{ route('category.details', $subsubcategory->slug) }}">{{ $subsubcategory->title }}</a>
                                </h6>
                            @endforeach
                        </div>
                    @endif


                </div>

                <div class="mt-2 mb-4 row">
                    @if (is_countable($industries) && count($industries) > 0)
                        <div class="col-lg-6 col-5">
                            <h5 class="pb-2 fw-bold border-bottom">Industries</h5>
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
                            <h5 class="pb-2 fw-bold border-bottom">Solutions</h5>
                            @foreach ($solutions as $solution)
                                <h6><a class="search_titles"
                                        href="{{ route('solution.details', $solution->slug) }}">{{ $solution->name }}</a>
                                </h6>
                            @endforeach
                        </div>
                    @endif

                </div>

                @if (is_countable($blogs) && count($blogs) > 0)
                    <div class="mt-2 mb-4 row">
                        <h5 class="pb-2 fw-bold border-bottom">Blogs</h5>
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
                    <div class="mt-2 mb-4 row">
                        <h5 class="pb-2 fw-bold border-bottom">Client storys</h5>
                        @foreach ($storys as $story)
                            <h6><a class="search_titles" href="{{ route('story.details', $story->slug) }}">
                                    {{-- {{ $story->title }} --}}
                                    {{ implode(' ', array_slice(str_word_count($story->title, 1), 0, 9)) }}...
                                </a>
                            </h6>
                        @endforeach
                    </div>
                @endif
                @if (is_countable($tech_glossys) && count($tech_glossys) > 0)
                    <div class="mt-2 mb-4 row">
                        <h5 class="pb-2 fw-bold border-bottom">Tech Glossary</h5>
                        @foreach ($tech_glossys as $tech_glossy)
                            <h6><a class="search_titles" href="{{ route('techglossy.details', $tech_glossy->id) }}">
                                    {{-- {{ $tech_glossy->title }} --}}
                                    {{ implode(' ', array_slice(str_word_count($tech_glossy->title, 1), 0, 9)) }}...
                                </a>
                            </h6>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-lg-6 d-lg-block d-sm-none">
                <h5 class="pb-2 fw-bold border-bottom">Products</h5>
                @if (count($products) > 0)
                    <!-- First Product Start -->
                    @foreach ($products as $product)
                        <div class="p-0 m-0 bg-white row rounded-0 d-flex align-items-center"
                            style="border-bottom: 2px solid #dee2e6;">
                            <div class="p-0 py-1 col-md-3">
                                <img class="img-fluid img-responsive rounded-0 product-image"
                                    src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}"
                                    onerror="this.onerror=null; this.src='{{ asset('frontend/images/no-img-png.png') }}';">
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div class="py-4 row d-flex align-items-center">
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
                                                <p class="mb-2 text-end text-success"
                                                    style="font-size:13px; text-transform:capitalize;"><i
                                                        class="fa-solid fa-box-open"></i>
                                                    {{ ucfirst($product->stock) }}</p>
                                            @endif
                                        </div> --}}
                                        {{-- <div>
                                            <a class="search-details"
                                                href="{{ route('product.details', ['id' => $product->slug]) }}"><i
                                                    class="pt-1 fa-solid fa-circle-info pe-1"></i>Details</a>
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
                                        <div class="mt-4 d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="pe-2">
                                                    {{-- <a class="search-btn-price"
                                                        href="{{ route('product.details', ['id' => $product->slug]) }}">Ask
                                                        For Price</a> --}}
                                                    <a href="{{ route('rfq') }}" class="px-3 py-2 text-black bg-transparent border btn-color cart_button_text{{ $product->id }} popular_product-button mt-2"
                                                        {{-- data-bs-toggle="modal"
                                                        data-bs-target="#rfq{{ $product->id }}" --}}
                                                        >
                                                        Ask For Price
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="border d-flex" style="height: 2.6rem;">
                                                <input type="text" name="quantity" value="1" readonly="true"
                                                    style="width: 3rem; padding: 5px 10px;"
                                                    class="border-0 quantity-box" id="quantity-{{ $product->id }}"
                                                    data-product-id="{{ $product->id }}">
                                                <!-- Store product ID for later use -->

                                                <div class="quantity-selectors-container">
                                                    <div class="quantity-selectors selectorbox-{{ $product->id }}"
                                                        style="display: inline-grid;">
                                                        <button type="button" class="border-0 increment-quantity"
                                                            aria-label="Add one" data-direction="1"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa-solid fa-plus" style="color: #7a7577"></i>
                                                        </button>
                                                        <button type="button" class="border-0 decrement-quantity"
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
                                                    class="header_cart_button search-btn-price"
                                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                    data-quantity="1">
                                                    {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                </button>
                                                {{-- <a class="pb-2 bg-transparent border-0 search-btns"
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
                        <div class="p-2 m-0 bg-white border rounded shadow-lg row d-flex align-items-center">
                            <h4 class="text-center text-danger">No Product Found. Search again.
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="p-4 text-center">
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



