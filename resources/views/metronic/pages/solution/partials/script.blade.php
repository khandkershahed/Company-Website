<script>

    imgElement.addEventListener("click", function() {

        editIcon.onclick = function(event) {
            event.stopPropagation();

            const removeIconsHeader = document.querySelector(".remove_icons");
            const mainColumn = document.getElementById("mainColumn");

            if (removeIconsHeader) {
                if (removeIconsHeader.style.display === "none") {

                    removeIconsHeader.style.display = "block";

                    mainColumn.classList.remove("col-lg-9");
                    mainColumn.classList.add("col-lg-6");
                } else {

                    removeIconsHeader.style.display = "none";

                    mainColumn.classList.remove("col-lg-6");
                    mainColumn.classList.add("col-lg-9");
                }
            }

            // Show the offcanvas
            const editOffcanvas = new bootstrap.Offcanvas(
                document.getElementById("editOffcanvas")
            );
            editOffcanvas.show();

            // Optionally set existing data in the form fields
            const descriptionField = document.getElementById("imageDescription");
            descriptionField.value =
            "Your logic to get the existing description"; // Replace with actual data
        };
    });
</script>
