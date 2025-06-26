<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Client\Client;
use App\Models\Partner\Partner;
use App\Models\Admin\OfferPrice;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OfferPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['offerPrices'] = OfferPrice::latest()->get();
        return view('admin.pages.offerPrice.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users']            = User::select('users.id', 'users.region_name')->get();
        $data['products']         = Product::select('products.id', 'products.name')->get();
        $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['clients']          = Client::select('clients.id', 'clients.name')->get();
        $data['partners']         = Partner::select('partners.id', 'partners.name')->get();
        return view('admin.pages.offerPrice.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'sales_man_id_L1'      => 'nullable|exists:users,id',
                'sales_man_id_T1'      => 'nullable|exists:users,id',
                'sales_man_id_T2'      => 'nullable|exists:users,id',
                'client_id'            => 'nullable|exists:clients,id',
                'partner_id'           => 'nullable|exists:partners,id',
                'product_id'           => 'nullable|exists:products,id',
                'solution_id'          => 'nullable|exists:solution_details,id',
                'offer_price_code'     => 'required|unique:offer_prices,offer_price_code',
                'client_type'          => 'nullable|in:client,partner',
                'name'                 => 'nullable|string|max:255',
                'email'                => 'nullable|email|max:255',
                'phone'                => 'nullable|string|max:255',
                'company_name'         => 'nullable|string|max:255',
                'designation'          => 'nullable|string|max:255',
                'address'              => 'nullable|string',
                'partner_name'         => 'nullable|string|max:255',
                'partner_email'        => 'nullable|email|max:255',
                'partner_phone'        => 'nullable|string|max:255',
                'partner_company_name' => 'nullable|string|max:255',
                'partner_designation'  => 'nullable|string|max:255',
                'partner_address'      => 'nullable|string',
                'create_date'          => 'nullable|date',
                'close_date'           => 'nullable|date',
                'sale_date'            => 'nullable|date',
                'qty'                  => 'nullable|integer',
                'image'                => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
                'message'              => 'nullable|string',
                'call'                 => 'nullable|in:0,1',
                'regular'              => 'nullable|in:0,1',
                'special'              => 'nullable|in:0,1',
                'tax_status'           => 'nullable|in:0,1',
                'status'               => 'nullable|string|max:255',
                'tax'                  => 'nullable|numeric',
                'vat'                  => 'nullable|numeric',
                'offer_price'          => 'nullable|numeric',
                'our_price'            => 'nullable|numeric',
                'price_text'           => 'nullable|string'
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $image = $request->image;
            $uploadPath = storage_path('app/public/');
            if (isset($image)) {
                $globalFunImage = Helper::singleUpload($image, $uploadPath);
            } else {
                $globalFunImage = ['status' => 0];
            }
            OfferPrice::create([
                'sales_man_id_L1'      => $request->sales_man_id_L1,
                'sales_man_id_T1'      => $request->sales_man_id_T1,
                'sales_man_id_T2'      => $request->sales_man_id_T2,
                'client_id'            => $request->client_id,
                'partner_id'           => $request->partner_id,
                'product_id'           => $request->product_id,
                'solution_id'          => $request->solution_id,
                'offer_price_code'     => $request->offer_price_code,
                'client_type'          => $request->client_type,
                'name'                 => $request->name,
                'email'                => $request->email,
                'phone'                => $request->phone,
                'company_name'         => $request->company_name,
                'designation'          => $request->designation,
                'address'              => $request->address,
                'partner_name'         => $request->partner_name,
                'partner_email'        => $request->partner_email,
                'partner_phone'        => $request->partner_phone,
                'partner_company_name' => $request->partner_company_name,
                'partner_designation'  => $request->partner_designation,
                'partner_address'      => $request->partner_address,
                'create_date'          => $request->create_date,
                'close_date'           => $request->close_date,
                'sale_date'            => $request->sale_date,
                'qty'                  => $request->qty,
                'image'    => $globalFunImage['status'] == 1 ? $globalFunImage['file_name'] : '',
                'message'     => $request->message,
                'call'        => $request->call,
                'regular'     => $request->regular,
                'special'     => $request->special,
                'tax_status'  => $request->tax_status,
                'status'      => $request->status,
                'tax'         => $request->tax,
                'vat'         => $request->vat,
                'offer_price' => $request->offer_price,
                'our_price'   => $request->our_price,
                'price_text'  => $request->price_text,
            ]);
            Toastr::success('Data has been created');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['users']            = User::select('users.id', 'users.region_name')->get();
        $data['products']         = Product::select('products.id', 'products.name')->get();
        $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['clients']          = Client::select('clients.id', 'clients.name')->get();
        $data['partners']         = Partner::select('partners.id', 'partners.name')->get();
        $data['offerPrices']      = OfferPrice::find($id);
        return view('admin.pages.offerPrice.edit', $data);
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
        $offerPrice = OfferPrice::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'sales_man_id_L1'      => 'nullable|exists:users,id',
                'sales_man_id_T1'      => 'nullable|exists:users,id',
                'sales_man_id_T2'      => 'nullable|exists:users,id',
                'client_id'            => 'nullable|exists:clients,id',
                'partner_id'           => 'nullable|exists:partners,id',
                'product_id'           => 'nullable|exists:products,id',
                'solution_id'          => 'nullable|exists:solution_details,id',
                'offer_price_code'     => 'required|unique:offer_prices,offer_price_code',
                'client_type'          => 'nullable|in:client,partner',
                'name'                 => 'nullable|string|max:255',
                'email'                => 'nullable|email|max:255',
                'phone'                => 'nullable|string|max:255',
                'company_name'         => 'nullable|string|max:255',
                'designation'          => 'nullable|string|max:255',
                'address'              => 'nullable|string',
                'partner_name'         => 'nullable|string|max:255',
                'partner_email'        => 'nullable|email|max:255',
                'partner_phone'        => 'nullable|string|max:255',
                'partner_company_name' => 'nullable|string|max:255',
                'partner_designation'  => 'nullable|string|max:255',
                'partner_address'      => 'nullable|string',
                'create_date'          => 'nullable|date',
                'close_date'           => 'nullable|date',
                'sale_date'            => 'nullable|date',
                'qty'                  => 'nullable|integer',
                'image'                => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
                'message'              => 'nullable|string',
                'call'                 => 'nullable|in:0,1',
                'regular'              => 'nullable|in:0,1',
                'special'              => 'nullable|in:0,1',
                'tax_status'           => 'nullable|in:0,1',
                'status'               => 'nullable|string|max:255',
                'tax'                  => 'nullable|numeric',
                'vat'                  => 'nullable|numeric',
                'offer_price'          => 'nullable|numeric',
                'our_price'            => 'nullable|numeric',
                'price_text'           => 'nullable|string'
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($offerPrice)) {
                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/') . $offerPrice->image)) {
                        File::delete(public_path('storage/') . $offerPrice->image);
                    }
                    if (File::exists(public_path('storage/') . $offerPrice->image)) {
                        File::delete(public_path('storage/') . $offerPrice->image);
                    }
                    if (File::exists(public_path('storage/thumb/') . $offerPrice->image)) {
                        File::delete(public_path('storage/thumb/') . $offerPrice->image);
                    }
                }

                $offerPrice->update([
                    'sales_man_id_L1'      => $request->sales_man_id_L1,
                    'sales_man_id_T1'      => $request->sales_man_id_T1,
                    'sales_man_id_T2'      => $request->sales_man_id_T2,
                    'client_id'            => $request->client_id,
                    'partner_id'           => $request->partner_id,
                    'product_id'           => $request->product_id,
                    'solution_id'          => $request->solution_id,
                    'offer_price_code'     => $request->offer_price_code,
                    'client_type'          => $request->client_type,
                    'name'                 => $request->name,
                    'email'                => $request->email,
                    'phone'                => $request->phone,
                    'company_name'         => $request->company_name,
                    'designation'          => $request->designation,
                    'address'              => $request->address,
                    'partner_name'         => $request->partner_name,
                    'partner_email'        => $request->partner_email,
                    'partner_phone'        => $request->partner_phone,
                    'partner_company_name' => $request->partner_company_name,
                    'partner_designation'  => $request->partner_designation,
                    'partner_address'      => $request->partner_address,
                    'create_date'          => $request->create_date,
                    'close_date'           => $request->close_date,
                    'sale_date'            => $request->sale_date,
                    'qty'                  => $request->qty,
                    'image'    => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $offerPrice->image,
                    'message'     => $request->message,
                    'call'        => $request->call,
                    'regular'     => $request->regular,
                    'special'     => $request->special,
                    'tax_status'  => $request->tax_status,
                    'status'      => $request->status,
                    'tax'         => $request->tax,
                    'vat'         => $request->vat,
                    'offer_price' => $request->offer_price,
                    'our_price'   => $request->our_price,
                    'price_text'  => $request->price_text,
                ]);
            }

            Toastr::success('Data has been updated');
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
        $offerPrice = OfferPrice::find($id);

        if (File::exists(public_path('storage/') . $offerPrice->image)) {
            File::delete(public_path('storage/') . $offerPrice->image);
        }
        if (File::exists(public_path('storage/') . $offerPrice->image)) {
            File::delete(public_path('storage/') . $offerPrice->image);
        }
        if (File::exists(public_path('storage/thumb/') . $offerPrice->image)) {
            File::delete(public_path('storage/thumb/') . $offerPrice->image);
        }
        $offerPrice->delete();
    }
}
