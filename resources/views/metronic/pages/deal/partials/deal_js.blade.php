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
        const validator = $("#stepperForm").validate({
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
                    $(element).valid(); // Re-validate the specific element
                    toggleNextButton(); // Re-check button state based on current validity
                    toggleCheckboxes(); // Re-check checkbox state if needed
                }
            },
            onclick: false,
            // Ignore nothing by default, validation runs on all fields unless draft
            ignore: [],
        });

        // Apply specific validation rules to elements by name
        $('input[name="email"]').rules("add", {
            customEmail: true,
            required: true
        }); // Added required here if it wasn't already
        $('input[name="phone"]').rules("add", {
            customPhone: true,
            required: true
        }); // Added required here if it wasn't already
        $('input[name="zip_code"]').rules("add", {
            customZip: true,
            required: true
        }); // Step 1 Zip
        $('input[name="shipping_zip_code"]').rules("add", {
            customZip: true,
            required: true
        }); // Step 2 Zip (Make required if needed)
        $('input[name="end_user_zip_code"]').rules("add", {
            customZip: true,
            required: true
        }); // Step 3 Zip (Make required if needed)
        // Add required rules directly here if not set in HTML
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
        // Add required rules for shipping and end user fields as needed, e.g.:
        $('input[name="shipping_company_name"]').rules("add", {
            required: true
        });
        $('input[name="end_user_company_name"]').rules("add", {
            required: true
        });
        // ... add required: true for all other required fields in steps 2 & 3 ...

        // Ensure repeater fields are validated only when not drafting
        // Using jQuery validation's depends function
        $('input[name^="contacts"][name$="[product_name]"]').each(function() {
            $(this).rules("add", {
                required: {
                    depends: function(element) {
                        return $('#is_draft_input').val() !== '1';
                    }
                },
                messages: { // Optional: Custom message
                    required: "Product name is required."
                }
            });
        });

        $('input[name^="contacts"][name$="[qty]"]').each(function() {
            $(this).rules("add", {
                required: {
                    depends: function(element) {
                        return $('#is_draft_input').val() !== '1';
                    }
                },
                number: true, // Should be a number
                min: 1, // Minimum value
                messages: {
                    required: "Quantity is required.",
                    number: "Quantity must be a number.",
                    min: "Quantity must be at least 1."
                }
            });
        });


        // Function to Enable/Disable Next/Submit buttons based on current step validity
        function toggleNextButton() {
            const $currentStepContent = $(`.step-content[data-step="${currentStep}"]`);
            const $requiredInputs = $currentStepContent.find("input, select, textarea").filter("[required]")
                .filter(':visible'); // Only check visible required fields
            let allValid = true;

            // Don't check validity if we intend to save as draft
            if ($('#is_draft_input').val() !== '1' && $requiredInputs.length > 0) {
                $requiredInputs.each(function() {
                    // Check if element is valid according to the validator instance
                    if (!validator.element(this)) { // Use validator.element()
                        allValid = false;
                        return false; // Exit .each loop early
                    }
                });
            }

            // Disable Next/Submit if required fields invalid OR if a draft save is in progress
            const disableNext = !allValid || isSubmitting;
            $currentStepContent.find(".next-step").prop("disabled", disableNext);
            // Also disable draft buttons if submitting/saving
            $('.save-draft-step-btn').prop("disabled", isSubmitting);
        }

        // Function to Enable/Disable checkboxes in Step 1 based on its validity
        function toggleCheckboxes() {
            const $step1 = $('.step-content[data-step="1"]');
            const $requiredInputs = $step1.find("input, select").filter("[required]").filter(':visible');
            let allValid = true;
            $requiredInputs.each(function() {
                if (!validator.element(this)) { // Use validator.element()
                    allValid = false;
                    return false;
                }
            });
            $("#deliveryAddress, #endUser, #resellerCheckbox").prop("disabled", !allValid);
        }

        // Function to update the visual progress bar and show/hide step content
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
            // Re-evaluate button state after step change
            isSubmitting = false; // Reset submitting flag when step changes
            toggleNextButton();
            toggleCheckboxes();
        }

        // Re-toggle buttons when inputs change in the active step
        $(document).on("input change",
            ".step-content.active input, .step-content.active select, .step-content.active textarea",
            function() {
                if (!isSubmitting) {
                    if ($('#is_draft_input').val() !== '1') {
                        validator.element(this); // Validate the changed element ONLY if not drafting
                    }
                    toggleNextButton(); // Always update button state based on current validity
                    if (currentStep === 1) { // Only toggle checkboxes if on step 1
                        toggleCheckboxes();
                    }
                }
            });

        // Next button click handler
        $(".next-step").click(function() {
            if (isSubmitting || $(this).prop('disabled'))
        return; // Prevent action if disabled or submitting
            $('#is_draft_input').val('0'); // Explicitly set to NOT draft for next step action
            validator.settings.ignore = []; // Ensure validation runs on required fields

            const $currentStepContent = $(`.step-content[data-step="${currentStep}"]`);
            // Validate ONLY visible required fields within the CURRENT step before proceeding
            const $inputsToValidate = $currentStepContent.find("input, select, textarea").filter(
                "[required]").filter(':visible');
            let isValid = true;
            $inputsToValidate.each(function() {
                if (!validator.element(this)) { // Use validator instance to check element
                    isValid = false;
                }
            });

            if (isValid) {
                if (currentStep < totalSteps) { // Logic to advance step or jump
                    let nextStep = currentStep + 1;
                    // --- Step Skipping Logic ---
                    if (currentStep === 1) {
                        const deliveryAddress = $("#deliveryAddress").is(":checked");
                        const endUser = $("#endUser").is(":checked");
                        if (deliveryAddress && endUser) nextStep = 4;
                        else if (deliveryAddress) nextStep = 3;
                        else nextStep = 2; // Default next is 2
                    } else if (currentStep === 2 && $("#stepTwoGotoStep3").is(":checked")) {
                        nextStep = 3; // Jump from 2 to 3
                    } else if (currentStep === 3 && $("#stepThreeGotoStep4").is(":checked")) {
                        nextStep = 4; // Jump from 3 to 4
                    }
                    // --- End Step Skipping Logic ---

                    currentStep = nextStep;
                    updateProgress();
                } else {
                    // If on the last step, this button acts as the final submit trigger
                    // The form submit handler below will take over for validation
                    $('#stepperForm').submit();
                }
            } else {
                // Focus the first invalid visible field in the current step
                $currentStepContent.find(".is-invalid:visible").first().focus();
            }
        });


        // Previous button click handler
        $(".prev-step").click(function() {
            if (isSubmitting) return;
            $('#is_draft_input').val('0'); // Set to NOT draft when going back
            validator.settings.ignore = []; // Reset ignore setting

            if (currentStep > 1) {
                let prevStep = currentStep - 1;
                // --- Logic to handle jumping back over skipped steps ---
                const deliveryAddressCheckedStep1 = $("#deliveryAddress").is(":checked");
                const endUserCheckedStep1 = $("#endUser").is(":checked");
                const deliverySameAsCompanyCheckedStep2 = $("#stepTwoGotoStep3").is(":checked");
                const endUserSameAsCompanyCheckedStep3 = $("#stepThreeGotoStep4").is(":checked");

                if (currentStep === 4) { // Moving back from step 4
                    if (endUserSameAsCompanyCheckedStep3) { // Was step 3 skipped?
                        if (deliverySameAsCompanyCheckedStep2) prevStep =
                        1; // Step 2 also skipped, go to 1
                        else prevStep = 2; // Go back to 2
                    } else {
                        prevStep = 3; // Go back to 3 normally
                    }
                } else if (currentStep === 3) { // Moving back from step 3
                    if (deliverySameAsCompanyCheckedStep2) { // Was step 2 skipped?
                        prevStep = 1; // Go back to 1
                    } else {
                        prevStep = 2; // Go back to 2 normally
                    }
                }
                // If currentStep is 2, prevStep is already 1 correctly.
                // --- End Jump Back Logic ---

                currentStep = prevStep;
                updateProgress();
            }
        });

        // Unified Save as Draft Handler (delegated)
        $(document).on('click', '.save-draft-step-btn', function() {
            if (isSubmitting || $(this).prop('disabled'))
        return; // Prevent action if disabled or submitting

            isSubmitting = true;
            $('.save-draft-step-btn').prop('disabled', true).html('Saving...');
            $('.next-step, .prev-step').prop('disabled', true);
            $('#is_draft_input').val('1');
            validator.settings.ignore = "*"; // Tell validator to ignore everything

            // Submit the form using native DOM submit (bypasses jQuery validation)
            $('#stepperForm')[0].submit();
        });


        // Form Submit Handler (Triggered by button type="submit" or .submit())
        $("#stepperForm").on("submit", function(e) {
            // 1. Handle Draft Submission
            if ($('#is_draft_input').val() === '1') {
                if (isSubmitting) { // Basic double-submit prevention for draft
                    e.preventDefault();
                    return;
                }
                isSubmitting = true; // Flag is already set by click handler, but good to ensure
                // Allow native form submission to proceed for draft
                return;
            }

            // 2. Handle Final Submission (is_draft is '0')
            if (isSubmitting) {
                e.preventDefault(); // Prevent double final submission
                return;
            }

            // Ensure validator ignores nothing for final check
            validator.settings.ignore = [];

            // Run full form validation using the validator instance
            if (!validator.form()) { // validator.form() checks the whole form
                e.preventDefault(); // Prevent submission if invalid

                // Find the first visible invalid element across the entire form
                var firstError = $(this).find(".is-invalid:visible").first();
                if (firstError.length) {
                    // Find which step the error is in
                    let errorStep = firstError.closest('.step-content').data('step');
                    // If error is not in the current step, navigate to it
                    if (errorStep && errorStep !== currentStep) {
                        currentStep = errorStep;
                        updateProgress(); // Show the step with the error
                    }
                    // Scroll to and focus the error field
                    $('html, body').animate({
                        scrollTop: firstError.offset().top -
                            100 // Adjust scroll offset as needed
                    }, 500, function() {
                        firstError.focus(); // Focus after scrolling animation completes
                    });

                } else {
                    // Fallback alert if validation fails but no specific field found (less likely)
                    // console.error("Form validation failed, but no invalid visible element found.");
                    // alert('Please review the form for errors.');
                }
            } else {
                // Form is valid for final submission
                isSubmitting = true;
                // Disable all action buttons
                $('.save-draft-step-btn, .next-step, .prev-step').prop('disabled', true);
                // Update submit button text (assuming it's the only type="submit")
                $(this).find('button[type="submit"]').html('Submitting...');
                // Allow the form submission to proceed
            }
        });


        // Initial Sync Function for Repeater Item <-> Modal
        function triggerInitialSyncForItem($item) {
            var $pn = $item.find('input[name$="[product_name]"]'); // More specific selector
            var $apn = $item.find('.modal input[name$="[additional_product_name]"]');
            if ($pn.val() && !$apn.val()) $apn.val($pn.val());
            else if (!$pn.val() && $apn.val()) $pn.val($apn
        .val()); // Sync other way if repeater empty but modal has value (e.g., from old data)

            var $qty = $item.find('input[name$="[qty]"]'); // More specific selector
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
            initEmpty: false,
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

                // Add validation rules dynamically to new repeater fields
                $repeaterItem.find('input[name$="[product_name]"]').rules("add", {
                    required: {
                        depends: function(element) {
                            return $('#is_draft_input').val() !== '1';
                        }
                    },
                    messages: {
                        required: "Product name is required."
                    }
                });
                $repeaterItem.find('input[name$="[qty]"]').rules("add", {
                    required: {
                        depends: function(element) {
                            return $('#is_draft_input').val() !== '1';
                        }
                    },
                    number: true,
                    min: 1,
                    messages: {
                        required: "Quantity is required.",
                        number: "Must be number",
                        min: "Min 1"
                    }
                });

                triggerInitialSyncForItem($repeaterItem); // Sync new item after adding rules
            },
            hide: function(deleteElement) {
                /* ... SweetAlert or confirm logic ... */
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

        // --- REPEATER/MODAL SYNCHRONIZATION --- (Use more specific name selectors)
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
        handleCheckboxVisibility();
        // updateProgress(); // Call updateProgress AFTER repeater init and sync
        setupStepTwoJumpCheckbox();
        setupStepTwoJumpCheckboxThree();

        // Initial Sync for EXISTING items + Dynamic ID assignment + Add Validation Rules
        $(".repeater [data-repeater-item]").each(function() {
            const $repeaterItem = $(this);

            // Add validation rules to existing items first
            $repeaterItem.find('input[name$="[product_name]"]').rules("add", {
                required: {
                    depends: function(element) {
                        return $('#is_draft_input').val() !== '1';
                    }
                },
                messages: {
                    required: "Product name is required."
                }
            });
            $repeaterItem.find('input[name$="[qty]"]').rules("add", {
                required: {
                    depends: function(element) {
                        return $('#is_draft_input').val() !== '1';
                    }
                },
                number: true,
                min: 1,
                messages: {
                    required: "Quantity is required.",
                    number: "Must be number",
                    min: "Min 1"
                }
            });

            // Now sync data
            triggerInitialSyncForItem($repeaterItem);

            // Assign dynamic IDs if missing
            const $modal = $repeaterItem.find('.modal');
            if (!$modal.attr('id')) {
                const uniqueId = 'modal_repeater_' + Date.now() + Math.random().toString(36).substring(
                    2, 7);
                const $modalButton = $repeaterItem.find('.deal-modal-btn');
                const $modalLabel = $modal.find('.modal-title');
                $modalButton.attr('data-bs-target', '#' + uniqueId);
                $modal.attr('id', uniqueId);
                const labelId = uniqueId + '_label';
                $modal.attr('aria-labelledby', labelId);
                if ($modalLabel.length) $modalLabel.attr('id', labelId);
                else $modal.attr('aria-label', 'Product Information');
            }
        });

        // Initial UI setup now that repeater items are potentially synced/validated
        updateProgress();

        // Delay toggling buttons slightly
        setTimeout(toggleNextButton, 150);

    }); // End of $(document).ready()

    // --- Global Helper Functions ---
    // (Keep countrySelect, toggleDiv, increment, decrement as they were)
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
            fieldPairs.forEach(([shippingName, contactName]) => {
                const value = isChecked ? $(`[name="${contactName}"]`).val() : '';
                $(`[name="${shippingName}"]`).val(value);
            });
        });
    });
