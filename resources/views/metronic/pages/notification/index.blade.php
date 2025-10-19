<x-admin-app-layout :title="'All Notifications'">

    <div class="mb-4 row">
        {{-- Summary Cards --}}
        <div class="col-md-3 col-sm-6">
            <div class="p-10 bg-white border shadow-sm card position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <h6 class="fw-semibold text-primary">Total Notifications</h6>
                        <small class="text-muted">All-time records</small>
                    </div>
                    <div class="position-relative">
                        <div class="p-3 rounded-circle bg-primary bg-opacity-10 d-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                            <h1 class="mb-0 fw-bold text-primary">{{ $notifications->count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="p-10 bg-white border shadow-sm card position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <h6 class="fw-semibold text-success">This Month</h6>
                        <small class="text-muted">Notifications in {{ now()->format('F') }}</small>
                    </div>
                    <div class="position-relative">
                        <div class="p-3 rounded-circle bg-success bg-opacity-10 d-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                            <h3 class="mb-0 fw-bold text-success">{{ $notifications->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="p-10 bg-white border shadow-sm card position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <h6 class="fw-semibold text-warning">This Year</h6>
                        <small class="text-muted">Yearly total ({{ now()->year }})</small>
                    </div>
                    <div class="position-relative">
                        <div class="p-3 rounded-circle bg-warning bg-opacity-10 d-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                            <h3 class="mb-0 fw-bold text-warning">{{ $notifications->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()])->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="p-10 bg-white border shadow-sm card position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <h6 class="fw-semibold text-danger">Unread</h6>
                        <small class="text-muted">Pending attention</small>
                    </div>
                    <div class="position-relative">
                        <div class="p-3 rounded-circle bg-danger bg-opacity-10 d-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                            <h3 class="mb-0 fw-bold text-danger">{{ $notifications->whereNull('read_at')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Notifications Table --}}
    <div class="card card-flush">
        <div class="p-5 bg-white card-header d-flex justify-content-between align-items-center">
            <h3 class="text-black card-title">All Notifications ({{ $notifications->count() }})</h3>
            <div class="gap-2 d-flex">
                <a href="{{ route('notification.create') }}" class="btn btn-sm btn-success">
                    <i class="fa-solid fa-plus me-1"></i> Add
                </a>
                <button id="deleteSelected" class="btn btn-sm btn-danger" style="display:none;">
                    <i class="fa-solid fa-trash me-1"></i> Delete Selected
                </button>
            </div>
        </div>

        <div class="pt-0 card-body">
            <div class="table-responsive">
                <table id="notificationTable" class="table text-center align-middle border dataTable table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th width="5%">
                                <input type="checkbox" id="selectAll" class="form-check-input" />
                            </th>
                            <th width="20%" class="text-start">Name</th>
                            <th width="35%" class="text-start">Message</th>
                            <th width="15%" class="text-start">Created At</th>
                            <th width="15%" class="text-start">Extra Data</th>
                            <th width="10%" class="text-center">Actions</th>
                            {{-- Optional extra column example --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notifications as $notification)
                        @php $data = json_decode($notification->data, true); @endphp
                        <tr style="border-bottom: 1px solid #e7e7e7;">
                            <td>
                                <input type="checkbox" class="row-checkbox form-check-input" value="{{ $notification->id }}" />
                            </td>
                            <td class="text-start">{{ $data['name'] ?? 'N/A' }}</td>
                            <td class="text-start">
                                @if (isset($data['message1']))
                                <span class="{{ $notification->read_at ? '' : 'text-danger fw-semibold' }}">
                                    {{ $data['name'] ?? '' }} {{ $data['message1'] ?? '' }}
                                    <a href="{{ $data['link'] ?? '#' }}" data-id="{{ $notification->id }}" class="fw-semibold mark-as-read">
                                        {{ $data['message2'] ?? '' }}
                                    </a>
                                </span>
                                @endif
                            </td>
                            <td class="text-start">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</td>
                            {{-- Extra Data column example --}}
                            <td class="text-start">
                            {{ \Carbon\Carbon::parse($notification->created_at)->format('d M Y, h:i A') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('notification.destroy', $notification->id) }}" class="text-danger delete">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No notifications found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Optional CSS --}}
    <style>
        #notificationTable td.text-start {
            word-break: break-word;
            white-space: normal;
        }

        .rounded-circle h3 {
            position: relative;
            z-index: 2;
        }

        .rounded-circle::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.3), transparent);
            z-index: 1;
        }
    </style>

    @push('scripts')
    <script>
        $(document).ready(function() {
            const selectAll = $('#selectAll');
            const deleteSelected = $('#deleteSelected');

            // Toggle all row checkboxes
            selectAll.on('change', function() {
                const isChecked = $(this).is(':checked');
                $('.row-checkbox').prop('checked', isChecked);
                toggleDeleteButton();
            });

            // Toggle delete button when any row checkbox changes
            $(document).on('change', '.row-checkbox', function() {
                const total = $('.row-checkbox').length;
                const checked = $('.row-checkbox:checked').length;

                selectAll.prop('checked', total === checked);
                toggleDeleteButton();
            });

            // Show/hide delete button
            function toggleDeleteButton() {
                const count = $('.row-checkbox:checked').length;
                deleteSelected.toggle(count > 0);
            }

            // Delete Selected
            deleteSelected.on('click', function() {
                const selectedIds = $('.row-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedIds.length === 0) return;

                Swal.fire({
                    title: `Delete ${selectedIds.length} notifications?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete",
                    cancelButtonText: "Cancel",
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('notifiy.multi-delete') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: selectedIds
                            },
                            success: function() {
                                Swal.fire("Deleted!", "Notifications deleted successfully.", "success");
                                $('.row-checkbox:checked').closest('tr').fadeOut(300, function() {
                                    $(this).remove();
                                    toggleDeleteButton();
                                });
                                selectAll.prop('checked', false);
                            },
                            error: function() {
                                Swal.fire("Error", "Something went wrong. Try again.", "error");
                            }
                        });
                    }
                });
            });
        });
    </script>
    @endpush

</x-admin-app-layout>