<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Title -->
<title>{{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT Ltd.' }}</title>
@yield('styles')
<meta property="og:site_name" content="{{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT Ltd.' }}" />
<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT Ltd.' }}" />
<meta property="og:description"
    content="NGEN IT Ltd. is a System Integration, Software & Hardware based License Provider & Software development based company established in 2008. Our technical expertise, broad solutions portfolio, and supply chain capabilities give us the right resources and scale to achieve more for you. Cloud Services." />
<meta property="og:image"
    content="{{ !empty($brandpage->banner_image) && file_exists(public_path('storage/' . $brandpage->banner_image)) ? url('social-image/' . $brandpage->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}" />
<meta property="og:image:width" content="1200" /> <!-- Standard size for social sharing -->
<meta property="og:image:height" content="630" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT Ltd.' }}">
<meta name="twitter:description"
    content="NGEN IT Ltd. is a System Integration, Software & Hardware based License Provider & Software development based company established in 2008. Our technical expertise, broad solutions portfolio, and supply chain capabilities give us the right resources and scale to achieve more for you. Cloud Services.">
<meta name="twitter:image"
    content="{{ !empty($brandpage->banner_image) && file_exists(public_path('storage/' . $brandpage->banner_image)) ? url('social-image/' . $brandpage->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}">
<meta name="twitter:site" content="@YourTwitterHandle"> <!-- Replace with your Twitter handle if available -->

<!-- Fav-Icon -->
<link rel="icon" type="image/x-icon"
    href="{{ !empty($setting->favicon) ? asset('storage/' . $setting->favicon) : url('upload/no_image.jpg') }}">

<!-- SEO Meta Tags -->
<meta name="description"
    content="NGEN IT Ltd. is a System Integration, Software & Hardware based License Provider & Software development based company established in 2008. Our technical expertise, broad solutions portfolio, and supply chain capabilities give us the right resources and scale to achieve more for you. Cloud Services.">
<meta name="keywords"
    content="software, hardware, training, books, license, Microsoft, Adobe, Software License, Acronis, Veeam, Industry, Solution, Health Industry, Financial Industry">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="1 hour">
<meta name="author" content="NGen IT Ltd.">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="google-site-verification" content="rvHWL3HPw7hzVuxHE37nPByXS604wH6gpUPzjZiWNy8" />

<!-- CSS Links -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sliders/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sliders/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sliders/slick-theme.css') }}">
<link href="{{ asset('frontend/css/bootstrap/bootstrap@5.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/css/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/select-2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/toastr/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom_global.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom_responsive.css') }}">


<!-- Scripts -->
<script async data-id="9476858534" id="chatling-embed-script" type="text/javascript"
    src="https://chatling.ai/js/embed.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KB1NVD4FHE"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-KB1NVD4FHE');
</script>
