$(".data_table").DataTable({
    language: {
      lengthMenu: "Show _MENU_",
    },
    dom:
      "<'row mb-2'" +
      "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
      "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
      ">" +
      "<'table-responsive'tr>" +
      "<'row'" +
      "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
      "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
      ">",
  });

  function allowDrop(event) {
    event.preventDefault();
  }

  function drag(event) {
    event.dataTransfer.setData("text", event.target.id);
  }

  function drop(event) {
    event.preventDefault();
    const data = event.dataTransfer.getData("text");
    const draggedElement = document.getElementById(data);
    if (draggedElement) {
      const clone = draggedElement.cloneNode(true);
      event.target.appendChild(clone);
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    // Initialize the editor
    ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
      console.error(error);
    });

    // Reference to the empty message element
    const emptyMessage = document.getElementById("emptyMessage");

    // Handle image checkbox changes
    // document.querySelectorAll(".image-checkbox").forEach((checkbox) => {
    //   checkbox.addEventListener("change", function () {
    //     const previewContainer = document.getElementById("previewContainer");
    //     const imgSrc = this.getAttribute("data-img-src");

    //     if (checkbox.checked) {
    //       // Create the image wrapper
    //       const imageWrapper = document.createElement("div");
    //       imageWrapper.classList.add("image-wrapper");
    //       imageWrapper.style.position = "relative";

    //       // Create the image element
    //       const imgElement = document.createElement("img");
    //       imgElement.src = imgSrc;
    //       imgElement.alt = "Preview Image";
    //       imgElement.classList.add("preview-image");
    //       imgElement.dataset.imgSrc = imgSrc;

    //       // Create the icon container, initially hidden
    //       const iconContainer = document.createElement("div");
    //       iconContainer.classList.add("image-icons");
    //       iconContainer.style.display = "none";

    //       // Add the "add" icon
    //       const addIcon = document.createElement("i");
    //       addIcon.classList.add("fa", "fa-plus", "add-icon");

    //       // Create the edit icon
    //       const editIcon = document.createElement("i");
    //       editIcon.classList.add("fa", "fa-pencil", "edit-icon"); // Initial icon set to pencil

    //       // Append the icons (add icon and edit icon) to the container
    //       iconContainer.appendChild(addIcon);
    //       iconContainer.appendChild(editIcon);

    //       // Append the image and icon container to the wrapper
    //       imageWrapper.appendChild(imgElement);
    //       imageWrapper.appendChild(iconContainer);

    //       // Append the image wrapper to the preview container
    //       previewContainer.appendChild(imageWrapper);

    //       // Show the preview message if the container is not empty
    //       emptyMessage.style.display = "none";

    //       // Add click event to the image to toggle the icons
    //       imgElement.addEventListener("click", function () {
    //         // Remove icons from previously selected images
    //         const selectedImg = previewContainer.querySelector(
    //           ".preview-image.selected"
    //         );
    //         if (selectedImg && selectedImg !== imgElement) {
    //           selectedImg.classList.remove("selected");
    //           const existingIcons =
    //             selectedImg.parentNode.querySelector(".image-icons");
    //           if (existingIcons) {
    //             existingIcons.style.display = "none";
    //           }
    //         }

    //         // Toggle selected class and show/hide icons for the clicked image
    //         imgElement.classList.toggle("selected");
    //         iconContainer.style.display = imgElement.classList.contains(
    //           "selected"
    //         )
    //           ? "flex"
    //           : "none";

    //         // Show the remove area/column if an image is selected
    //         toggleRemoveArea();

    //         // Add event listener to the add icon
    //         addIcon.onclick = function (event) {
    //           event.stopPropagation(); // Prevent triggering the image's click event
    //           alert("Add functionality for " + imgElement.dataset.imgSrc);
    //         };

    //         // Add click event for the edit icon
    //         editIcon.onclick = function (event) {
    //           event.stopPropagation(); // Prevent triggering the image's click event

    //           // Toggle the edit/close icon
    //           if (editIcon.classList.contains("")) {
    //             editIcon.classList.remove(""); // Remove the pencil icon
    //             editIcon.classList.add(""); // Add the close icon
    //           } else {
    //             editIcon.classList.remove(""); // Remove the close icon
    //             editIcon.classList.add(""); // Add the pencil icon back
    //           }

    //           // Reference to the columns
    //           const mainColumn = document.getElementById("mainColumn");
    //           const secondColumn = document.getElementById("secondColumn");
    //           const removeIconsHeader = document.querySelector(".remove_icons");

    //           // Toggle visibility and classes
    //           if (removeIconsHeader) {
    //             if (
    //               removeIconsHeader.style.display === "none" ||
    //               removeIconsHeader.style.display === ""
    //             ) {
    //               // Show the remove icons header
    //               removeIconsHeader.style.display = "block";

    //               // Change classes accordingly
    //               mainColumn.classList.remove("col-lg-9"); // Remove col-lg-9
    //               mainColumn.classList.add("col-lg-7"); // Add col-lg-7
    //               secondColumn.classList.remove("col-3"); // Remove col-3
    //               secondColumn.classList.add("col-2"); // Add col-2
    //             } else {
    //               // Hide the remove icons header
    //               removeIconsHeader.style.display = "none";

    //               // Revert classes back to default
    //               mainColumn.classList.remove("col-lg-7"); // Remove col-lg-7
    //               mainColumn.classList.add("col-lg-9"); // Add col-lg-9
    //               secondColumn.classList.remove("col-2"); // Remove col-2
    //               secondColumn.classList.add("col-3"); // Add col-3 back
    //             }
    //           }

    //           // Show the offcanvas
    //           const editOffcanvas = new bootstrap.Offcanvas(
    //             document.getElementById("editOffcanvas")
    //           );
    //           editOffcanvas.show();

    //           // Optionally set existing data in the form fields
    //           const descriptionField =
    //             document.getElementById("imageDescription");
    //           descriptionField.value =
    //             "Your logic to get the existing description"; // Replace with actual data
    //         };
    //       });
    //     } else {
    //       // If unchecked, remove the corresponding image
    //       const imgToRemove = Array.from(
    //         previewContainer.querySelectorAll(".preview-image")
    //       ).find((img) => img.dataset.imgSrc === imgSrc);

    //       if (imgToRemove) {
    //         previewContainer.removeChild(imgToRemove.parentNode); // Remove the wrapper with the image
    //       }

    //       // Hide the remove area if no images are selected
    //       toggleRemoveArea();
    //     }

    //     // Check if the preview container is empty and show the message if it is
    //     if (previewContainer.children.length === 0) {
    //       emptyMessage.style.display = "block";
    //     } else {
    //       emptyMessage.style.display = "none";
    //     }
    //   });
    // });

    // Function to toggle the remove area based on selected images
    function toggleRemoveArea() {
      const previewContainer = document.getElementById("previewContainer");
      const selectedImages = previewContainer.querySelectorAll(
        ".preview-image.selected"
      );
      const removeIconsHeader = document.querySelector(".remove_icons");

      if (selectedImages.length > 0) {
        // Show the remove icons header
        removeIconsHeader.style.display = "block";

        // Change column classes accordingly
        const mainColumn = document.getElementById("mainColumn");
        const secondColumn = document.getElementById("secondColumn");
        mainColumn.classList.remove("col-lg-9");
        mainColumn.classList.add("col-lg-7");
        secondColumn.classList.remove("col-3");
        secondColumn.classList.add("col-2");
      } else {
        // Hide the remove icons header
        removeIconsHeader.style.display = "none";

        // Revert column classes back to default
        const mainColumn = document.getElementById("mainColumn");
        const secondColumn = document.getElementById("secondColumn");
        mainColumn.classList.remove("col-lg-7");
        mainColumn.classList.add("col-lg-9");
        secondColumn.classList.remove("col-2");
        secondColumn.classList.add("col-3");
      }
    }
  });



  // Select all template checkboxes and add event listeners
  document.querySelectorAll(".template-checkbox").forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      if (this.checked) {
        // Clear previous selections
        document
          .querySelectorAll(".template-checkbox")
          .forEach((cb) => (cb.checked = false));
        this.checked = true; // Keep the current checkbox checked

        // Update the preview
        const selectedTemplate = this.value;
        const imgSrc = document.querySelector(
          `img[alt="Template ${selectedTemplate.charAt(
            selectedTemplate.length - 1
          )}"]`
        ).src;
        document.getElementById(
          "template-preview"
        ).innerHTML = `<img src="${imgSrc}" alt="Selected Template" style="width: 100%; height: auto;" />`;
      } else {
        // Clear the preview if none are selected
        document.getElementById("template-preview").innerHTML =
          "Select a template to preview";
      }
    });
  });

  // Set Template 1 as the default selection when the page loads
  window.addEventListener("DOMContentLoaded", (event) => {
    const defaultCheckbox = document.querySelector(
      '.template-checkbox[value="template1"]'
    );
    defaultCheckbox.checked = true;

    // Trigger the change event to update the preview
    const imgSrc = document.querySelector('img[alt="Template 1"]').src;
    document.getElementById(
      "template-preview"
    ).innerHTML = `<img src="${imgSrc}" alt="Selected Template" style="width: 100%; height: auto;" />`;
  });

  // Function to update checked count for each accordion item
  document.addEventListener("DOMContentLoaded", function () {
    // Function to update the selected count for the accordion item
    function updateSelectedCount(accordionItem) {
      const checkboxes = accordionItem.querySelectorAll("input.image-checkbox");
      const count = Array.from(checkboxes).filter(
        (checkbox) => checkbox.checked
      ).length;
      const countDisplay = accordionItem.querySelector(".checked-count");
      countDisplay.textContent = `(${count} selected)`;
    }

    // Attach event listeners to checkboxes
    document.querySelectorAll(".accordion-item").forEach((accordionItem) => {
      const checkboxes = accordionItem.querySelectorAll(".image-checkbox");

      checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
          updateSelectedCount(accordionItem);
        });
      });
    });
  });

  // PopUpTooltip
  $(document).ready(function() {
    // Handle button click to toggle the popup
    $(".my_button").click(function(e) {
        e.stopPropagation(); // Prevent the click event from bubbling up to the document
        if ($(this).next(".my_target").is(":visible")) {
            $(this).next(".my_target").hide();
            return;
        }
        $(".my_target").hide(); // Hide all popups first
        $(this).next(".my_target").show(); // Show the clicked popup
    });

    // Handle close button inside the popup
    $(".close_button").click(function() {
        $(this).parent().hide();
    });

    // Handle click outside the popup to hide it
    $(document).click(function(e) {
        if (!$(e.target).closest(".my_target, .my_button").length) {
            $(".my_target").hide(); // Hide the popup when clicking outside
        }
    });
  });
