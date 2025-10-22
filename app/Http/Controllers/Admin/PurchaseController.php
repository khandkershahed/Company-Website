<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Rfq;
use Illuminate\Http\Request;
use App\Models\Admin\Purchase;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Admin\AccountsPayable;
use App\Models\Admin\PurchaseProduct;
use App\Models\Admin\RfqPurchase;
use App\Models\Admin\RfqPurchaseProduct;
use Illuminate\Support\Facades\Validator;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rfqs'] = Rfq::select('id', 'name')->get();
        $data['purchases'] = RfqPurchase::with(['rfq', 'purchaseProducts'])->latest()->get();
        // return view('admin.pages.purchase.all', $data);
        return view('metronic.pages.purchase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rfqs'] = Rfq::select('id', 'name')->get();
        $data['purchases'] = [];
        // return view('admin.pages.purchase.all', $data);
        return view('metronic.pages.purchase.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'rfq_id'        => 'required',
            ],
        );
        if ($validator->passes()) {
            $purchase_id = RfqPurchase::insertGetId([
                'rfq_id'                   => $request->rfq_id,
                'pq_number'                => $request->pq_number,
                'pq_reference'             => $request->pq_reference,
                'po_number'                => $request->po_number,
                'po_date'     => date('Y-m-d H:i:s', strtotime($request->po_date)),
                'po_reference'             => $request->po_reference,
                'purchase_by'              => $request->purchase_by,
                'principal_name'           => $request->principal_name,
                'principal_phone'          => $request->principal_phone,
                'principal_address'        => $request->principal_address,
                'principal_email'          => $request->principal_email,
                'billing_name'             => $request->billing_name,
                'billing_phone'            => $request->billing_phone,
                'billing_address'          => $request->billing_address,
                'billing_email'            => $request->billing_email,
                'shipping_name'            => $request->shipping_name,
                'shipping_phone'           => $request->shipping_phone,
                'shipping_address'         => $request->shipping_address,
                'shipping_email'           => $request->shipping_email,
                'shipping_method'          => $request->shipping_method,
                'shipping_terms'           => $request->shipping_terms,
                'delivery_date'     => date('Y-m-d H:i:s', strtotime($request->delivery_date)),
                'validity'                 => $request->validity,
                'payment'                  => $request->payment,
                'delivery'                 => $request->delivery,
                'license'                  => $request->license,
                'penalty'                  => $request->penalty,
                'payable_account_number'   => $request->payable_account_number,
                'payable_account_name'     => $request->payable_account_name,
                'payable_account_bank'     => $request->payable_account_bank,
                'payable_account_swift'    => $request->payable_account_swift,
                'payable_account_route'    => $request->payable_account_route,
                'payment_status'           => $request->payment_status,
                'payment_amount_reference' => $request->payment_amount_reference,
                'payment_process_fee'      => $request->payment_process_fee,
                'payment_pop_reference'    => $request->payment_pop_reference,
                'payment_date'     => date('Y-m-d H:i:s', strtotime($request->payment_date)),
                'subtotal'                 => $request->subtotal,
                'shipping'                 => $request->shipping,
                'tax'                      => $request->tax,
                'others'                   => $request->others,
                'total'                    => $request->total,
                'client_details'           => $request->client_details,
                'created_at'               => Carbon::now(),
            ]);

            //dd($request->qty);
            $rfq_id           = $request->rfq_id;
            $purchase_id      = $purchase_id;
            $product_name     = $request->item_name;
            $qty              = $request->qty;
            $unit_price       = $request->unit_price;
            // $sub_total = $request->regular_discount;
            // $amount = $request->regular_discount;



            for ($i = 0; $i < count($product_name); $i++) {
                $datasave = [
                    'rfq_id'           => $rfq_id,
                    'purchase_id'      => $purchase_id,
                    'product_name'     => $product_name[$i],
                    'qty'              => $qty[$i],
                    'unit_price'       => $unit_price[$i],
                    // 'sub_total'        => $qty[$i] * $unit_price[$i],
                    //'amount'           => $amount[$i],

                ];

                // DB::table('colors')->insert($datasave);
                RfqPurchaseProduct::insert($datasave);
            }

            Toastr::success('Data Insert Successfully');
            return redirect()->route('purchase.index');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['purchase'] = RfqPurchase::with(['rfq', 'purchaseProducts'])->find($id);
        // return view('admin.pages.purchase.show', $data);
        return view('metronic.pages.purchase.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['rfqs'] = Rfq::select('rfqs.id', 'rfqs.name')->get();
        $data['purchase'] = RfqPurchase::with(['rfq', 'purchaseProducts'])->find($id);
        // return view('admin.pages.purchase.edit', $data);
        return view('metronic.pages.purchase.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'rfq_id'        => 'required',
            ],
        );
        if ($validator->passes()) {
            RfqPurchase::find($id)->update([
                'rfq_id'                   => $request->rfq_id,
                'pq_number'                => $request->pq_number,
                'pq_reference'             => $request->pq_reference,
                'po_number'                => $request->po_number,
                'po_date'                  => date('Y-m-d H:i:s', strtotime($request->po_date)),
                'po_reference'             => $request->po_reference,
                'purchase_by'              => $request->purchase_by,
                'principal_name'           => $request->principal_name,
                'principal_phone'          => $request->principal_phone,
                'principal_address'        => $request->principal_address,
                'principal_email'          => $request->principal_email,
                'billing_name'             => $request->billing_name,
                'billing_phone'            => $request->billing_phone,
                'billing_address'          => $request->billing_address,
                'billing_email'            => $request->billing_email,
                'shipping_name'            => $request->shipping_name,
                'shipping_phone'           => $request->shipping_phone,
                'shipping_address'         => $request->shipping_address,
                'shipping_email'           => $request->shipping_email,
                'shipping_method'          => $request->shipping_method,
                'shipping_terms'           => $request->shipping_terms,
                'delivery_date'     => date('Y-m-d H:i:s', strtotime($request->delivery_date)),
                'validity'                 => $request->validity,
                'payment'                  => $request->payment,
                'delivery'                 => $request->delivery,
                'license'                  => $request->license,
                'penalty'                  => $request->penalty,
                'payable_account_number'   => $request->payable_account_number,
                'payable_account_name'     => $request->payable_account_name,
                'payable_account_bank'     => $request->payable_account_bank,
                'payable_account_swift'    => $request->payable_account_swift,
                'payable_account_route'    => $request->payable_account_route,
                'payment_status'           => $request->payment_status,
                'payment_amount_reference' => $request->payment_amount_reference,
                'payment_process_fee'      => $request->payment_process_fee,
                'payment_pop_reference'    => $request->payment_pop_reference,
                'payment_date'     => date('Y-m-d H:i:s', strtotime($request->payment_date)),
                'subtotal'                 => $request->subtotal,
                'shipping'                 => $request->shipping,
                'tax'                      => $request->tax,
                'others'                   => $request->others,
                'total'                    => $request->total,
                'client_details'           => $request->client_details,
                'updated_at'               => Carbon::now(),
            ]);
            Toastr::success('Data Updated Successfully');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RfqPurchase::find($id)->delete();
    }
}
