// /* ------------------------------------------------------------------------------
//  *
//  *  # Custom JS code
//  *
//  *  Place here all your custom js. Make sure it's loaded after app.js
//  *
//  * ---------------------------------------------------------------------------- */

// Clock Start
// The week days
const weekDays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

// The Clock Ticker
function clockTicker() {
    // Clock units
    var date = new Date();
    var day = date.getDay();
    var hrs = date.getHours();
    var mins = date.getMinutes();
    var secs = date.getSeconds();

    // Update hours value if greater than 12
    if (hrs > 12) {
        hrs = hrs - 12;

        document.querySelector("#clock .period").innerHTML = "PM";
    } else {
        document.querySelector("#clock .period").innerHTML = "AM";
    }

    // Pad the single digit units by 0
    hrs = hrs < 10 ? "0" + hrs : hrs;
    mins = mins < 10 ? "0" + mins : mins;
    secs = secs < 10 ? "0" + secs : secs;

    // Refresh the unit values
    document.querySelector("#clock .day").innerHTML = weekDays[day];
    document.querySelector("#clock .hours").innerHTML = hrs;
    document.querySelector("#clock .minutes").innerHTML = mins;
    document.querySelector("#clock .seconds").innerHTML = secs;

    // Refresh the clock every 1 second
    requestAnimationFrame(clockTicker);
}

// Start the clock
clockTicker();
// Clock End

$(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var deleteLinkUrl = $(this).attr("href");
    var dataType = $(this).attr("href") ? $(this).attr("href") : "html";
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    swalInit.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",

        preConfirm: function () {
            $.ajax({
                url: deleteLinkUrl,
                type: "POST",
                data: {
                    _method: "DELETE",
                },
                dataType: "html",
                success: function (data) {
                    var dataError =
                        dataType == "html" ? data.trim() : data.error;
                    if (typeof dataError !== typeof undefined && dataError) {
                        swalInit.fire({
                            title: "Oops...",
                            text: dataError,
                            icon: "error",
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        });
                    } else {
                        swalInit.fire({
                            title: "Deleted!",
                            text: "This data has been deleted!",
                            confirmButtonColor: "#66BB6A",
                            icon: "success",
                            type: "success",
                            preConfirm: function () {
                                location.reload();
                            },
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swalInit.fire({
                        title: "Oops...",
                        text: dataError,
                        icon: "error",
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    });
                },
            });
        },
    });
});

// ----------------------------------------------------------------------------------- end

$(document).on("click", ".removeCart", function (e) {
    e.preventDefault();
    var deleteLinkUrl = $(this).attr("href");
    var dataType = $(this).attr("href") ? $(this).attr("href") : "html";
    //alert(deleteLinkUrl);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    swalInit.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this Product!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, remove it!",

        preConfirm: function () {
            $.ajax({
                url: deleteLinkUrl,
                type: "POST",
                data: {
                    _method: "DELETE",
                },
                dataType: "json",
                success: function (data) {
                    var dataError =
                        dataType == "json" ? data.trim() : data.error;
                    if (typeof dataError !== typeof undefined && dataError) {
                        swalInit.fire({
                            title: "Oops...",
                            text: dataError,
                            icon: "error",
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        });
                    } else {
                        swalInit.fire({
                            title: "Deleted!",
                            text: "This Product is removed from your cart!!",
                            confirmButtonColor: "#66BB6A",
                            icon: "success",
                            type: "success",
                            preConfirm: function () {
                                location.reload();
                            },
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swalInit.fire({
                        title: "Oops...",
                        text: dataError,
                        icon: "error",
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    });
                },
            });
        },
    });
});

// Defaults sweet alert js
var swalInit = swal.mixin({
    buttonsStyling: false,
    customClass: {
        confirmButton: "btn btn-primary",
        cancelButton: "btn btn-light",
        denyButton: "btn btn-light",
        input: "form-control",
    },
});
// --------------------------------

// Bypass Process
$("#kt_docs_repeater_basic").repeater({
    initEmpty: false,

    defaultValues: {
        "text-input": "foo",
    },

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});

$("#terms").repeater({
    initEmpty: false,

    defaultValues: {
        "text-input": "foo",
    },

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});
