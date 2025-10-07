<x-admin-app-layout :title="'Tender Information'">
    <style>
        @media (min-width: 1300px) {
            .five-col-grid {
                display: flex;
                flex-wrap: wrap;
            }
            .five-col-grid .custom-col {
                width: 20%;
            }
        }
    </style>
    <div class="px-0 container-fluid">
        <div class="row five-col-grid">
            @php
            $cards = [
            ['count' => $live_tenders->count(), 'label' => 'Total Live Tender'],
            ['count' => $participating_tenders->count(), 'label' => 'Total Participating Tender'],
            ['count' => $submitted_tenders->count(), 'label' => 'Total Submitted Tender'],
            ['count' => $won_tenders->count(), 'label' => 'Total Won Tender'],
            ['count' => $lost_tenders->count(), 'label' => 'Total Lost Tender'],
            ];
            @endphp

            @foreach ($cards as $card)
            <div class="mb-5 col-6 col-sm-6 col-md-4 col-xl col-12 custom-col">
                <div class="shadow-none card card-flush card-rounded h-100">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <p class="mb-0 optional-color font-44px">{{ $card['count'] }}</p>
                        </div>
                    </div>
                    <div class="pt-2 card-body d-flex flex-column justify-content-end pe-0">
                        <span class="pt-1 mb-2 tender-p-para">{{ $card['label'] }}</span>
                        <small class="mb-2 text-gray-800 fw-bolder d-block">{{ now()->format('d M, Y') }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class=" row">
            <div class="col-lg-12">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="px-3 pt-4 border-0 card-header align-items-center px-lg-9">
                        <div class="card-title align-items-start flex-column">
                            <p class="mb-0 font-normal text-black fs-6">Tender List Information</p>

                            <form id="filterForm" method="GET">
                                <input type="hidden" name="date_range" id="date_range">

                                <div class="mt-2 btn btn-sm btn-light d-flex align-items-center">
                                    <div id="daterange" class="text-gray-600 fw-bold">
                                        <span id="daterange-text">
                                            {{ request('date_range') ? request('date_range') : 'Select Date Range' }}
                                        </span>
                                        <i class="fas fa-calendar ms-2"></i>
                                    </div>

                                    @if (request('date_range'))
                                    <button type="submit" name="clear" value="1" class="btn btn-sm ms-2">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                    @endif
                                </div>
                            </form>
                        </div>

                        @php
                        $tabs = [
                        ['id' => 'all_tenders', 'label' => 'All Listed', 'icon' => 'fa-list', 'active' => true],
                        ['id' => 'live', 'label' => 'Live Tender', 'icon' => 'fa-bolt'],
                        ['id' => 'participating', 'label' => 'Participating', 'icon' => 'fa-user-check'],
                        ['id' => 'submitted', 'label' => 'Submitted', 'icon' => 'fa-paper-plane'],
                        ['id' => 'won_tenders', 'label' => 'Won Tender', 'icon' => 'fa-trophy'],
                        [
                        'id' => 'lost_tenders',
                        'label' => 'Lost / Not Participated',
                        'icon' => 'fa-circle-xmark',
                        ],
                        ];
                        @endphp

                        <ul class="mx-3 nav nav-pills nav-pills-custom mx-lg-9" role="tablist">
                            @foreach ($tabs as $index => $tab)
                            <li class="mb-3 nav-item custom-tender me-3 me-lg-6 mb-lg-0" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary {{ $tab['active'] ?? false ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#{{ $tab['id'] }}"
                                    aria-selected="{{ $tab['active'] ?? false ? 'true' : 'false' }}" role="tab">
                                    <div class="nav-icon me-2">
                                        <i class="fas {{ $tab['icon'] }} text-secondary"></i>
                                    </div>
                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        {{ $tab['label'] }}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-body">
                        @include('metronic.pages.tender.partials.tenderTabs')

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(function() {
            const predefinedRanges = {
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'Upcoming Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf(
                    'month')],
                'Custom Range': [moment().subtract(29, 'days'), moment()]
            };

            $('#daterange').daterangepicker({
                opens: 'left',
                ranges: predefinedRanges,
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            }, function(start, end, label) {
                let formatted = start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD');
                $('#date_range').val(formatted);
                $('#daterange-text').text(formatted);
                $('#filterForm').submit();
            });

            // Optional: Handle Clear from daterangepicker (X button)
            $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
                $('#date_range').val('');
                $('#daterange-text').text('Select Date Range');
                $('#filterForm').submit();
            });
        });
    </script>
    @endpush

</x-admin-app-layout>