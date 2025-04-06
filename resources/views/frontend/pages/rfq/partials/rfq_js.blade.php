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
<script>
    function toggleDiv() {
        const checkbox = document.getElementById("delivery");
        const toggleContent = document.getElementById("toggle-content");
        const nextButton = document.getElementById('nextButtonmain');
        toggleContent.style.display = checkbox.checked ? "block" : "none";

        if (checkbox) {
            // Ensure the checkbox exists before proceeding
            if (checkbox.checked) {
                nextButton.disabled = false; // Enable the button
                nextButton.classList.remove('btn'); // Remove 'btn-secondary'
                nextButton.classList.remove('btn-secondary'); // Remove 'btn-secondary'
                nextButton.classList.add('btn-color'); // Add 'btn-color'
            } else {
                nextButton.disabled = true; // Disable the button
                nextButton.classList.add('btn'); // Add 'btn-secondary'
                nextButton.classList.add('btn-secondary'); // Add 'btn-secondary'
                nextButton.classList.remove('btn-color'); // Remove 'btn-color'
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
</script>



<script>
    $(document).ready(function() {
        $('.select-form-input').select2();
    });
</script>


<script>
    // Function to add a new row to the repeater
    function addRow() {
        var container = document.getElementById('productRowsContainer');

        var newRow = document.createElement('div');
        newRow.classList.add('row', 'gx-2', 'align-items-center', 'product-row');

        newRow.innerHTML = `
            <div class="col-lg-10 col-10 mt-1">
                <input name="product_name[]" class="form-control form-control-sm border-0 rounded-1 py-3"
                    placeholder="Product Title" required>
            </div>
            <div class="col-lg-1 col-1">
                <input name="qty[]" type="number" class="form-control form-control-sm border-0 rounded-1 py-3"
                    placeholder="QTY..">
            </div>
            <div class="col-lg-1 col-1">
                <a href="javascript:void(0)" class="delete-btn" onclick="deleteRow(this)">
                    <i class="fa-regular fa-trash-can text-danger"></i>
                </a>
            </div>
        `;

        container.appendChild(newRow);
    }

    // Function to delete a row from the repeater
    function deleteRow(button) {
        // Remove the row containing the clicked delete button
        var row = button.closest('.product-row');
        row.remove();
    }
</script>
