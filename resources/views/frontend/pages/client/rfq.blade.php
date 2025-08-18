@extends('frontend.master')
@section('content')
<style>
    /* NAVBAR */
    .navbar {
        padding: 15px 10px;
        background: #fff;
        border: none;
        border-radius: 0;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    /* LINE */
    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* WRAPPER */
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
        perspective: 1500px;
    }

    /* SIDEBAR */
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #f8f9fb;
        color: #000;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Changed from 100vh */
        transition: all 0.6s cubic-bezier(0.945, 0.02, 0.27, 0.665);
    }

    #sidebar .sidebar-header {
        padding: 20px !important;
    }

    #sidebar ul.components {
        /* padding: 20px 20px 0 20px; */
        margin: 0;
    }

    #sidebar ul li a {
        display: flex;
        font-size: 1rem;
        line-height: 1.5rem;
        padding: 10px 30px;
        margin-bottom: 0.3125rem;
        position: relative;
    }

    #sidebar ul li a:hover {
        background: #fff;
    }

    #sidebar ul li.active>a {
        background: #ae0a46;
        color: #fff;
    }

    /* SIDEBAR TOGGLE */
    #sidebar.active {
        margin-left: -250px;
        transform: rotateY(100deg);
    }

    /* DROPDOWN */
    .dropdown-toggle {
        padding-right: 15px;
    }

    a[aria-expanded="true"] {
        background: #fff;
    }

    a[aria-expanded="true"]::after {
        transform: translateY(-50%) rotate(0deg) !important;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);
    }

    /* CTAs */
    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #fff;
        color: #7386d5;
    }

    a.article {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    a.article:hover {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    .list_dashboard {
        margin-bottom: 8px;
    }

    /* CONTENT */
    #content {
        width: 100%;
        min-height: 100vh;
        transition: all 0.3s;
    }

    /* SIDEBAR COLLAPSE BUTTON */
    #sidebarCollapse {
        width: 40px;
        height: 40px;
        background: #f5f5f5;
        cursor: pointer;
    }

    #sidebarCollapse span {
        width: 80%;
        height: 2px;
        margin: 0 auto;
        display: block;
        background: #ae0a46;
        transition: all 0.8s cubic-bezier(0.81, -0.33, 0.345, 1.375);
        transition-delay: 0.2s;
    }

    /* Remove default Bootstrap arrow */
    .dropdown-toggle::after {
        display: none !important;
    }

    /* Style the custom icon */
    .dropdown-toggle i {
        float: right;
        /* place icon on the right */
        transition: transform 0.3s;
    }

    /* Rotate icon when expanded */
    .dropdown-toggle[aria-expanded="false"] i {
        transform: rotate(-90deg);
        /* right → down */
    }

    .dropdown-toggle[aria-expanded="true"] i {
        transform: rotate(0deg);
        /* right → down */
    }

    #sidebarCollapse span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }

    #sidebarCollapse span:nth-of-type(2) {
        opacity: 0;
    }

    #sidebarCollapse span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }

    #sidebarCollapse.active span {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
            transform: rotateY(90deg);
        }

        #sidebar.active {
            margin-left: 0;
            transform: none;
        }

        #sidebarCollapse span {
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }

        #sidebarCollapse.active span:first-of-type {
            transform: rotate(45deg) translate(2px, 2px);
        }

        #sidebarCollapse.active span:nth-of-type(2) {
            opacity: 0;
        }

        #sidebarCollapse.active span:last-of-type {
            transform: rotate(-45deg) translate(1px, -1px);
        }
    }

    .nav-tabs .nav-item .user-tab {
        border: 0 !important;
    }
