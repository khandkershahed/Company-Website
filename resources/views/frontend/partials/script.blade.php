<!--============///* USE LINK Final *///=============-->
<script src="{{ asset('frontend/js/icons/font-awesome@6.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/jquery/jquery@3-6-0.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/sweetalert@2011.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/slick.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/nasted.tab.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/toastr.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/select2.min.js') }}"></script>
<script src="{{ asset('frontend/js/javascript.mr.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('frontend/js/plugin/owl-crousel@2.3.4.js') }}"></script>
<!-- Datatable -->
<script src="{{ asset('backend/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/datatables_advanced.js') }}"></script>
<!-- Tiny MCe -->
<script src="https://cdn.tiny.cloud/1/n4jpbhtanca801bcjejx1pc9j033yn0de5ral6e7r0wd6383/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha_site_key') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/js/solutions-custom.js') }}"></script>
<script src="{{ asset('frontend/assets/js/filter.js') }}"></script>
{!! Toastr::message() !!}
<!-- Google Recaptcha  -->

<script>
    (function() {
        "use strict";

        // -----------------------------
        // Helpers
        // -----------------------------
        function csrfToken() {
            var el = document.querySelector('meta[name="csrf-token"]');
            return el ? el.getAttribute('content') : '';
        }

        function showOffcanvas(elOrSelector) {
            var el = (typeof elOrSelector === 'string') ? document.querySelector(elOrSelector) : elOrSelector;
            if (!el || !window.bootstrap || !bootstrap.Offcanvas) return;
            var instance = bootstrap.Offcanvas.getOrCreateInstance(el);
            instance.show();
        }

        // -----------------------------
        // DOM Ready (jQuery)
        // -----------------------------
        $(document).ready(function() {

            // Select2 init
            if ($.fn.select2) {
                $('.country-select').select2();
            }

            // Global AJAX CSRF setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken()
                }
            });

            // -----------------------------
            // Global Search (Desktop)
            // -----------------------------
            var desktopSearchContainer = $('#search_container');
            var searchPath = "{{ route('global.search') }}";
            var desktopSearchInput = $('#search_text');

            if ($.fn.autocomplete && desktopSearchInput.length) {
                desktopSearchInput.autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: searchPath,
                            type: "POST",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function(data) {
                                if (desktopSearchContainer.hasClass('d-none')) {
                                    desktopSearchContainer.removeClass('d-none');
                                }
                                desktopSearchContainer.html(data);
                            },
                            error: function(xhr) {
                                if (desktopSearchContainer.hasClass('d-none')) {
                                    desktopSearchContainer.removeClass('d-none');
                                }
                                desktopSearchContainer.html(`
                                    <div class="alert alert-danger m-2 p-2">
                                        <strong>Error:</strong> Could not load search results. Please try again later.
                                    </div>
                                `);
                                console.error("Search error:", xhr.responseText);
                            }
                        });
                    },
                    minLength: 1
                });

                desktopSearchInput.on('input', function() {
                    if (desktopSearchInput.val() === '') {
                        desktopSearchContainer.addClass('d-none');
                    }
                });

                desktopSearchInput.on('keydown', function(event) {
                    if (event.keyCode === 8 && desktopSearchInput.val() === '') {
                        desktopSearchContainer.addClass('d-none');
                    }
                });
            }

            // -----------------------------
            // Global Search (Mobile)
            // -----------------------------
            var mobileSearchContainer = $('#mobile_search_container');
            var mobileSearchInput = $('#mobile_search_text');

            if ($.fn.autocomplete && mobileSearchInput.length) {
                mobileSearchInput.autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: searchPath,
                            type: "POST",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function(data) {
                                if (mobileSearchContainer.hasClass('d-none')) {
                                    mobileSearchContainer.removeClass('d-none');
                                }
                                mobileSearchContainer.html(data);
                            },
                            error: function(xhr) {
                                if (mobileSearchContainer.hasClass('d-none')) {
                                    mobileSearchContainer.removeClass('d-none');
                                }
                                mobileSearchContainer.html(`
                                    <div class="alert alert-danger m-2 p-2">
                                        <strong>Error:</strong> Could not load search results. Please try again later.
                                    </div>
                                `);
                                console.error("Search error:", xhr.responseText);
                            }
                        });
                    },
                    minLength: 1
                });

                mobileSearchInput.on('input', function() {
                    if (mobileSearchInput.val() === '') {
                        mobileSearchContainer.addClass('d-none');
                    }
                });

                mobileSearchInput.on('keydown', function(event) {
                    if (event.keyCode === 8 && mobileSearchInput.val() === '') {
                        mobileSearchContainer.addClass('d-none');
                    }
                });
            }

            // -----------------------------
            // Add to cart (quantity = 1)
            // -----------------------------
            $(document).on('click', '.add_to_cart_quantity', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var quantity = 1;

                var button = $('.cart_quantity_button' + id);
                var cart_header = $('#cartQty');

                var formData = {
                    product_id: id,
                    name: name,
                    qty: quantity
                };

                $.ajax({
                    url: "{{ route('add.cart') }}",
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        toastr.success('Successfully Added to Your Cart');
                        cart_header.empty();
                        cart_header.append('<span class="add_cart_count">' + response
                            .cartHeader + '</span>');
                        button.empty();
                        button.append();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // -----------------------------
            // Add to RFQ (mini cart)
            // -----------------------------
            $(document).on('click', '.add_to_cart', function(event) {
                event.preventDefault();

                var id = $(this).data('id');
                var name = $(this).data('name');
                var quantity = $(this).data('quantity');

                var button = $('.cart_button' + id);
                var button_text = $('.cart_button_text' + id);
                var cart_header = $('.miniRFQQTY');
                var offcanvasRFQ = $('.offcanvasRFQ');

                var formData = {
                    product_id: id,
                    name: name,
                    qty: quantity
                };

                $.ajax({
                    url: "{{ route('add.cart') }}",
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Product Already in RFQ List',
                                text: 'This product is already in your added RFQ List.',
                            });
                            return;
                        }

                        cart_header.empty();
                        if (response.cartHeader > 0) {
                            if (response.cartHeader > 1) {
                                cart_header.append('' + response.cartHeader +
                                    ' Item(s) Added');
                            } else {
                                cart_header.append('' + response.cartHeader +
                                    ' Item Added');
                            }
                        } else {
                            cart_header.append('Ask Query');
                        }

                        button.empty();
                        Swal.fire({
                            icon: 'success',
                            title: 'Added To RFQ Successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        button_text.html('✓ Added');

                        // Update Offcanvas content + show (Bootstrap 5 safe)
                        offcanvasRFQ.html(response.html);
                        showOffcanvas(offcanvasRFQ.get(0));
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // -----------------------------
            // Ask for price -> add to RFQ then redirect
            // -----------------------------
            $(document).on('click', '.askForPrice', function(event) {
                event.preventDefault();

                var id = $(this).data('product_id');
                var name = $(this).data('product_name');
                var quantity = $(this).data('product_quantity');

                var formData = {
                    product_id: id,
                    name: name,
                    qty: quantity
                };

                $.ajax({
                    url: "{{ route('add.cart') }}",
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Product Already in RFQ List',
                                text: 'This product is already in your added RFQ List.',
                            });
                        } else {
                            window.location.href = "{{ route('rfq') }}";
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // -----------------------------
            // Modal init (Bootstrap 5)
            // -----------------------------
            $('[data-bs-toggle="modal"]').each(function() {
                var targetId = $(this).data('bs-target');
                if (!targetId) return;
                var targetEl = document.getElementById(String(targetId).replace('#', ''));
                if (!targetEl || !bootstrap || !bootstrap.Modal) return;
                bootstrap.Modal.getOrCreateInstance(targetEl);
            });

            $(document).on('click', '.search-btn-price', function() {
                var target = $(this).data('bs-target');
                if (!target) return;
                var targetEl = document.getElementById(String(target).replace('#', ''));
                if (!targetEl || !bootstrap || !bootstrap.Modal) return;
                bootstrap.Modal.getOrCreateInstance(targetEl).show();
            });

            // -----------------------------
            // Brand Page Single Product slick
            // -----------------------------
            // if ($.fn.slick) {
            //     $(".slick-slider").slick({
            //         slidesToShow: 4,
            //         infinite: false,
            //         slidesToScroll: 1,
            //         autoplay: true,
            //         autoplaySpeed: 6000,
            //         responsive: [{
            //             breakpoint: 768,
            //             settings: {
            //                 slidesToShow: 1,
            //                 slidesToScroll: 1
            //             }
            //         }]
            //     });
            // }

            if (!$.fn.slick) {
                return;
            }

            var $brandSlider = $(".slick-slider");

            // If slider does not exist on this page, do nothing
            if (!$brandSlider.length) {
                return;
            }

            // Prevent double init (very common cause of Slick errors)
            $brandSlider = $brandSlider.not(".slick-initialized");

            if (!$brandSlider.length) {
                return;
            }

            // Make sure it has slides (children) before initializing
            // Use >= 1 if you want slick even with one item
            if ($brandSlider.children().length < 1) {
                return;
            }

            $brandSlider.slick({
                slidesToShow: 4,
                infinite: false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 6000,

                // IMPORTANT: prevents initADA() from running
                accessibility: false,

                // Helps avoid some markup edge cases
                rows: 0,

                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });

            // -----------------------------
            // Brand logo slick
            // -----------------------------
            if ($.fn.slick) {
                $(".slick-slider-brand-logo").slick({
                    slidesToShow: 10,
                    infinite: false,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    arrows: false,
                    dots: false,
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            arrows: false,
                            dots: false
                        }
                    }]
                });
            }

            // -----------------------------
            // Toggle RFQ user edit
            // -----------------------------
            $('#editRfquser').on('click', function() {
                $("#Rfquser").toggle(this.checked);
            });

            // -----------------------------
            // Custom responsive slider (owl)
            // -----------------------------
            if ($.fn.owlCarousel) {
                var owlCustom = $(".custom-responsive-slider");
                owlCustom.owlCarousel({
                    items: 1,
                    itemsDesktop: [1000, 4],
                    itemsDesktopSmall: [900, 2],
                    itemsTablet: [600, 1],
                    itemsMobile: false,
                    pagination: false
                });

                $(".custom-responsive-slider-next").click(function() {
                    owlCustom.trigger('next.owl.carousel');
                });

                $(".custom-responsive-slider-prev").click(function() {
                    owlCustom.trigger('prev.owl.carousel');
                });
            }

            // -----------------------------
            // SlickCarousel
            // -----------------------------
            if ($.fn.slick) {
                $('.SlickCarousel').slick({
                    rtl: false,
                    autoplay: true,
                    autoplaySpeed: 10000,
                    speed: 1600,
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    pauseOnHover: false,
                    appendArrows: $(".Container .Head .Arrows"),
                    prevArrow: '<span class="Slick-Prev"></span>',
                    nextArrow: '<span class="Slick-Next"></span>',
                    easing: "linear",
                    responsive: [{
                            breakpoint: 801,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 641,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            }

            // -----------------------------
            // Sidebar collapse
            // -----------------------------
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });

        }); // end document.ready

        // -----------------------------
        // DOMContentLoaded (vanilla)
        // -----------------------------
        document.addEventListener('DOMContentLoaded', function() {

            // Recaptcha submit
            var submitBtn = document.getElementById('submitCaptcha');
            if (submitBtn) {
                submitBtn.addEventListener('click', function() {

                    if (typeof grecaptcha === 'undefined') {
                        console.error('grecaptcha is not loaded.');
                        return;
                    }

                    var siteKey = "{{ config('app.recaptcha_site_key') }}";
                    if (!siteKey) {
                        console.error('Recaptcha site key is missing.');
                        return;
                    }

                    grecaptcha.ready(function() {
                        grecaptcha.execute(siteKey, {
                                action: 'submit'
                            })
                            .then(function(token) {
                                var modal = document.getElementById('captchaModal');
                                var form = document.getElementById('captchaForm');

                                if (!modal || !form) {
                                    console.error(
                                        'captchaModal or captchaForm not found.');
                                    return;
                                }

                                var modalBody = modal.querySelector('.modal-body');
                                if (!modalBody) {
                                    console.error(
                                        'captchaModal .modal-body not found.');
                                    return;
                                }

                                // remove old token inputs (prevent duplicates)
                                var old = modalBody.querySelectorAll(
                                    'input[name="g-recaptcha-response"]');
                                old.forEach(function(el) {
                                    el.remove();
                                });

                                modalBody.insertAdjacentHTML(
                                    'beforeend',
                                    '<input type="hidden" name="g-recaptcha-response" value="' +
                                    token + '">'
                                );

                                form.submit();
                            })
                            .catch(function(err) {
                                console.error('Recaptcha execute error:', err);
                            });
                    });
                });
            }

            // ---- Sidebar Tab Product
            var defaultOpen = document.getElementById("defaultOpen");
            if (defaultOpen) {
                defaultOpen.click();
            }
        });

        // -----------------------------
        // Slider (Advance-Slider) - Slick
        // -----------------------------
        // var $slider_ini = $(".Advance-Slider");
        // var total_slide = 0;

        // if ($slider_ini.length && $.fn.slick) {

        //     $slider_ini.on("init", function(event, slick) {
        //         total_slide = slick.slideCount;

        //         // If you are hiding arrows, these thumbnails won't be visible,
        //         // but keeping logic safe anyway.
        //         $('button.slick-arrow').append('<div class="thumb"></div>');

        //         var nextIndex = 1;
        //         var prevIndex = total_slide - 1;

        //         var next_img = $(slick.$slides[nextIndex]).find('img').attr('src') || '';
        //         var prev_img = $(slick.$slides[prevIndex]).find('img').attr('src') || '';

        //         $('button.slick-next .thumb').empty().append('<img src="' + next_img + '">');
        //         $('button.slick-prev .thumb').empty().append('<img src="' + prev_img + '">');
        //     });

        //     $slider_ini.slick({
        //         autoplay: true,
        //         autoplaySpeed: 10000,
        //         speed: 2000,
        //         slidesToShow: 1,
        //         slidesToScroll: 1,
        //         dots: false,
        //         pauseOnHover: false,
        //         infinite: false,
        //         prevArrow: false,
        //         nextArrow: false,
        //         customPaging: function(slider, i) {
        //             var thumb = $(slider.$slides[i]).find('.dots-img').attr('src') || '';
        //             return '<button><div class="mextrix"><a><img src="' + thumb + '"></a></div></button>';
        //         }
        //     });

        //     $("button.slick-arrow , .Advance-Slider ul.slick-dots li button").hover(function() {
        //         $(this).addClass("hover-in").removeClass("hover-out");
        //     }, function() {
        //         $(this).removeClass("hover-in").addClass("hover-out");
        //     });

        //     $slider_ini.on('afterChange', function(event, slick, currentSlide) {

        //         total_slide = slick.slideCount;

        //         var prevIndex = currentSlide - 1;
        //         var nextIndex = currentSlide + 1;

        //         if (prevIndex < 0) prevIndex = total_slide - 1;
        //         if (nextIndex > total_slide - 1) nextIndex = 0;

        //         var prev_img = $(slick.$slides[prevIndex]).find('img').attr('src') || '';
        //         var next_img = $(slick.$slides[nextIndex]).find('img').attr('src') || '';

        //         $('button.slick-arrow').find('img').remove();
        //         $('button.slick-next .thumb').empty().append('<img src="' + next_img + '">');
        //         $('button.slick-prev .thumb').empty().append('<img src="' + prev_img + '">');
        //     });
        // }

        var $slider_ini = $(".Advance-Slider");

        if ($slider_ini.length && $.fn.slick) {

            function getSlideImgSrc(slick, index) {
                if (!slick || !slick.$slides || slick.$slides.length === 0) return '';
                if (index < 0 || index > slick.$slides.length - 1) return '';
                var $slide = $(slick.$slides[index]);
                if (!$slide.length) return '';
                var src = $slide.find('img').first().attr('src');
                return src ? src : '';
            }

            $slider_ini.on("init", function(event, slick) {

                // If there are fewer than 2 slides, don't try to access [1] or prev/next thumbs
                if (!slick || !slick.$slides || slick.slideCount < 2) {
                    return;
                }

                // Only do thumb logic if arrows exist (you have arrows disabled in settings)
                var $nextBtn = $('button.slick-next');
                var $prevBtn = $('button.slick-prev');

                if (!$nextBtn.length || !$prevBtn.length) {
                    return;
                }

                // Ensure thumb containers exist only once
                if (!$nextBtn.find('.thumb').length) $nextBtn.append('<div class="thumb"></div>');
                if (!$prevBtn.find('.thumb').length) $prevBtn.append('<div class="thumb"></div>');

                var total_slide = slick.slideCount;

                var nextIndex = 1;
                var prevIndex = total_slide - 1;

                var next_img = getSlideImgSrc(slick, nextIndex);
                var prev_img = getSlideImgSrc(slick, prevIndex);

                $nextBtn.find('.thumb').empty().append(next_img ? '<img src="' + next_img + '">' : '');
                $prevBtn.find('.thumb').empty().append(prev_img ? '<img src="' + prev_img + '">' : '');
            });

            $slider_ini.slick({
                autoplay: true,
                autoplaySpeed: 10000,
                speed: 2000,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                pauseOnHover: false,
                infinite: false,

                // You disabled arrows, so thumb code above will auto-skip
                prevArrow: false,
                nextArrow: false,

                customPaging: function(slider, i) {
                    var thumb = '';
                    if (slider && slider.$slides && slider.$slides[i]) {
                        thumb = $(slider.$slides[i]).find('.dots-img').attr('src') || '';
                    }
                    return '<button><div class="mextrix"><a><img src="' + thumb +
                        '"></a></div></button>';
                }
            });

            $("button.slick-arrow , .Advance-Slider ul.slick-dots li button").hover(function() {
                $(this).addClass("hover-in").removeClass("hover-out");
            }, function() {
                $(this).removeClass("hover-in").addClass("hover-out");
            });

            $slider_ini.on('afterChange', function(event, slick, currentSlide) {

                if (!slick || !slick.$slides || slick.slideCount < 2) {
                    return;
                }

                var $nextBtn = $('button.slick-next');
                var $prevBtn = $('button.slick-prev');

                if (!$nextBtn.length || !$prevBtn.length) {
                    return;
                }

                var total_slide = slick.slideCount;

                var prevIndex = currentSlide - 1;
                var nextIndex = currentSlide + 1;

                if (prevIndex < 0) prevIndex = total_slide - 1;
                if (nextIndex > total_slide - 1) nextIndex = 0;

                var prev_img = getSlideImgSrc(slick, prevIndex);
                var next_img = getSlideImgSrc(slick, nextIndex);

                $nextBtn.find('.thumb').empty().append(next_img ? '<img src="' + next_img + '">' : '');
                $prevBtn.find('.thumb').empty().append(prev_img ? '<img src="' + prev_img + '">' : '');
            });
        }


        // -----------------------------
        // RFQ Remove functions (global)
        // -----------------------------
        window.deleteRow = function(event, element, rowId) {
            event.preventDefault();

            var cartHeader = $('.miniRFQQTY');
            var offcanvasRFQ = $('.offcanvasRFQ');

            $.ajax({
                type: 'GET',
                url: "rfq-remove/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cartHeader.empty();
                    if (data.cartHeader > 0) {
                        var label = (data.cartHeader > 1) ? 'Item(s)' : 'Item';
                        cartHeader.append(data.cartHeader + ' ' + label + ' Added');
                    } else {
                        cartHeader.append('Ask Query');
                    }

                    offcanvasRFQ.html(data.html);

                    Swal.fire({
                        icon: 'info',
                        title: 'Successfully Removed from RFQ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error removing item',
                        text: error,
                        showConfirmButton: true
                    });
                }
            });
        };

        window.deleteRFQRow = function(event, element, rowId) {
            event.preventDefault();

            var cartHeader = $('.miniRFQQTY');
            var offcanvasRFQ = $('.offcanvasRFQ');

            $.ajax({
                type: 'GET',
                url: "/rfq-remove/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cartHeader.empty();
                    if (data.cartHeader > 0) {
                        var label = (data.cartHeader > 1) ? 'Item(s)' : 'Item';
                        cartHeader.append(data.cartHeader + ' ' + label + ' Added');
                    } else {
                        cartHeader.append('Ask Query');
                    }

                    offcanvasRFQ.html(data.html);

                    Swal.fire({
                        icon: 'info',
                        title: 'Successfully Removed from RFQ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something happened. Try again.',
                        text: error,
                        showConfirmButton: true
                    });
                }
            });
        };

        // -----------------------------
        // Product sliders (main + thumb)
        // -----------------------------
        if ($('.product__slider-main').length && $.fn.slick) {

            $('.product__slider-main')
                .on('init', function() {
                    $('.product__slider-main').fadeIn(1000);
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    autoplay: true,
                    lazyLoad: 'ondemand',
                    autoplaySpeed: 6000,
                    asNavFor: '.product__slider-thmb'
                });

            $('.product__slider-thmb')
                .on('init', function() {
                    $('.product__slider-thmb').fadeIn(1000);
                })
                .slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    lazyLoad: 'ondemand',
                    asNavFor: '.product__slider-main',
                    dots: false,
                    centerMode: false,
                    focusOnSelect: true
                });

            $('.product__slider-thmb .slick-slide').removeClass('slick-active');
            $('.product__slider-thmb .slick-slide').eq(0).addClass('slick-active');

            $('.product__slider-main').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                $('.product__slider-thmb .slick-slide').removeClass('slick-active');
                $('.product__slider-thmb .slick-slide').eq(nextSlide).addClass('slick-active');
            });

            // Optional RequireJS sliderWithProgressbar (kept safe)
            var options = {
                progressbarSelector: '.bJS_progressbar',
                slideSelector: '.bJS_slider',
                previewSlideSelector: '.bJS_previewSlider',
                progressInterval: '',
                onCustomProgressbar: function($slide, $progressbar) {}
            };

            var sliderOptions = {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                autoplay: true
            };

            var previewSliderOptions = {
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                focusOnSelect: true,
                centerMode: true
            };

            if (typeof require === 'function') {
                require(['js-sliderWithProgressbar'], function(slider) {
                    $('.product__slider-main').each(function() {
                        // IMPORTANT: define `me` to avoid reference error
                        var me = {};
                        me.slider = new slider($(this), options, sliderOptions,
                            previewSliderOptions);
                    });
                });
            }
        }

        // -----------------------------
        // Image expand
        // -----------------------------
        window.gfg = function(imgs) {
            var expandImg = document.getElementById("expand");
            var imgText = document.getElementById("geeks");
            if (!expandImg) return;

            expandImg.src = imgs.src;
            if (imgText) imgText.innerHTML = imgs.alt || '';
            if (expandImg.parentElement) expandImg.parentElement.style.display = "block";
        };

        // -----------------------------
        // Quantity buttons
        // -----------------------------
        window.increaseCount = function(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        };

        window.decreaseCount = function(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        };

        // -----------------------------
        // Sidebar tab product
        // -----------------------------
        window.openCity = function(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            var cityEl = document.getElementById(cityName);
            if (cityEl) cityEl.style.display = "block";
            if (evt && evt.currentTarget) evt.currentTarget.className += " active";
        };

        // -----------------------------
        // Software Info Page (Owl sync)
        // -----------------------------
        $(document).ready(function() {

            if (!$.fn.owlCarousel) return;

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            if (!sync1.length || !sync2.length) return;

            var slidesPerPage = 3;
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false,
                dots: true,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [
                    '<i class="fa-solid fa-arrow-left"></i>',
                    '<i class="fa-solid fa-arrow-right"></i>',
                ],
            }).on('changed.owl.carousel', syncPosition);

            sync2.on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: true,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage,
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) current = count;
                if (current > count) current = 0;

                sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");

                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });

            // Counter
            var buttonPlus = $(".qty-btn-plus");
            var buttonMinus = $(".qty-btn-minus");

            buttonPlus.off('click').on('click', function() {
                var $n = $(this).parent(".qty-container").find(".input-qty");
                $n.val(Number($n.val()) + 1);
            });

            buttonMinus.off('click').on('click', function() {
                var $n = $(this).parent(".qty-container").find(".input-qty");
                var amount = Number($n.val());
                if (amount > 0) {
                    $n.val(amount - 1);
                }
            });

            // Sidebar dropdown
            jQuery(function($) {
                $(".sidebar-dropdown > a").off('click').on('click', function() {
                    $(".sidebar-submenu").slideUp(200);
                    if ($(this).parent().hasClass("active")) {
                        $(".sidebar-dropdown").removeClass("active");
                        $(this).parent().removeClass("active");
                    } else {
                        $(".sidebar-dropdown").removeClass("active");
                        $(this).next(".sidebar-submenu").slideDown(200);
                        $(this).parent().addClass("active");
                    }
                });

                $("#close-sidebar").off('click').on('click', function() {
                    $(".page-wrapper").removeClass("toggled");
                });

                $("#show-sidebar").off('click').on('click', function() {
                    $(".page-wrapper").addClass("toggled");
                });
            });

        });

    })();
</script>

@yield('scripts')
