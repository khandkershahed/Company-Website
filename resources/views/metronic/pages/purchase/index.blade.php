<x-admin-app-layout :title="'Purchase List'">
    <div class="card card-flash">
        <div class="card-header py-2">
            <h2 class="mb-0 card-title">Purchase List</h2>
            <a href="{{ route('purchase.create') }}" class="btn btn-light-success d-flex align-items-center rounded-pill">
                <i class="fas fa-plus"></i>
                Create Purchase
            </a>
        </div>
        <div class="card-body">
            <!-- Month Selector -->
            <div class="container my-4">
                <div class="mb-3 text-center">
                    <label for="monthSelect" class="form-label fw-bold" style="color: #247297;">Select Month</label>
                    <select class="form-select w-auto mx-auto" id="monthSelect">
                        @foreach ($months as $month)
                            <option value="{{ $month }}">{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Shared Table -->
                <div class="table-responsive">
                    <table class="table dataTable table-bordered border table-striped text-center">
                        <thead>
                            <tr class="text-small">
                                <th style="width:5%;">ID</th>
                                <th style="width:13%;">RFQ Code</th>
                                <th style="width:10%;">PQ Reference</th>
                                <th style="width:15%;">PO Reference</th>
                                <th style="width:30%;">Principal Name</th>
                                <th style="width:15%;">Amount</th>
                                <th style="width:12%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $key => $purchase)
                                <tr data-month="{{ $purchase->created_at->format('F') }}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ App\Models\Admin\Rfq::where('id', $purchase->rfq_id)->value('rfq_code') }}
                                    </td>
                                    <td>{{ $purchase->pq_reference }}</td>
                                    <td>{{ $purchase->po_reference }}</td>
                                    <td>{{ $purchase->principal_name }}</td>
                                    <td>{{ $purchase->total }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('purchase.show', [$purchase->id]) }}" class="text-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('purchase.edit', [$purchase->id]) }}" class="text-primary">
                                            <i class="fa-solid fa-pen-to-square ms-1 rounded-circle text-primary"></i>
                                        </a>
                                        <a href="{{ route('purchase.destroy', [$purchase->id]) }}"
                                            class="text-danger delete">
                                            <i class="fa-solid fa-trash p-1 rounded-circle text-danger delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="no-data">
                                    <td colspan="12" class="text-center">Data not available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const monthSelect = document.getElementById("monthSelect");
                const rows = document.querySelectorAll("tbody tr[data-month]");
                const noDataRow = document.querySelector("tr.no-data");

                // Get current month name (e.g., "October")
                const currentMonth = new Date().toLocaleString('default', {
                    month: 'long'
                });

                // Set current month as selected
                monthSelect.value = currentMonth;

                function filterRows(month) {
                    let visible = 0;
                    rows.forEach(row => {
                        if (row.getAttribute("data-month") === month) {
                            row.style.display = "";
                            visible++;
                        } else {
                            row.style.display = "none";
                        }
                    });

                    if (noDataRow) {
                        noDataRow.style.display = visible === 0 ? "" : "none";
                    }
                }

                // Initial filter for current month
                filterRows(currentMonth);

                // Update on change
                monthSelect.addEventListener("change", function() {
                    filterRows(this.value);
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
