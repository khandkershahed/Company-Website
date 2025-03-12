<!-- Core JS files -->
{{-- <script src="{{ asset('backend/assets/js/jquery/jquery.min.js') }}"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
<!-- FullCalendar JS -->
<script src="{{ asset('backend/assets/js/vendor/ui/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('backend/assets/demo/demo_configurator.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('backend/assets/js/vendor/visualization/d3/d3.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/visualization/d3/d3_tooltip.js') }}"></script>

<script src="{{ asset('backend/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/tables/datatables/extensions/buttons.min.js') }}"></script>
{{-- <script src="../../../assets/js/vendor/tables/datatables/extensions/buttons.min.js"></script> --}}


<script src="{{ asset('backend/assets/input-tags/js/tagsinput.js') }}"></script>

<script src="{{ asset('backend/assets/js/vendor/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
{{-- <script src="{{ asset('backend/assets/js/vendor/editors/ckeditor/ckeditor_classic.js') }}"></script> --}}
<script src="{{ asset('backend/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart.js') }}"></script>
<script src="{{ asset('backend/assets/js/summernote.lite.js') }}"></script>

<script src="{{ asset('backend/assets/js/vendor/forms/wizards/steps.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/vendor/forms/validation/validate.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/forms/selects/bootstrap_multiselect.js') }}"></script>
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/widgets_stats.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/form_multiselect.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/form_validation_library.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/form_select2.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/components_modals.js') }}"></script>

<script src="{{ asset('backend/assets/demo/pages/form_wizard.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/fullcalendar_advanced.js') }}"></script>


<script src="{{ asset('backend/assets/demo/pages/extra_sweetalert.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/form_controls_extended.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/datatables_advanced.js') }}"></script>
<script src="{{ asset('backend/assets/demo/pages/datatables_extension_buttons_print.js') }}"></script>
{{-- <script src="../../../assets/demo/pages/datatables_extension_buttons_print.js"></script> --}}


{{-- <script src="{{ asset('backend/assets/demo/pages/editor_ckeditor_classic.js') }}"></script> --}}

<script src="{{ asset('backend/assets/demo/pages/form_tags.js') }}"></script>

<script src="{{ asset('backend/assets/js/custom.js') }}"></script>

<script src="{{ asset('backend/assets/demo/pages/dashboard.js') }}"></script>

<script src="https://cdn.tiny.cloud/1/n4jpbhtanca801bcjejx1pc9j033yn0de5ral6e7r0wd6383/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>

<script src="{{ asset('backend/js/toastr.min.js') }}"></script>
<script src="{{ asset('backend/lib/year-select.js') }}"></script>
<script src="{{ asset('backend/assets/js/calculate.js') }}"></script>
{!! Toastr::message() !!}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Simulate a delay (e.g., fetching data, loading resources)
        setTimeout(function() {
            // Hide the preloader
            document.querySelector('.preloader').style.display = 'none';
        }, 1000); // Adjust the delay time as needed
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $('.product thead').on('click', '.addRow', function() {
        var tr = "<tr>" +

            "<td> <input type='text' class='form-control' name='item_name[]' placeholder='Product Name' required></td>" +
            "<td> <input type='text' class='form-control' name='qty[]' placeholder='Quantity' required></td>" +
            "<td> <input type='text' class='form-control' name='unit_price[]' ></td>" +
            "<td> <a href='javascript:void(0)' class='btn btn-danger removeRow p-1'><i class='ph-minus'></i></a></td>" +
            "</tr>"
        $('.repeater').append(tr);
    });

    $('tbody').on('click', '.removeRow', function() {
        $(this).parent().parent().remove();
    });
</script>


<script>
    $(document).ready(function() {
        $(".allow_numeric").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });

        $(".allow_decimal").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
                    57)) {
                evt.preventDefault();
            }
        });

    });
</script>




{{-- Month Tab --}}

{{--
<script>


function addToCart(event) {
    event.preventDefault(); // stop default form submission behavior

    // Get the form data
    var formData = new FormData(document.querySelector('.addToCartForm'));

    // Send an AJAX request to the route
    axios.post('{{ route('cart.add') }}', formData)
         .then(function (response) {
            // Handle the response here
            console.log(response);
         })
         .catch(function (error) {
            // Handle errors here
            console.log(error);
         });
}
</script> --}}


<script>
    $(document).ready(function(e) {

        $('.yearselect').yearselect({
            //alert(10);
            start: 2019,
            end: 2040
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            //alert(5);
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image1').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage1').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image2').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage2').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image3').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage3').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#myform').on('submit', function() {
            $('#submitbtn').attr('disabled', 'true');
        });
    });
</script>
 
<script>
    $(document).ready(function() {
        $('#short_desc').summernote({
            placeholder: "Short Description",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#featured_desc').summernote({
            placeholder: "Featured Description",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#footer').summernote({
            placeholder: "Conclusion Texts..",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#long_desc').summernote({
            placeholder: "Long Description",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#overview').summernote({
            placeholder: "Product Overview",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#specification').summernote({
            placeholder: "Product Specification",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#accessories').summernote({
            placeholder: "Product accessories",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#warranty').summernote({
            placeholder: "Product warranty",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],

                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#common').summernote({
            placeholder: "Write Text Here....",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('.commonSummernote').summernote({
            placeholder: "Write Text Here....",
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $("#common").on("keypress", function() {
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
</script>
<script>
    // tinymce.init({
    //     selector: 'textarea#short_desc, textarea#featured_desc, textarea#footer, textarea#long_desc, textarea#overview, textarea#specification, textarea#accessories, textarea#warranty, textarea#common, textarea#commonSummernote',
    //     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    // });
</script>
<script>
    // tinymce.init({
    //     selector: 'textarea.tinymce',
    //     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    // });
</script>


<script>
    $(document).ready(function() {
        $(".allow_numeric").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });

        $(".multiplyValue").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
                    57)) {
                evt.preventDefault();
            }
        });

        $("input[name='special_discount']").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
                    57)) {
                evt.preventDefault();
            }
        });

        $("input[name='reqular_discount']").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
                    57)) {
                evt.preventDefault();
            }
        });

        $("input[name='tax']").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
                    57)) {
                evt.preventDefault();
            }
        });

        $("input[name='qty[]']").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
                    57)) {
                evt.preventDefault();
            }
        });

        $("input[name='unit_price[]']").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
                    57)) {
                evt.preventDefault();
            }
        });

    });


    // for search
    $(document).ready(function() {
        var submitIcon = $('.searchbar-icon');
        var inputBox = $('.searchbar-input');
        var searchbar = $('.searchbar');
        var isOpen = false;
        submitIcon.click(function() {
            if (isOpen == false) {
                searchbar.addClass('searchbar-open');
                inputBox.focus();
                isOpen = true;
            } else {
                searchbar.removeClass('searchbar-open');
                inputBox.focusout();
                isOpen = false;
            }
        });
        submitIcon.mouseup(function() {
            return false;
        });
        searchbar.mouseup(function() {
            return false;
        });
        $(document).mouseup(function() {
            if (isOpen == true) {
                $('.searchbar-icon').css('display', 'block');
                submitIcon.click();
            }
        });
    });

    function buttonUp() {
        var inputVal = $('.searchbar-input').val();
        inputVal = $.trim(inputVal).length;
        if (inputVal !== 0) {
            $('.searchbar-icon').css('display', 'none');
        } else {
            $('.searchbar-input').val('');
            $('.searchbar-icon').css('display', 'block');
        }
    }
</script>

{{-- @yield('scripts') --}}
@stack('scripts')
