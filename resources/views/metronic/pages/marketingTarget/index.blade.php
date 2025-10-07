<x-admin-app-layout :title="'Marketing Target'">
    <div class="px-0 container-fluid">
        <div class="mb-5 row">
            <!-- Left profile card -->
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="card card-flush card-rounded shadow-none">
                    <div class="d-flex flex-stack justify-content-center align-items-center h-140px">
                        <div>
                            <img class="img-fluid rounded-circle h-100px w-100px" style="border: 2px solid #296088;"
                                src="{{ asset('https://ui-avatars.com/api/?name=' . urlencode($user->name)) }}"
                                alt="">
                        </div>
                        <div class="p-8 me-3 text-start">
                            <h4 class="text-black">{{ $user->name }}</h4>
                            <p class="mb-0 text-muted">{{ $user->designation ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center card -->
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="card card-flush card-rounded shadow-none">
                    <div class="d-flex justify-content-center align-items-center h-140px">
                        <div class="p-8 text-start">
                            <p class="mb-0 optional-color" style="font-size: 28px;">Marketing Target</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right card: Year & Month selector -->
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="card card-flush card-rounded shadow-none">
                    <div class="px-15 d-flex justify-content-between align-items-center h-140px">
                        <div>
                            <p class="mb-0 optional-color" style="font-size: 28px;">
                                <span class="text-muted">Year</span> {{ $year }}
                            </p>
                        </div>
                        <div class="p-8 text-start pe-0">
                            <p class="mb-2 text-black">Check Monthly Information</p>
                            <div>
                                <form method="GET" action="{{ route('admin.marketing-target.index') }}">
                                    <select class="form-select form-select-sm" name="month"
                                        onchange="this.form.submit()" data-control="select2" data-allow-clear="true">
                                        @foreach ($months as $m)
                                            <option value="{{ $m }}"
                                                {{ $selectedMonth == $m ? 'selected' : '' }}>
                                                {{ $m }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left: Monthly Sales stub -->
            <div class="col-lg-3">
                <div class="card card-flush card-rounded shadow-none">
                    <div class="px-3 mx-10 mt-10 card-header align-items-center bg-light">
                        <p class="py-2 mb-0 w-100 bg-light ps-5" style="font-size: 16px;">Monthly Sales</p>
                    </div>
                    <div class="py-4 card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center border-bottom">
                                    <tr>
                                        <th class="text-start fw-bold ps-3">Month</th>
                                        <th class="text-end fw-bold pe-3">Total Sale</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    {{-- Example: You could loop actual sales data --}}
                                    <tr class="border-bottom">
                                        <td class="text-start ps-3">{{ $selectedMonth }}</td>
                                        <td class="text-end pe-3">
                                            {{ number_format($targetsStructured['total_sale'] ?? 0, 0) }}৳</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Target table + Edit button -->
            <div class="col-lg-9">
                @forelse ($groupedTargets as $target)
                    <div class="card card-flush card-rounded mb-6">
                        <div class="card-header bg-secondary">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <p class="mb-0">{{ $selectedMonth }} Targets —
                                    <strong>{{ $target['name'] }}</strong>
                                </p>

                                @if (Auth::user()->role === 'admin')
                                    <a class="btn btn-sm btn-light"
                                        href="{{ route('admin.marketing-target.edit-month', [$target['user_id'], ($selectedMonth ?? now()->format('F'))]) }}">
                                        <i class="fas fa-pen-to-square fs-4"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="table-responsive rounded-3">
                                <table class="table border table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th class="fw-bold ps-3">{{ $selectedMonth }}</th>
                                            @foreach (['Banks', 'Group of Companies', 'Small & Medium', 'NGOs', 'Government', 'Education', 'Enterprises', 'Garments', 'Manufacturing'] as $sector)
                                                <th class="fw-bold">{{ $sector }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (['Physical', 'Telephone', 'Online Meet', 'Email'] as $ct)
                                            <tr class="text-center">
                                                <td class="ps-3 text-start">
                                                    {{ $ct }}
                                                    ({{ array_sum($target['targets'][$ct] ?? []) }})
                                                </td>

                                                @foreach (['Banks', 'Group of Companies', 'Small & Medium', 'NGOs', 'Government', 'Education', 'Enterprises', 'Garments', 'Manufacturing'] as $sector)
                                                    <td class="ps-3">
                                                        {{ $target['targets'][$ct][$sector] ?? 0 }}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card card-flush card-rounded mb-6">
                        <div class="card-body bg-secondary">
                            <div class="row text-center">
                                <h4 class="text-center">
                                    No Data Found
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforelse



            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // You could add AJAX month switching, etc.
        </script>
    @endpush
</x-admin-app-layout>
