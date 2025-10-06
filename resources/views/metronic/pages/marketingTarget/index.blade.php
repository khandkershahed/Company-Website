<x-admin-app-layout :title="'Marketing DMAR Target'">
    <div class="px-0 container-fluid">
        <div class="mb-5 row">
            <div class="col">
                <div class="shadow-none card card-flush card-rounded ">
                    <div class="d-flex justify-content-center align-items-center h-140px">
                        <div>
                            <img class="img-fluid rounded-circle h-100px w-100px" style="border: 2px solid #296088;"
                                src="https://picsum.photos/id/1/200/300" alt="">
                        </div>
                        <div class="p-8 me-3 text-start">
                            <p class="mb-1 text-black fw-bold" style="font-size: 16px;">Esther Howard</p>
                            <p class="mb-0 text-muted" style="font-size: 16px;">Sales Manager</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded ">
                    <div class="d-flex justify-content-center align-items-center h-140px">
                        <div class="p-8 me-3 text-start ">
                            <p class="mb-0 optional-color" style="font-size: 28px;">Marketing Target</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded ">
                    <div class="px-15 d-flex justify-content-between align-items-center h-140px">
                        <div>
                            <p class="mb-0 optional-color" style="font-size: 28px;"><span class="text-muted">Year</span>
                                {{ date('Y') }}</p>
                        </div>
                        <div class="p-8 text-start pe-0">
                            <p class="mb-2 text-black">Check Monthly Information</p>
                            <div>
                                <select class="form-select form-select-sm" data-control="select2"
                                    data-placeholder="Month" name="month" id="filterMonth">
                                    {{-- <option value="{{ \Carbon\Carbon::now()->format('F') }}">
                                        {{ \Carbon\Carbon::now()->format('F') }}
                                    </option> --}}
                                    @foreach ($months as $month)
                                        <option value="{{ $month }}" @selected(\Carbon\Carbon::now()->format('F') === $month)>{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="shadow-none card card-flush card-rounded ">
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
                                    <tr class="border-bottom">
                                        <td class="text-start ps-3">January</td>
                                        <td class="text-end pe-3">70,000$</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="text-start ps-3">January</td>
                                        <td class="text-end pe-3">70,000$</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="text-start ps-3">January</td>
                                        <td class="text-end pe-3">70,000$</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="text-start ps-3">January</td>
                                        <td class="text-end pe-3">70,000$</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="px-3 mx-10 mt-10 card-header align-items-center bg-light">
                        <div class="justify-content-between align-items-center d-flex w-100">
                            <p class="py-0 mb-0 w-100 bg-light" style="font-size: 16px;">{{ $month }} </p>
                            <a class="bg-white btn btn-sm btn-light w-150px " href="/super-admin/marketing-plan">
                                Marketing Plan <i class="ms-2 fa-solid fa-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                    <div class="py-4 card-body">
                        <div class="table-responsive rounded-3">
                            <table class="table border table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="fw-bold ps-3">January</th>
                                        <th class="fw-bold">Banks</th>
                                        <th class="fw-bold">Group of Companies</th>
                                        <th class="fw-bold">Small &amp; Medium</th>
                                        <th class="fw-bold">NGOs</th>
                                        <th class="fw-bold">Government</th>
                                        <th class="fw-bold">Education</th>
                                        <th class="fw-bold">Enterprises</th>
                                        <th class="fw-bold">Garments</th>
                                        <th class="fw-bold">Manufacturing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td class="ps-3 text-start">Physical ( 38 )</td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">10</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">2</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">2</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="ps-3 text-start">Telephone ( 83 )</td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">10</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">2</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">2</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="ps-3 text-start">
                                            Online Meet ( 19 )
                                        </td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">10</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">2</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">2</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="ps-3 text-start">Email ( 125 )</td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">4</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">10</td>
                                        <td class="ps-3">5</td>
                                        <td class="ps-3">2</td>
                                        <td class="ps-3">3</td>
                                        <td class="ps-3">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-admin-app-layout>
