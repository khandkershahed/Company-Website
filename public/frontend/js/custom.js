function mainThamUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#mainThmb").attr("src", e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Multi Image Show
$(document).ready(function () {
    $("#multiImg").on("change", function () {
        //on file input change
        // alert('Multi image')
        if (
            window.File &&
            window.FileReader &&
            window.FileList &&
            window.Blob
        ) {
            //check File API supported browser
            var data = $(this)[0].files; //this file data
            $.each(data, function (index, file) {
                //loop though each file
                if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
                    //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function (file) {
                        //trigger function on successful read
                        return function (e) {
                            var img = $("<img/>")
                                .addClass("thumb")
                                .attr("src", e.target.result)
                                .width(100)
                                .height(80); //create image element
                            $("#preview_img").append(img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });

    // input
    $(".phone_number").on("input", function (evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9+()]/g, ""));

        if (
            (evt.which !== 46 || self.val().indexOf(".") !== -1) &&
            (evt.which < 48 || evt.which > 57)
        ) {
            evt.preventDefault();
        }
    });
    $(".price").on("input", function (evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9\.]/g, ""));
        if (
            (evt.which != 46 || self.val().indexOf(".") != -1) &&
            (evt.which < 48 || evt.which > 57)
        ) {
            evt.preventDefault();
        }
    });

    $(".email-validate").on("input", function () {
        const emailInput = $(this);
        const emailValidationMessage = emailInput.next(".validation-message");
        const email = emailInput.val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            emailValidationMessage.text("Email is required.");
            emailInput.addClass("input-error");
        } else if (!emailRegex.test(email)) {
            const missingParts = [];

            if (!email.includes("@")) {
                missingParts.push("@");
            }
            if (!email.includes("com")) {
                missingParts.push("com");
            }
            if (!email.includes(".")) {
                missingParts.push(".");
            }
            if (
                !email.includes("@") ||
                !email.includes(".") ||
                !email.includes("com")
            ) {
                emailValidationMessage.text(
                    "Email must contain: " + missingParts.join(", ")
                );
            } else {
                emailValidationMessage.text("Invalid email format.");
            }

            emailInput.addClass("input-error");
        } else {
            emailValidationMessage.text("");
            emailInput.removeClass("input-error");
        }
    });
});

function onSubmit(token) {
    document.getElementById("recaptcha-form").submit();
}
function onSubmit(token) {
    $(".get_quote_frm").submit();
}

// {{-- Software Hardware Tab Slider 16-07-23 --}}

document.addEventListener("DOMContentLoaded", function () {
    var tabsSwiper = new Swiper(".swiper-tabs-nav", {
        slidesPerView: "4",
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var contentSwiper = new Swiper(".swiper-tabs-content", {
        autoplay: {
            delay: 5000, // Change the delay to adjust auto slide interval (in milliseconds)
        },
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
        mousewheel: true,
        touchRatio: 1,
        momentumRatio: 0.1,
        freeMode: true,
        spaceBetween: 10,
        on: {
            init: function () {
                // Set up initial slide
                var activeSlide = this.slides[this.activeIndex];
                activeSlide.classList.add("active");

                // Add click event to each tab-item
                var tabItems = document.querySelectorAll(".tab-item");
                tabItems.forEach(function (item, index) {
                    item.addEventListener("click", function () {
                        // Remove 'active' class from all tab-items
                        tabItems.forEach(function (item) {
                            item.classList.remove("active");
                        });
                        // Add 'active' class to the clicked tab-item
                        this.classList.add("active");
                        // Slide to the corresponding content slide
                        contentSwiper.slideTo(index);
                    });
                });
            },
            slideChange: function () {
                // Update the active tab on content slider change
                var activeSlide = this.slides[this.activeIndex];
                var tabItems = document.querySelectorAll(".tab-item");
                tabItems.forEach(function (item) {
                    item.classList.remove("active");
                });
                tabItems[this.activeIndex].classList.add("active");
            },
        },
    });

    // Synchronize the Swipers so they follow the same slide
    tabsSwiper.controller.control = contentSwiper;
    contentSwiper.controller.control = tabsSwiper;
});

// {{-- Software Hardware Tab Slider 16-07-23 --}}

// <!--- End Search for Software and Hardware -->

$(document).ready(function () {
    // {{-- Editor --}}

    // tinymce.init({
    //     selector: '#common',
    //     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker',
    //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    //     tinycomments_mode: 'embedded',
    //     tinycomments_author: 'Author name',
    //     mergetags_list: [{
    //         value: 'First.Name',
    //         title: 'First Name'
    //     },
    //     {
    //         value: 'Email',
    //         title: 'Email'
    //     },
    //     ],
    // });
    tinymce.init({
        selector: "#common",
        plugins:
            "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount",
        toolbar:
            "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat",
    });

    $("#common").on("keypress", function () {
        var limiteCaracteres = 255;
        var caracteres = $(this).text();
        var totalCaracteres = caracteres.length;

        //Update value
        $("#total-caracteres").text(totalCaracteres);

        //Check and Limit Charaters
        if (totalCaracteres >= limiteCaracteres) {
            return false;
        }
    });
});
// {{-- Editor --}}

$(document).ready(function () {
    $("#close").click(function () {
        if ($("#profile_percentage").addClass("d-none")) {
            $("#profile_percentagey").slideUp(300);
            //$("#profile_percentage").text('+')
        }
    });

    $("#image").change(function (e) {
        //alert(5);
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#showImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(e.target.files["0"]);
    });

    $("#image1").change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#showImage1").attr("src", e.target.result);
        };
        reader.readAsDataURL(e.target.files["0"]);
    });

    $("#image2").change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#showImage2").attr("src", e.target.result);
        };
        reader.readAsDataURL(e.target.files["0"]);
    });

    $("#image3").change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#showImage3").attr("src", e.target.result);
        };
        reader.readAsDataURL(e.target.files["0"]);
    });

    // $('input[name=toggle]').change(function () {
    //     var mode = $(this).prop('checked');
    //     var id = $(this).val();
    //     $.ajax({
    //         url: "{{ route('client.status') }}",
    //         type: "POST",
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             mode: mode,
    //             id: id,
    //         },
    //         success: function (response) {

    //             if (response.status) {
    //                 alert(response.msg);
    //             } else {
    //                 alert('Please Try Again!');
    //             }
    //         }

    //     })

    // })
});

