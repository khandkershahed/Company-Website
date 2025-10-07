<x-admin-app-layout :title="'Marketing Plan'">
    <div class="px-0 container-fluid">
        <form id="monthFilterForm" method="GET" action="{{ route('admin.marketing-plan.index') }}">
            <div class="mb-5 row">
                <div class="mb-3 col-lg-4 mb-lg-0">
                    <div class="shadow-none card card-flush card-rounded ">
                        <div class="d-flex flex-stack justify-content-center align-items-center h-140px">
                            <div>
                                <img class="img-fluid rounded-circle h-100px w-100px" style="border: 2px solid #296088;"
                                    src="{{ asset('https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name)) }}"
                                    alt="">
                            </div>
                            <div class="p-8 me-3 text-start">
                                <h4 class="text-black">{{ Auth::user()->name }}</h4>
                                <p class="mb-0 text-muted">{{ Auth::user()->designation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-lg-4 mb-lg-0">
                    <div class="shadow-none card card-flush card-rounded ">
                        <div class="d-flex justify-content-center align-items-center h-140px">
                            <div class="p-8 me-3 text-start ">
                                <p class="mb-0 optional-color" style="font-size: 28px;">Marketing Plan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-lg-4 mb-lg-0">
                    <div class="shadow-none card card-flush card-rounded ">
                        <div class="px-15 d-flex justify-content-between align-items-center h-140px">
                            <div>
                                <p class="mb-0 optional-color" style="font-size: 28px;"><span
                                        class="text-muted">Year</span>
                                    {{ date('Y') }}</p>
                            </div>
                            <div class="p-8 text-start pe-0">
                                <p class="mb-2 text-black">Check Monthly Information</p>
                                <div>
                                    <select class="form-select form-select-sm" data-control="select2"
                                        data-placeholder="Month" name="month" data-allow-clear="true" id="filterMonth">
                                        <option></option>
                                        @foreach ($months as $month)
                                            <option value="{{ $month }}" @selected(old('month', request('month')) === $month)>
                                                {{ $month }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card h-xl-100" id="kt_timeline_widget_2_card">
                    <div class="mt-10 border-0 card-header position-relative align-items-center">
                        <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex" role="tablist">
                            @php $i = 0; @endphp
                            @foreach ($types as $typeKey => $typeLabel)
                                <li class="nav-item custom-tender" role="presentation">
                                    <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary {{ $i === 0 ? 'active' : '' }}"
                                        data-bs-toggle="pill" href="#tab_{{ $typeKey }}"
                                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}" role="tab">
                                        <span class="nav-text fw-semibold fs-4">{{ $typeLabel }}</span>
                                    </a>
                                </li>
                                @php $i++; @endphp
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            @php $i = 0; @endphp
                            @foreach ($types as $typeKey => $typeLabel)
                                <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}"
                                    id="tab_{{ $typeKey }}" role="tabpanel">
                                    <div class="accordion" id="accordion_{{ $typeKey }}">
                                        @if (isset($grouped[$typeKey]) && $grouped[$typeKey]->isNotEmpty())
                                            @foreach ($grouped[$typeKey] as $idx => $plan)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header"
                                                        id="heading_{{ $typeKey }}_{{ $idx }}">
                                                        <button
                                                            class="accordion-button fs-4 text-muted {{ $idx > 0 ? 'collapsed' : '' }}"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse_{{ $typeKey }}_{{ $idx }}"
                                                            aria-expanded="{{ $idx === 0 ? 'true' : 'false' }}"
                                                            aria-controls="collapse_{{ $typeKey }}_{{ $idx }}">
                                                            {{ \Carbon\Carbon::parse($plan->date)->format('l F j, Y') }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse_{{ $typeKey }}_{{ $idx }}"
                                                        class="accordion-collapse collapse {{ $idx === 0 ? 'show' : '' }}"
                                                        aria-labelledby="heading_{{ $typeKey }}_{{ $idx }}"
                                                        data-bs-parent="#accordion_{{ $typeKey }}">
                                                        <div class="py-1 accordion-body">
                                                            <div class="table-responsive">
                                                                <table class="table align-middle gs-0 gy-4">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="p-0 w-10px"></th>
                                                                            <th class="p-0 w-25px"></th>
                                                                            <th class="p-0 min-w-400px"></th>
                                                                            <th class="p-0 min-w-100px"></th>
                                                                            <th class="p-0 min-w-125px"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span data-kt-element="bullet"
                                                                                    class="bullet bullet-vertical d-flex align-items-center h-40px
                                                                  {{ $plan->status === 'done' ? 'bg-success' : 'bg-primary' }}"></span>
                                                                            </td>
                                                                            <td class="ps-0">
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input status-toggle"
                                                                                        data-id="{{ $plan->id }}"
                                                                                        {{ $plan->status === 'done' ? 'checked' : '' }}>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#"
                                                                                    class="text-gray-800 text-hover-primary fw-normal fs-6">
                                                                                    {{ $plan->title ?? '-' }}
                                                                                </a>
                                                                                <span
                                                                                    class="text-gray-500 fw-bold fs-7 d-block">
                                                                                    {{ $typeLabel }}
                                                                                </span>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <span data-kt-element="status"
                                                                                    class="badge badge-light-{{ $plan->status === 'done' ? 'success' : 'primary' }}">
                                                                                    {{ ucfirst($plan->status) }}
                                                                                </span>
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <div
                                                                                    class="flex-shrink-0 d-flex justify-content-end">
                                                                                    {{-- Phone call --}}
                                                                                    <a href="tel:{{ $plan->contact_number ?? '' }}"
                                                                                        class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                                        <i
                                                                                            class="fa-solid fa-phone-volume"></i>
                                                                                    </a>

                                                                                    {{-- View Address Modal --}}
                                                                                    <a href="javascript:void(0);"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#addressModal{{ $plan->id }}"
                                                                                        class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3 me-3">
                                                                                        <i
                                                                                            class="fa-solid fa-location-dot"></i>
                                                                                    </a>

                                                                                    {{-- Edit Modal --}}
                                                                                    <a href="javascript:void(0);"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#editModal{{ $plan->id }}"
                                                                                        class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm rounded-3">
                                                                                        <i
                                                                                            class="fa-solid fa-pen-to-square"></i>
                                                                                    </a>
                                                                                    <a href="{{ route('admin.marketing-plan.destroy', $plan->id) }}"
                                                                                        class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-danger btn-sm rounded-3 delete ms-3">
                                                                                        <i
                                                                                            class="fa-solid fa-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Address Modal -->
                                                <div class="modal fade" id="addressModal{{ $plan->id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="p-4 modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">Contact Details</h3>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-icon btn-active-light-primary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa fa-times fs-2"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-bordered table-hover table-striped fs-4">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th class="p-4 w-200px">Name:</th>
                                                                                <td class="min-w-350px">
                                                                                    {{ $plan->contact_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="p-4 w-200px">Phone:</th>
                                                                                <td class="min-w-350px">
                                                                                    {{ $plan->contact_number }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="p-4 w-200px">Email:</th>
                                                                                <td class="min-w-350px">
                                                                                    {{ $plan->contact_email }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="p-4 w-200px">Address:</th>
                                                                                <td class="min-w-350px">
                                                                                    {{ $plan->contact_address }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="p-4 w-200px">Website:</th>
                                                                                <td class="min-w-350px">
                                                                                    {{ $plan->contact_website }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="p-4 w-200px">Social:</th>
                                                                                <td class="min-w-350px">
                                                                                    {{ $plan->contact_social }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Edit Modal -->
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editModal{{ $plan->id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="p-4 modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Marketing Plan</h5>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-icon btn-active-light-primary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa fa-times fs-2"></i>
                                                                </button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.marketing-plan.update', $plan->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body row">
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Title</label>
                                                                        <input type="text" name="title"
                                                                            class="form-control"
                                                                            value="{{ $plan->title }}">
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Date</label>
                                                                        <input type="date" name="date"
                                                                            class="form-control"
                                                                            value="{{ $plan->date }}">
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Month</label>
                                                                        <select class="form-select repeater-select2"
                                                                            name="month"
                                                                            data-placeholder="Select Type"
                                                                            data-allow-clear="true">
                                                                            @foreach ($months as $month)
                                                                                <option value="{{ $month }}"
                                                                                    @selected(($plan->month ?? '') === $month)>
                                                                                    {{ $month }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Marketing
                                                                            Type</label>
                                                                        <select class="form-select repeater-select2"
                                                                            name="marketing_type"
                                                                            data-placeholder="Select Type"
                                                                            data-allow-clear="true">
                                                                            <option></option>
                                                                            <option value="site_visit"
                                                                                @selected($plan->marketing_type == 'site_visit')>Site Visit
                                                                            </option>
                                                                            <option value="client_visit"
                                                                                @selected($plan->marketing_type == 'client_visit')>Client
                                                                                Visit</option>
                                                                            <option value="telephone"
                                                                                @selected($plan->marketing_type == 'telephone')>Telephone
                                                                            </option>
                                                                            <option value="email"
                                                                                @selected($plan->marketing_type == 'email')>Email
                                                                            </option>
                                                                            <option value="social"
                                                                                @selected($plan->marketing_type == 'social')>Social
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Status</label>
                                                                        <select name="status" class="form-select">
                                                                            <option value="pending"
                                                                                {{ $plan->status == 'pending' ? 'selected' : '' }}>
                                                                                Pending</option>
                                                                            <option value="processing"
                                                                                {{ $plan->status == 'processing' ? 'selected' : '' }}>
                                                                                Processing</option>
                                                                            <option value="done"
                                                                                {{ $plan->status == 'done' ? 'selected' : '' }}>
                                                                                Done</option>
                                                                            <option value="not_done"
                                                                                {{ $plan->status == 'not_done' ? 'selected' : '' }}>
                                                                                Not Done</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Contact Name</label>
                                                                        <input type="text" name="contact_name"
                                                                            class="form-control"
                                                                            value="{{ $plan->contact_name }}">
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Contact
                                                                            Number</label>
                                                                        <input type="text" name="contact_number"
                                                                            class="form-control"
                                                                            value="{{ $plan->contact_number }}">
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Contact Email</label>
                                                                        <input type="email" name="contact_email"
                                                                            class="form-control"
                                                                            value="{{ $plan->contact_email }}">
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Website</label>
                                                                        <textarea class="form-control" name="contact_website" rows="1" placeholder="Website">{{ $plan->contact_website ?? '' }}</textarea>
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Social</label>
                                                                        <textarea class="form-control" name="contact_social" rows="1" placeholder="Social">{{ $plan->contact_social ?? '' }}</textarea>
                                                                    </div>
                                                                    <div class="mb-3 col-md-12">
                                                                        <label class="form-label">Contact
                                                                            Address</label>
                                                                        <textarea class="form-control" name="contact_address" rows="1" placeholder="Address">{{ $plan->contact_address }}</textarea>
                                                                    </div>
                                                                    <div class="mb-3 col-md-12">
                                                                        <label class="form-label">Notes</label>
                                                                        <textarea name="notes" class="form-control">{{ $plan->notes }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="p-4 text-center text-muted">
                                                No {{ $typeLabel }} plans found.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Initialize select2 if not already
                $('#filterMonth').select2();

                // Listen for change event
                $('#filterMonth').on('change', function() {
                    // alert('changed');
                    $('#monthFilterForm').submit();
                });
            });
        </script>

        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const monthFilter = document.getElementById('filterMonth');
                if (monthFilter) {
                    monthFilter.addEventListener('change', function() {
                        document.getElementById('monthFilterForm').submit();
                    });
                }
            });
        </script> --}}


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.status-toggle').forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        const planId = this.dataset.id;
                        const isChecked = this.checked;

                        fetch(`/admin/marketing-plan/${planId}/toggle-status`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    status: isChecked ? 'done' : 'pending'
                                }),
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Failed to update status');
                                }
                                return response.json();
                            })
                            .then(data => {
                                // Optionally update badge class or give visual feedback
                                const row = checkbox.closest('tr');
                                const badge = row.querySelector('[data-kt-element="status"]');
                                if (badge) {
                                    badge.textContent = data.status.charAt(0).toUpperCase() + data
                                        .status.slice(1);
                                    badge.className =
                                        `badge badge-light-${data.status === 'done' ? 'success' : 'primary'}`;
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                alert('Could not update status');
                                // Revert checkbox state
                                this.checked = !isChecked;
                            });
                    });
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
