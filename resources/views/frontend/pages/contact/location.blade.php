@extends('frontend.master')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://api.opencagedata.com/geocode/v1/json?key=0bca64e6e6414b8b973e40e05e7e05ba"></script>

    <!--======// Header Title //======-->
    <section class="common_product_header"
        style="background-image: url({{ asset('frontend/images/location.jpg') }});">
        <div>
            <div class="">
                <div class="container ">
                    {{-- <h1 class="text-capitalize w-50 mx-auto">{{ $learnmore->title }}.</h1> --}}
                    <div class="outcome_assetType mb-4">
                        <p class="m-0 badge main_bg rounded-pill p-2">Our Office Location</p>
                    </div>
                    <h1 class="text-capitalize w-lg-50 w-sm-100 mx-auto">Check Our Location</h1>
                    <div class="row ">
                        <!--BUTTON START-->
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="m-4">
                                <a class="btn-color" href="{{ route('contact') }}">Hear from our team</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid" style="background-color: #222222;">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <div class="col-lg-6 col-sm-12">
                        <div class="mt-5 info-areas">
                            <h1 class="text-white"><span style="border-top: 5px solid #ae0a46">Loc</span>ations</h1>
                            <p class="text-white d-lg-block d-sm-none">Around the globe, our teams are helping businesses
                                achieve <br> their
                                goals with transformative
                                products, services and <br> support. Explore our locations below.</p>
                            <p class="text-white d-lg-none d-sm-bolck">Around the globe, our teams are helping businesses
                                achieve their
                                goals with transformative
                                products, services and support. Explore our locations below.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="area_outer bg-white p-lg-5">
                            <h4>Need Immediate <span class="main_color">Assistance?</span></h4>
                            <ul>
                                <li class="location-list">
                                    <a class="py-lg-2 py-1"
                                        href="tel:+{{ !empty($setting->phone_one) ? $setting->phone_one : '' }}">
                                        <i class="main_color fa-solid fa-headset" style="font-size: 20px !important;"></i>
                                        Call us: {{ !empty($setting->phone_one) ? $setting->phone_one : '' }}
                                    </a>
                                </li>
                                <li class="location-list">
                                    <a href="">
                                        <i class="main_color fa-brands fa-whatsapp" style="font-size: 22px !important;"></i>
                                        <span>Whatsapp Number:
                                            {{ !empty($setting->whatsapp_number) ? $setting->whatsapp_number : '' }}</span>
                                    </a>
                                </li>
                                <li class="location-list">
                                    <a href="{{ route('contact') }}">
                                        <i class="main_color fa-brands fa-rocketchat"
                                        style="font-size: 18px !important;"></i> Chat with Us
                                    </a>
                                </li>
                                <li class="location-list">
                                    <a class="py-lg-2 py-1 main_color pt-2 location-list-link" href="{{ route('contact') }}"> Hear from a
                                        specialist</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="border">
        <div class="container  py-3">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-lg-6 col-7">
                    <h2 class="text-lg-start text-sm-center d-lg-block d-sm-none">NGen IT Office Locations</h2> {{--for only large device--}}
                    <h3 class="d-lg-none d-sm-block m-0 ps-2">Office Locations</h3>  {{--for only small device--}}
                </div>
                <div class="col-lg-6 col-5 text-lg-end text-sm-center">
                    {{-- <select class="country-select" aria-label="Country location list">
                        <option value="all" selected>All locations</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach

                    </select> --}}
                </div>
            </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row">
                @if ($locations->count() > 0)
                    @foreach ($locations as $item)
                        <div class="col-lg-4 col-12 text-lg-start text-sm-center">
                            <div class="">
                                <h5 class="main_color">
                                    {{ App\Models\Admin\Country::where('id', 'country_id')->value('country_name') }}</h5>
                                <h5 class="fw-bold mb-1">{{ $item->name }}</h5>
                                <p class="pb-0 mb-1">{{ $item->address }}</p>
                                <p class="pb-0 mb-1">{{ $item->whatsapp_number }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </section>
    {{-- Map Start --}}
    <section class="container mt-3 mb-lg-3 pb-5 map-area">
        <div id="map" style="width: 100%; height: 500px;"></div>
    </section>
    {{-- Map End --}}
    <section>
        <div class="container-fluid" style="background-color: #222222;">
            <div class="container pt-lg-5 pt-4 pb-lg-5 pb-3">
                {{-- title  --}}
                <div class="text-center mb-lg-5 mb-3">
                    <h2 class="text-white location_footer_title">NGen IT By The Numbers</h2>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    @foreach ($tech_datas as $tech_data)
                        <div class="col-lg-4 col-4 mb-2">
                            <h1 class="callout-num"> {{ $tech_data->header }}</h1>
                            <p class="text-center text-white m-0"> {{ $tech_data->short_description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        // var map = L.map('map').setView([0, 0], 2);
        var map = L.map('map', {
            'worldCopyJump': false,
            'continuousWorld': false, // Prevent map repeating when zoomed out
        }).setView([0, 0], 2);





        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 6,
            minZoom: 2,
            noWrap: true,
        }).addTo(map);


        // Dynamic marker data (replace with your data)
        var countries = @json($countries);
        countries.forEach(function(country) {
            var geocodeUrl = 'https://api.opencagedata.com/geocode/v1/json?q=' + encodeURIComponent(country
                .country_name) + '&key=0bca64e6e6414b8b973e40e05e7e05ba';

            fetch(geocodeUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.results.length > 0) {
                        var coordinates = data.results[0].geometry;
                        L.marker([coordinates.lat, coordinates.lng]).addTo(map)
                            .bindPopup(country.country_name)
                            .openPopup();
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