function myFunction() {
    if ($("#filter_category").hasClass("d-none")) {
        $("#filter_category").removeClass("d-none");
    } else {
        $("#filter_category").addClass("d-none");
    }
}

function showhide() {
    if ($("#newpost").hasClass("d-none")) {
        $("#newpost").removeClass("d-none");
    } else {
        $("#newpost").addClass("d-none");
    }
}

$(document).ready(function () {
    // Get the input and buttons
    const $inputQty = $(".input-qty");
    const $btnPlus = $(".qty-btn-plus");
    const $btnMinus = $(".qty-btn-minus");

    // Increment the quantity when the plus button is clicked
    $btnPlus.on("click", function () {
        let currentValue = parseInt($inputQty.val(), 10);
        if (!isNaN(currentValue)) {
            $inputQty.val(currentValue + 1);
        }
    });

    // Decrement the quantity when the minus button is clicked
    $btnMinus.on("click", function () {
        let currentValue = parseInt($inputQty.val(), 10);
        if (!isNaN(currentValue) && currentValue > 1) {
            $inputQty.val(currentValue - 1);
        }
    });

    // Prevent non-numeric input in the quantity input field
    $inputQty.on("input", function () {
        let currentValue = $inputQty.val().replace(/[^0-9]/g, "");
        if (!isNaN(currentValue) && currentValue !== "") {
            $inputQty.val(currentValue);
        } else {
            $inputQty.val("1");
        }
    });
});

$("#addToCart").click(function () {
    var product_name = $("#name").val();
    var id = $("#product_id").val();
    var quantity = $("#qty").val();

    $.ajax({
        url: "{{ route('add.cart') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            //mode:mode,
            id: id,
            qty: quantity,
            name: product_name,
        },
        //alert(5),
        success: function (response) {
            if (response.status) {
                alert(response.msg);
            } else {
                alert("Please Try Again!");
            }
        },
    });
});

$(document).ready(function () {
    $(".rmvBtn").click(function (e) {
        var form = $(this).closest("form");
        //var dataID=$(this).data('id');
        // alert(dataID);
        e.preventDefault();
        swalInit
            .fire({
                title: "Are you sure?",
                text: "Once removed, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Your Products has been removed from cart!", {
                        icon: "success",
                    });
                } else {
                    swal("Your data is safe!");
                }
            });
    });
});

var header = document.getElementById("myDIV");
// var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

$('input[type="range"]').change(function () {
    var val =
        ($(this).val() - $(this).attr("min")) /
        ($(this).attr("max") - $(this).attr("min"));

    $(this).css(
        "background-image",
        "-webkit-gradient(linear, left top, right top, " +
            "color-stop(" +
            val +
            ", #860736fd), " +
            "color-stop(" +
            val +
            ", #000)" +
            ")"
    );
});

$(document).ready(function () {
    $(".SlickCarousel").slick({
        rtl: false, // If RTL Make it true & .slick-slide{float:right;}
        autoplay: true,
        autoplaySpeed: 10000, //  Slide Delay
        speed: 1600, // Transition Speed
        slidesToShow: 4, // Number Of Carousel
        slidesToScroll: 3, // Slide To Move
        pauseOnHover: false,
        appendArrows: $(".Container .Head .Arrows"), // Class For Arrows Buttons
        prevArrow: '<span class="Slick-Prev"></span>',
        nextArrow: '<span class="Slick-Next"></span>',
        easing: "linear",
        responsive: [
            {
                breakpoint: 801,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 641,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    $(".select2").select2();
    $(".select_country").select2();

    // <!--- Search for Software and Hardware -->
    $("#softwareInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#softwareTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#categoryInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#categoryTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#brandInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#brandTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#industryInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#industryTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#hardwareInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#hardwareTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

// {{-- For Modal --}}

$(function () {
    $("#marketingChk").click(function () {
        if ($(this).is(":checked")) {
            $("#marketing").show();
        } else {
            $("#marketing").hide();
        }
    });
});
$(function () {
    $("#functionalChk").click(function () {
        if ($(this).is(":checked")) {
            $("#functional").show();
        } else {
            $("#functional").hide();
        }
    });
});
$(function () {
    $("#statisticalChk").click(function () {
        if ($(this).is(":checked")) {
            $("#statistical").show();
        } else {
            $("#statistical").hide();
        }
    });
});
$(function () {
    $("#normalChek").click(function () {
        if ($(this).is(":checked")) {
            $("#normaal").show();
        } else {
            $("#normaal").hide();
        }
    });
});

// Slick version 1.5.8