</style>
<div class="container-fliud">
    <div class="wrapper">
        <!-- Sidebar Holder -->
        @include('frontend.pages.client.partials.sidebar')

        <!-- Page Content Holder -->
        <div id="content">
            <header class="mb-3">
                <div class="container-fluid ps-0">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </header>
            <div class="container px-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card rounded-0 border-0 shadow-sm">
                            <div class="card-header rounded-0 border-0 p-2 card_main_support">
                                <div class="px-3 p-2 d-flex justify-content-between">
                                    <h5 class="m-0 text-center text-white px-3 py-1 upper_title">MY RFQs / Deals
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 p-0">
                                    <div class="table-responsive px-3">
                                        <table class="table text-center" id="rfqTable">
                                            <thead
                                                style="background-color:#a1a1a129 !important;display:table-header-group;">
                                                <tr>
                                                    <th width="5%">Sl</th>
                                                    <th width="15%">Rfq Code</th>
                                                    <th width="45%">Product Name</th>
                                                    {{-- <th width="15%">Rfq Status</th> --}}
                                                    <th width="15%">Created At</th>
                                                    <th class="text-center" width="20%">Work order</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if ($rfqs)
                                                @foreach ($rfqs as $rfq)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="number-font">{{ $rfq->rfq_code }}</td>
                                                    <td>
                                                        @foreach ($rfq->quotationProducts as $product)
                                                        <p class="m-0">
                                                            {{ $product->product_name }}
                                                        </p> <br>
                                                        @endforeach
                                                    </td>
                                                    {{-- <td>{{ ucfirst($rfq->status) }}</td> --}}
                                                    <td class="number-font">
                                                        {{ $rfq->created_at->format('d M Y') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);"
                                                            class="text-primary mx-2"
                                                            data-bs-toggle="modal"
                                                            title="Upload Work order"
                                                            data-bs-target="#Work-order-{{ $rfq->rfq_code }}">
                                                            <i class="fas fa-upload"></i>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="text-primary mx-2"
                                                            data-bs-toggle="modal"
                                                            title="Upload Proof of Payment"
                                                            data-bs-target="#Proof-payment-{{ $rfq->rfq_code }}">
                                                            <i class="icon-cash3"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal Start --}}
