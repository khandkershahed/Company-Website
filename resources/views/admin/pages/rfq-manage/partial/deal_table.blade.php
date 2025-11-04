<style>
    /* Styling for the divider text */
    .devider-text {
        position: relative;
        bottom: -10px;
        background: #247297;
        z-index: 9;
        width: 15%;
        color: white;
        border-radius: 3px;
        left: 25px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
</style>
<!-- RFQ DataTable -->
<table class="rfqDT2 table table-bordered table-hover text-center">
    <thead>
        <tr>
            <th width="19%">RFQ Code</th>
            <th width="15%">Created At</th>
            <th width="30%">Client Name (Company)</th>
            {{-- <th width="20%">Client Email</th> --}}
            <th width="3%">Details</th>
            <th width="8%">Status</th>
            <th width="25%" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($deals)
            @foreach ($deals as $key => $deal)
                <tr class="text-center">
                    <td>{{ ucfirst($deal->rfq_code) }}</td>
                    <td>{{ ucfirst($deal->create_date) }}</td>
                    <td>{{ ucfirst($deal->name) }} ({{ ucfirst($deal->company_name) }})</td>
                    {{-- <td style="text-transform: lowercase;">{{ ucfirst($deal->email) }}</td> --}}
                    <td>
                        <span class="text-primary"
                            style="text-transform: capitalize">{{ ucfirst($deal->status) }}</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="text-info mx-2" title="Show Deal" data-bs-toggle="modal"
                            data-bs-target="#show-deals-{{ $deal->rfq_code }}">
                            <i class="fa-regular fa-eye dash-icons"></i>
                        </a>
                        <!---Category Update modal--->

                    </td>
                    <td>
                        <a href="{{ route('admin.single-rfq.show', $deal->rfq_code) }}" class="text-success"
                            title="Go to Details">
                            <i class="fa-solid fa-display text-info dash-icons me-2"></i>
                        </a>
                        <a href="{{ route('deal.edit', $deal->id) }}" class="text-success" title="Deal Edit">
                            <i class="fa-solid fa-file-pen dash-icons me-2"></i>
                        </a>

                        @if ($deal->status == 'rfq_created')
                            <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal"
                                title="View & Assign Sales Manager"
                                data-bs-target="#assign-manager-{{ $deal->rfq_code }}">
                                <i class="fa-solid fa-user-plus  dash-icons me-2"></i>
                            </a>
                        @endif

                        @if ($deal->status == 'assigned')
                            <a href="{{ route('deal.convert', [$deal->id]) }}" class="text-success"
                                title="Convert To Deal">
                                <i class="icon-pen-plus dash-icons me-2"></i>
                            </a>
                        @endif
                        @if ($deal->status == 'deal_created')
                            <a href="{{ route('deal-sas.show', $deal->rfq_code) }}" class="text-success"
                                title="Create SAS">
                                <i class="fa-solid fa-file-circle-plus text-primary dash-icons me-2"></i>
                            </a>
                        @endif
                        @if ($deal->status == 'sas_created')
                            <a href="{{ route('deal-sas.edit', $deal->rfq_code) }}" class="text-info">
                                <i class="fa-solid fa-file-pen dash-icons me-2"></i>
                            </a>
                            <a href="{{ route('dealsasapprove', $deal->rfq_code) }}" class="text-warning">
                                <i class="fa-solid fa-circle-check dash-icons me-2"></i>
                            </a>
                        @endif
                        @if ($deal->status == 'sas_approved')
                            <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal"
                                title="Send Quotation" data-bs-target="#quotation-send-{{ $deal->rfq_code }}">
                                <i class="fa-regular fa-circle-check dash-icons me-2"></i>
                            </a>
                        @endif
                        <a href="{{ route('rfq.destroy', [$deal->id]) }}" class="text-danger delete" title="Delete Deal">
                            <i class="delete fa-solid fa-trash dash-icons me-2"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@foreach ($deals as $key => $deal)
    <div id="show-deals-{{ $deal->rfq_code }}" class="modal fade" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Deal Details : {{ $deal->rfq_code }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>


                <div class="modal-body border br-7">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="devider-text mb-0 p-2 pt-0">Client Detils</p>
                            <div class="border card rounded-0">
                                <div class="row mt-1">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <p class="p-2 m-0 text-start">
                                            <span class="text-secondary">Client Type :</span> <br>
                                            {{ ucfirst($deal->client_type) }}
                                        </p>
                                        <p class="p-2 m-0 text-start">
                                            <span class="text-secondary">Name :</span> <br>
                                            {{ ucfirst($deal->name) }}
                                        </p>
                                        <p class="p-2 m-0 text-start">
                                            <span class="text-secondary">Company Name :</span> <br>
                                            {{ ucfirst($deal->company_name) }}
                                        </p>
                                        <p class="p-2 m-0 text-start">
                                            <span class="text-secondary">Phone Number : </span> <br>
                                            {{ $deal->phone }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p class="devider-text mb-0 p-2 pt-0">RFQ Details</p>
                            <div class="border card rounded-0">
                                <div class="row mt-1 px-0 pt-2">
                                    <div class="col-lg-12">
                                        <div class="table-responsive p-2">
                                            <table class="table table-bordered table-striped p-1">
                                                <thead
                                                    style="background-color: #2472979e !important;color: white !important;">
                                                    @if ($deal->rfqProducts->count() > 0)
                                                        <tr>
                                                            <th class="p-1"> Product Name</th>
                                                            <th class="p-1"> Quantity </th>
                                                        </tr>

                                                        @foreach ($deal->rfqProducts as $product)
                                                            <tr class="text-black bg-white">
                                                                <td>{{ $product->product_name }}</td>
                                                                <td>{{ $product->qty }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="row py-3 px-3">
                                            <div class="col-lg-4 text-start">
                                                <p class="p-0 m-0 text-secondary">Asking Quantity : </p>
                                                @if ($deal->rfqProducts->sum('qty') > 0)
                                                    {{ $deal->rfqProducts->sum('qty') }}
                                                @else
                                                    {{ $deal->qty }}
                                                @endif
                                            </div>
                                            @if (!empty(App\Models\Admin\DealSas::where('rfq_id', $deal->id)->value('grand_total')))
                                                <div class="col-lg-4 text-start">
                                                    <p class="p-0 m-0 text-secondary"> Total Price : $ </p>
                                                    {{ App\Models\Admin\DealSas::where('rfq_id', $deal->id)->value('grand_total') }}
                                                </div>
                                            @endif
                                            <div class="col-lg-4 text-start">
                                                <p class="p-0 m-0 text-secondary">Status : </p>
                                                <span class="text-success p-1">{{ ucfirst($deal->status) }}</span>
                                            </div>
                                        </div>
                                        <div class="row pb-3 px-3">
                                            <div class="col-lg-4 text-start">
                                                <p class="p-0 m-0 text-secondary">Assigned Sales Manager (L1) :</p>
                                                {{ App\Models\User::where('id', $deal->sales_man_id_L1)->value('name') }}


                                            </div>
                                            <div class="col-lg-4 text-start">
                                                @if ($deal->sales_man_id_T1)
                                                    <p class="p-0 m-0 text-secondary">Assigned Sales Manager (T1) :</p>
                                                    {{ App\Models\User::where('id', $deal->sales_man_id_T1)->value('name') }}
                                                @endif
                                            </div>
                                            <div class="col-lg-4 text-start">
                                                @if ($deal->sales_man_id_T2)
                                                    <p class="p-0 m-0 text-secondary"> Assigned Sales Manager (T2) :
                                                    </p>
                                                    {{ App\Models\User::where('id', $deal->sales_man_id_T2)->value('name') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---Assign Manager modal--->
    <div id="assign-manager-{{ $deal->rfq_code }}" class="modal fade" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Assign Sales Manager For RFQ No :
                        {{ $deal->rfq_code }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body border br-7">

                    <form method="post" action="{{ route('assign.salesman', $deal->rfq_code) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="card">
                                <div class="row">
                                    <table class="table table-bordered table-striped p-1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Client Type :
                                                    {{ ucfirst($deal->client_type) }}
                                                </th>
                                                <th>
                                                    Name : {{ ucfirst($deal->name) }}
                                                </th>
                                                <th>
                                                    Company Name :
                                                    {{ ucfirst($deal->company_name) }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="3" style="background: #7e7d7c">
                                                    <p class="text-center pt-1 text-white">Product
                                                        Name :
                                                        {{ App\Models\Admin\Product::where('id', $deal->product_id)->value('name') }}
                                                    </p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Asking Quantity : {{ $deal->qty }}</th>
                                                <th>Phone Number : {{ $deal->phone }}</th>
                                                <th>
                                                    @if ($deal->call == 1)
                                                        Need To be Called.
                                                    @else
                                                    @endif
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="row p-2">
                                    <div class="col-12">
                                        Assign Sales Manager :
                                        <a class="p-1 editRfquser" href="javascript:void(0);">
                                            <i class="ph-note-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-12 Rfquser" style="display:none">
                                        <div class="row mb-3 p-2 border">
                                            <div class="col-12">
                                                <h5 class="text-center">Assigned Sales Manager</h5>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="col-sm-12">
                                                    <p class="mb-0">Sales Manager Name (Leader -
                                                        L1) <span class="text-danger">*</span></p>
                                                </div>
                                                <div class="form-group text-secondary col-sm-12">
                                                    <select name="sales_man_id_L1" class="form-control select"
                                                        data-minimum-results-for-search="Infinity"
                                                        data-placeholder="Choose  ">
                                                        <option></option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="col-sm-12">
                                                    <p class="mb-0">Sales Manager Name (Team -
                                                        T1)</p>
                                                </div>
                                                <div class="form-group text-secondary col-sm-12">
                                                    <select name="sales_man_id_T1" class="form-control select"
                                                        data-minimum-results-for-search="Infinity"
                                                        data-placeholder="Choose  ">
                                                        <option></option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="col-sm-12">
                                                    <p class="mb-0">Sales Manager Name (Team -
                                                        T2)</p>
                                                </div>
                                                <div class="form-group text-secondary col-sm-12">
                                                    <select name="sales_man_id_T2" class="form-control select"
                                                        data-minimum-results-for-search="Infinity"
                                                        data-placeholder="Choose ">
                                                        <option></option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
    <!---Assign Manager modal--->
    <!---Send Quotation modal--->
    <div id="quotation-send-{{ $deal->rfq_code }}" class="modal fade" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Send Quotation : {{ $deal->rfq_code }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body border br-7">

                    <form method="post" action="{{ route('quotation.send', $deal->rfq_code) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="card">
                                <div class="row">
                                    <table class="table table-bordered table-striped p-1">
                                        <tbody>
                                            <tr>
                                                <th> Product Name</th>
                                                <th> Quantity </th>
                                                <th> Sale Price </th>
                                            </tr>
                                            @if ($deal->rfqProducts->count() > 0)
                                                <tr>
                                                    <th class="p-1"> Product Name</th>
                                                    <th class="p-1"> Quantity </th>
                                                </tr>

                                                @foreach ($deal->rfqProducts as $product)
                                                    <tr class="text-black bg-white">
                                                        <td>{{ $product->product_name }}</td>
                                                        <td>{{ $product->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-striped p-1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Client Type :
                                                    {{ ucfirst($deal->client_type) }}
                                                </th>
                                                <th>
                                                    Name : {{ ucfirst($deal->name) }}
                                                </th>
                                                <th>
                                                    Company Name :
                                                    {{ ucfirst($deal->company_name) }}
                                                </th>
                                            </tr>
                                            {{-- <tr>
                                        <th colspan="3" style="background: #7e7d7c">
                                            <p class="text-center pt-1 text-white">Product Name : {{App\Models\Admin\DealSas::where('id' , $deal->product_id)->value('name')}}</p>
                                        </th>
                                    </tr> --}}
                                            <tr>
                                                <th>Asking Quantity :
                                                    {{ App\Models\Admin\DealSas::where('rfq_id', $deal->id)->sum('qty') }}
                                                </th>
                                                <th>Phone Number : {{ $deal->phone }}</th>
                                                <th>
                                                    Total Price : $
                                                    {{ App\Models\Admin\DealSas::where('rfq_id', $deal->id)->value('grand_total') }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Assigned Sales Manager (L1) :
                                                    {{ App\Models\User::where('id', $deal->sales_man_id_L1)->value('name') }}
                                                    <br>
                                                    @if ($deal->sales_man_id_T1)
                                                        Assigned Sales Manager (T1) :
                                                        {{ App\Models\User::where('id', $deal->sales_man_id_T1)->value('name') }}
                                                        <br>
                                                    @endif
                                                    @if ($deal->sales_man_id_T2)
                                                        Assigned Sales Manager (T2) :
                                                        {{ App\Models\User::where('id', $deal->sales_man_id_T2)->value('name') }}
                                                    @endif

                                                </th>
                                                <th>
                                                    Status : <span
                                                        class="rounded-pill bg-success p-2">{{ ucfirst($deal->status) }}</span>


                                                </th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th colspan="3" style="background: #7e7d7c">
                                                    <p class="text-center pt-1 text-white">Send
                                                        Quotation To : <input type="email" name="email"
                                                            id="" value="{{ $deal->email }}"></p>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>




                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <button type="submit" class="btn btn-primary">Send Quotation <i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
    <!---Send Quotation modal--->
@endforeach
