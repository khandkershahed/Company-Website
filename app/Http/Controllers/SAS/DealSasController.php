<?php

namespace App\Http\Controllers\SAS;

use App\Models\User;
use App\Models\Admin\Rfq;
use Illuminate\Http\Request;
use App\Models\Admin\DealSas;
use App\Models\Admin\Product;
use App\Models\Admin\RfqProduct;
use App\Http\Controllers\Controller;
use App\Notifications\DealSas as NotificationsDealSas;
use App\Notifications\SasApprove;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;
use DB;
use Illuminate\Support\Facades\Auth;

class DealSasController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['deal_sas'] = DealSas::latest()->whereNotNull('create')->orderBy('id','Desc')->get()->unique('rfq_code');
        //dd($data['deal_sas']);
        return view('admin.pages.deal_sas.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $user = User::where('role','admin')->get();
        $rfq = Rfq::find($request->rfq_id);
            $rfq->update([
                'regular'    => $request->regular,
                'special'    => $request->special,
                'tax_status' => $request->tax_status,
                'status'     =>'sas_created',
            ]);

        $id                         = $request->id;
        $rfq_id                     = $request->rfq_id;
        $rfq_code                   = $request->rfq_code;
        $create                     = $request->create;
        $item_name                  = $request->item_name;
        $qty                        = $request->qty;
        $unit_price                 = $request->unit_price;
        $cog_price                  = $request->cog_price;
        $regular_discount           = $request->regular_discount;
        $discounted_sales           = $request->discounted_sales;
        $sales_price                = $request->sales_price;
        $sub_total_cost             = $request->sub_total_cost;
        $sub_total_discounted_sales = $request->sub_total_discounted_sales;
        $sub_total_sales            = $request->sub_total_sales;
        $special_discount           = $request->special_discount;
        $special_discounted_sales   = $request->special_discounted_sales;
        $tax                        = $request->tax;
        $tax_sales                  = $request->tax_sales;
        $grand_total                = $request->grand_total;
        $bank_charge                = $request->bank_charge;
        $customs                    = $request->customs;
        $utility_cost               = $request->utility_cost;
        $shiping_cost               = $request->shiping_cost;
        $sales_comission            = $request->sales_comission;
        $liability                  = $request->liability;
        $regular_discounts          = $request->regular_discounts;
        $rebates                    = $request->rebates;
        $capital_share              = $request->capital_share;
        $management_cost            = $request->management_cost;
        $net_profit_percentage      = $request->net_profit_percentage;
        $net_profit_amount          = $request->net_profit_amount;
        $gross_profit_subtotal      = $request->gross_profit_subtotal;
        $gross_profit_amount        = $request->gross_profit_amount;

        for ($i=0; $i < count($id) ; $i++) {
            $datasave = [
                'id'                         => $id[$i],
                'rfq_code'                   => $rfq_code,
                'rfq_id'                     => $rfq_id,
                'create'                     => $create,
                'item_name'                  => $item_name[$i],
                'qty'                        => $qty[$i],
                'unit_price'                 => $unit_price[$i],
                'cog_price'                  => $cog_price[$i],
                'regular_discount'           => $regular_discount[$i],
                'discounted_sales'           => $discounted_sales[$i],
                'sales_price'                => $sales_price[$i],
                'sub_total_cost'             => $sub_total_cost,
                'sub_total_discounted_sales' => $sub_total_discounted_sales,
                'sub_total_sales'            => $sub_total_sales,
                'special_discount'           => $special_discount,
                'special_discounted_sales'   => $special_discounted_sales,
                'tax'                        => $tax,
                'tax_sales'                  => $tax_sales,
                'grand_total'                => $grand_total,
                'bank_charge'                => $bank_charge,
                'customs'                    => $customs,
                'utility_cost'               => $utility_cost,
                'shiping_cost'               => $shiping_cost,
                'sales_comission'            => $sales_comission,
                'liability'                  => $liability,
                'regular_discounts'          => $regular_discounts,
                'rebates'                    => $rebates,
                'capital_share'              => $capital_share,
                'management_cost'            => $management_cost,
                'net_profit_percentage'      => $net_profit_percentage,
                'net_profit_amount'          => $net_profit_amount,
                'gross_profit_subtotal'      => $gross_profit_subtotal,
                'gross_profit_amount'        => $gross_profit_amount,

            ];
            //dd($id[$i]);
            // DB::table('colors')->insert($datasave);
            DealSas::findOrFail($id[$i])->update($datasave);
        }
        //DB::table('rfqs')->where('id', $request->rfq_id)->update(['status'=>'price_created']);

        $rfq = Rfq::where('id', $request->rfq_id)->first();
        //$salesman_name = User::where('id', $rfq->sales_man_id_L1)->first();
        Notification::send($user, new NotificationsDealSas($name = Auth::user()->name , $rfq_id = $rfq->rfq_code));
        Toastr::success('SAS Created Successfully.');
        // return redirect()->route('deal-sas.index');
        return redirect()->route('admin.single-rfq.show',$rfq_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['rfq'] = Rfq::where('rfq_code', $id)->first();
        $data['products'] = DealSas::where('rfq_id', $data['rfq']->id)->get();
        //$data['deal_sas'] = DealSas::where('rfq_id', $data['rfq']->id)->get();
        //return view('admin.pages.deal_sas.add', $data);
        if (($data['rfq']->status) == 'deal_created') {
            return view('admin.pages.deal_sas.add', $data);
        } else {
            $data['sourcing'] = DealSas::where('rfq_id' , $data['rfq']->id)->first();
            return view('admin.pages.deal_sas.edit', $data);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['rfq'] = Rfq::where('rfq_code', $id)->first();
        $data['products'] = DealSas::where('rfq_id', $data['rfq']->id)->get();
        $data['sourcing'] = DealSas::where('rfq_id' , $data['rfq']->id)->first();
        //dd($data['sourcing']);
        return view('admin.pages.deal_sas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rfq = Rfq::find($request->rfq_id);
            $rfq->update([
                'regular'    => $request->regular,
                'special'    => $request->special,
                'tax_status' => $request->tax_status,
            ]);

        $id                         = $request->id;
        $rfq_id                     = $request->rfq_id;
        $rfq_code                   = $request->rfq_code;
        $create                     = $request->create;
        $item_name                  = $request->item_name;
        $qty                        = $request->qty;
        $unit_price                 = $request->unit_price;
        $cog_price                  = $request->cog_price;
        $regular_discount           = $request->regular_discount;
        $discounted_sales           = $request->discounted_sales;
        $sales_price                = $request->sales_price;
        $sub_total_cost             = $request->sub_total_cost;
        $sub_total_discounted_sales = $request->sub_total_discounted_sales;
        $sub_total_sales            = $request->sub_total_sales;
        $special_discount           = $request->special_discount;
        $special_discounted_sales   = $request->special_discounted_sales;
        $tax                        = $request->tax;
        $tax_sales                  = $request->tax_sales;
        $grand_total                = $request->grand_total;
        $bank_charge                = $request->bank_charge;
        $customs                    = $request->customs;
        $utility_cost               = $request->utility_cost;
        $shiping_cost               = $request->shiping_cost;
        $sales_comission            = $request->sales_comission;
        $liability                  = $request->liability;
        $regular_discounts          = $request->regular_discounts;
        $rebates                    = $request->rebates;
        $capital_share              = $request->capital_share;
        $management_cost            = $request->management_cost;
        $net_profit_percentage      = $request->net_profit_percentage;
        $net_profit_amount          = $request->net_profit_amount;
        $gross_profit_subtotal      = $request->gross_profit_subtotal;
        $gross_profit_amount        = $request->gross_profit_amount;

    for ($i=0; $i < count($id) ; $i++) {
        $datasave = [
            'id'                         => $id[$i],
            'rfq_code'                   => $rfq_code,
            'rfq_id'                     => $rfq_id,
            'create'                     => $create,
            'item_name'                  => $item_name[$i],
            'qty'                        => $qty[$i],
            'unit_price'                 => $unit_price[$i],
            'cog_price'                  => $cog_price[$i],
            'regular_discount'           => $regular_discount[$i],
            'discounted_sales'           => $discounted_sales[$i],
            'sales_price'                => $sales_price[$i],
            'sub_total_cost'             => $sub_total_cost,
            'sub_total_discounted_sales' => $sub_total_discounted_sales,
            'sub_total_sales'            => $sub_total_sales,
            'special_discount'           => $special_discount,
            'special_discounted_sales'   => $special_discounted_sales,
            'tax'                        => $tax,
            'tax_sales'                  => $tax_sales,
            'grand_total'                => $grand_total,
            'bank_charge'                => $bank_charge,
            'customs'                    => $customs,
            'utility_cost'               => $utility_cost,
            'shiping_cost'               => $shiping_cost,
            'sales_comission'            => $sales_comission,
            'liability'                  => $liability,
            'regular_discounts'          => $regular_discounts,
            'rebates'                    => $rebates,
            'capital_share'              => $capital_share,
            'management_cost'            => $management_cost,
            'net_profit_percentage'      => $net_profit_percentage,
            'net_profit_amount'          => $net_profit_amount,
            'gross_profit_subtotal'      => $gross_profit_subtotal,
            'gross_profit_amount'        => $gross_profit_amount,




        ];
         //dd($id[$i]);
        // DB::table('colors')->insert($datasave);
        DealSas::findOrFail($id[$i])->update($datasave);
    }
    Toastr::success('SAS Updated Successfully.');
    // return redirect()->route('deal-sas.index');
    return redirect()->route('admin.single-rfq.show',$rfq->rfq_code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function DealSasShow($id)
    {

        $data['rfq'] = Rfq::where('rfq_code', $id)->first();
        $data['products'] = DealSas::where('rfq_id', $data['rfq']->id)->get();
        $data['sourcing'] = DealSas::where('rfq_code' , $data['rfq']->rfq_code)->first();
        return view('admin.pages.deal_sas.show', $data);
    }

    public function DealSasApprove($id)
    {

        $data['rfq'] = Rfq::where('rfq_code', $id)->first();
        $data['products'] = DealSas::where('rfq_id', $data['rfq']->id)->get();
        $data['sourcing'] = DealSas::where('rfq_id' , $data['rfq']->id)->first();
        //dd($data['sourcing']);
        return view('admin.pages.deal_sas.approve', $data);
    }

    public function DealSasApproveStore(Request $request, $id)
    {
        //dd($request->all());
        $rfq = Rfq::find($request->rfq_id);
        $rfq->update([
            'regular'    => $request->regular,
            'special'    => $request->special,
            'tax_status' => $request->tax_status,
            'status'     =>'sas_approved',
        ]);

        $id                         = $request->id;
        $rfq_id                     = $request->rfq_id;
        $rfq_code                   = $request->rfq_code;
        $create                     = $request->create;
        $item_name                  = $request->item_name;
        $qty                        = $request->qty;
        $unit_price                 = $request->unit_price;
        $cog_price                  = $request->cog_price;
        $regular_discount           = $request->regular_discount;
        $discounted_sales           = $request->discounted_sales;
        $sales_price                = $request->sales_price;
        $sub_total_cost             = $request->sub_total_cost;
        $sub_total_discounted_sales = $request->sub_total_discounted_sales;
        $sub_total_sales            = $request->sub_total_sales;
        $special_discount           = $request->special_discount;
        $special_discounted_sales   = $request->special_discounted_sales;
        $tax                        = $request->tax;
        $tax_sales                  = $request->tax_sales;
        $grand_total                = $request->grand_total;
        $bank_charge                = $request->bank_charge;
        $customs                    = $request->customs;
        $utility_cost               = $request->utility_cost;
        $shiping_cost               = $request->shiping_cost;
        $sales_comission            = $request->sales_comission;
        $liability                  = $request->liability;
        $regular_discounts          = $request->regular_discounts;
        $rebates                    = $request->rebates;
        $capital_share              = $request->capital_share;
        $management_cost            = $request->management_cost;
        $net_profit_percentage      = $request->net_profit_percentage;
        $net_profit_amount          = $request->net_profit_amount;
        $gross_profit_subtotal      = $request->gross_profit_subtotal;
        $gross_profit_amount        = $request->gross_profit_amount;

    for ($i=0; $i < count($id) ; $i++) {
        $datasave = [
            'id'                         => $id[$i],
            'rfq_code'                   => $rfq_code,
            'rfq_id'                     => $rfq_id,
            'create'                     => $create,
            'item_name'                  => $item_name[$i],
            'qty'                        => $qty[$i],
            'unit_price'                 => $unit_price[$i],
            'cog_price'                  => $cog_price[$i],
            'regular_discount'           => $regular_discount[$i],
            'discounted_sales'           => $discounted_sales[$i],
            'sales_price'                => $sales_price[$i],
            'sub_total_cost'             => $sub_total_cost,
            'sub_total_discounted_sales' => $sub_total_discounted_sales,
            'sub_total_sales'            => $sub_total_sales,
            'special_discount'           => $special_discount,
            'special_discounted_sales'   => $special_discounted_sales,
            'tax'                        => $tax,
            'tax_sales'                  => $tax_sales,
            'grand_total'                => $grand_total,
            'bank_charge'                => $bank_charge,
            'customs'                    => $customs,
            'utility_cost'               => $utility_cost,
            'shiping_cost'               => $shiping_cost,
            'sales_comission'            => $sales_comission,
            'liability'                  => $liability,
            'regular_discounts'          => $regular_discounts,
            'rebates'                    => $rebates,
            'capital_share'              => $capital_share,
            'management_cost'            => $management_cost,
            'net_profit_percentage'      => $net_profit_percentage,
            'net_profit_amount'          => $net_profit_amount,
            'gross_profit_subtotal'      => $gross_profit_subtotal,
            'gross_profit_amount'        => $gross_profit_amount,




        ];
         //dd($id[$i]);
        // DB::table('colors')->insert($datasave);
        DealSas::findOrFail($id[$i])->update($datasave);
    }
    $user = User::all();
    Notification::send($user, new SasApprove($name = Auth::user()->name , $rfq_id = $rfq->rfq_code));

    Toastr::success('SAS Approved Successfully.');
    // return redirect()->route('deal.index');
    return redirect()->route('admin.single-rfq.show',$rfq->rfq_code);
    }


















    // public function UnitPriceUpdate(Request $request, $id)
    // {
    //     //dd($request->all());
    //     $unit_price = $request->unit_price;
    //     $product_id = $request->id;

    //     $data['product'] = DealSas::where('id', $product_id)->first();
    //     $data['product']->update([
    //         'item_name'  => $request->item_name,
    //         'qty'        => $request->qty,
    //         'unit_price' => $request->unit_price,
    //     ]);
    //     return redirect()->route('deal-sas.edit',$data['product']->rfq_code);
    // }

}
