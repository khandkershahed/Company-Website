<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@if (!empty($__env->yieldContent('title')))
    @yield('title')
@else
    <title>Ngen It | Admin Panel</title>
@endif


<!-- Global stylesheets -->
@php
    $setting = App\Models\Site::first();
@endphp


<link rel="canonical" href="{{ url()->current() }}" />

<link rel="icon" type="image/x-icon"
    href="{{ !empty($setting->favicon) ? asset('storage/' . $setting->favicon) : url('upload/no_image.jpg') }}">


<link href="{{ asset('backend/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets/css/ltr/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">

<link href="{{ asset('backend/assets/icons/material/styles.min.css') }}" rel="stylesheet">
<!-- /global stylesheets -->
<link href="{{ asset('backend/assets/css/toastr.min.css') }}" rel="stylesheet">

{{-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}
<link href="{{ asset('backend/assets/input-tags/css/tagsinput.css') }}" rel="stylesheet">

{{-- Custom CSS --}}
<link href="{{ asset('backend/assets/css/ltr/custom_main.css') }}" rel="stylesheet" type="text/css">
{{-- Custom CSS --}}

<link rel="stylesheet" href="https://unpkg.com/c3/c3.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
@stack('styles')
<style type="text/css">
    .padding {
        padding: 0px !important;
    }

    .quotaed-lbg {
        background: #659EC7 !important;
    }

    .quotaed-ltbg {
        background: #306754 !important;
    }

    .quotaed-rbg {
        background: #4C787E !important;
    }

    .quotaed-rtbg {
        background: #1F6357 !important;
    }

    .clickable-row {
        cursor: pointer;
    }

    .border-bottom-link {
        border-bottom: 1px solid #007bff;
    }

    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgb(12, 12, 12);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .preloader-spinner {
        max-width: 100%;
        max-height: 100%;
    }

    [hover-tooltip] {
    position: relative;
    cursor: default;
}

[hover-tooltip]:hover::before {
    content: attr(hover-tooltip);
    font-size: 14px;
    text-align: center;
    position: absolute;
    display: block;
    /* left: 50%; */
    min-width: 250px;
    max-width: 250px;
    bottom: calc(100% + 10px); /* $distance */
    transform: translate(-70%);
    animation: fade-in 300ms ease;
    background: rgba(39, 39, 39, 1); /* $tooltip-bg-color */
    border-radius: 4px;
    padding: 10px;
    color: #ffffff;
    z-index: 1;
}

[hover-tooltip]:hover::after {
    content: '';
    position: absolute;
    display: block;
    left: 50%;
    width: 0;
    height: 0;
    bottom: calc(100% + 6px); /* $distance - $caret-height */
    margin-left: -3px; /* - $caret-width / 2 */
    border: 1px solid black;
    border-color: rgba(39, 39, 39, 1) transparent transparent transparent; /* $tooltip-bg-color */
    border-width: 4px 6px 0; /* $caret-height, $caret-width */
    animation: fade-in 300ms ease;
    z-index: 1;
}

[hover-tooltip][tooltip-position="bottom"]:hover::before {
    bottom: auto;
    top: calc(100% + 10px); /* $distance */
}

[hover-tooltip][tooltip-position="bottom"]:hover::after {
    bottom: auto;
    top: calc(100% + 6px); /* $distance - $caret-height */
    border-color: transparent transparent rgba(39, 39, 39, 1); /* $tooltip-bg-color */
    border-width: 0 6px 4px; /* $caret-width, $caret-height */
}

@keyframes fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

</style>
