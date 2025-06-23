<style>
    .table th{
        padding-left: 15px !important;
    }
</style>
<div class="col-12">
    <div class="table-responsive text-center">
        <table class="table table-bordered table-striped">
            <thead>
                <thead>
                    <tr>
                        <th colspan="2" class="text-start">Product Details</th>
                    </tr>
                </thead>
            </thead>
            <tbody>
                <tr>
                    <th> Product Name</th>
                    <th> Quantity</th>
                </tr>
                @if ($rfq->rfqProducts->count() > 0)
                    @foreach ($rfq->rfqProducts as $product)
                        <tr class="text-black bg-white">
                            <td>{{ $product->product_name }}
                            </td>
                            <td>{{ $product->qty }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr> No Data Available</tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="col-12">
    <div class="table-responsive text-start">
        <table class="table table-bordered table-striped text-start">
            <thead>
                <tr>
                    <th colspan="2" class="text-start">Client Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th width="30%"> Client Type</th>
                    <td>{{ ucfirst($rfq->client_type) }}</td>
                </tr>
                <tr>
                    <th> Client Name</th>
                    <td>{{ ucfirst($rfq->name) }}</td>
                </tr>
                <tr>
                    <th> Client Email</th>
                    <td>{{ $rfq->email }}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ ucfirst($rfq->company_name) }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $rfq->phone }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $rfq->country }}</td>
                </tr>
                <tr>
                    <th>
                        Assigned Sales Manager (L1)
                    </th>
                    <td>
                        {{ App\Models\User::where('id', $rfq->sales_man_id_L1)->value('name') }}
                        <br>
                        @if ($rfq->sales_man_id_T1)
                            Assigned Sales
                            Manager (T1) :
                            {{ App\Models\User::where('id', $rfq->sales_man_id_T1)->value('name') }}
                            <br>
                        @endif
                        @if ($rfq->sales_man_id_T2)
                            Assigned Sales
                            Manager (T2) :
                            {{ App\Models\User::where('id', $rfq->sales_man_id_T2)->value('name') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($rfq->status) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
