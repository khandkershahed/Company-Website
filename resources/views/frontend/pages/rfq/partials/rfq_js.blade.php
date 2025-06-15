{{-- For Steper Form And Validation --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function nextStep() {
        // Select all inputs in step 1 that have the 'required' attribute
        const projectStepInputs = document.querySelectorAll(
            '#projectStep input[required], #projectStep textarea[required]');

        // Validate each required input
        let allValid = true;
        projectStepInputs.forEach(input => {
            if (!input.value.trim()) {
                allValid = false;
                input.reportValidity(); // Display error message
            }
        });

        // Only proceed to next step if all fields are valid
        if (allValid) {
            document.getElementById("projectStep").style.display = "none";
            document.getElementById("contactStep").style.display = "block";
        }
    }

    function prevStep() {
        document.getElementById("projectStep").style.display = "block";
        document.getElementById("contactStep").style.display = "none";
    }
</script>

{{-- Repeater Of Add And Delete Product Name & Quantity --}}
<script>
    // Function to add a new row
    function addRow() {
        const repeater = document.getElementById('inputRepeater');

        // Clone the first row as a template
        const newRow = document.querySelector('.input-row').cloneNode(true);

        // Clear the input values in the new row
        newRow.querySelectorAll('input').forEach(input => input.value = '');

        // Append the cloned row to the repeater container
        repeater.appendChild(newRow);
    }

    // Function to delete a row
    function deleteRow(button) {
        const row = button.closest('.input-row');

        // Ensure there's at least one row remaining
        const rows = document.querySelectorAll('.input-row');
        if (rows.length > 1) {
            row.remove();
        } else {
            alert("At least one row is required.");
        }
    }
</script>


{{-- On Check Show --}}
{{-- <script>
    function toggleDiv() {
        const checkbox = document.getElementById("delivery");
        const toggleContent = document.getElementById("toggle-content");
        const nextButton = document.getElementById('nextButtonmain');
        toggleContent.style.display = checkbox.checked ? "block" : "none";

        if (checkbox) {

            if (checkbox.checked) {
                nextButton.disabled = false;
                nextButton.classList.remove('btn');
                nextButton.classList.remove('btn-secondary');
                nextButton.classList.add('btn-color');
            } else {
                nextButton.disabled = true;
                nextButton.classList.add('btn');
                nextButton.classList.add('btn-secondary');
                nextButton.classList.remove('btn-color');
            }
        } else {
            console.error('Checkbox with id "delivery" not found.');
        }
    }

    function toggleDivInfo() {
        const checkbox = document.getElementById("aditional_info");
        const toggleContent = document.getElementById("toggle-content-2");
        toggleContent.style.display = checkbox.checked ? "block" : "none";
    }
</script> --}}
<script>
    function toggleDiv() {
        const checkbox = document.getElementById("delivery");
        const toggleContent = document.getElementById("toggle-content");

        if (checkbox && toggleContent) {
            // Show or hide content based on checkbox status
            toggleContent.style.display = checkbox.checked ? "block" : "none";
        } else {
            console.error('Required elements not found.');
        }
    }

    function toggleDivInfo() {
        const checkbox = document.getElementById("aditional_info");
        const toggleContent = document.getElementById("toggle-content-2");

        if (checkbox && toggleContent) {
            // Show or hide content based on checkbox status
            toggleContent.style.display = checkbox.checked ? "block" : "none";
        } else {
            console.error('Required elements not found.');
        }
    }

    // function toggleEndUserDiv() {
    //     const checkbox = document.getElementById("enduser");
    //     const toggleContent = document.getElementById("toggle-content-enduser");

    //     if (checkbox && toggleContent) {
    //         toggleContent.style.display = checkbox.checked ? "block" : "none";
    //     } else {
    //         console.error('Required elements not found for End User.');
    //     }
    // }
</script>
<script>
    function toggleEndUserDiv() {
        const checkbox = document.getElementById("enduser");
        const toggleContent = document.getElementById("toggle-content-enduser");

        if (checkbox && toggleContent) {
            // Only show the div when the checkbox is UNchecked
            toggleContent.style.display = checkbox.checked ? "none" : "block";
        } else {
            console.error('Required elements not found for End User.');
        }
    }

    // Run this once on page load to hide the div initially
    window.addEventListener('DOMContentLoaded', toggleEndUserDiv);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deliveryCity = document.querySelector('.deliveryCity');
        if (deliveryCity) {
            deliveryCity.addEventListener('change', function() {
                const nextButton = document.querySelector('.nextButtonmain');

                if (this.value !== '') {
                    nextButton.removeAttribute('disabled');
                    nextButton.classList.remove('btn-secondary-disable');
                    nextButton.classList.add('btn-color');
                } else {
                    nextButton.setAttribute('disabled', 'true');
                    nextButton.classList.remove('btn-color');
                    nextButton.classList.add('btn-secondary-disable');
                }
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const requiredFields = ['name', 'email', 'phone', 'company_name', 'delivery_zip_code'];
        const submitButton = document.querySelector('button[type="submit"]');

        function checkFormFields() {
            let allFilled = true;

            requiredFields.forEach(fieldName => {
                const input = document.querySelector(`input[name="${fieldName}"]`);
                if (!input || input.value.trim() === '') {
                    allFilled = false;
                }
            });

            if (submitButton) {
                if (allFilled) {
                    submitButton.removeAttribute('disabled');
                    submitButton.classList.remove('btn-secondary-disable');
                    submitButton.classList.add('btn-color');
                } else {
                    submitButton.setAttribute('disabled', 'true');
                    submitButton.classList.remove('btn-color');
                    submitButton.classList.add('btn-secondary-disable');
                }
            }
        }

        // Attach input listeners to each required field
        requiredFields.forEach(fieldName => {
            const input = document.querySelector(`input[name="${fieldName}"]`);
            if (input) {
                input.addEventListener('input', checkFormFields);
            }
        });

        // Initial check
        checkFormFields();
    });
</script>


<script>
    $(document).ready(function() {
        $('.select-form-input').select2();
    });
</script>


<script>
    function updateSerialNumbers() {
        const serials = document.querySelectorAll('.product-row .serial-number span');
        serials.forEach((span, index) => {
            span.textContent = index + 1;
        });
    }

    function addRow() {
        var container = document.getElementById('productRowsContainer');

        var newRow = document.createElement('div');
        newRow.classList.add('row', 'gx-2', 'align-items-center', 'product-row');

        newRow.innerHTML = `
            <div class="col-lg-1 serial-number">
                <span class="border-0 d-flex justify-content-center form-control form-control-sm rounded-1">1</span>
            </div>
            <div class="mt-1 col-lg-9 col-10">
                <input name="product_name[]" class="py-3 border-0 form-control form-control-sm rounded-1"
                    placeholder="Product Title *" required>
            </div>
            <div class="col-lg-1 col-1">
                <input name="qty[]" value="1" type="number" class="py-3 border-0 text-end form-control form-control-sm rounded-1"
                    placeholder="QTY.. *">
            </div>
            <div class="col-lg-1 col-1">
                <a href="javascript:void(0)" class="delete-btn" onclick="deleteRow(this)">
                    <i class="fa-regular fa-trash-can text-danger"></i>
                </a>
            </div>
        `;

        container.appendChild(newRow);
        updateSerialNumbers(); // 🔄 Recalculate serial numbers
    }

    function deleteRow(button) {
        var row = button.closest('.product-row');
        const rows = document.querySelectorAll('.product-row');
        if (rows.length > 1) {
            row.remove();
            updateSerialNumbers(); // 🔄 Recalculate serial numbers
        } else {
            alert("At least one row is required.");
        }
    }

    // Initial call if needed (optional)
    document.addEventListener('DOMContentLoaded', updateSerialNumbers);
</script>