@foreach ($rfqs as $key => $rfq)
<div id="Work-order-{{ $rfq->rfq_code }}" class="modal fade" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title">Upload
                    Your Work Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-4 border br-7">

                <form method="post" action="{{ route('work-order.upload', $rfq->rfq_code) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <table class="table table-bordered"
                                                    style="width: 100%;height: auto;">
                                                    <tr class="text-center" style="background-color: rgba(0,0,0,.03);">
                                                        <th>SL
                                                            #
                                                        </th>
                                                        <th>Product
                                                            Description
                                                        </th>
                                                        <th>Quantity
                                                        </th>

                                                        @if ($rfq->regular == '1')
                                                            <th width="10%" class="rg_discount d-none">
                                                                Discount
                                                            </th>
                                                            <th width="10%" class="rg_discount d-none">
                                                                Disc.
                                                                Unit
                                                            </th>
                                                        @else
                                                            <th width="10%" class="rg_unit">
                                                                Unit
                                                                Price
                                                            </th>
                                                        @endif

                                                        <th width="15%">
                                                            Total
                                                        </th>
                                                    </tr>

                                                    @foreach ($deal_products as $key => $item)
                                                        <tr>
                                                            <td> {{ ++$key }}
                    </td>

                    <td>
                        {{ $item->item_name }}
                    </td>
                    <td class="text-center">
                        {{ $item->qty }}
                    </td>
                    @if ($rfq->regular == '1')
                    <th width="10%" class="rg_discount d-none">
                        {{ $item->regular_discount }}
                        %
                    </th>
                    <th width="10%" class="rg_discount d-none">
                        {{ number_format($item->sales_price / $item->qty, 2) }}
                    </th>
                    @else
                    <th width="10%" class="rg_unit">
                        {{ number_format($item->sales_price / $item->qty, 2) }}
                    </th>
                    @endif

                    <td class="text-center">
                        $
                        {{ $item->sales_price }}
                    </td>
                    </tr>
                    @endforeach


                    <tr>
                        <th>
                        </th>

                        @if ($rfq->regular == '1')
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        @else
                        <th width="10%" class="rg_unit">
                        </th>
                        @endif
                        <td colspan="2" class="text-center">
                            Sub
                            Total
                        </td>
                        <td class="text-center">
                            $
                            {{ $deal_sas->sub_total_sales }}
                        </td>
                    </tr>
                    @if ($rfq->special == '1')
                    <tr class="special_discount">
                        <th>
                        </th>
                        @if ($rfq->regular == '1')
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        @else
                        <th width="10%" class="rg_unit">
                        </th>
                        @endif
                        <td class="text-center">
                            Special
                            discount
                        </td>
                        <td class="text-center">
                            {{ $deal_sas->special_discount }}
                            %
                        </td>
                        <td class="text-center">
                            $
                            {{ $deal_sas->special_discounted_sales }}
                        </td>
                    </tr>
                    @endif



                    <tr>
                        <th>
                        </th>
                        @if ($rfq->regular == '1')
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        @else
                        <th width="10%" class="rg_unit">
                        </th>
                        @endif
                        <th colspan="2" class="text-center">
                            Total
                        </th>
                        <td class="text-center">
                            $
                            {{ $deal_sas->grand_total - $deal_sas->tax_sales }}
                        </td>
                    </tr>

                    <!-- <tr>
                                                                                <th colspan="2" width="40%"> In Words: </th> <th colspan="5" width="60%"> <small> <b> Thirty One Lac sixty Four Thousand and Four Hundred Twenty One Taka Only (w/o Tax / VAT) </b> </small> </th>
                                                                                </tr> -->


                    </table>


                    @if ($rfq->tax_status == '1')
                    <table class="table table-bordered mt-2">
                        <tr>
                            <th colspan="3" width="80%">
                                Tax
                                /
                                VAT
                            </th>
                            <td class="text-center" width="10%">
                                {{ $deal_sas->tax }}%
                            </td>
                            <td class="text-center" width="10%">
                                $
                                {{ $deal_sas->tax_sales }}
                            </td>
                        </tr>

                    </table>
                    @endif
            </div>

        </div>

    </div> --}}
    <div class="card">
        <div class="card-body py-4">
            <div class="row">
                <table class="table" style="background: offset; width:60%; margin:auto;">
                    <tbody>
                        <tr class="border-none">
                            <th class="border-none" colspan="3"
                                style="background: offset; width:60%; margin:auto;">
                                <label for="clientPO" style="font-size:16px;">Work Order (Pdf)
                                </label>
                                <input class="form-control" type="file" name="client_po"
                                    id="clientPO">
                                <span class="text-info">
                                    * Accepts PDF only</span>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Upload
                <i class="icon-paperplane ml-2"></i></button>
        </div>
    </div>
    </form>
</div>


