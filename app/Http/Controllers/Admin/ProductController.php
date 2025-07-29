<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\Solution;
use App\Models\Admin\MultiImage;
use App\Models\Admin\SubCategory;
use App\Http\Controllers\Controller;
use App\Models\Admin\MultiIndustry;
use App\Models\Admin\MultiSolution;
use App\Models\Admin\SolutionDetail;
use App\Models\Admin\SubSubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Admin\SubSubSubCategory;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $products = Product::where('product_status', 'product')->latest()->get();
        return view('admin.pages.product.product_all', compact('products'));
    } // End Method


    public function AddProduct()
    {
        //$activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $data['brands']              = Brand::latest()->get();
        $data['categories']          = Category::orderBy('id', 'DESC')->get();
        $data['sub_cats']            = SubCategory::orderBy('id', 'DESC')->get();
        $data['sub_sub_cats']        = SubSubCategory::orderBy('id', 'DESC')->get();
        $data['sub_sub_sub_cats']    = SubSubSubCategory::orderBy('id', 'DESC')->get();
        $data['industrys']           = Industry::orderBy('id', 'DESC')->get();
        $data['solutions']           = SolutionDetail::orderBy('id', 'DESC')->get();
        return view('admin.pages.product.product_add', $data);
    } // End Method



    public function StoreProduct(Request $request)
    {



        //dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|max:200',
                'thumbnail' => 'required|image|mimes:webp,png,jpg,jpeg|max:5000',
            ],
            [
                'thumbnail' => [
                    'max'   => 'The image field must be smaller than 10 MB.',
                ],
                'thumbnail' => 'The file must be an image.',
                'mimes'     => 'The: attribute must be a file of type: PNG - JPEG - JPG'
            ]
        );

        if ($validator->passes()) {

            $slug = Str::slug($request->name);
            $count = Product::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;

            if (($request->rfq) !== NULL) {
                $data['rfq'] = $request->rfq;
            } else {
                $data['rfq'] = '0';
            }


            $image = $request->file('thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/Products/thumbnail/' . $name_gen);
            Image::make($image)->resize(376, 282)->save($path);
            $save_url = 'upload/Products/thumbnail/' . $name_gen;

            $product_id = Product::insertGetId([

                'name'               => $request->name,
                'slug'               => $data['slug'],
                'sku_code'           => $request->sku_code,
                'mf_code'            => $request->mf_code,
                'product_code'       => $request->product_code,
                'tags'               => $request->tags,
                'size'               => $request->size,
                'color'              => $request->color,
                'short_desc'         => $request->short_desc,
                'overview'           => $request->overview,
                'specification'      => $request->specification,
                'accessories'        => $request->accessories,
                'warranty'           => $request->warranty,
                'thumbnail'          => $save_url,
                'stock'              => $request->stock,
                'qty'                => $request->qty,
                'rfq'                => $data['rfq'],
                'status'             => 'active',
                'product_status'     => 'product',
                'price'              => $request->price,
                'discount'           => $request->discount,
                'deal'               => $request->deal,
                'refurbished'        => $request->refurbished,
                'product_type'       => $request->product_type,
                'cat_id'             => $request->cat_id,
                'sub_cat_id'         => $request->sub_cat_id,
                'sub_sub_cat_id'     => $request->sub_sub_cat_id,
                'sub_sub_sub_cat_id' => $request->sub_sub_sub_cat_id,
                'brand_id'           => $request->brand_id,
                'notification_days'  => $request->notification_days,
                'create_date'        => date('Y-m-d', strtotime(Carbon::now())),
                'created_at'         => Carbon::now(),

            ]);

            /// Multiple Image Upload From it //////

            $images = $request->file('multi_img');
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                $path = public_path('upload/Products/multi-image/' . $make_name);
                Image::make($img)->resize(376, 282)->save($path);
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
    } // End Method


    public function EditProduct($id)
    {

        $data['multiImgs'] = MultiImage::where('product_id', $id)->get();
        //$activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $data['brands']              = Brand::latest('id')->select('id','title')->get();
        $data['categories']          = Category::latest('id')->select('id','title')->get();
        $data['sub_cats']            = SubCategory::latest('id')->select('id','title')->get();
        $data['sub_sub_cats']        = SubSubCategory::latest('id')->select('id','title')->get();
        $data['sub_sub_sub_cats']    = SubSubSubCategory::latest('id')->select('id','title')->get();
        $data['industrys']           = Industry::orderBy('id', 'DESC')->get();
        $data['solutions']           = SolutionDetail::orderBy('id', 'DESC')->get();

        $data['products'] = Product::findOrFail($id);
        return view('admin.pages.product.product_edit', $data);
    } // End Method


    public function UpdateProduct(Request $request)
    {


        $product_id = $request->id;
        $slug = Str::slug($request->name);
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        if (($request->rfq) !== NULL) {
            $data['rfq'] = $request->rfq;
        } else {
            $data['rfq'] = '0';
        }

        Product::findOrFail($product_id)->update([

            'name'               => $request->name,
            'slug'               => $data['slug'],
            'sku_code'           => $request->sku_code,
            'mf_code'            => $request->mf_code,
            'product_code'       => $request->product_code,
            'tags'               => $request->tags,
            'size'               => $request->size,
            'color'              => $request->color,
            'short_desc'         => $request->short_desc,
            'overview'           => $request->overview,
            'specification'      => $request->specification,
            'accessories'        => $request->accessories,
            'warranty'           => $request->warranty,
            'stock'              => $request->stock,
            'qty'                => $request->qty,
            'rfq'                => $data['rfq'],
            'status'             => 'active',
            'price'              => $request->price,
            'discount'           => $request->discount,
            'deal'               => $request->deal,
            'refurbished'        => $request->refurbished,
            'product_type'       => $request->product_type,
            'cat_id'             => $request->cat_id,
            'sub_cat_id'         => $request->sub_cat_id,
            'sub_sub_cat_id'     => $request->sub_sub_cat_id,
            'sub_sub_sub_cat_id' => $request->sub_sub_sub_cat_id,
            'brand_id'           => $request->brand_id,
            'notification_days'  => $request->notification_days,
            'create_date'        => date('Y-m-d', strtotime(Carbon::now())),
            'updated_at'         => Carbon::now(),

        ]);

        Toastr::success('Product Updated Without Image Successfully');


        return redirect()->back();
    } // End Method




    public function UpdateProductThambnail(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                //'name'     => 'required|max:70',
                'thumbnail' => 'required|image|mimes:webp,png,jpg,jpeg|max:5000',
                //'price'     => 'required',
            ],
            [
                'thumbnail' => [
                    'max'   => 'The image field must be smaller than 10 MB.',
                ],
                'thumbnail' => 'You must change image to update.',
                'mimes'     => 'The :attribute must be a file of type: WEBP - PNG - JPEG - JPG'
            ]
        );

        if ($validator->passes()) {


            $pro_id = $request->id;
            $oldImage = $request->thumbnail;
            $image = $request->file('thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/Products/thumbnail/' . $name_gen);
            Image::make($image)->resize(376, 282)->save($path);
            $save_url = 'upload/Products/thumbnail/' . $name_gen;

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            Product::findOrFail($pro_id)->update([

                'thumbnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            Toastr::success('Product Image Thumbnail Updated Successfully');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }


        return redirect()->back();
    } // End Method

    // Multi Image Update
    public function UpdateProductMultiimage(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                //'name'     => 'required|max:70',
                'photo' => 'required|image|mimes:webp,png,jpg,jpeg|max:15000',
                //'price'     => 'required',
            ],
            [
                'photo' => [
                    'max'   => 'The image field must be smaller than 10 MB.',
                ],
                'photo' => 'You must change image to update.',
                'mimes'     => 'The :attribute must be a file of type: PNG - JPEG - JPG'
            ]
        );

        if ($validator->passes()) {

            //dd($request->all());
            $img_id = $request->img_id;

            if ($request->photo) {

                //dd($request->file('photo'));
                $image = $request->file('photo');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('upload/Products/multi-image/' . $name_gen);
                Image::make($image)->resize(376, 282)->save($path);
                $save_url = 'upload/Products/multi-image/' . $name_gen;

                $oldImage = $request->old_img;
                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
            }
            // $settings=Setting::first();
            // $status=$settings->fill($data)->save();
            // $imgs = $request->multi_img;


            MultiImage::where('id', $img_id)->update([
                'photo' => $save_url,
                'updated_at' => Carbon::now(),

            ]);


            Toastr::success('Product Image Updated Successfully');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }

        return redirect()->back();
    } // End Method



    public function MulitImageDelelte($id)
    {
        //dd($id);
        $oldImg = MultiImage::findOrFail($id);
        if (File::exists($oldImg->photo)) {
            File::delete($oldImg->photo);
        }
        //unlink($oldImg->photo);

        MultiImage::findOrFail($id)->delete();

        Toastr::success('Product Image Deleted Successfully');

        return redirect()->back();
    } // End Method


    public function ProductInactive($id)
    {

        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method


    public function ProductActive($id)
    {

        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method


    public function ProductDelete($id)
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

        return redirect()->back();
    } // End Method

    public function ProductStock()
    {

        $products = Product::latest()->get();
        return view('admin.pages.product.product_stock', compact('products'));
    } // End Method

    public function toastrIndex()
    {
        $data['productsNotifications'] = Product::where('product_status', 'product')
            ->whereNotNull('notification_days')
            // create_date notification_days
            ->select(
                'products.id',
                'products.name',
                'products.notification_days',
                'products.create_date',
                'products.price',
                'products.thumbnail'
            )->latest()->get();
        return view('admin.pages.product.productNotification', $data);
    }
}
