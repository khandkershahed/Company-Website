<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link href="{{ asset('storage/' . optional($setting)->favicon) }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('storage/' . optional($setting)->favicon) }}" rel="shortcut icon" type="image/png">
    <meta name="title" content="{{ optional($setting)->site_title ?: config('app.name', 'E-Commerce') }}" />
    <meta name="description" content="{{ optional($setting)->meta_description ?: 'NGen IT' }}" />

    {{-- <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ optional($setting)->site_url ?: config('app.url') }}" />
    <meta property="og:title" content="{{ optional($setting)->site_title ?: config('app.name', 'E-Commerce') }}" />
    <meta property="og:description" content="{{ optional($setting)->meta_description ?: config('app.name') }}" />
    <meta property="og:image"
        content="{{ optional($setting)->site_logo && file_exists(public_path('storage/' . optional($setting)->site_logo)) ? asset('storage/' . optional($setting)->site_logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ optional($setting)->site_url ?: config('app.url') }}" />
    <meta property="twitter:title"
        content="{{ optional($setting)->site_title ?: config('app.name', 'E-Commerce') }}" />
    <meta property="twitter:description" content="{{ optional($setting)->meta_description ?: config('app.name') }}" />
    <meta property="twitter:image"
        content="{{ optional($setting)->site_logo && file_exists(public_path('storage/' . optional($setting)->site_logo)) ? asset('storage/' . optional($setting)->site_logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}" /> --}}
    @props(['title'])
    <title>{{ $title ?? 'NGEN IT | Admin Panel' }}</title>


    <link rel="stylesheet" href="{{ asset('backend/metronic/assets/css/bootstrap_icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/metronic/assets/css/font_awesome_6.css') }}">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('backend/metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}"
        rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('backend/metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="{{ asset('backend/metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link href="{{ asset('backend/assets/input-tags/css/tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/metronic/assets/css/custom.css?v=' . time()) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
        type="text/css" />

    <style>
        .aside-dark .menu .menu-item.here>.menu-link .menu-icon,
        .aside-dark .menu .menu-item.here>.menu-link .menu-icon .svg-icon,
        .aside-dark .menu .menu-item.here>.menu-link .menu-icon i {
            color: #ffffff;
        }
    </style>
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">

    <div class="d-flex flex-column flex-root">

        <div class="flex-row page d-flex flex-column-fluid">

            @include('metronic.layouts.sidebar')


            <div class="wrapper d-flex flex-column flex-row-fluid pt-lg-17" id="kt_wrapper">

                @include('metronic.layouts.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content"
                    style="background-color: #F6F8FA;">
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-fluid">
                            {{-- @if (session('error'))
                                @foreach ($messages as $item)
                                    <div class="alert alert-danger">
                                        {{ $item }}
                                    </div>
                                @endforeach
                            @endif --}}
                            {{ $slot }}

                        </div>

                    </div>

                </div>
                @include('metronic.layouts.footer')
            </div>

        </div>

    </div>


    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>

    </div>



    <script src="{{ asset('backend/metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/metronic/assets/js/scripts.bundle.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('backend/metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('backend/metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script> --}}
    <script src="{{ asset('backend/metronic/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/summernote.lite.js') }}"></script>




    <script src="{{ asset('backend/metronic/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('backend/metronic/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('backend/metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('backend/metronic/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="{{ asset('backend/assets/input-tags/js/tagsinput.js') }}"></script>
    <script src="{{ asset('backend/metronic/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- @include('toastr') --}}
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/n4jpbhtanca801bcjejx1pc9j033yn0de5ral6e7r0wd6383/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#tinymce-editor',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('backend/metronic/assets/plugins/global/plugins.bundle.js') }}"></script>

    @stack('scripts')
    <script>
        // document.querySelectorAll('.ckeditor').forEach(element => {
        //     if (!element.classList.contains('ck-editor__editable_inline')) {
        //         ClassicEditor
        //             .create(element)
        //             .then(editor => {
        //                 console.log('CKEditor initialized:', editor);
        //             })
        //             .catch(error => {
        //                 console.error('CKEditor initialization error:', error);
        //             });
        //     }
        // });
        $(document).ready(function() {
            $('.ckeditor').summernote({
                placeholder: "Description",
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
        });
    </script>
    <script>
        //  DropZone Image
        $(document).ready(function() {
            var selectedFiles = [];

            $(".dropzone-field").on("change", "#files", function(e) {
                var files = e.target.files,
                    filesLength = files.length;

                $(".custom-file-upload").toggle(filesLength === 0 && selectedFiles.length === 0);

                for (var i = 0; i < filesLength; i++) {
                    var f = files[i];
                    selectedFiles.push(f);
                    var fileReader = new FileReader();
                    fileReader.onload = (function(file) {
                        return function(e) {
                            $("<div class=\"img-thumb-wrapper card shadow\">" +
                                "<img class=\"img-thumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove</span>" +
                                "</div>").insertAfter("#files");
                        };
                    })(f);
                    fileReader.readAsDataURL(f);
                }
                // console.log(selectedFiles);
                $(".existing-images").show();
            });

            // Use event delegation for the click event
            $(".dropzone-field").on("click", ".remove", function() {
                var wrapper = $(this).parent(".img-thumb-wrapper");
                wrapper.remove();
                var removedFile = wrapper.find('img').prop('title');
                selectedFiles = selectedFiles.filter(function(file) {
                    return file.name !== removedFile;
                });
                updateInputFiles();
                $(".custom-file-upload").toggle(selectedFiles.length === 0);
                // alert(selectedFiles.length);
            });

            function updateInputFiles() {
                // Create a new set of files excluding the removed one
                var newInputFiles = new DataTransfer();
                selectedFiles.forEach(function(file) {
                    newInputFiles.items.add(file);
                });

                // Clear the input
                $("#files").val("");

                // Assign the new set of files to the input
                $("#files")[0].files = newInputFiles.files;
            }
        });
        // checkbox And Select
        document.addEventListener('DOMContentLoaded', function() {

            const $selectAllCheckbox = $('.metronic_select_all');
            const $categoryCheckboxes = $('.bulkDelete-checkbox');
            const $deleteButton = $('#bulkDelete');

            function updateDeleteButtonVisibility() {
                // Check if any checkbox is checked
                const anyChecked = $categoryCheckboxes.is(':checked');
                $deleteButton.toggle(anyChecked);
            }

            // Handle 'Select All' checkbox change
            $selectAllCheckbox.on('change', function() {
                $categoryCheckboxes.prop('checked', $(this).prop('checked'));
                updateDeleteButtonVisibility();
            });

            // Handle individual checkbox changes
            $categoryCheckboxes.on('change', function() {
                updateDeleteButtonVisibility();
            });

            // Initial check to set the button visibility correctly
            updateDeleteButtonVisibility();
        });
        // Data table
        class DataTableInitializer {
            constructor(selector) {
                this.selector = selector;
                this.init();
            }

            init() {
                $(this.selector).DataTable({
                    "fixedHeader": {
                        "header": true,
                        "headerOffset": 5
                    },
                    "language": {
                        "lengthMenu": "Show _MENU_",
                    },
                    "dom": "<'row mb-2'" +
                        "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                        ">" +
                        "<'table-responsive'tr>" +
                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">"
                });
            }
        }

        // Initialize DataTables for elements with class 'my-datatable'
        $(document).ready(function() {
            new DataTableInitializer('.my-datatable , .dataTable');
        });
        // Modal js
        // Make the DIV element draggable:
        // var element = document.querySelector('.modal');
        // dragElement(element);

        // function dragElement(elmnt) {
        //     var pos1 = 0,
        //         pos2 = 0,
        //         pos3 = 0,
        //         pos4 = 0;
        //     if (elmnt.querySelector('.modal-content')) {
        //         // if present, the header is where you move the DIV from:
        //         elmnt.querySelector('.modal-content').onmousedown = dragMouseDown;
        //     } else {
        //         // otherwise, move the DIV from anywhere inside the DIV:
        //         elmnt.onmousedown = dragMouseDown;
        //     }

        //     function dragMouseDown(e) {
        //         e = e || window.event;
        //         // get the mouse cursor position at startup:
        //         pos3 = e.clientX;
        //         pos4 = e.clientY;
        //         document.onmouseup = closeDragElement;
        //         // call a function whenever the cursor moves:
        //         document.onmousemove = elementDrag;
        //     }

        //     function elementDrag(e) {
        //         e = e || window.event;
        //         // calculate the new cursor position:
        //         pos1 = pos3 - e.clientX;
        //         pos2 = pos4 - e.clientY;
        //         pos3 = e.clientX;
        //         pos4 = e.clientY;
        //         // set the element's new position:
        //         elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        //         elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        //     }

        //     function closeDragElement() {
        //         // stop moving when mouse button is released:
        //         document.onmouseup = null;
        //         document.onmousemove = null;
        //     }
        // }
    </script>
    {!! Toastr::message() !!}
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        @endif
    </script>

</body>

</html>