</script>

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

            fieldPairs.forEach(([shippingName, contactName]) => {
                const value = isChecked ? $(`[name="${contactName}"]`).val() : '';
                $(`[name="${shippingName}"]`).val(value);
            });
        });
    });
</script>

<script>
    // Hide and show the full process and as draft toggle
    const btnFull = document.getElementById("btnFull");
    const btnDraft = document.getElementById("btnDraft");

    const fullBox = document.getElementById("full-process-box");
    const draftBox = document.getElementById("draft-box");

    function setActive(button) {
        // Reset button styles
        btnFull.classList.remove("active", "btn-primary");
        btnFull.classList.add("btn-outline-primary");

        btnDraft.classList.remove("active", "btn-primary");
        btnDraft.classList.add("btn-outline-primary");

        // Apply active style to clicked button
        button.classList.add("active", "btn-primary");
        button.classList.remove("btn-outline-primary");

        // Show/Hide boxes based on which button is active
        if (button === btnFull) {
            fullBox.style.display = "block";
            draftBox.style.display = "none";
        } else {
            fullBox.style.display = "none";
            draftBox.style.display = "block";
        }
    }

    // Add event listeners
    btnFull.addEventListener("click", () => setActive(btnFull));
    btnDraft.addEventListener("click", () => setActive(btnDraft));

    // Initialize on page load
    setActive(btnFull);
</script>



