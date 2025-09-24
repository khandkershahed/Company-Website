@props(['rfq', 'active' => false, 'tab' => 'pending'])

<li class="mt-2 nav-item w-100 me-0 mb-md-2">
    <a class="nav-link {{ $active ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
        data-bs-toggle="tab" href="#{{ $tab }}_rfq_{{ $rfq->id }}">
        <div class="row w-100 align-items-center">
            <div class="col-md-6 d-flex align-items-center">
                <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                <div class="text-start">
                    <h1 class="h6 fw-normal mb-0">{{ $rfq->company_name }}</h1>
                    <div class="small text-muted">
                        @unless (Route::is('admin.archived.rfq'))
                            RFQ#
                        @endunless
                        {{ $rfq->rfq_code }} | {{ $rfq->country }}
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-end pe-0">
                <div class="fs-7 text-danger d-flex align-items-center justify-content-end">
                    <i class="fas fa-bell fa-shake me-1 text-danger"></i>
                    {{ $rfq->created_at?->diffInDays(now()) }} Days
                </div>
                <p class="small mb-1 text-muted">
                    {{ $rfq->created_at?->format('d M Y | h:i A') }}
                </p>
                <div class="d-flex justify-content-end gap-2">
                    <button type="button"
                        class="btn btn-sm {{ $rfq->isAssigned() ? 'btn-bg-light btn-color-gray-700' : 'btn-outline-primary' }}"
                        data-bs-toggle="modal" data-bs-target="#assignRfqModal-{{ $rfq->id }}"
                        {{ $rfq->isAssigned() ? 'disabled' : '' }}>
                        {{ $rfq->isAssigned() ? 'Already Assigned' : 'Assign' }}
                    </button>
                    <button class="btn btn-sm btn-primary" style="background-color: #296088;"
                        onclick="window.location.href='{{ route('single-rfq.quoation_mail', $rfq->rfq_code) }}';">
                        Quote
                    </button>
                </div>
            </div>
        </div>
    </a>
</li>
