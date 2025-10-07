{{-- <div class="container">
    <div class="row mb-4 justify-content-center">
        <div class="col-md-3 col-sm-6">
            <label class="form-label fw-semibold">Month</label>
            <select class="form-select" data-control="select2" data-placeholder="Month" name="month" id="filterMonth">
                @foreach ($months as $month)
                    <option value="{{ $month }}" @selected(old('month', now()->format('F')) == $month)>
                        {{ $month }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @php
        $contactTypes = ['Physical', 'Telephone', 'Online Meet', 'Email'];
    @endphp

    @foreach ($contactTypes as $contactType)
        <div class="row mb-6">
            <div class="col-12 mb-3">
                <h5 class="fw-bold">{{ $contactType }}</h5>
            </div>
            @foreach ($sectors as $index => $sector)
                <div class="col-lg-3 col-sm-4 mb-3">
                    <div class="border p-3 rounded bg-light d-flex align-items-center justify-content-between">
                        <label class="form-label fw-semibold">{{ $sector }} :</label>
                        <input type="hidden" name="targets[{{ $contactType }}][{{ $index }}][sector]"
                            value="{{ $sector }}">
                        <input type="number" name="targets[{{ $contactType }}][{{ $index }}][amount]"
                            class="form-control form-control-sm w-100px" min="0" value="0" step="0.01"
                            placeholder="Enter amount">
                    </div>
                </div>
            @endforeach
            <hr class="my-1">
        </div>
    @endforeach
</div> --}}

<div class="container">
    <div class="row mb-4 justify-content-center">
        <div class="col-md-3 col-sm-6">
            <label class="form-label fw-semibold">Month</label>
            <select class="form-select" name="month" id="filterMonth">
                @foreach ($months as $monthItem)
                    <option value="{{ $monthItem }}"
                        {{ old('month', $selectedMonth ?? now()->format('F')) == $monthItem ? 'selected' : '' }}>
                        {{ $monthItem }}
                    </option>
                @endforeach
            </select>
            @error('month')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
    </div>

    @php
        $contactTypes = ['Physical', 'Telephone', 'Online Meet', 'Email'];
    @endphp

    @foreach ($contactTypes as $contactType)
        <div class="row mb-6">
            <div class="col-12 mb-3">
                <h5 class="fw-bold">{{ $contactType }}</h5>
            </div>

            @foreach ($sectors as $index => $sector)
                @php
                    $inputName = "targets[$contactType][$index][amount]";
                    $existingAmount = old(
                        "targets.$contactType.$index.amount",
                        $existingTargets[$contactType][$sector] ?? 0,
                    );
                @endphp

                <div class="col-lg-3 col-sm-6 mb-3">
                    <div class="border p-3 rounded bg-light d-flex align-items-center justify-content-between">
                        <label class="form-label fw-semibold mb-0 me-2">{{ $sector }}:</label>
                        <input type="hidden" name="targets[{{ $contactType }}][{{ $index }}][sector]"
                            value="{{ $sector }}">
                        <input type="number" name="targets[{{ $contactType }}][{{ $index }}][amount]"
                            class="form-control form-control-sm w-100px @error("targets.$contactType.$index.amount") is-invalid @enderror"
                            min="0" value="{{ $existingAmount }}" step="0.01" placeholder="0.00">
                    </div>
                    @error("targets.$contactType.$index.amount")
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <hr class="my-1">
        </div>
    @endforeach
</div>
