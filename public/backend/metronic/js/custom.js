/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code (Merged & Fixed)
 *
 * ----------------------------------------------------------------------------- */

// ------------------------------ CLOCK -----------------------------------------
const weekDays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

function clockTicker() {
    var date = new Date();
    var day = date.getDay();
    var hrs = date.getHours();
    var mins = date.getMinutes();
    var secs = date.getSeconds();

    if (document.querySelector("#clock")) {
        if (hrs > 12) {
            hrs = hrs - 12;
            document.querySelector("#clock .period").innerHTML = "PM";
        } else {
            document.querySelector("#clock .period").innerHTML = "AM";
        }

        hrs = hrs < 10 ? "0" + hrs : hrs;
        mins = mins < 10 ? "0" + mins : mins;
        secs = secs < 10 ? "0" + secs : secs;

        document.querySelector("#clock .day").innerHTML = weekDays[day];
        document.querySelector("#clock .hours").innerHTML = hrs;
        document.querySelector("#clock .minutes").innerHTML = mins;
        document.querySelector("#clock .seconds").innerHTML = secs;
    }

    requestAnimationFrame(clockTicker);
}
clockTicker();
// ------------------------------ END CLOCK -------------------------------------



// -------------------------- SWEET ALERT DELETE -------------------------------
$(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var deleteLinkUrl = $(this).attr("href");

    swalInit.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        preConfirm: function () {
            return $.ajax({
                url: deleteLinkUrl,
                type: "POST",
                data: { _method: "DELETE" },
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
            }).done(function () {
                swalInit.fire({
                    title: "Deleted!",
                    text: "This data has been deleted!",
                    icon: "success"
                }).then(() => location.reload());
            });
        },
    });
});
// -------------------------- END SWEET ALERT DELETE ---------------------------


// ---------------------------- REMOVE CART -------------------------------------
$(document).on("click", ".removeCart", function (e) {
    e.preventDefault();
    var deleteLinkUrl = $(this).attr("href");

    swalInit.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this Product!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, remove it!",
        preConfirm: function () {
            return $.ajax({
                url: deleteLinkUrl,
                type: "POST",
                data: { _method: "DELETE" },
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
            }).done(function () {
                swalInit.fire({
                    title: "Deleted!",
                    text: "This Product is removed from your cart!",
                    icon: "success"
                }).then(() => location.reload());
            });
        },
    });
});
// --------------------------- END REMOVE CART ----------------------------------



// ----------------------- SWEET ALERT DEFAULT SETUP ----------------------------
var swalInit = swal.mixin({
    buttonsStyling: false,
    customClass: {
        confirmButton: "btn btn-primary",
        cancelButton: "btn btn-light",
        denyButton: "btn btn-light",
        input: "form-control",
    },
});
// ------------------------------------------------------------------------------



// ----------------------------- PASSWORD TOGGLE --------------------------------
$(document).on("click", ".toggle-password", function () {
    const input = $(this).closest('.position-relative').find('input');
    const type = input.attr('type') === 'password' ? 'text' : 'password';
    input.attr('type', type);

    $(this).find('.bi-eye').toggleClass('d-none');
    $(this).find('.bi-eye-slash').toggleClass('d-none');
});
// ------------------------------------------------------------------------------



// --------------------------- PASSWORD METER (SAFE) -----------------------------
function passwordMeter(inputElement, highlightElement, options) {
    if (!inputElement || !highlightElement) return;

    var checkSteps, score = 0;

    var check = function () {
        let strength = 0;
        let part = m();

        if (inputElement.value.length >= options.minLength) strength += part;
        if (options.checkUppercase && /[A-Z]/.test(inputElement.value)) strength += part;
        if (options.checkLowercase && /[a-z]/.test(inputElement.value)) strength += part;
        if (options.checkDigit && /[0-9]/.test(inputElement.value)) strength += part;
        if (options.checkChar && /[~`!@#$%^&*()\-+={}[\]|:;"'<>,.?/]/.test(inputElement.value)) strength += part;

        score = strength;
        f();
    };

    var m = function () {
        let e = 1;
        if (options.checkUppercase) e++;
        if (options.checkLowercase) e++;
        if (options.checkDigit) e++;
        if (options.checkChar) e++;
        checkSteps = e;
        return 100 / checkSteps;
    };

    var f = function () {
        let bars = [].slice.call(highlightElement.querySelectorAll("div"));
        let each = m();
        let strength = score;

        bars.forEach((bar, i) => {
            if (each * (i + 1) <= strength * checkSteps) bar.classList.add("active");
            else bar.classList.remove("active");
        });
    };

    check();
    return { check };
}

$(document).ready(function () {
    let inputElement = document.querySelector('.password_input');
    let highlightElement = document.querySelector('[data-kt-password-meter-control="highlight"]');

    if (inputElement && highlightElement) {
        let options = {
            minLength: 8,
            checkUppercase: true,
            checkLowercase: true,
            checkDigit: true,
            checkChar: true,
        };

        let meter = passwordMeter(inputElement, highlightElement, options);

        inputElement.addEventListener('input', function () {
            meter.check();
        });
    }
});
// ------------------------------------------------------------------------------



// ------------------------------ DELETE ACCOUNT --------------------------------
$(document).on('click', '.delete-account', async function (e) {
    e.preventDefault();

    var deleteAccountUrl = $(this).attr('href');
    var checkPasswordUrl = $(this).data('check-password-url');

    const { value: password } = await Swal.fire({
        title: "Confirm Password",
        input: "password",
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
    });

    if (!password) return;

    $.post({
        url: checkPasswordUrl,
        data: { password },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }).done(response => {
        if (!response.success) {
            Swal.fire('Error', response.message, 'error');
            return;
        }

        $.ajax({
            url: deleteAccountUrl,
            type: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success() {
                Swal.fire('Deleted!', 'Your account has been deleted.', 'success')
                    .then(() => window.location.href = '/');
            }
        });
    });
});
// ------------------------------------------------------------------------------



// -------------------------------- METRONIC MODAL -------------------------------
"use strict";

var metronicModal = function () {
    const element = document.querySelector(".metronic_modal");
    if (!element) return;

    const modal = new bootstrap.Modal(element);

    var initModal = () => {
        const closeButton = element.querySelector('[data-kt-modal-action="close"]');
        if (closeButton) {
            closeButton.addEventListener('click', e => {
                e.preventDefault();
                Swal.fire({
                    text: "Are you sure you would like to close?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, close it!",
                }).then(result => {
                    if (result.value) modal.hide();
                });
            });
        }

        const cancelButton = element.querySelector('[data-kt-modal-action="cancel"]');
        if (cancelButton) {
            cancelButton.addEventListener('click', e => {
                e.preventDefault();
                Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, cancel it!",
                }).then(result => {
                    if (result.value) modal.hide();
                });
            });
        }
    };

    return {
        init: function () {
            initModal();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    metronicModal.init();
});
// ------------------------------------------------------------------------------



// ----------------------------- TOGGLE STATUS ----------------------------------
function toggleStatus(route, id) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false,
    });

    $.post({
        url: route,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }).done(response => {
        $(`#status_toggle_${id}`).prop('checked', response.success);
        Toast.fire({ icon: 'success', title: 'Status toggled successfully' });
    });
}
// ------------------------------------------------------------------------------
