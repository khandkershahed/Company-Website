{{-- Pending RFQs --}}
<div class="tab-pane fade {{ empty($tab_status) || $tab_status == 'pending' ? 'show active' : '' }}" id="pending"
    role="tabpanel">
    <div class="row">
        <div class="col-lg-5 ps-0">
            <div class="card">
                <div class="card-body px-5 pt-3">
                    <div class="rfq-scroll">
                        <ul class="nav nav-tabs nav-pills flex-column border-0">
                            @foreach ($rfqs as $rfq)
                                <x-rfq-card :rfq="$rfq" :active="$loop->first" tab="pending" />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 pe-0">
            <div class="card border-0">
                <div class="card-body p-5">
                    <div class="tab-content border-0 rounded" style="height: 630px; overflow-x: hidden !important;">
                        @include('metronic.pages.rfq.partials.pending_rfq')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Quoted RFQs --}}
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'quoted' ? 'show active' : '' }}" id="quoted"
    role="tabpanel">
    @if ($quoteds->count() > 0)
        <div class="row">
            <div class="col-lg-5 ps-0">
                <div class="card border-0 rounded-3">
                    <div class="card-body px-5 pt-0">
                        <div class="overflow-scroll" style="height: 630px;">
                            <ul class="nav nav-tabs nav-pills border-0">
                                @foreach ($quoteds as $rfq)
                                    <x-rfq-card :rfq="$rfq" :active="$loop->first" tab="quoted" />
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pe-0">
                <div class="card border-0 rounded-3">
                    <div class="card-body">
                        <div class="overflow-scroll" style="height: 700px; overflow-x: hidden !important;">
                            <div class="tab-content border-0 rounded" id="myTabContent">
                                @include('metronic.pages.rfq.partials.quoted_rfq')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <strong>No RFQs have been quoted yet.</strong>
                </div>
            </div>
        </div>
    @endif
</div>

{{-- Lost RFQs --}}
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'lost' ? 'show active' : '' }}" id="failed"
    role="tabpanel">
    <div class="row">
        <div class="card shadow-sm">
            <div class="card-body">
                @if ($losts->count() > 0)
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="card overflow-scroll" style="height: 700px;">
                                <ul class="nav nav-tabs nav-pills border-0">
                                    {{-- Filter Bar --}}
                                    <li class="nav-item w-100 me-0 mb-md-2">
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <select
                                                    class="form-select form-select-sm py-4 me-2 rounded-3 filterCountry"
                                                    data-control="select2" data-allow-clear="true"
                                                    data-enable-filtering="true" id="filterCountry" name="country">
                                                    <option value="">All Country</option>
                                                    @foreach ($countryWiseRfqs as $country)
                                                        <option value="{{ $country->country }}">{{ $country->country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="me-2">
                                                <select
                                                    class="form-select form-select-sm py-4 me-2 rounded-3 filterSalesman"
                                                    data-control="select2" data-allow-clear="true"
                                                    data-enable-filtering="true">
                                                    <option value="">All Salesman</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="me-2">
                                                <select
                                                    class="form-select form-select-sm py-4 me-2 rounded-3 filterCompany"
                                                    data-control="select2" data-allow-clear="true"
                                                    data-enable-filtering="true" id="filterCompany" name="company">
                                                    <option value="">All Company</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company }}">{{ $company }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="me-2">
                                                <div class="d-flex align-items-center position-relative me-2">
                                                    <i
                                                        class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                                    <input type="text" id="searchQuery"
                                                        class="form-control fs-7 ps-12 searchQuery"
                                                        placeholder="Search" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    {{-- RFQ Cards --}}
                                    @foreach ($losts as $rfq)
                                        <x-rfq-card :rfq="$rfq" :active="$loop->first" tab="lost" />
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="card overflow-scroll" style="height: 700px; overflow-x: hidden !important;">
                                <div class="tab-content border-0 rounded" id="myTabContent">
                                    @include('metronic.pages.rfq.partials.lost_rfq')
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="alert alert-info">
                                <strong>No RFQs have been lost yet.</strong>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
