<?php

namespace App\Http\Controllers\Admin;

// use Image;
use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Sas;
use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ProductSourcing;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\MultiImage;
use App\Models\Admin\SubCategory;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\MultiIndustry;
use App\Models\Admin\MultiSolution;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use App\Models\Admin\SubSubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Models\Admin\SubSubSubCategory;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SourcingNotification;
use Illuminate\Support\Facades\Notification;

class SourcingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::where('product_status', 'sourcing')->where('action_status', '!=', 'save')->latest('id', 'desc')
            ->get(['id', 'slug', 'thumbnail', 'price', 'discount', 'name', 'stock', 'source_one_price', 'source_two_price', 'action_status', 'price_status', 'added_by']);
        return view('admin.pages.product_sourcing.sourced_products', $data);
    }
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Product::select('products.*')->where('product_status', 'sourcing')->where('action_status', '!=', 'save')->latest('id')->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()

    //             ->addColumn('action', function ($row) {
    //                 $actions = '<td>';

    //                 if ($row->action_status == 'listed') {
    //                     $actions .= '<a href="' . route('sourcing.sas', $row->slug) . '" class="text-primary" title="SAS Create">
    //                                     <i class="ph-plus-circle icons_design me-1 p-1 rounded-circle text-primary"></i>
    //                                 </a>';
    //                 } elseif ($row->action_status == 'seek_approval') {
    //                     $actions .= '<a href="' . route('sas.edit', $row->slug) . '" class="text-primary" title="SAS Edit">
    //                                     <i class="ph-pencil me-1 p-1 rounded-circle text-primary"></i>
    //                                 </a>';
    //                 }

    //                 $actions .= '<a href="' . route('product-sourcing.edit', $row->id) . '" class="text-primary" title="Sourcing Edit">
    //                                 <i class="fa-solid fa-pen-to-square me-1 p-1 rounded-circle text-primary"></i>
    //                             </a>
    //                             <a href="' . route('product-sourcing.destroy', [$row->id]) . '" class="text-danger delete">
    //                                 <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
    //                             </a>
    //                         </td>';

    //                 return $actions;
    //             })
    //             ->rawColumns(['action', 'checkbox'])
    //             ->make(true);
    //     }
    //     return view('admin.pages.product_sourcing.sourced_products');
    // }

    public function savedProducts()
    {
        $data['saved_products'] = Product::where('product_status', 'sourcing')->where('action_status', 'save')->latest('id', 'desc')
            ->get(['id', 'slug', 'thumbnail', 'price', 'discount', 'name', 'stock', 'source_one_price', 'source_two_price', 'action_status', 'price_status', 'added_by']);
        return view('admin.pages.product_sourcing.saved_products', $data);
    }
    public function approvedProducts()
    {
        $data['real_products'] = Product::where('product_status', 'product')->latest('id', 'desc')
            ->get(['id', 'slug', 'thumbnail', 'price', 'name', 'stock', 'action_status', 'price_status', 'added_by']);
        return view('admin.pages.product_sourcing.completed_products', $data);
    }
    // public function approvedProducts(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Product::where('product_status', 'product')->latest('id')->get(['id', 'slug', 'thumbnail', 'price', 'name', 'stock', 'action_status', 'price_status', 'added_by']);
    //         return Datatables::of($data)
    //             ->addIndexColumn()

    //             ->addColumn('action', function ($row) {
    //                 $btn = '<td>';

    //                 if (!empty($row->action_status) && $row->action_status == 'product_approved') {
    //                     $btn .= '<a href="' . route('sas.edit', $row->slug) . '" title="SAS Edit" class="text-primary">
    //                                 <i class="ph-pencil me-1 p-1 rounded-circle text-primary"></i>
    //                             </a>';
    //                 }

    //                 $btn .= '<a href="' . route('product-sourcing.edit', $row->id) . '" class="text-primary" title="Sourcing Edit">
    //                             <i class="fa-solid fa-pen-to-square me-1 p-1 rounded-circle text-primary"></i>
    //                         </a>
    //                         <a href="' . route('product.destroy', [$row->id]) . '" class="text-danger delete">
    //                             <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
    //                         </a>
    //                     </td>';

    //                 return $btn;
    //             })
    //             ->rawColumns(['action', 'checkbox'])
    //             ->make(true);
    //     }
    //     return view('admin.pages.product_sourcing.completed_products');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'brands'           => Brand::select('id', 'title')->latest()->get(),
            'categories'       => Category::select('id', 'title')->orderBy('id', 'DESC')->get(),
            'sub_cats'         => SubCategory::orderBy('id', 'DESC')->get(),
            'sub_sub_cats'     => SubSubCategory::orderBy('id', 'DESC')->get(),
            'sub_sub_sub_cats' => SubSubSubCategory::orderBy('id', 'DESC')->get(),
            'industrys'        => Industry::orderBy('id', 'DESC')->get(),
            'solutions'        => SolutionDetail::orderBy('id', 'DESC')->get(),
        ];
        // $data['brands']              = Brand::select('id', 'title')->latest()->get();
        // $data['categories']          = Category::select('id', 'title')->orderBy('id', 'DESC')->get();
        // $data['sub_cats']            = SubCategory::orderBy('id', 'DESC')->get();
        // $data['sub_sub_cats']        = SubSubCategory::orderBy('id', 'DESC')->get();
        // $data['sub_sub_sub_cats']    = SubSubSubCategory::orderBy('id', 'DESC')->get();
        // $data['industrys']           = Industry::orderBy('id', 'DESC')->get();
        // $data['solutions']           = SolutionDetail::orderBy('id', 'DESC')->get();
        // return view('admin.pages.product_sourcing.add', $data);
        return view('metronic.pages.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$input   = $request->all();



        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|unique:products,name|max:200',
                'thumbnail' => 'required|image|mimes:webp,png,jpg,jpeg|max:5000',

            ],
            [
                'thumbnail' => [
                    'max'   => 'The image field must be smaller than 10 MB.',
                ],
                'thumbnail' => 'The file must be an image.',
                'mimes'     => 'The :attribute must be a file of type:PNG-JPEG-JPG',
                'required'  => 'The :attribute field must be given.',
                'unique'    => 'The Product Name has already been existed in the database.',
            ]
        );


        if ($request->source_one_price > $request->source_two_price) {
            $source_one_approval = '0';
            $source_two_approval = '1';
        } else {
            $source_one_approval = '1';
            $source_two_approval = '0';
        }


        if (($request->action) == 'save') {
            if ($validator->passes()) {
                //dd($input);
                $slug = Str::slug($request->name);
                $count = Product::where('slug', $slug)->count();
                if ($count > 0) {
                    $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
                }
                $data['slug'] = $slug;

                if (($request->price_status) == 'rfq') {
                    $data['rfq'] = '1';
                } else {
                    $data['rfq'] = '0';
                }

                $ref_code = 'REF' . Str::random(7);
                $count = Product::where('ref_code', $ref_code)->count();
                if ($count > 0) {
                    $ref_code = $ref_code . '.' . date('ymdis') . '.' . rand(0, 999);
                }
                $data['ref_code'] = $ref_code;

                $image = $request->file('thumbnail');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('upload/Products/thumbnail/' . $name_gen);
                Image::make($image)->resize(376, 282)->save($path);
                $save_url = 'upload/Products/thumbnail/' . $name_gen;

                $product_id = Product::insertGetId([

                    'name'                  => $request->name,
                    'ref_code'              => $data['ref_code'],
                    'slug'                  => $data['slug'],
                    'sku_code'              => $request->sku_code,
                    'mf_code'               => $request->mf_code,
                    'product_code'          => $request->product_code,
                    'tags'                  => $request->tags,
                    // 'size'                  => $request->size,
                    'color'                 => $request->color,
                    'short_desc'            => $request->short_desc,
                    'overview'              => $request->overview,
                    'specification'         => $request->specification,
                    'accessories'           => $request->accessories,
                    'warranty'              => $request->warranty,
                    'thumbnail'             => $save_url,
                    'stock'                 => $request->stock,
                    'qty'                   => $request->qty,
                    'rfq'                   => $data['rfq'],
                    'deal'                  => $request->deal,
                    'refurbished'           => $request->refurbished,
                    'product_type'          => $request->product_type,
                    'cat_id'                => $request->cat_id,
                    'sub_cat_id'            => $request->sub_cat_id,
                    'sub_sub_cat_id'        => $request->sub_sub_cat_id,
                    'sub_sub_sub_cat_id'    => $request->sub_sub_sub_cat_id,
                    'brand_id'              => $request->brand_id,
                    'source_one_price'      => $request->source_one_price,
                    'source_two_price'      => $request->source_two_price,
                    'source_one_name'       => $request->source_one_name,
                    'source_two_name'       => $request->source_two_name,
                    'source_one_link'       => $request->source_one_link,
                    'source_two_link'       => $request->source_two_link,
                    'competetor_one_name'   => $request->competetor_one_name,
                    'competetor_one_price'  => $request->competetor_one_price,
                    'competetor_two_name'   => $request->competetor_two_name,
                    'competetor_two_price'  => $request->competetor_two_price,
                    'competetor_one_link'   => $request->competetor_one_link,
                    'competetor_two_link'   => $request->competetor_two_link,
                    'source_one_approval'   => $source_one_approval,
                    'source_two_approval'   => $source_two_approval,
                    'notification_days'     => $request->notification_days,
                    'create_date'           => date('Y-m-d', strtotime(Carbon::now())),
                    'solid_source'          => $request->solid_source,
                    'direct_principal'      => $request->direct_principal,
                    'agreement'             => $request->agreement,
                    'source_type'           => $request->source_type,
                    'source_contact'        => $request->source_contact,
                    'added_by'              => Auth::user()->name,
                    'action_status'         => 'save',
                    'product_status'        => 'sourcing',
                    'created_at'            => Carbon::now(),

                ]);

                /// Multiple Image Upload From it //////

                $images = $request->file('multi_img');
                foreach ($images as $img) {
                    $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                    $multi_path = public_path('upload/Products/multi-image/' . $make_name);
                    Image::make($img)->resize(376, 282)->save($multi_path);
                    $uploadPath = 'upload/Products/multi-image/' . $make_name;

                    MultiImage::insert([

                        'product_id' => $product_id,
                        'photo' => $uploadPath,
                        'created_at' => Carbon::now(),

                    ]);
                } // end foreach
                if (!empty($request->industry_id)) {
                    $industrys = $request->industry_id;
                    foreach ($industrys as $industry) {
                        MultiIndustry::insert([

                            'product_id' => $product_id,
                            'industry_id' => $industry,
                            'created_at' => Carbon::now(),

                        ]);
                    }
                }
                if (!empty($request->solution_id)) {
                    $solutions = $request->solution_id;
                    foreach ($solutions as $solution) {
                        MultiSolution::insert([

                            'product_id' => $product_id,
                            'solution_id' => $solution,
                            'created_at' => Carbon::now(),

                        ]);
                    }
                }

                Toastr::success('Data Inserted Successfully');
            } else {
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    Toastr::error($message, 'Failed', ['timeOut' => 30000]);
                }
            }
            return redirect()->back();
        } elseif (($request->action) == 'approval') {
            if ($validator->passes()) {
                //dd($input);
                $slug = Str::slug($request->name);
                $count = Product::where('slug', $slug)->count();
                if ($count > 0) {
                    $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
                }
                $data['slug'] = $slug;

                if (($request->price_status) == 'rfq') {
                    $data['rfq'] = '1';
                } else {
                    $data['rfq'] = '0';
                }

                if (($request->price_status) !== NULL) {
                    $data['price_status'] = $request->price_status;
                } else {
                    $data['price_status'] = 'price';
                }
                $ref_code = 'REF' . Str::random(7);
                $count = Product::where('ref_code', $ref_code)->count();
                if ($count > 0) {
                    $ref_code = $ref_code . '.' . date('ymdis') . '.' . rand(0, 999);
                }
                $data['ref_code'] = $ref_code;

                $image = $request->file('thumbnail');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('upload/Products/thumbnail/' . $name_gen);
                Image::make($image)->resize(376, 282)->save($path);
                $save_url = 'upload/Products/thumbnail/' . $name_gen;

                $product_id = Product::insertGetId([

                    'name'                      => $request->name,
                    'ref_code'                  => $data['ref_code'],
                    'slug'                      => $data['slug'],
                    'sku_code'                  => $request->sku_code,
                    'mf_code'                   => $request->mf_code,
                    'product_code'              => $request->product_code,
                    'tags'                      => $request->tags,
                    // 'size'                      => $request->size,
                    'color'                     => $request->color,
                    'short_desc'                => $request->short_desc,
                    'overview'                  => $request->overview,
                    'specification'             => $request->specification,
                    'accessories'               => $request->accessories,
                    'warranty'                  => $request->warranty,
                    'thumbnail'                 => $save_url,
                    'stock'                     => $request->stock,
                    'qty'                       => $request->qty,
                    'rfq'                       => $data['rfq'],
                    'price_status'              => $data['price_status'],
                    'deal'                      => $request->deal,
                    'refurbished'               => $request->refurbished,
                    'product_type'              => $request->product_type,
                    'cat_id'                    => $request->cat_id,
                    'sub_cat_id'                => $request->sub_cat_id,
                    'sub_sub_cat_id'            => $request->sub_sub_cat_id,
                    'sub_sub_sub_cat_id'        => $request->sub_sub_sub_cat_id,
                    'brand_id'                  => $request->brand_id,
                    'source_one_price'          => $request->source_one_price,
                    'source_two_price'          => $request->source_two_price,
                    'source_one_name'           => $request->source_one_name,
                    'source_two_name'           => $request->source_two_name,
                    'source_one_link'           => $request->source_one_link,
                    'source_two_link'           => $request->source_two_link,
                    'competetor_one_price'      => $request->competetor_one_price,
                    'competetor_two_price'      => $request->competetor_two_price,
                    'competetor_one_name'       => $request->competetor_one_name,
                    'competetor_two_name'       => $request->competetor_two_name,
                    'competetor_one_link'       => $request->competetor_one_link,
                    'competetor_two_link'       => $request->competetor_two_link,
                    'source_one_approval'       => $source_one_approval,
                    'source_two_approval'       => $source_two_approval,
                    'source_one_estimate_time'  => $request->source_one_estimate_time,
                    'source_one_principal_time' => $request->source_one_principal_time,
                    'source_one_shipping_time'  => $request->source_one_shipping_time,
                    'source_one_location'       => $request->source_one_location,
                    'source_one_country'        => $request->source_one_country,
                    'source_two_estimate_time'  => $request->source_two_estimate_time,
                    'source_two_principal_time' => $request->source_two_principal_time,
                    'source_two_shipping_time'  => $request->source_two_shipping_time,
                    'source_two_location'       => $request->source_two_location,
                    'source_two_country'        => $request->source_two_country,
                    'notification_days'         => $request->notification_days,
                    'create_date'               => date('Y-m-d', strtotime(Carbon::now())),
                    'solid_source'              => $request->solid_source,
                    'direct_principal'          => $request->direct_principal,
                    'agreement'                 => $request->agreement,
                    'source_type'               => $request->source_type,
                    'source_contact'            => $request->source_contact,
                    'sas_price'                 => $request->sas_price,
                    'added_by'                  => Auth::user()->name,
                    'action_status'             => 'listed',
                    'product_status'            => 'sourcing',
                    'created_at'                => Carbon::now(),

                ]);

                /// Multiple Image Upload From it //////

                $images = $request->file('multi_img');
                if (!empty($images)) {
                    foreach ($images as $img) {
                        $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                        $multi_path = public_path('upload/Products/multi-image/' . $make_name);
                        Image::make($img)->resize(376, 282)->save($multi_path);
                        $uploadPath = 'upload/Products/multi-image/' . $make_name;


                        MultiImage::insert([

                            'product_id' => $product_id,
                            'photo' => $uploadPath,
                            'created_at' => Carbon::now(),

                        ]);
                    } // end foreach
                }
                if (!empty($request->industry_id)) {
                    $industrys = $request->industry_id;
                    foreach ($industrys as $industry) {
                        MultiIndustry::insert([

                            'product_id' => $product_id,
                            'industry_id' => $industry,
                            'created_at' => Carbon::now(),

                        ]);
                    }
                }
                if (!empty($request->solution_id)) {
                    $solutions = $request->solution_id;
                    foreach ($solutions as $solution) {
                        MultiSolution::insert([

                            'product_id' => $product_id,
                            'solution_id' => $solution,
                            'created_at' => Carbon::now(),

                        ]);
                    }
                }


                $data['product'] = Product::where('id', $product_id)->first();

                $name = Auth::user()->name;
                $users = User::where(function ($query) {
                    $query->whereJsonContains('department', 'business')
                        ->orwhereJsonContains('department', 'logistics');
                })->where('role', 'admin')->get();
                $slug = $data['slug'];
                $user_emails = User::where(function ($query) {
                    $query->whereJsonContains('department', 'business')
                        ->orwhereJsonContains('department', 'logistics');
                })->where('role', 'admin')->pluck('email')->toArray();
                // $user_emails = 'khandkershahed23@gmail.com';


                $data = [

                    'added_by' => $name,
                    'name' => $request->name,
                    'sku_code'  => $request->sku_code,
                    'photo' => $save_url,
                    'create_date' => date('Y-m-d', strtotime(Carbon::now())),
                    'category' => Category::where('id', $request->cat_id)->value('title'),
                    'brand' => Brand::where('id', $request->brand_id)->value('title'),
                    'product_id' => $data['product']->slug,

                ];

                Notification::send($users, new SourcingNotification($name, $slug));
                $mail = Mail::to($user_emails)->send(new ProductSourcing($data));

                if ($mail) {
                    Toastr::success('Data has added Successfully');
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


            return redirect()->route('product-sourcing.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with(['solutions:id', 'industries:id'])->findOrFail($id);

        $data['products']            = $product;
        $data['multiImgs']           = MultiImage::where('product_id', $id)->get(['id', 'product_id', 'photo']);
        $data['brands']              = Brand::select('id', 'title')->latest('id')->get();
        $data['categories']          = Category::select('id', 'title')->latest('id')->get();
        $data['sub_cats']            = SubCategory::select('id', 'title')->latest('id')->get();
        $data['sub_sub_cats']        = SubSubCategory::select('id', 'title')->latest('id')->get();
        $data['sub_sub_sub_cats']    = SubSubSubCategory::select('id', 'title')->latest('id')->get();
        $data['industrys']           = Industry::select('id', 'title')->latest('id')->get();
        $data['solutions']           = SolutionDetail::select('id', 'name')->latest('id')->get();
        $data['selectedSolutions']   = $product->solutions->pluck('id')->toArray();
        $data['selectedIndustries']  = $product->industries->pluck('id')->toArray();

        return view('admin.pages.product_sourcing.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $product_id = $id;
    //     $product = Product::where('id', $id)->first();
    //     if ($request->source_one_price > $request->source_two_price) {
    //         $source_one_approval = '0';
    //         $source_two_approval = '1';
    //     } else {
    //         $source_one_approval = '1';
    //         $source_two_approval = '0';
    //     }

    //     if (!empty($product->slug)) {
    //         $data['slug'] = $product->slug;
    //     } else {
    //         $slug = Str::slug($request->name);
    //         $count = Product::where('slug', $slug)->count();
    //         if ($count > 0) {
    //             $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
    //         }
    //         $data['slug'] = $slug;
    //     }



    //     if (($request->price_status) == 'rfq') {
    //         $data['rfq'] = '1';
    //     } else {
    //         $data['rfq'] = '0';
    //     }

    //     Product::findOrFail($product_id)->update([
    //         'name'                      => $request->name,
    //         'ref_code'                  => $product->ref_code,
    //         'slug'                      => $data['slug'],
    //         'sku_code'                  => $request->sku_code,
    //         'mf_code'                   => $request->mf_code,
    //         'product_code'              => $request->product_code,
    //         'tags'                      => $request->tags,
    //         'size'                      => $request->size,
    //         'color'                     => $request->color,
    //         'short_desc'                => $request->short_desc,
    //         'overview'                  => $request->overview,
    //         'specification'             => $request->specification,
    //         'accessories'               => $request->accessories,
    //         'warranty'                  => $request->warranty,
    //         'stock'                     => $request->stock,
    //         'qty'                       => $request->qty,
    //         'rfq'                       => $data['rfq'],
    //         'price_status'              => $request->price_status,
    //         'deal'                      => $request->deal,
    //         'refurbished'               => $request->refurbished,
    //         'product_type'              => $request->product_type,
    //         'cat_id'                    => $request->cat_id,
    //         'sub_cat_id'                => $request->sub_cat_id,
    //         'sub_sub_cat_id'            => $request->sub_sub_cat_id,
    //         'sub_sub_sub_cat_id'        => $request->sub_sub_sub_cat_id,
    //         'brand_id'                  => $request->brand_id,
    //         'source_one_price'          => $request->source_one_price,
    //         'source_two_price'          => $request->source_two_price,
    //         'source_one_name'           => $request->source_one_name,
    //         'source_two_name'           => $request->source_two_name,
    //         'source_one_link'           => $request->source_one_link,
    //         'source_two_link'           => $request->source_two_link,
    //         'competetor_one_price'      => $request->competetor_one_price,
    //         'competetor_two_price'      => $request->competetor_two_price,
    //         'competetor_one_name'       => $request->competetor_one_name,
    //         'competetor_two_name'       => $request->competetor_two_name,
    //         'competetor_one_link'       => $request->competetor_one_link,
    //         'competetor_two_link'       => $request->competetor_two_link,
    //         'source_one_approval'       => $source_one_approval,
    //         'source_two_approval'       => $source_two_approval,
    //         'source_one_estimate_time'  => $request->source_one_estimate_time,
    //         'source_one_principal_time' => $request->source_one_principal_time,
    //         'source_one_shipping_time'  => $request->source_one_shipping_time,
    //         'source_one_location'       => $request->source_one_location,
    //         'source_one_country'        => $request->source_one_country,
    //         'source_two_estimate_time'  => $request->source_two_estimate_time,
    //         'source_two_principal_time' => $request->source_two_principal_time,
    //         'source_two_shipping_time'  => $request->source_two_shipping_time,
    //         'source_two_location'       => $request->source_two_location,
    //         'source_two_country'        => $request->source_two_country,
    //         'notification_days'         => $request->notification_days,
    //         'solid_source'              => $request->solid_source,
    //         'direct_principal'          => $request->direct_principal,
    //         'agreement'                 => $request->agreement,
    //         'source_type'               => $request->source_type,
    //         'source_contact'            => $request->source_contact,
    //         'sas_price'                 => $request->sas_price,
    //         'added_by'                  => Auth::user()->name,
    //         'updated_at'                => Carbon::now(),

    //     ]);


    //     $images = $request->file('multi_img');
    //     if (!empty($images)) {
    //         foreach ($images as $img) {
    //             $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
    //             $multi_path = public_path('upload/Products/multi-image/' . $make_name);
    //             move_uploaded_file($img, $multi_path);

    //             $uploadPath = 'upload/Products/multi-image/' . $make_name;

    //             MultiImage::insert([
    //                 'product_id' => $product_id,
    //                 'photo' => $uploadPath,
    //                 'created_at' => Carbon::now(),
    //             ]);
    //         }
    //     }

    //     if (!empty($request->industry_id)) {
    //         $industry_destroys = MultiIndustry::where('product_id', $product_id)->get();

    //         foreach ($industry_destroys as $industry_destroy) {
    //             MultiIndustry::find($industry_destroy->id)->delete();
    //         }

    //         $industrys = $request->industry_id;
    //         foreach ($industrys as $industry) {
    //             MultiIndustry::insert([

    //                 'product_id' => $product_id,
    //                 'industry_id' => $industry,
    //                 'created_at' => Carbon::now(),

    //             ]);
    //         }
    //     }
    //     if (!empty($request->solution_id)) {
    //         $solution_destroys = MultiSolution::where('product_id', $product_id)->get();

    //         foreach ($solution_destroys as $solution_destroy) {
    //             MultiSolution::find($solution_destroy->id)->delete();
    //         }
    //         $solutions = $request->solution_id;
    //         foreach ($solutions as $solution) {
    //             MultiSolution::insert([

    //                 'product_id' => $product_id,
    //                 'solution_id' => $solution,
    //                 'created_at' => Carbon::now(),

    //             ]);
    //         }
    //     }

    //     Toastr::success('Product Updated Without Image Successfully');

    //     return redirect()->back();
    // }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::with(['industries', 'solutions'])->findOrFail($id);
            // Slug logic
            if ($product->slug) {
                $slug = $product->slug;
            } else {
                $slug = Str::slug($request->name);
                if (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                    $slug .= '-' . date('ymdis') . '-' . rand(0, 999);
                }
            }

            // RFQ and Source Approval Logic
            $rfq = $request->price_status === 'rfq' ? '1' : '0';
            $source_one_approval = $request->source_one_price > $request->source_two_price ? '0' : '1';
            $source_two_approval = $request->source_one_price > $request->source_two_price ? '1' : '0';

            // Main product update
            $product->update([
                'name'                      => $request->name,
                'ref_code'                  => $product->ref_code,
                'slug'                      => $slug,
                'sku_code'                  => $request->sku_code,
                'mf_code'                   => $request->mf_code,
                'product_code'              => $request->product_code,
                'tags'                      => $request->tags,
                'size'                      => $request->size,
                'color'                     => $request->color,
                'short_desc'                => $request->short_desc,
                'overview'                  => $request->overview,
                'specification'             => $request->specification,
                'accessories'               => $request->accessories,
                'warranty'                  => $request->warranty,
                'stock'                     => $request->stock,
                'qty'                       => $request->qty,
                'rfq'                       => $rfq,
                'price_status'              => $request->price_status,
                'deal'                      => $request->deal,
                'refurbished'               => $request->refurbished,
                'product_type'              => $request->product_type,
                'cat_id'                    => $request->cat_id,
                'sub_cat_id'                => $request->sub_cat_id,
                'sub_sub_cat_id'            => $request->sub_sub_cat_id,
                'sub_sub_sub_cat_id'        => $request->sub_sub_sub_cat_id,
                'brand_id'                  => $request->brand_id,
                'source_one_price'          => $request->source_one_price,
                'source_two_price'          => $request->source_two_price,
                'source_one_name'           => $request->source_one_name,
                'source_two_name'           => $request->source_two_name,
                'source_one_link'           => $request->source_one_link,
                'source_two_link'           => $request->source_two_link,
                'competetor_one_price'      => $request->competetor_one_price,
                'competetor_two_price'      => $request->competetor_two_price,
                'competetor_one_name'       => $request->competetor_one_name,
                'competetor_two_name'       => $request->competetor_two_name,
                'competetor_one_link'       => $request->competetor_one_link,
                'competetor_two_link'       => $request->competetor_two_link,
                'source_one_approval'       => $source_one_approval,
                'source_two_approval'       => $source_two_approval,
                'source_one_estimate_time'  => $request->source_one_estimate_time,
                'source_one_principal_time' => $request->source_one_principal_time,
                'source_one_shipping_time'  => $request->source_one_shipping_time,
                'source_one_location'       => $request->source_one_location,
                'source_one_country'        => $request->source_one_country,
                'source_two_estimate_time'  => $request->source_two_estimate_time,
                'source_two_principal_time' => $request->source_two_principal_time,
                'source_two_shipping_time'  => $request->source_two_shipping_time,
                'source_two_location'       => $request->source_two_location,
                'source_two_country'        => $request->source_two_country,
                'notification_days'         => $request->notification_days,
                'solid_source'              => $request->solid_source,
                'direct_principal'          => $request->direct_principal,
                'agreement'                 => $request->agreement,
                'source_type'               => $request->source_type,
                'source_contact'            => $request->source_contact,
                'sas_price'                 => $request->sas_price,
                'added_by'                  => auth()->user()->name,
                'updated_at'                => now(),
            ]);

            // Handle Multi Images
            if ($request->hasFile('multi_img')) {
                foreach ($request->file('multi_img') as $img) {
                    $fileName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                    $img->move(public_path('upload/Products/multi-image'), $fileName);

                    MultiImage::create([
                        'product_id' => $product->id,
                        'photo' => 'upload/Products/multi-image/' . $fileName,
                        'created_at' => now(),
                    ]);
                }
            }

            // Sync industries
            if ($request->filled('industry_id')) {
                $product->industries()->sync($request->industry_id);
            }

            // Sync solutions
            if ($request->filled('solution_id')) {
                $product->solutions()->sync($request->solution_id);
            }

            DB::commit();

            Toastr::success('Product Updated Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            // \Log::error('Product update failed: ' . $e->getMessage());
            Toastr::error('Update failed. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        //unlink($product->thumbnail);
        if (File::exists($product->thumbnail)) {
            File::delete($product->thumbnail);
        }
        Product::findOrFail($id)->delete();

        $imges = MultiImage::where('product_id', $id)->get();
        foreach ($imges as $img) {
            //unlink($img->photo_name);
            if (File::exists($img->photo_name)) {
                File::delete($img->photo_name);
            }
            MultiImage::where('product_id', $id)->delete();
        }

        // return redirect()->back();
    }

    public function ProductApprove()
    {

        $data['products'] = Product::where('product_status', 'sourcing')->where('action_status', 'seek_approval')->latest()->get();
        return view('admin.pages.product_sourcing.approve', $data);
    }

    public function StoreProductApproval(Request $request, $id)
    {
        //dd($request->all());
        $product_id = Product::where('slug', $id)->where('product_status', 'sourcing')->first();
        Product::findOrFail($product_id->id)->update([
            'price'           => $request->price,
            'action_status'   => 'product_approved',
            'product_status' => 'product',
        ]);

        Toastr::success('Product has been approved Successfully');
        return redirect()->route('product-sourcing.index');
    }
}