</div>
</div>
</div>
<div id="Proof-payment-{{ $rfq->rfq_code }}" class="modal fade" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                @php
                // $rfq = App\Models\Admin\Rfq::where('rfq_code', $rfq->rfq_code)->first();
                // $deal_products = App\Models\Admin\DealSas::where('rfq_code', $rfq->rfq_code)->get();
                // $deal_sas = App\Models\Admin\DealSas::where('rfq_code', $rfq->rfq_code)->first();
                @endphp
                <h5 class="modal-title">Upload Proof of Payment for this Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-4 border br-7">
                <form method="post" action="{{ route('payment-proof.upload', $rfq->rfq_code) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <table class="table table-bordered" style="width: 100%; height: auto;">
                                                    <tr class="text-center" style="background-color: rgba(0,0,0,.03);">
                                                        <th>SL
                                                            #
                                                        </th>
                                                        <th>Product
                                                            Description
                                                        </th>
                                                        <th>Quantity
                                                        </th>

                                                        @if ($rfq->regular == '1')
                                                            <th width="10%" class="rg_discount d-none">
                                                                Discount
                                                            </th>
                                                            <th width="10%" class="rg_discount d-none">
                                                                Disc.
                                                                Unit
                                                            </th>
                                                        @else
                                                            <th width="10%" class="rg_unit">
                                                                Unit
                                                                Price
                                                            </th>
                                                        @endif

                                                        <th width="15%">
                                                            Total
                                                        </th>
                                                    </tr>

                                                    @foreach ($deal_products as $key => $item)
                                                        <tr>
                                                            <td> {{ ++$key }}
                    </td>

                    <td>
                        {{ $item->item_name }}
                    </td>
                    <td class="text-center">
                        {{ $item->qty }}
                    </td>
                    @if ($rfq->regular == '1')
                    <th width="10%" class="rg_discount d-none">
                        {{ $item->regular_discount }}
                        %
                    </th>
                    <th width="10%" class="rg_discount d-none">
                        {{ number_format($item->sales_price / $item->qty, 2) }}
                    </th>
                    @else
                    <th width="10%" class="rg_unit">
                        {{ number_format($item->sales_price / $item->qty, 2) }}
                    </th>
                    @endif

                    <td class="text-center">
                        $
                        {{ $item->sales_price }}
                    </td>
                    </tr>
                    @endforeach


                    <tr>
                        <th>
                        </th>

                        @if ($rfq->regular == '1')
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        @else
                        <th width="10%" class="rg_unit">
                        </th>
                        @endif
                        <td colspan="2" class="text-center">
                            Sub
                            Total
                        </td>
                        <td class="text-center">
                            $
                            {{ $deal_sas->sub_total_sales }}
                        </td>
                    </tr>
                    @if ($rfq->special == '1')
                    <tr class="special_discount">
                        <th>
                        </th>
                        @if ($rfq->regular == '1')
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        @else
                        <th width="10%" class="rg_unit">
                        </th>
                        @endif
                        <td class="text-center">
                            Special
                            discount
                        </td>
                        <td class="text-center">
                            {{ $deal_sas->special_discount }}
                            %
                        </td>
                        <td class="text-center">
                            $
                            {{ $deal_sas->special_discounted_sales }}
                        </td>
                    </tr>
                    @endif



                    <tr>
                        <th>
                        </th>
                        @if ($rfq->regular == '1')
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        <th width="10%" class="rg_discount d-none">
                        </th>
                        @else
                        <th width="10%" class="rg_unit">
                        </th>
                        @endif
                        <th colspan="2" class="text-center">
                            Total
                        </th>
                        <td class="text-center">
                            $
                            {{ $deal_sas->grand_total - $deal_sas->tax_sales }}
                        </td>
                    </tr>

                    <!-- <tr>
                                                                                <th colspan="2" width="40%"> In Words: </th> <th colspan="5" width="60%"> <small> <b> Thirty One Lac sixty Four Thousand and Four Hundred Twenty One Taka Only (w/o Tax / VAT) </b> </small> </th>
                                                                                </tr> -->


                    </table>


                    @if ($rfq->tax_status == '1')
                    <table class="table table-bordered mt-2">
                        <tr>
                            <th colspan="3" width="80%">
                                Tax
                                /
                                VAT
                            </th>
                            <td class="text-center" width="10%">
                                {{ $deal_sas->tax }}%
                            </td>
                            <td class="text-center" width="10%">
                                $
                                {{ $deal_sas->tax_sales }}
                            </td>
                        </tr>

                    </table>
                    @endif
            </div>

        </div>

    </div> --}}
    <div class="card">
        <div class="card-body py-4">
            <div class="row">
                <table class="table" style="background: offset; width:60%; margin:auto;">

                    <thead>
                        <tr class="border-none">
                            <th class="border-none" colspan="3"
                                style="background: offset; width:60%; margin:auto;">
                                <label for="clientPO" style="font-size:16px;">Payment
                                    Slip
                                    (Pdf)
                                </label>
                                <input class="form-control" type="file" name="client_po"
                                    id="clientPO">
                                <span class="text-info">
                                    * Accepts PDF only</span>
                            </th>
                            <th class="border-none" colspan="3"
                                style="background: offset; width:60%; margin:auto;">
                                <label for="clientPO" style="font-size:16px;">Transaction
                                    ID</label>
                                <input class="form-control" type="file" name="client_po"
                                    id="clientPO">
                                <span class="text-info">
                                    * Accepts PDF only</span>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Upload
                <i class="icon-paperplane ml-2"></i></button>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
@endforeach
{{-- modal End --}}



</section>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#rfqTable').DataTable();
    });
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection