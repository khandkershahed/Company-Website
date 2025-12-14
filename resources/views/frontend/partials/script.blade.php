<!--============///* USE LINK Final *///=============-->

{{-- Core Libraries --}}
<script src="{{ asset('frontend/js/icons/font-awesome@6.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/jquery/jquery@3-6-0.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/popper.min.js') }}"></script>

{{-- Plugins --}}
<script src="{{ asset('frontend/js/plugin/sweetalert@2011.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/slick.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/nasted.tab.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/toastr.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugin/select2.min.js') }}"></script>
<script src="{{ asset('frontend/js/javascript.mr.js') }}"></script>

{{-- Swiper (REQUIRED for custom.js) --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

{{-- Owl Carousel --}}
<script src="{{ asset('frontend/js/plugin/owl-crousel@2.3.4.js') }}"></script>

{{-- Datatable --}}
<script src="{{ asset('backend/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/datatables_advanced.js') }}"></script>

{{-- TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/n4jpbhtanca801bcjejx1pc9j033yn0de5ral6e7r0wd6383/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>

{{-- Google reCAPTCHA --}}
<script src="https://www.google.com/recaptcha/api.js"></script>

{{-- Custom JS --}}
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/js/solutions-custom.js') }}"></script>
<script src="{{ asset('frontend/assets/js/filter.js') }}"></script>

{!! Toastr::message() !!}

<script>
    $(document).ready(function() {
        if ($.fn.select2) {
            $('.country-select').select2();
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var submitBtn = document.getElementById('submitCaptcha');
        if (!submitBtn || typeof grecaptcha === 'undefined') return;

        submitBtn.addEventListener('click', function() {
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('app.recaptcha_site_key') }}', {
                        action: 'submit'
                    })
                    .then(function(token) {
                        var modal = document.getElementById('captchaModal');
                        var form = document.getElementById('captchaForm');
                        if (!modal || !form) return;

                        modal.querySelector('.modal-body')
                            .insertAdjacentHTML(
                                'beforeend',
                                '<input type="hidden" name="g-recaptcha-response" value="' +
                                token + '">'
                            );
                        form.submit();
                    });
            });
        });
    });
</script>

<script>
    $(document).ready(function() {

        var $slider_ini = $(".Advance-Slider");
        if (!$slider_ini.length || !$.fn.slick) return;

        var total_slide = 0;

        $slider_ini.on("init", function(event, slick) {
            $('button.slick-arrow').append('<div class="thumb"></div>');
            total_slide = slick.slideCount;

            var next_img = $(slick.$slides[1]).find('img').attr('src');
            var prev_img = $(slick.$slides[total_slide - 1]).find('img').attr('src');

            $('button.slick-next .thumb').append('<img src="' + next_img + '">');
            $('button.slick-prev .thumb').append('<img src="' + prev_img + '">');
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
            prevArrow: false,
            nextArrow: false
        });

    });
</script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function initSearch(input, container) {
            if (!input.length) return;

            input.autocomplete({
                source: function(request) {
                    $.ajax({
                        url: "{{ route('global.search') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            container.removeClass('d-none').html(data);
                        },
                        error: function() {
                            container.removeClass('d-none').html(
                                '<div class="alert alert-danger m-2 p-2">Search failed</div>'
                            );
                        }
                    });
                },
                minLength: 1
            });

            input.on('input keydown', function() {
                if (!input.val()) container.addClass('d-none');
            });
        }

        initSearch($('#search_text'), $('#search_container'));
        initSearch($('#mobile_search_text'), $('#mobile_search_container'));

    });
</script>

<script>
    $(document).ready(function() {
        if ($.fn.slick) {
            $(".slick-slider, .slick-slider-brand-logo").slick();
            $(".SlickCarousel").slick();
        }
    });
</script>

<script>
    function deleteRow(event, element, rowId) {
        event.preventDefault();

        $.ajax({
            type: 'GET',
            url: "/rfq-remove/" + rowId,
            dataType: 'json',
            success: function(data) {
                $('.miniRFQQTY').html(data.cartHeader > 0 ?
                    data.cartHeader + ' Item(s) Added' :
                    'Ask Query');

                $('.offcanvasRFQ').html(data.html);

                Swal.fire({
                    icon: 'info',
                    title: 'Successfully Removed from RFQ!',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }
</script>

<script>
    function openCity(evt, cityName) {
        $(".tabcontent").hide();
        $(".tablinks").removeClass("active");
        $("#" + cityName).show();
        evt.currentTarget.className += " active";
    }

    if (document.getElementById("defaultOpen")) {
        document.getElementById("defaultOpen").click();
    }
</script>

<script>
    $(document).ready(function() {
        $('#editRfquser').on('click', function() {
            $("#Rfquser").toggle(this.checked);
        });
    });
</script>

<script>
    $(document).ready(function() {
        if ($.fn.owlCarousel) {
            $(".custom-responsive-slider").owlCarousel({
                items: 1,
                pagination: false
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
            $("#sidebar").toggleClass("active");
            $(this).toggleClass("active");
        });
    });
</script>

@yield('scripts')
