@props(['rfq', 'active' => false, 'tab' => 'pending'])
<style>
    .notif-blue {
        color: #007bff !important;
    }

    .notif-yellow {
        color: #ffc107 !important;
    }

    .notif-dark-red {
        color: #800000 !important;
    }

    .notif-light-red {
        color: #ff747f !important;
    }

    .notif-default {
        color: #6c757d !important;
    }
    @media (max-width: 767px) {
    .rfq-content-triger {
        text-align: center !important;
        justify-content: center !important;
    }

    .rfq-content-triger .col-md-6 {
        text-align: center !important;
    }

    .rfq-content-triger .d-flex {
        justify-content: center !important;
        text-align: center !important;
    }

    .rfq-content-triger i {
        margin-right: 0 !important;
        margin-bottom: 5px !important;
    }

    .rfq-content-triger .text-start {
        text-align: center !important;
    }

    .rfq-content-triger .text-end {
        text-align: center !important;
        padding-right: 0 !important;
    }

    .rfq-content-triger .d-flex.justify-content-end {
        justify-content: center !important;
    }

    .rfq-content-triger .d-flex.align-items-center.justify-content-end {
        justify-content: center !important;
    }

    .rfq-content-triger .gap-2.d-flex.justify-content-end {
        justify-content: center !important;
    }

    /* Buttons center alignment */
    .rfq-content-triger .gap-2 {
        justify-content: center !important;
        display: flex !important;
        flex-wrap: wrap !important;
    }
}
</style>

<li class="mt-2 nav-item w-100 me-0 mb-md-2">
    <a class="nav-link {{ $active ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
        data-bs-toggle="tab" href="#{{ $tab }}_rfq_{{ $rfq->id }}">
        <div class="row w-100 align-items-center rfq-content-triger">
            <div class="col-md-6 col-12 d-flex align-items-center">
                <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                <div class="text-start">
                    <h1 class="mb-0 h6 fw-bold" style="font-size: 16px;">{{ $rfq->company_name }}</h1>
                    <div class="small text-muted">
                        @unless (Route::is('admin.archived.rfq'))
                            RFQ#
                        @endunless
                        {{ $rfq->rfq_code }} | {{ $rfq->country }}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 text-end pe-0">
                {{-- <div class="fs-7 text-danger d-flex align-items-center justify-content-end">
                    <i class="fas fa-bell fa-shake me-1 text-danger"></i>
                    {{ $rfq->created_at?->diffInDays(now()) }} Days
                </div> --}}
                @php
                    $daysDiff = $rfq->created_at?->diffInDays(now());
                    $colorClass = match (true) {
                        $daysDiff === 0 => 'notif-blue', // 0 days - Blue
                        $daysDiff === 1 => 'notif-yellow', // 1 day - Yellow
                        $daysDiff === 2 => 'notif-yellow', // 1 day - Yellow
                        $daysDiff === 3 => 'notif-dark-red', // 3 days - Dark Red
                        $daysDiff >= 4 => 'notif-light-red', // 4+ days - Light Red
                        default => 'notif-default', // Fallback
                    };
                @endphp

                <div class="fs-7 d-flex align-items-center justify-content-end {{ $colorClass }}">
                    <i class="fas fa-bell fa-shake me-1 {{ $colorClass }}"></i>
                    {{ $daysDiff }} {{ Str::plural('Day', $daysDiff) }}
                </div>

                <p class="mb-1 small text-muted">
                    {{ $rfq->created_at?->format('d M Y | h:i A') }}
                </p>
                <div class="gap-2 d-flex justify-content-end">
                    <button type="button"
                        class="btn btn-sm {{ $rfq->isAssigned() ? 'btn-bg-light btn-color-gray-700' : 'btn-outline-primary' }}"
                        data-bs-toggle="modal" data-bs-target="#assignRfqModal-{{ $rfq->id }}"
                        {{ $rfq->isAssigned() ? 'disabled' : '' }}>
                        {{ $rfq->isAssigned() ? 'Already Assigned' : 'Assign' }}
                    </button>
                    <button class="btn btn-sm btn-primary" style="background-color: {{ $rfq->status == 'quoted' ? 'green' : '#296088' }};"
                        onclick="window.location.href='{{ route('admin.single-rfq.quoation_mail', $rfq->rfq_code) }}';">
                        {{ $rfq->status == 'quoted' ? 'Quoted' : 'Quote' }}
                    </button>
                </div>
            </div>
        </div>
    </a>
</li>
