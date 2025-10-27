<script>
    $(document).ready(function() {
        let currentStep = 1;
        const totalSteps = 4;
        let isSubmitting = false; // Prevent double-submit

        // Custom validation rules
        $.validator.addMethod(
            "customEmail",
            function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(
                    value);
            },
            "Please enter a valid email (e.g., user@gmail.com)"
        );
        $.validator.addMethod(
            "customPhone",
            function(value, element) {
                const isValidPattern = /^01[3-9]\d{1,12}$/.test(value);
                const lengthValid = value.length >= 4 && value.length <= 15;
                return this.optional(element) || (isValidPattern && lengthValid);
            },
            "Please enter a valid phone number between 4 and 15 digits (e.g., 0186...)"
        );
        $.validator.addMethod(
            "customZip",
            function(value, element) {
                return this.optional(element) || /^[0-9]{3,6}$/.test(value);
            },
            "Please enter a valid ZIP code with 3 to 6 digits"
        );

        // Initialize validator
        const validator = $("#stepperForm").validate({ // Store validator instance
            errorClass: "is-invalid",
            validClass: "is-valid",
            errorPlacement: function(error, element) {
                error.addClass("text-danger");
                error.insertAfter(element);
            },
            onkeyup: false,
            onfocusout: function(element) {
                // Only validate on focusout if not trying to save draft
                if ($('#is_draft_input').val() !== '1') {
                    // Check if the element has rules before validating
                    if ($(element).rules() && Object.keys($(element).rules()).length > 0) {
                        validator.element(element); // Re-validate the specific element
                    }
                    toggleNextButton(); // Re-check button state based on current validity
                    toggleCheckboxes(); // Re-check checkbox state if needed
                }
            },
            onclick: false,
            // Ignore nothing by default, validation runs on all fields unless draft
            ignore: [],
        });

        // Apply specific validation rules to elements by name
        // Use rules("add", ...) to ensure rules are added correctly even if element doesn't exist initially
        $('input[name="email"]').rules("add", {
            customEmail: true,
            required: true
        });
        $('input[name="phone"]').rules("add", {
            customPhone: true,
            required: true
        });
        $('input[name="zip_code"]').rules("add", {
            customZip: true,
            required: true
        }); // Step 1 Zip
        $('input[name="shipping_zip_code"]').rules("add", {
            customZip: true,
            required: true
        }); // Step 2 Zip
        $('input[name="end_user_zip_code"]').rules("add", {
            customZip: true,
            required: true
        }); // Step 3 Zip

        // Add required rules directly using rules("add")
        $('input[name="company_name"]').rules("add", {
            required: true
        });
        $('input[name="name"]').rules("add", {
            required: true
        });
        $('input[name="address"]').rules("add", {
            required: true
        });
        $('input[name="designation"]').rules("add", {
            required: true
        });
        $('input[name="country"]').rules("add", {
            required: true
        });
        $('input[name="city"]').rules("add", {
            required: true
        });

        // Add required rules for shipping and end user fields conditionally
        $('input[name="shipping_company_name"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            }
        });
        $('input[name="shipping_name"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            }
        });
        $('input[name="shipping_address"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            }
        });
        $('input[name="shipping_designation"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            }
        });
        $('input[name="shipping_country"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            }
        });
        $('input[name="shipping_email"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            },
            customEmail: true
        });
        $('input[name="shipping_city"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            }
        });
        $('input[name="shipping_phone"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            },
            customPhone: true
        });
        $('input[name="shipping_zip_code"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#is_contact_address:checked').length === 0 && $('#is_draft_input')
                        .val() !== '1';
                }
            },
            customZip: true
        });

        $('input[name="end_user_company_name"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            }
        });
        $('input[name="end_user_name"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            }
        });
        $('input[name="end_user_address"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            }
        });
        $('input[name="end_user_designation"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            }
        });
        $('input[name="end_user_country"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            }
        });
        $('input[name="end_user_email"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            },
            customEmail: true
        });
        $('input[name="end_user_city"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            }
        });
        $('input[name="end_user_phone"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            },
            customPhone: true
        });
        $('input[name="end_user_zip_code"]').rules("add", {
            required: {
                depends: function(el) {
                    return $('#end_user_is_contact_address:checked').length === 0 && $(
                        '#is_draft_input').val() !== '1';
                }
            },
            customZip: true
        });


        // Function to Enable/Disable Next/Submit buttons
        function toggleNextButton() {
            const $currentStepContent = $(`.step-content[data-step="${currentStep}"]`);
            const $requiredInputs = $currentStepContent.find("input, select, textarea").filter("[required]")
                .filter(':visible');
            let allValid = true;
            if ($('#is_draft_input').val() !== '1' && $requiredInputs.length > 0) {
                $requiredInputs.each(function() {
                    if ($(this).rules() && Object.keys($(this).rules()).length > 0 && !validator
                        .element(this)) {
                        allValid = false;
                        return false;
                    }
                });
            }
            const disableNext = !allValid || isSubmitting;
            $currentStepContent.find(".next-step, button[type='submit']").prop("disabled",
            disableNext); // Target submit button too
            $('.save-draft-step-btn').prop("disabled", isSubmitting);
        }

        // Function to Enable/Disable Step 1 Checkboxes
        function toggleCheckboxes() {
            const $step1 = $('.step-content[data-step="1"]');
            const $requiredInputs = $step1.find("input, select").filter("[required]").filter(':visible');
            let allValid = true;
            $requiredInputs.each(function() {
                if ($(this).rules() && Object.keys($(this).rules()).length > 0 && !validator.element(
                        this)) {
                    allValid = false;
                    return false;
                }
            });
            // Only disable if step 1 is invalid, otherwise keep enabled
            $("#deliveryAddress, #endUser").prop("disabled", !allValid);
            // Reseller checkbox might have different logic, keep it enabled unless step 1 invalid?
            $("#resellerCheckbox").prop("disabled", !allValid);
        }

        // Function to Update Progress Bar and Step Visibility
        function updateProgress() {
            $(".step").removeClass("active completed current-step-red");
            $(".step").each(function(index) {
                const stepNum = index + 1;
                if (stepNum < currentStep) $(this).addClass("completed").find("i").show();
                else if (stepNum === currentStep) $(this).addClass("active current-step-red").find("i")
                    .hide();
                else $(this).removeClass("completed").find("i").hide();
            });
            $(".step-content").removeClass("active");
            $(`.step-content[data-step="${currentStep}"]`).addClass("active");
            isSubmitting = false; // Reset submitting flag
            toggleNextButton();
            toggleCheckboxes();
        }

        // Re-toggle buttons on input change in active step
        $(document).on("input change",
            ".step-content.active input, .step-content.active select, .step-content.active textarea",
            function() {
                if (!isSubmitting) {
                    if ($('#is_draft_input').val() !== '1' && $(this).rules() && Object.keys($(this)
                        .rules()).length > 0) {
                        validator.element(this);
                    }
                    toggleNextButton();
                    if (currentStep === 1) {
                        toggleCheckboxes();
                    }
                }
            });

        // Next button click handler
        $(".next-step").click(function() {
            if (isSubmitting || $(this).prop('disabled')) return;
            $('#is_draft_input').val('0');
            validator.settings.ignore = [];
            const $currentStepContent = $(`.step-content[data-step="${currentStep}"]`);
            const $inputsToValidate = $currentStepContent.find("input, select, textarea").filter(
                "[required]").filter(':visible');
            let isValid = true;
            $inputsToValidate.each(function() {
                if ($(this).rules() && Object.keys($(this).rules()).length > 0 && !validator
                    .element(this)) isValid = false;
            });

            if (isValid) {
                if (currentStep < totalSteps) { // Only advance if not the last step's "Submit" button
                    let nextStep = currentStep + 1;
                    if (currentStep === 1) {
                        const dA = $("#deliveryAddress").is(":checked"),
                            eU = $("#endUser").is(":checked");
                        if (dA && eU) nextStep = 4;
                        else if (dA) nextStep = 3;
                        else nextStep = 2;
                    } else if (currentStep === 2 && $("#stepTwoGotoStep3").is(":checked")) {
                        nextStep = 3;
                    } else if (currentStep === 3 && $("#stepThreeGotoStep4").is(":checked")) {
                        nextStep = 4;
                    }
                    currentStep = nextStep;
                    updateProgress();
                } else {
                    // If on last step, the button is type="submit", trigger form submit
                    $('#stepperForm').submit();
                }
            } else {
                $currentStepContent.find(".is-invalid:visible").first().focus();
            }
        });

        // Previous button click handler
        $(".prev-step").click(function() {
            if (isSubmitting) return;
            $('#is_draft_input').val('0');
            validator.settings.ignore = [];
            if (currentStep > 1) {
                let prevStep = currentStep - 1;
                const dA1 = $("#deliveryAddress").is(":checked"),
                    eU1 = $("#endUser").is(":checked");
                const dS2 = $("#stepTwoGotoStep3").is(":checked"),
                    eS3 = $("#stepThreeGotoStep4").is(":checked");
                if (currentStep === 4) {
                    if (eS3) {
                        if (dS2) prevStep = 1;
                        else prevStep = 2;
                    } else prevStep = 3;
                } else if (currentStep === 3) {
                    if (dS2) prevStep = 1;
                    else prevStep = 2;
                }
                currentStep = prevStep;
                updateProgress();
            }
        });

        // Unified Save as Draft Handler
        $(document).on('click', '.save-draft-step-btn', function() {
            if (isSubmitting || $(this).prop('disabled')) return;
            isSubmitting = true;
            $('.save-draft-step-btn').prop('disabled', true).html('Saving...');
            $('.next-step, .prev-step, button[type="submit"]').prop('disabled',
            true); // Disable all action buttons
            $('#is_draft_input').val('1');
            validator.settings.ignore = "*";
            $('#stepperForm')[0].submit();
        });

        // Form Submit Handler
        $("#stepperForm").on("submit", function(e) {
            if ($('#is_draft_input').val() === '1') {
                if (isSubmitting) {
                    e.preventDefault();
                    return;
                }
                isSubmitting = true;
                return;
            } // Allow draft submit
            if (isSubmitting) {
                e.preventDefault();
                return;
            } // Prevent double final submit
            $('#is_draft_input').val('0');
            validator.settings.ignore = [];

            if (!validator.form()) { // Validate full form
                e.preventDefault();
                var firstError = $(this).find(".is-invalid:visible").first();
                if (firstError.length) {
                    let errorStep = firstError.closest('.step-content').data('step');
                    if (errorStep && errorStep !== currentStep) {
                        currentStep = errorStep;
                        updateProgress();
                    }
                    $('html, body').animate({
                        scrollTop: firstError.offset().top - 100
                    }, 500, function() {
                        firstError.focus();
                    });
                }
            } else {
                isSubmitting = true;
                $('.save-draft-step-btn, .next-step, .prev-step, button[type="submit"]').prop(
                    'disabled', true);
                $(this).find('button[type="submit"]').html('Submitting...');
            } // Allow valid final submit
        });

        // Initial Sync Function
        function triggerInitialSyncForItem($item) {
            var $pn = $item.find('input[name$="[product_name]"]');
            var $apn = $item.find('.modal input[name$="[additional_product_name]"]');
            if ($pn.val() && !$apn.val()) $apn.val($pn.val());
            else if (!$pn.val() && $apn.val()) $pn.val($apn.val());
            var $qty = $item.find('input[name$="[qty]"]');
            var $aq = $item.find('.modal input[name$="[additional_qty]"]');
            var qVal = parseInt($qty.val()) || 1;
            if (qVal < 1) qVal = 1;
            $qty.val(qVal);
            var aqVal = parseInt($aq.val());
            if (isNaN(aqVal) || aqVal != qVal) {
                $aq.val(qVal);
            }
        }

        // Repeater Initialization
        $(".repeater").repeater({
            initEmpty: {{ $rfq && $rfq->rfqProducts->count() > 0 ? 'false' : 'true' }}, // Set based on whether editing with products
            defaultValues: {
                qty: 1
            },
            show: function() {
                $(this).slideDown();
                updateSL();
                const uniqueId = 'modal_repeater_' + Date.now() + Math.random().toString(36)
                    .substring(2, 7);
                const $repeaterItem = $(this);
                const $modalButton = $repeaterItem.find('.deal-modal-btn');
                const $modal = $repeaterItem.find('.modal');
                const $modalLabel = $modal.find('.modal-title');
                $modalButton.attr('data-bs-target', '#' + uniqueId);
                $modal.attr('id', uniqueId);
                const labelId = uniqueId + '_label';
                $modal.attr('aria-labelledby', labelId);
                if ($modalLabel.length) $modalLabel.attr('id', labelId);
                else $modal.attr('aria-label', 'Product Information');
                // Add validation rules dynamically
                $repeaterItem.find('input[name$="[product_name]"]').rules("add", {
                    required: {
                        depends: function(el) {
                            return $('#is_draft_input').val() !== '1';
                        }
                    },
                    messages: {
                        required: "Product name required."
                    }
                });
                $repeaterItem.find('input[name$="[qty]"]').rules("add", {
                    required: {
                        depends: function(el) {
                            return $('#is_draft_input').val() !== '1';
                        }
                    },
                    number: true,
                    min: 1,
                    messages: {
                        required: "Qty required.",
                        number: "Num only.",
                        min: "Min 1."
                    }
                });
                triggerInitialSyncForItem($repeaterItem); // Sync new item
            },
            hide: function(deleteElement) {
                /* ... SweetAlert/confirm ... */
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        /*...*/ }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).slideUp(deleteElement, function() {
                                updateSL();
                                $(this).remove();
                                Swal.fire('Deleted!', 'Item deleted.', 'success');
                            });
                        }
                    });
                } else {
                    if (confirm("Are you sure?")) {
                        $(this).slideUp(deleteElement, function() {
                            updateSL();
                            $(this).remove();
                        });
                    }
                }
            }
        });

        // Qty Increment/Decrement Handlers
        $(document).on("click", ".increment-quantity", function() {
            let i = $(this).closest("[data-repeater-item]").find('input[name$="[qty]"]'),
                c = parseInt(i.val()) || 0;
            i.val(c + 1).trigger('change');
        });
        $(document).on("click", ".decrement-quantity", function() {
            let i = $(this).closest("[data-repeater-item]").find('input[name$="[qty]"]'),
                c = parseInt(i.val()) || 0;
            if (c > 1) {
                i.val(c - 1).trigger('change');
            }
        });

        // Update SL Function
        function updateSL() {
            $(".repeater [data-repeater-item]").each(function(index) {
                $(this).find(".sl").val(index + 1);
            });
        }

        // --- REPEATER/MODAL SYNCHRONIZATION ---
        $(document).on('input', '.modal input[name$="[additional_product_name]"]', function() {
            $(this).closest('[data-repeater-item]').find('input[name$="[product_name]"]').val($(this)
                .val());
        });
        $(document).on('input change', '.modal input[name$="[additional_qty]"]', function() {
            let i = $(this),
                p = i.closest('[data-repeater-item]'),
                v = parseInt(i.val()) || 1;
            if (v < 1) v = 1;
            i.val(v);
            p.find('input[name$="[qty]"]').val(v);
        });
        $(document).on('input', '[data-repeater-item] input[name$="[product_name]"]', function() {
            $(this).closest('[data-repeater-item]').find(
                '.modal input[name$="[additional_product_name]"]').val($(this).val());
        });
        $(document).on('change', '[data-repeater-item] input[name$="[qty]"]', function() {
            let i = $(this),
                p = i.closest('[data-repeater-item]'),
                v = parseInt(i.val()) || 1;
            if (v < 1) v = 1;
            i.val(v);
            p.find('.modal input[name$="[additional_qty]"]').val(v);
        });
        // --- END OF SYNCHRONIZATION ---

        // Checkbox Visibility and Step Jump Logic
        function handleCheckboxVisibility() {
            const w = $("#endUser").closest(".form-check");
            if ($("#resellerCheckbox").is(":checked")) {
                w.hide();
                $("#endUser").prop("checked", false);
            } else {
                w.show();
            }
        }
        $("#resellerCheckbox").on("change", function() {
            handleCheckboxVisibility();
            toggleNextButton();
            toggleCheckboxes();
        });

        function setupStepTwoJumpCheckbox() {
            $("#stepTwoGotoStep3").on("change", function() {
                if ($(this).is(":checked") && currentStep === 2) {
                    $('#is_draft_input').val('0');
                    currentStep = 3;
                    updateProgress();
                }
            });
        }

        function setupStepTwoJumpCheckboxThree() {
            $("#stepThreeGotoStep4").on("change", function() {
                if ($(this).is(":checked") && currentStep === 3) {
                    $('#is_draft_input').val('0');
                    currentStep = 4;
                    updateProgress();
                }
            });
        }

        // Initial setup calls
        handleCheckboxVisibility(); // Call first
        setupStepTwoJumpCheckbox();
        setupStepTwoJumpCheckboxThree();

        // Initial Sync for EXISTING items + Dynamic ID assignment + Add Validation Rules
        $(".repeater [data-repeater-item]").each(function() {
            const $repeaterItem = $(this);
            // Add validation rules first
            $repeaterItem.find('input[name$="[product_name]"]').rules("add", {
                required: {
                    depends: function(el) {
                        return $('#is_draft_input').val() !== '1';
                    }
                },
                messages: {
                    required: "Product name required."
                }
            });
            $repeaterItem.find('input[name$="[qty]"]').rules("add", {
                required: {
                    depends: function(el) {
                        return $('#is_draft_input').val() !== '1';
                    }
                },
                number: true,
                min: 1,
                messages: {
                    required: "Qty required.",
                    number: "Num only.",
                    min: "Min 1."
                }
            });
            // Sync data
            triggerInitialSyncForItem($repeaterItem);
            // Assign dynamic IDs if missing
            const $modal = $repeaterItem.find('.modal');
            if (!$modal.attr('id')) {
                const uniqueId = 'modal_repeater_' + Date.now() + Math.random().toString(36).substring(
                    2, 7);
                const $mBtn = $repeaterItem.find('.deal-modal-btn');
                const $mLab = $modal.find('.modal-title');
                $mBtn.attr('data-bs-target', '#' + uniqueId);
                $modal.attr('id', uniqueId);
                const lId = uniqueId + '_label';
                $modal.attr('aria-labelledby', lId);
                if ($mLab.length) $mLab.attr('id', lId);
                else $modal.attr('aria-label', 'Product Information');
            }
        });

        // Final UI setup AFTER repeater items are processed
        updateProgress();

        // Delay initial button state check slightly
        setTimeout(toggleNextButton, 200);

    }); // End of $(document).ready()

    // --- Global Helper Functions ---
    const selects = document.getElementsByClassName("countrySelect");
    for (let i = 0; i < selects.length; i++) {
        const select = selects[i];
        if (select.value === "") {
            select.style.color = "#888888b2";
        }
        select.addEventListener("change", function() {
            if (select.value === "") {
                select.style.color = "#888888b2";
            } else {
                select.style.color = "#000";
            }
        });
    }

    function toggleDiv() {
        const checkbox = document.getElementById("delivery");
        const toggleContent = document.getElementById("toggle-content");
        if (checkbox && toggleContent) {
            toggleContent.style.display = checkbox.checked ? "block" : "none";
        }
    }

    function increment() {
        const input = document.getElementById("qty");
        if (input) input.value = (parseInt(input.value) || 0) + 1;
    }

    function decrement() {
        const input = document.getElementById("qty");
        if (input && parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

{{-- Address Sync Script 1 --}}
<script>
    $(document).ready(function() {
        const fieldPairs = [
            ['shipping_name', 'name'],
            ['shipping_email', 'email'],
            ['shipping_phone', 'phone'],
            ['shipping_company_name', 'company_name'],
            ['shipping_designation', 'designation'],
            ['shipping_address', 'address'],
            ['shipping_country', 'country'],
            ['shipping_city', 'city'],
            ['shipping_zip_code', 'zip_code']
        ];
        $('[name="is_contact_address"], .deliveryAddress').on('change', function() {
            const isChecked = $(this).is(':checked');
            $('[name="is_contact_address"]').prop('checked', isChecked);
            $('.deliveryAddress').prop('checked', isChecked);
            fieldPairs.forEach(([sName, cName]) => {
                const v = isChecked ? $(`[name="${cName}"]`).val() : '';
                $(`[name="${sName}"]`).val(v);
            });
        });
        // Trigger change on load if checkbox is already checked (for edit)
        if ($('[name="is_contact_address"]').is(':checked')) {
            $('[name="is_contact_address"]').trigger('change');
        }
    });
</script>

{{-- Address Sync Script 2 --}}
<script>
    $(document).ready(function() {
        const fieldPairs = [
            ['end_user_name', 'name'],
            ['end_user_email', 'email'],
            ['end_user_phone', 'phone'],
            ['end_user_company_name', 'company_name'],
            ['end_user_designation', 'designation'],
            ['end_user_address', 'address'],
            ['end_user_country', 'country'],
            ['end_user_city', 'city'],
            ['end_user_zip_code', 'zip_code']
        ];
        $('[name="end_user_is_contact_address"], .endUser').on('change', function() {
            const isChecked = $(this).is(':checked');
            $('[name="end_user_is_contact_address"]').prop('checked', isChecked);
            $('.endUser').prop('checked', isChecked);
            fieldPairs.forEach(([eName, cName]) => {
                const v = isChecked ? $(`[name="${cName}"]`).val() : '';
                $(`[name="${eName}"]`).val(v);
            });
        });
        // Trigger change on load if checkbox is already checked (for edit)
        if ($('[name="end_user_is_contact_address"]').is(':checked')) {
            $('[name="end_user_is_contact_address"]').trigger('change');
        }
    });
</script>

{{-- Optional: Script for btnFull/btnDraft toggle if used outside the form --}}
{{-- <script>
    const btnFull = document.getElementById("btnFull"); /* ... rest of toggle logic ... */ setActive(btnFull);
</script> --}}
