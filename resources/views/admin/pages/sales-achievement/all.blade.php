@extends('admin.master')
@section('content')

    <div class="content-wrapper">

        <!-- Inner content -->


        <!-- Page header -->
        <div class="shadow page-header page-header-light">


            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="py-2 breadcrumb">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Sales Manager Achievement</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="p-0 border-transparent btn btn-light align-self-center collapsed d-lg-none rounded-pill ms-auto"
                        data-bs-toggle="collapse">
                        <i class="m-1 ph-caret-down collapsible-indicator ph-sm"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2 class="mb-0 text-center">Sales Manager Achivement Set</h2>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ route('sales-achievement.create') }}" type="button"
                                        class="btn btn-sm btn-success btn-labeled btn-labeled-start float-end">
                                        <span class="bg-black btn-labeled-icon bg-opacity-20">
                                            <i class="icon-plus2"></i>
                                        </span>
                                        Add New
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table rfqDT table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="25%">RFQ Code</th>
                                        <th width="20%">Sales Manager Details</th>
                                        <th width="10%">Details</th>
                                        <th width="15%">Status</th>
                                        <th width="20%" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($rfqs)
                                        @foreach ($rfqs as $key => $rfq)
                                        <tr class="text-center">
                                            <td>{{ ucfirst($rfq->rfq_code) }}</td>
                                            <td>
                                                L1 : {{ App\Models\User::where('id',$rfq->sales_man_id_L1)->value('name') }} ;

                                                @if ($rfq->sales_man_id_T1)
                                                   <br> T1 : {{ App\Models\User::where('id',$rfq->sales_man_id_T1)->value('name') }} ;
                                                @endif

                                                @if ($rfq->sales_man_id_T2)
                                                   <br> T2 : {{ App\Models\User::where('id',$rfq->sales_man_id_T2)->value('name') }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="mx-2 text-info" title="Show Deal"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#show-deals-{{ $rfq->rfq_code }}">
                                                    <i class="icon-eye"></i>
                                                </a>

                                                <!---Category Update modal--->
                                                    <div id="show-deals-{{ $rfq->rfq_code }}" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    @php
                                                                        $rfq_details = App\Models\Admin\Rfq::where('rfq_code', $rfq->rfq_code)->first();
                                                                        $deal_products = App\Models\Admin\DealSas::where('rfq_code', $rfq_details->rfq_code)->get();
                                                                    @endphp
                                                                    <h5 class="modal-title">Deal Details : {{ $rfq_details->rfq_code }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="border modal-body br-7">


                                                                        <div class="mb-3 row">
                                                                            <div class="card">

                                                                                <div class="row">
                                                                                    <table class="table p-1 table-bordered table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>
                                                                                                    Client Type : {{ ucfirst($rfq_details->client_type) }}
                                                                                                </th>
                                                                                                <th>
                                                                                                    Name : {{ ucfirst($rfq_details->name) }}
                                                                                                </th>
                                                                                                <th>
                                                                                                    Company Name : {{ ucfirst($rfq_details->company_name) }}
                                                                                            </th>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <th>Asking Quantity : @if (App\Models\Admin\DealSas::where('rfq_id' , $rfq_details->id)->sum('qty') > 0)
                                                                                                        {{App\Models\Admin\DealSas::where('rfq_id' , $rfq_details->id)->sum('qty')}}
                                                                                                    @else
                                                                                                    {{ $rfq_details->qty}}
                                                                                                    @endif
                                                                                                </th>
                                                                                                <th>Phone Number : {{ $rfq_details->phone }}</th>
                                                                                                <th>
                                                                                                    Total Price : $ {{App\Models\Admin\DealSas::where('rfq_id' , $rfq_details->id)->value('grand_total')}}
                                                                                                </th>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th>
                                                                                                    Assigned Sales Manager (L1) : {{ App\Models\User::where('id',$rfq_details->sales_man_id_L1)->value('name') }} <br>
                                                                                                    @if ($rfq_details->sales_man_id_T1)
                                                                                                    Assigned Sales Manager (T1) : {{ App\Models\User::where('id',$rfq_details->sales_man_id_T1)->value('name') }} <br>
                                                                                                    @endif
                                                                                                    @if ($rfq_details->sales_man_id_T2)
                                                                                                        Assigned Sales Manager (T2) : {{ App\Models\User::where('id',$rfq_details->sales_man_id_T2)->value('name') }}
                                                                                                    @endif

                                                                                                </th>
                                                                                                <th>
                                                                                                    Status : <span class="p-1 badge bg-success">{{ucfirst(($rfq_details->status))}}</span>


                                                                                                </th>
                                                                                                <th></th>
                                                                                            </tr>

                                                                                        </thead>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <table class="table p-1 table-bordered table-striped">
                                                                                        <thead>
                                                                                            @if (count($deal_products) > 0)
                                                                                                <tr>
                                                                                                    <th> Product Name</th>
                                                                                                    <th> Quantity </th>
                                                                                                    <th> Sale Price </th>
                                                                                                </tr>

                                                                                                @foreach ($deal_products as $item)
                                                                                                <tr class="text-white bg-gray">
                                                                                                    <th>{{$item->item_name}}</th>
                                                                                                    <th>{{$item->qty}}</th>
                                                                                                    <th>{{$item->sub_total_cost}}</th>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                            @else

                                                                                            @endif




                                                                                        </thead>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                <!---Category Update modal--->


                                            </td>
                                            <td><span class="p-1 badge bg-success">{{ucfirst(($rfq->status))}}</span></td>
                                            <td class="text-center">
                                                <a href="{{ route('sales-achievement.show', [$rfq->rfq_code]) }}"
                                                    class="mx-3 text-success" title="Set Target Vs Achievement">
                                                    <i class="icon-pen-plus icon-1x"></i>
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
        <!-- /content area -->





        <!-- /inner content -->

    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.rfqDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [1, 2, 4],
                }, ],
            });
        </script>
    @endpush
@endonce




