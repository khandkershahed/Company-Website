<x-admin-app-layout :title="'Solution Create'">
    @include('metronic.pages.solution.partials.style')

    

    @push('scripts')
        <!-- Gsap With Animation -->
        <script src="http://clou.agency/wp-content/themes/clou-digital-agency/js/frontpage/Scrollsmoother.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
        <script src="{{ asset('backend/metronic/solution/solution.js') }}"></script>
    @endpush
    @include('metronic.pages.solution.partials.script')
</x-admin-app-layout>
