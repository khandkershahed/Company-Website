<x-admin-app-layout :title="'All Notiufications'">
    <div class="card card-flush">
        <div class="card-header bg-light-primary align-items-center">
            <h3 class="card-title text-black">All Notifications ({{ $notifications->count() }})</h3>
            <div>
                <a href="{{ route('notification.create') }}" class="btn btn-sm btn-success">
                    <div class="d-flex align-items-center">
                        <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Add Solution Details">
                            <i class="ph-plus icons_design"></i> </span>
                        <span class="ms-1 " style="color: #247297;">Add</span>
                    </div>
                </a>
                <a href="javascript:void(0);" id="delete-selected-records"
                    class="btn btn-sm btn-delete">
                    <div class="d-flex align-items-center">
                        <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Add Solution Details">
                            <i class="fa-solid fa-trash text-danger icons_design" style="font-size: 14px;"></i>
                        </span>
                        <span class="ms-1 " style="color: #247297;">Delete All</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th width="10%">
                                <input id="select-all-checkbox" type="checkbox" class="form-check-input">
                            </th>
                            <th width="25%">Name</th>
                            <th width="40%">Message</th>
                            <th width="15%">Created Time</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                            @php
                                $notificationObject = json_decode($notification->data, true);
                                // $notificationObject = cache()->remember("notification.{$notification->id}", now()->addHour(), function () use ($notification) {
                                //     return json_decode($notification->data, true);
                                // });
                                //dd($notificationObject['link']);
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="id[]" class="form-check-input"
                                        value="{{ $notification->id }}" />
                                </td>
                                <td>{{ $notificationObject['name'] }}</td>
                                <td>
                                    @if (isset($notificationObject['message1']))
                                        @if (!empty($notification->read_at))
                                            <span>
                                                {{ $notificationObject['name'] }}
                                                {{ $notificationObject['message1'] }}
                                                <a href="{{ $notificationObject['link'] }}"
                                                    data-id="{{ $notification->id }}" class="fw-semibold mark-as-read">
                                                    {{ $notificationObject['message2'] }}
                                            </span>
                                        @else
                                            <span class="text-danger">
                                                {{ $notificationObject['name'] }}
                                                {{ $notificationObject['message1'] }}
                                                <a href="{{ $notificationObject['link'] }}"
                                                    data-id="{{ $notification->id }}" class="fw-semibold mark-as-read">
                                                    {{ $notificationObject['message2'] }}
                                            </span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('notification.destroy', [$notification->id]) }}"
                                        class="text-danger delete mx-2">
                                        <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @push('scripts')
            {{-- <script type="text/javascript">
                $('.newsLetterDt').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 10,
                    "lengthMenu": [10, 25, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 4],
                    }, ],
                });
            </script> --}}
            <script type="text/javascript">
                const selectAllCheckbox = $('#select-all-checkbox');
                const tableBody = $('#notificationTable tbody');

                // Instead of selecting all the checkboxes again and again, we can cache them and reuse the selection.
                const allCheckboxes = $('input[type="checkbox"]');

                // Simplify click event handler since we already have cached all checkboxes.
                selectAllCheckbox.on('click', function() {
                    allCheckboxes.prop('checked', this.checked);
                });

                // Change to document instead of table body to simplify the code & reduce operations.
                $(document).on('change', 'input[type="checkbox"]', function() {
                    if (this.checked) {
                        // Check if all checkboxes are checked or not, update selectAllCheckbox accordingly.
                        if (allCheckboxes.not(':checked').length === 0) {
                            selectAllCheckbox.prop('checked', true);
                        } else {
                            selectAllCheckbox.prop('checked', false);
                        }
                    } else {
                        // If any checkbox is unchecked, uncheck selectAllCheckbox.
                        selectAllCheckbox.prop('checked', false);
                    }

                    // check if any checkbox is unchecked after checking selectAllCheckbox and set indeterminate state accordingly.
                    if (!this.checked && selectAllCheckbox.prop('checked') && ('indeterminate' in selectAllCheckbox[0])) {
                        selectAllCheckbox.prop('indeterminate', true);
                    }
                });

                $('#delete-selected-records').on('click', function() {
                    const id = [];
                    $('input[name="id[]"]:checked').each(function() {
                        id.push($(this).val());
                    });
                    if (id.length > 0) {
                        const url = "{{ route('notifiy.multi-delete') }}";
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                '_token': "{{ csrf_token() }}",
                                'id': id
                            },
                            success: function(data) {
                                swalInit.fire({
                                    title: "Deleted!",
                                    text: "This data has been deleted!",
                                    confirmButtonColor: "#66BB6A",
                                    icon: "success",
                                    type: "success",
                                    preConfirm: function() {
                                        location.reload();
                                    },
                                });
                            },
                            error: function() {
                                swalInit.fire({
                                    title: "Error",
                                    icon: 'error',
                                    text: "Please refresh your form & try again",
                                    icon: "error",
                                    allowEscapeKey: false,
                                    allowEnterKey: false,
                                });
                            },
                        });
                    } else {
                        swalInit.fire({
                            icon: 'warning',
                            title: "Oops...",
                            text: "Please select at least one record to delete.",
                            confirmButtonColor: "#66BB6A",
                            timer: 150000
                        })
                    }
                });
            </script>
        @endpush
</x-admin-app-layout>
