<?php

namespace App\Http\Controllers\SAS;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\ProductSAS;
use App\Models\Admin\Sas;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Sourcing;
use App\Http\Controllers\Controller;
use App\Mail\ProductApprove as MailProductApprove;
use App\Mail\RejectSas;
use App\Notifications\ProductApprove;
use App\Notifications\RejectProductSASNotification;
use App\Notifications\SASNotification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class SASController extends Controller
{

    public function index()
    {
        $data['pending_products'] = Product::where('action_status', 'listed')->orderBy('id', 'desc')->get(['id', 'ref_code', 'thumbnail', 'name', 'slug', 'price_status']);
        $data['pending_approvals'] = Product::where('action_status', 'seek_approval')->orderBy('id', 'desc')->get(['id', 'ref_code', 'thumbnail', 'name', 'slug', 'price_status']);
        $data['products'] = Product::where('product_status', 'product')->orderBy('id', 'desc')->get(['id', 'ref_code', 'thumbnail', 'name', 'slug', 'price_status']);
        return view('admin.pages.sas.all', $data);
    }

    public function store(Request $request)
    {
        // $create_date = Carbon::now();
        $validator = Validator::make(
            $request->all(),
            [
                'ref_code'          => 'required|unique:sas',
                'cog_price'         => 'nullable',
                'sales_price'       => 'nullable',
                'bank_charge'       => 'nullable',
                'customs'           => 'nullable',
                'tax'               => 'nullable',
                'utility_cost'      => 'nullable',
                'shiping_cost'      => 'nullable',
                'sales_comission'   => 'nullable',
                'liability'         => 'nullable',
                'regular_discounts' => 'nullable',
                'rebates'           => 'nullable',
                'capital_share'     => 'nullable',
                'management_cost'   => 'nullable',
                'net_profit'        => 'nullable',
                'gross_profit'      => 'nullable',
            ],
            [
                'unique' => 'The SAS REF Code Already been taken.',
            ]
        );

        if ($validator->passes()) {
            Sas::create([
                'create'            => date('Y-m-d H:i:s', strtotime(Carbon::now())),
                'item_name'         => $request->item_name,
                'product_id'        => $request->product_id,
                'ref_code'          => $request->ref_code,
                'cog_price'         => $request->cog_price,
                'sales_price'       => empty($request->sales_price) ? $request->cog_price : $request->sales_price,
                'bank_charge'       => $request->bank_charge,
                'customs'           => $request->customs,
                'tax'               => $request->tax,
                'utility_cost'      => $request->utility_cost,
                'shiping_cost'      => $request->shiping_cost,
                'sales_comission'   => $request->sales_comission,
                'liability'         => $request->liability,
                'regular_discounts' => $request->regular_discounts,
                'rebates'           => $request->rebates,
                'capital_share'     => $request->capital_share,
                'management_cost'   => $request->management_cost,
                'net_profit'        => $request->net_profit,
                'gross_profit'      => $request->gross_profit,
                'net_profit_amount' => $request->net_profit_amount,
                'gross_profit_amount' => $request->gross_profit_amount,
            ]);
            Product::findOrFail($request->product_id)->update([
                'action_status'  => 'seek_approval',
                'ref_code'       => $request->ref_code,
            ]);
            $data['product'] = Product::where('id', $request->product_id)->first(['slug', 'name', 'sku_code', 'cat_id', 'brand_id']);
            $name = Auth::user()->name;
            $slug = $data['product']->slug;
            $users = User::inDepartments(['site', 'super_admin'])
                ->orderBy('id', 'DESC')
                ->get(['id', 'name']);
            $user_emails = $this->sourcing_emails;
            // $user_emails = 'khandkershahed23@gmail.com';


            $data = [
                'added_by' => $name,
                'name' => $data['product']->name,
                'sku_code'  => $data['product']->sku_code,
                'create_date' => date('Y-m-d', strtotime(Carbon::now())),
                'category' => Category::where('id', $data['product']->cat_id)->value('title'),
                'brand' => Brand::where('id', $data['product']->brand_id)->value('title'),
                'product_id' => $data['product']->slug,

            ];
            Notification::send($users, new SASNotification($name, $slug));
            $mail = Mail::to($user_emails);
            if ($mail) {
                $mail->send(new ProductSAS($data));
                Toastr::success('SAS has created Successfully');
            } else {
                Toastr::error('Email Failed to send', ['timeOut' => 30000]);
                return redirect()->back();
            }
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->route('sas.index');
    }

    public function show($id)
    {

        $data['product'] = Product::where('slug', $id)->first();
        $data['sourcing'] = Sas::where('product_id', $data['product']->id)->first();
        //dd($data['sourcing']);
        return view('admin.pages.sas.sas_approve', $data);
    }

    public function edit($id)
    {
        $data['product'] = Product::where('slug', $id)->first(['id', 'name', 'ref_code']);
        $data['sourcing'] = Sas::where('product_id', $data['product']->id)->first();
        //dd($data['sourcing']);
        return view('admin.pages.sas.sourcing_sas_edit', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($id);
        $sas = Sas::where('id', $id)->first();
        //dd($sas);
        $validator = Validator::make(
            $request->all(),
            [
                'ref_code'          => 'nullable',
                'cog_price'         => 'nullable',
                'sales_price'       => 'nullable',
                'bank_charge'       => 'nullable',
                'customs'           => 'nullable',
                'tax'               => 'nullable',
                'utility_cost'      => 'nullable',
                'shiping_cost'      => 'nullable',
                'sales_comission'   => 'nullable',
                'liability'         => 'nullable',
                'regular_discounts' => 'nullable',
                'rebates'           => 'nullable',
                'capital_share'     => 'nullable',
                'management_cost'   => 'nullable',
                'net_profit'        => 'nullable',
                'gross_profit'      => 'nullable',
            ],
        );

        if ($validator->passes()) {
            $sas->update([
                'create'            => $request->create,
                'item_name'         => $request->item_name,
                'product_id'        => $request->product_id,
                'ref_code'          => $request->ref_code,
                'cog_price'         => $request->cog_price,
                'sales_price'       => $request->sales_price,
                'bank_charge'       => $request->bank_charge,
                'customs'           => $request->customs,
                'tax'               => $request->tax,
                'utility_cost'      => $request->utility_cost,
                'shiping_cost'      => $request->shiping_cost,
                'sales_comission'   => $request->sales_comission,
                'liability'         => $request->liability,
                'regular_discounts' => $request->regular_discounts,
                'rebates'           => $request->rebates,
                'capital_share'     => $request->capital_share,
                'management_cost'   => $request->management_cost,
                'net_profit'        => $request->net_profit,
                'gross_profit'      => $request->gross_profit,
                'net_profit_amount' => $request->net_profit_amount,
                'gross_profit_amount' => $request->gross_profit_amount,
            ]);
            Toastr::success('SAS Updated Successfully.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        $product = Product::where('id', $sas->product_id)->first();
        // dd($sas);
        if (($product->product_status) != 'product') {
            Product::findOrFail($sas->product_id)->update([
                'price'           => $request->sales_price,
                'action_status'   => 'product_approved',
                'product_status'  => 'product',
            ]);
            $data['product'] = Product::where('id', $sas->product_id)->first(['slug', 'name', 'sku_code', 'cat_id', 'brand_id']);
            $name = Auth::user()->name;
            $slug = $data['product']->slug;
            $users = User::inDepartments(['site', 'super_admin'])
                ->orderBy('id', 'DESC')
                ->get(['id', 'name']);
            $user_emails = $this->sourcing_emails;
            // $user_emails = 'khandkershahed23@gmail.com';


            $data = [
                'added_by' => $name,
                'name' => $data['product']->name,
                'sku_code'  => $data['product']->sku_code,
                'create_date' => date('Y-m-d', strtotime(Carbon::now())),
                'category' => Category::where('id', $data['product']->cat_id)->value('title'),
                'brand' => Brand::where('id', $data['product']->brand_id)->value('title'),
                'product_id' => $data['product']->slug,

            ];
            Notification::send($users, new ProductApprove($name, $slug));
            $mail = Mail::to($user_emails);
            if ($mail) {
                $mail->send(new MailProductApprove($data));
            } else {
                Toastr::error('Email Failed to send', ['timeOut' => 30000]);
                return redirect()->back();
            }
            Toastr::success('Product has been approved Successfully');
        } else {
            Product::findOrFail($sas->product_id)->update([
                'price'           => $request->sales_price,
                'action_status'   => 'product_approved',
                'product_status'  => 'product',
            ]);
        }
        return redirect()->route('sas.index');
    }

    public function SourcingSas($id)
    {
        $data['product'] = Product::where('slug', $id)->first();
        // dd($data['product']);
        return view('admin.pages.sas.sourcing_sas', $data);
    }

    public function SasRejection(Request $request)
    {
        //  dd($request->rejection_note);
        $data['product'] = Product::where('slug', $request->product_id)->first();

        Product::findOrFail($data['product']->id)->update([
            'action_status'  => 'rejected',
            'rejection_note' => $request->rejection_note,
        ]);


        $name = Auth::user()->name;
        $users = User::inDepartments(['site', 'super_admin'])
                ->orderBy('id', 'DESC')
                ->get(['id', 'name']);
            $user_emails = $this->sourcing_emails;
        // $user_emails = 'khandkershahed23@gmail.com';

        $data = [

            'added_by'       => $data['product']->added_by,
            'reject_by'      => $name,
            'name'           => $data['product']->name,
            'sku_code'       => $data['product']->sku_code,
            'photo'          => $data['product']->thumbnail,
            'reject_date'    => date('Y-m-d', strtotime(Carbon::now())),
            'category'       => Category::where('id', $data['product']->cat_id)->value('title'),
            'brand'          => Brand::where('id', $data['product']->brand_id)->value('title'),
            'product_id'     => $data['product']->slug,
            'rejection_note' => $request->rejection_note,

        ];
        // dd($data);

        $mail = Mail::to($user_emails);
        if ($mail) {
            $mail->send(new RejectSas($data));
        } else {
            Toastr::error('Email Failed to send', ['timeOut' => 30000]);
            return redirect()->back();
        }

        // Notification::send($users, new RejectProductSASNotification($name , $slug));
        Toastr::success('Product Rejected');
        return redirect()->route('product-sourcing.index');
    }
}
