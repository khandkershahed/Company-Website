<?php


namespace App\Http\Controllers\Frontend;


use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\BrandPage;
use App\Models\Admin\SubSubCategory;
use App\Models\Admin\SubSubSubCategory;


class ShopController extends Controller
{




    //Custom Product Filtering
    // public function customProduct(Request $request)
    // {
    //     $slug = $request->input('customCategory', $request->input('customBrand'));

    //     $category = Category::getProductByCat($slug);
    //     $subCategory = SubCategory::getProductBySubCat($slug);
    //     $subSubCategory = SubSubCategory::getProductBySubSubCat($slug);
    //     $subSubSubCategory = SubSubSubCategory::getProductBySubSubSubCat($slug);
    //     $brand = Brand::getProductByBrand($slug);

    //     $cat = $category ?? $subCategory ?? $subSubCategory ?? $subSubSubCategory;

    //     if ($cat) {
    //         $categories = SubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
    //         $subcategories = SubSubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
    //         $related_products = Product::where('cat_id', $cat->id)
    //             ->when($subCategory, function ($query) use ($cat) {
    //                 return $query->orWhere('sub_cat_id', $cat->id);
    //             })
    //             ->when($subSubCategory, function ($query) use ($cat) {
    //                 return $query->orWhere('sub_sub_cat_id', $cat->id);
    //             })
    //             ->when($subSubSubCategory, function ($query) use ($cat) {
    //                 return $query->orWhere('sub_sub_sub_cat_id', $cat->id);
    //             })
    //             ->orderBy('id', 'DESC')
    //             ->limit(10)
    //             ->where('product_status', 'product')
    //             ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
    //             ->get();

    //         $brands = Brand::join('products', 'brands.id', '=', 'products.brand_id')
    //             ->where(function ($query) use ($cat, $subCategory, $subSubCategory, $subSubSubCategory) {
    //                 $query->where('products.cat_id', '=', $cat->id)
    //                     ->orWhere('products.sub_cat_id', '=', optional($subCategory)->id)
    //                     ->orWhere('products.sub_sub_cat_id', '=', optional($subSubCategory)->id)
    //                     ->orWhere('products.sub_sub_sub_cat_id', '=', optional($subSubSubCategory)->id);
    //             })
    //             ->distinct()
    //             ->paginate(10);
    //     }

    //     // If customBrand is set, update $slug and retrieve brand information
    //     if ($request->filled('customBrand')) {
    //         $slug = $request->input('customBrand');
    //         $brand = Brand::where('slug', $slug)->first();

    //         if ($brand) {
    //             $brandId = $brand->id;
    //             $bannerImage = BrandPage::where('brand_id', $brandId)->value('brand_pages.banner_image');

    //             $related_products = Product::where('brand_id', $brandId)
    //                 ->orderByDesc('id')
    //                 ->limit(10)
    //                 ->where('product_status', 'product')
    //                 ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
    //                 ->get();

    //             $categories = DB::table('categories')
    //                 ->join('products', 'categories.id', '=', 'products.cat_id')
    //                 ->join('brands', 'products.brand_id', '=', 'brands.id')
    //                 ->where('brands.id', '=', $brandId)
    //                 ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
    //                 ->get();

    //             $subcategories = DB::table('sub_categories')
    //                 ->join('products', 'sub_categories.id', '=', 'products.sub_cat_id')
    //                 ->join('brands', 'products.brand_id', '=', 'brands.id')
    //                 ->where('brands.id', '=', $brandId)
    //                 ->select('sub_categories.id', 'sub_categories.slug', 'sub_categories.title', 'sub_categories.image')
    //                 ->get();
    //             $brands = Brand::inRandomOrder()->paginate(7);
    //         }
    //     }

    //     // Initialize $products with the Eloquent query builder
    //     $products = Product::query();

    //     // Apply conditions based on category, subcategory, brand, etc.
    //     $products->when($category, function ($query) use ($cat) {
    //         return $query->join('categories', 'products.cat_id', '=', 'categories.id')
    //             ->where('categories.slug', '=', $cat->slug);
    //     })
    //         ->when($subCategory, function ($query) use ($cat) {
    //             return $query->join('sub_categories', 'products.sub_cat_id', '=', 'sub_categories.id')
    //                 ->where('sub_categories.slug', '=', $cat->slug);
    //         })
    //         ->when($brand, function ($query) use ($slug) {
    //             return $query->join('brands', 'products.brand_id', '=', 'brands.id')
    //                 ->where('brands.slug', '=', $slug);
    //         });

    //     // Apply additional conditions based on request parameters
    //     if (!empty($_GET['category'])) {
    //         $slugs = explode(',', $_GET['category']);
    //         $catIds = SubCategory::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
    //         $products->whereIn('sub_cat_id', $catIds)->where('product_status', 'product');
    //     }
    //     if (!empty($_GET['subcategory'])) {
    //         $slugs = explode(',', $_GET['subcategory']);
    //         $catIds = SubCategory::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
    //         $products->whereIn('sub_cat_id', $catIds)->where('product_status', 'product');
    //     }
    //     if (!empty($_GET['brand'])) {
    //         $slugs = explode(',', $_GET['brand']);
    //         $brandIds = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
    //         $products->whereIn('brand_id', $brandIds)->where('product_status', 'product');
    //     }

    //     // Apply additional conditions based on keywords
    //     $products->when($request->filled('keyword'), function ($query) use ($request) {
    //         $query->where('name', 'LIKE', '%' . $request->input('keyword') . '%');
    //     });

    //     // Apply sorting
    //     $sortBy = $request->input('sortBy');
    //     if ($sortBy) {
    //         list($column, $direction) = explode(' ', $sortBy);
    //         $products->orderBy($column, $direction);
    //     }

    //     $count_brands = $products->get();
    //     // Paginate results
    //     $show = $request->input('show', 7);
    //     $products = $products->paginate($show);

    //     $newProduct = Product::orderBy('id', 'DESC')->where('product_status', 'product')->limit(3)->get();

    //     $filter_categories = Category::orderBy('title', 'DESC')->select('categories.id', 'categories.title')->limit(8)->get();
    //     // Set the brand_logo based on whether a brand is selected
    //     $brand_logo = !empty($brand) ? $brand->logo : '';
    //     $bannerImage = !empty($bannerImage) ? $bannerImage : '';

    //     return view('frontend.pages.product.allproduct', compact(
    //         'products',
    //         'bannerImage',
    //         'filter_categories',
    //         'count_brands',
    //         'categories',
    //         'subcategories',
    //         'newProduct',
    //         'brands',
    //         'bannerImage',
    //         'cat',
    //         'slug',
    //         'related_products',
    //         'brand_logo'
    //     ));
    // } // Add brand



    public function customProduct()
    {


        if (!empty($_GET['customCategory'])) {

            $slug = $_GET['customCategory'];
            if (Category::getProductByCat($slug)) {
                $cat = Category::where('slug', $slug)->first();
                $categories = SubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $subcategories = SubSubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $related_products = Product::where('cat_id', $cat->id)->orderBy('id', 'DESC')->limit(10)
                    ->where('product_status', 'product')
                    ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                    ->get();


                $brands   = DB::table('brands')
                    ->join('products', 'brands.id', '=', 'products.brand_id')
                    ->join('categories', 'products.cat_id', '=', 'categories.id')
                    ->where('categories.slug', '=', $slug)
                    ->select('brands.id', 'brands.title', 'brands.slug')
                    ->distinct()
                    ->paginate(10);
            } elseif (SubCategory::getProductBySubCat($slug)) {
                $cat = SubCategory::where('slug', $slug)->first();
                $categories = SubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $subcategories = SubSubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $related_products = Product::where('sub_cat_id', $cat->id)->orderBy('id', 'DESC')->limit(10)
                    ->where('product_status', 'product')
                    ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                    ->get();


                $brands   = DB::table('brands')
                    ->join('products', 'brands.id', '=', 'products.brand_id')
                    ->join('sub_categories', 'products.sub_cat_id', '=', 'sub_categories.id')
                    ->where('sub_categories.slug', '=', $slug)
                    ->select('brands.id', 'brands.title', 'brands.slug')
                    ->distinct()
                    ->paginate(10);
            } elseif (SubSubCategory::getProductBySubSubCat($slug)) {
                $cat = SubSubCategory::where('slug', $slug)->first();
                $categories = SubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $subcategories = SubSubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $related_products = Product::where('sub_sub_cat_id', $cat->id)->orderBy('id', 'DESC')->limit(10)
                    ->where('product_status', 'product')
                    ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                    ->get();


                $brands   = DB::table('brands')
                    ->join('products', 'brands.id', '=', 'products.brand_id')
                    ->join('sub_sub_categories', 'products.sub_sub_cat_id', '=', 'sub_sub_categories.id')
                    ->where('sub_sub_categories.slug', '=', $slug)
                    ->select('brands.id', 'brands.title', 'brands.slug')
                    ->distinct()
                    ->paginate(10);
            } elseif (SubSubSubCategory::getProductBySubSubSubCat($slug)) {
                $cat = SubSubSubCategory::where('slug', $slug)->first();
                $categories = SubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $subcategories = SubSubCategory::where('cat_id', $cat->id)->orderBy('title', 'ASC')->get();
                $related_products = Product::where('sub_sub_sub_cat_id', $cat->id)->orderBy('id', 'DESC')->limit(10)
                    ->where('product_status', 'product')
                    ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                    ->get();


                $brands   = DB::table('brands')
                    ->join('products', 'brands.id', '=', 'products.brand_id')
                    ->join('sub_sub_sub_categories', 'products.sub_sub_sub_cat_id', '=', 'sub_sub_sub_categories.id')
                    ->where('sub_sub_sub_categories.slug', '=', $slug)
                    ->select('brands.id', 'brands.title', 'brands.slug')
                    ->distinct()
                    ->paginate(10);
            }
        }
        if (!empty($_GET['customBrand'])) { {
                $slug = $_GET['customBrand'];
                $cat = Brand::where('slug', $slug)->first();
                $bannerImage = BrandPage::where('brand_id', $cat->id)->value('brand_pages.banner_image');
                //dd($brand_logo);
                $related_products = Product::where('brand_id', $cat->id)->orderBy('id', 'DESC')->limit(10)
                    ->where('product_status', 'product')
                    ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                    ->get();

                $categories = DB::table('categories')
                    ->join('products', 'categories.id', '=', 'products.cat_id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->where('brands.id', '=', $cat->id)
                    ->distinct()
                    ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
                    ->get();

                $subcategories = DB::table('sub_categories')
                    ->join('products', 'sub_categories.id', '=', 'products.sub_cat_id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->where('brands.id', '=', $cat->id)
                    ->distinct()
                    ->select('sub_categories.id', 'sub_categories.slug', 'sub_categories.title', 'sub_categories.image')
                    ->get();
            }
        }




        $products = Product::query();


        if (!empty($_GET['customCategory'])) {
            $slug = $_GET['customCategory'];
            if (Category::getProductByCat($slug)) {
                $products =  DB::table('products')
                    ->join('categories', 'products.cat_id', '=', 'categories.id')
                    ->where('product_status', 'product')
                    ->select(
                        'products.id',
                        'products.slug',
                        'products.name',
                        'products.thumbnail',
                        'products.price',
                        'products.discount',
                        'products.stock',
                        'products.mf_code',
                        'products.rfq',
                        'products.product_code',
                        'products.sku_code',
                        'products.short_desc',
                        'qty',
                        'stock',
                        'brand_id',
                        'products.cat_id',
                        'products.sub_cat_id',
                        'products.sub_sub_cat_id'
                    )
                    ->where('categories.slug', '=', $slug);
            } elseif (SubCategory::getProductBySubCat($slug)) {
                $products =  DB::table('products')
                    ->join('sub_categories', 'products.sub_cat_id', '=', 'sub_categories.id')
                    ->where('product_status', 'product')
                    ->select(
                        'products.id',
                        'products.slug',
                        'products.name',
                        'products.thumbnail',
                        'products.price',
                        'products.discount',
                        'products.stock',
                        'products.mf_code',
                        'products.rfq',
                        'products.product_code',
                        'products.sku_code',
                        'products.short_desc',
                        'qty',
                        'stock',
                        'brand_id',
                        'products.cat_id',
                        'products.sub_cat_id',
                        'products.sub_sub_cat_id'
                    )
                    ->where('sub_categories.slug', '=', $slug);
            } elseif (SubSubCategory::getProductBySubSubCat($slug)) {
                $products =  DB::table('products')
                    ->join('sub_sub_categories', 'products.sub_sub_cat_id', '=', 'sub_sub_categories.id')
                    ->where('product_status', 'product')
                    ->select(
                        'products.id',
                        'products.slug',
                        'products.name',
                        'products.thumbnail',
                        'products.price',
                        'products.discount',
                        'products.stock',
                        'products.mf_code',
                        'products.rfq',
                        'products.product_code',
                        'products.sku_code',
                        'products.short_desc',
                        'qty',
                        'stock',
                        'brand_id',
                        'products.cat_id',
                        'products.sub_cat_id',
                        'products.sub_sub_cat_id'
                    )
                    ->where('sub_sub_categories.slug', '=', $slug);
            } elseif (SubSubSubCategory::getProductBySubSubSubCat($slug)) {
                $products =  DB::table('products')
                    ->join('sub_sub_sub_categories', 'products.sub_sub_sub_cat_id', '=', 'sub_sub_sub_categories.id')
                    ->where('product_status', 'product')
                    ->select(
                        'products.id',
                        'products.slug',
                        'products.name',
                        'products.thumbnail',
                        'products.price',
                        'products.discount',
                        'products.stock',
                        'products.mf_code',
                        'products.rfq',
                        'products.product_code',
                        'products.sku_code',
                        'products.short_desc',
                        'qty',
                        'stock',
                        'brand_id',
                        'products.cat_id',
                        'products.sub_cat_id',
                        'products.sub_sub_cat_id'
                    )
                    ->where('sub_sub_sub_categories.slug', '=', $slug);
            }
        }


        if (!empty($_GET['customBrand'])) {
            $slug = $_GET['customBrand'];
            if (Brand::getProductByBrand($slug)) {
                //dd($slug);
                $products = DB::table('products')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->where('brands.slug', '=', $slug)
                    ->where('product_status', 'product')
                    ->select(
                        'products.id',
                        'products.slug',
                        'products.name',
                        'products.thumbnail',
                        'products.price',
                        'products.discount',
                        'products.stock',
                        'products.mf_code',
                        'products.rfq',
                        'products.product_code',
                        'products.sku_code',
                        'products.short_desc',
                        'qty',
                        'stock',
                        'brand_id',
                        'products.cat_id',
                        'products.sub_cat_id',
                        'products.sub_sub_cat_id'
                    );
                //dd($products);
                $brands = Brand::inRandomOrder()->paginate(7);
            }

        }


        if (!empty($_GET['keyword'])) {
            // $slugs = explode(',',$_GET['brand']);
            $keyword = $_GET['keyword'];
            //$brandIds = Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            $products = $products->where('name', 'LIKE', '%' . $keyword . '%')->where('product_status', 'product');
        }


        if (!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $catIds = SubCategory::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('sub_cat_id', $catIds)->where('product_status', 'product');
        }
        if (!empty($_GET['subcategory'])) {
            $slugs = explode(',', $_GET['subcategory']);
            $catIds = SubCategory::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('sub_cat_id', $catIds)->where('product_status', 'product');
        }
        if (!empty($_GET['brand']) && is_array($_GET['brand'])) {
            $slugs = $_GET['brand'];
            $brandIds = Brand::whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id', $brandIds)->where('product_status', 'product');
            //dd($products);
        }

        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'titleASC') {
                $products = $products->orderBy('name', 'ASC')->where('product_status', 'product');
            }
            if ($_GET['sortBy'] == 'priceASC') {
                $products = $products->orderBy('price', 'ASC')->where('product_status', 'product');
            }
            if ($_GET['sortBy'] == 'titleDESC') {
                $products = $products->orderBy('name', 'DESC')->where('product_status', 'product');
            }
            if ($_GET['sortBy'] == 'priceDESC') {
                $products = $products->orderBy('price', 'DESC')->where('product_status', 'product');
            }
        }

        // Price Range

        if (!empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $products = $products->whereBetween('price', $price)->where('product_status', 'product');
        }


        $count_products = $products->where('product_status', 'product');
        $count_brands = $count_products->get();
        //dd($count_brands);


        if (!empty($_GET['show'])) {
            $products = $products->where('product_status', 'product')->paginate($_GET['show']);
        } else {
            $products = $products->where('product_status', 'product')->paginate(7);
        }


        $filter_categories = Category::orderBy('title', 'DESC')->select('categories.id', 'categories.title')->limit(8)->get();




        $newProduct = Product::orderBy('id', 'DESC')->where('product_status', 'product')->limit(3)->get();



        $brand_logo = !empty($brand_logo) ? $brand_logo : '';
        $bannerImage = !empty($bannerImage) ? $bannerImage : '';






        return view('frontend.pages.product.allproduct', compact(
            'products',
            'brand_logo',
            'bannerImage',
            'filter_categories',
            'count_brands',
            'categories',
            'subcategories',
            'newProduct',
            'brands',
            'cat',
            'related_products'
        ));
    }



    public function CustomProductFilter(Request $request, $slug)
    {
        $data = $request->all();
        $customURL = '';
        if (Category::getProductByCat($slug) || SubCategory::getProductBySubCat($slug) || SubSubCategory::getProductBySubSubCat($slug) || SubSubSubCategory::getProductBySubSubSubCat($slug)) {
            $customURL .= '&customCategory=' . $slug;
        } else {
            $customURL .= '&customBrand=' . $slug;
        }

        $showURL = $request->filled('show') ? '&show=' . $request->input('show') : '';
        $sortByURL = $request->filled('sortBy') ? '&sortBy=' . $request->input('sortBy') : '';

        $categoryUrl = $request->filled('category') ? '&category=' . implode(',', $request->input('category')) : '';
        $subcategoryUrl = $request->filled('subcategory') ? '&subcategory=' . implode(',', $request->input('subcategory')) : '';

        $brandUrl = $request->filled('brand') ? '&brand=' . implode(',', $request->input('brand')) : '';
        $keywordURL = $request->filled('keyword') ? '&keyword=' . $request->input('keyword') : '';
        $priceRangeUrl = $request->filled('price_range') ? '&price=' . $request->input('price_range') : '';

        return redirect()->route('shop.custom', $customURL . $showURL . $sortByURL . $categoryUrl . $subcategoryUrl . $brandUrl . $priceRangeUrl . $keywordURL);
    }



    // public function CustomProductFilter(Request $request, $slug)
    // {
    //     $data = $request->all();
    //     $customURL = "";
    //     if (!empty($slug)) {
    //         if (Category::getProductByCat($slug)) {
    //             $customURL .= '&customCategory=' . $slug;
    //         } elseif (SubCategory::getProductBySubCat($slug)) {
    //             $customURL .= '&customCategory=' . $slug;
    //         } elseif (SubSubCategory::getProductBySubSubCat($slug)) {
    //             $customURL .= '&customCategory=' . $slug;
    //         } elseif (SubSubSubCategory::getProductBySubSubSubCat($slug)) {
    //             $customURL .= '&customCategory=' . $slug;
    //         } else {
    //             $customURL .= '&customBrand=' . $slug;
    //         }
    //     }
    //   $showURL = "";
    //     if (!empty($data['show'])) {
    //         $showURL .= '&show=' . $data['show'];
    //     }


    //     $sortByURL = '';
    //     if (!empty($data['sortBy'])) {
    //         $sortByURL .= '&sortBy=' . $data['sortBy'];
    //     }


    //     $catUrl = "";
    //     if (!empty($data['category'])) {
    //         foreach ($data['category'] as $category) {
    //             if (empty($catUrl)) {
    //                 $catUrl .= '&category=' . $category;
    //             } else {
    //                 $catUrl .= ',' . $category;
    //             }
    //         }
    //     }
    //     $subcatUrl = "";
    //     if (!empty($data['subcategory'])) {
    //         foreach ($data['subcategory'] as $subcategory) {
    //             if (empty($subcatUrl)) {
    //                 $subcatUrl .= '&subcategory=' . $subcategory;
    //             } else {
    //                 $subcatUrl .= ',' . $subcategory;
    //             }
    //         }
    //     }

    //     /// Filter For Brand
    //     $brandUrl = "";
    //     if (!empty($data['brand'])) {
    //         foreach ($data['brand'] as $brand) {
    //             if (empty($brandUrl)) {
    //                 $brandUrl .= '&brand=' . $brand;
    //             } else {
    //                 $brandUrl .= ',' . $brand;
    //             }
    //         }
    //     }
    //     //keyword
    //     $keywordURL = '';
    //     if (!empty($data['keyword'])) {
    //         $keywordURL .= '&keyword=' . $data['keyword'];
    //     }
    //     /// Filter For Price Range
    //     $priceRangeUrl = "";
    //     if (!empty($data['price_range'])) {
    //         $priceRangeUrl .= '&price=' . $data['price_range'];
    //     }

    //     return redirect()->route('shop.custom', $customURL . $showURL . $sortByURL . $catUrl . $brandUrl . $priceRangeUrl . $keywordURL);
    // } // End Method






    public function mainShop()
    {
        $products = Product::where('product_status', 'product')->limit(10)->get();
        $categories = Category::orderBy('title', 'ASC')->limit(8)->get(['id', 'title', 'slug']);
        $brands = Brand::inRandomOrder()->get(['id', 'title', 'slug']);
        $newProduct = Product::orderBy('id', 'DESC')->where('product_status', 'product')->limit(3)->get();




        return view('frontend.pages.product.shop_page', compact('products', 'categories', 'newProduct', 'brands'));
    }










    public function Shop()
    {

        $products = Product::query()->where('product_status', 'product');


        if (!empty($_GET['category'])) {
            $slugs = explode(',', ($_GET['category']));
            $catIds = Category::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = Product::where('product_status', 'product')->whereIn('cat_id', $catIds);
        }
        if (!empty($_GET['sub_category'])) {
            $slugs = explode(',', ($_GET['sub_category']));
            $sub_catIds = SubCategory::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = Product::where('product_status', 'product')->whereIn('sub_cat_id', $sub_catIds);
        }
        if (!empty($_GET['sub_sub_category'])) {
            $slugs = explode(',', ($_GET['sub_sub_category']));
            $sub_sub_catIds = SubSubCategory::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = Product::where('product_status', 'product')->whereIn('sub_sub_cat_id', $sub_sub_catIds);
        }
        if (!empty($_GET['brand'])) {
            // dd($_GET['brand']);
            $slugs = explode(',', implode($_GET['brand']));
            $brandIds = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = Product::where('product_status', 'product')->whereIn('brand_id', $brandIds);
        }




        if (!empty($_GET['keyword'])) {
            // $slugs = explode(',',$_GET['brand']);
            $keyword = $_GET['keyword'];
            //$brandIds = Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            $products = $products->where('name', 'LIKE', '%' . $keyword . '%')->where('product_status', 'product');
        }




        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'titleASC') {
                $products = $products->orderBy('name', 'ASC');
            }
            if ($_GET['sortBy'] == 'priceASC') {
                $products = $products->orderBy('price', 'ASC');
            }
            if ($_GET['sortBy'] == 'titleDESC') {
                $products = $products->orderBy('name', 'DESC');
            }
            if ($_GET['sortBy'] == 'priceDESC') {
                $products = $products->orderBy('price', 'DESC');
            }
        }
        // Price Range


        if (!empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $products = $products->whereBetween('price', $price);
        }


        if (!empty($_GET['show'])) {
            $products = $products->paginate($_GET['show']);
        } else {
            $products = $products->paginate(10);
        }




        $categories = Category::orderBy('title', 'ASC')->limit(8)->get();
        $brands = Brand::inRandomOrder()->limit(10)->get();
        $newProduct = Product::orderBy('id', 'DESC')->where('product_status', 'product')->limit(3)->get();




        //   return view('frontend.pages.product.shop_page',compact('products','categories','newProduct','brands'));
        return response()->json(view('frontend.pages.product.list',  compact('products', 'categories', 'newProduct', 'brands'))->render());
    } // End Method








    public function ShopFilter(Request $request)
    {




        $data = $request->all();




        /// Filter For Category




        $showURL = "";
        if (!empty($data['show'])) {
            $showURL .= '&show=' . $data['show'];
        }




        $sortByURL = '';
        if (!empty($data['sortBy'])) {
            $sortByURL .= '&sortBy=' . $data['sortBy'];
        }




        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category=' . $category;
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }
        $sub_catUrl = "";
        if (!empty($data['sub_category'])) {
            foreach ($data['sub_category'] as $sub_category) {
                if (empty($sub_catUrl)) {
                    $sub_catUrl .= '&sub_category=' . $sub_category;
                } else {
                    $sub_catUrl .= ',' . $sub_category;
                }
            }
        }
        $sub_sub_catUrl = "";
        if (!empty($data['sub_sub_category'])) {
            foreach ($data['sub_sub_category'] as $sub_sub_category) {
                if (empty($sub_sub_catUrl)) {
                    $sub_sub_catUrl .= '&sub_sub_category=' . $sub_sub_category;
                } else {
                    $sub_sub_catUrl .= ',' . $sub_sub_category;
                }
            }
        }




        /// Filter For Brand




        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .= '&brand=' . $brand;
                } else {
                    $brandUrl .= ',' . $brand;
                }
            }
        }




        //keyword
        $keywordURL = '';
        if (!empty($data['keyword'])) {
            $keywordURL .= '&keyword=' . $data['keyword'];
        }




        /// Filter For Price Range




        $priceRangeUrl = "";
        if (!empty($data['price_range'])) {
            $priceRangeUrl .= '&price=' . $data['price_range'];
        }












        return redirect()->route('shop.filter.partial', $showURL . $sortByURL . $catUrl . $sub_catUrl . $sub_sub_catUrl . $brandUrl . $priceRangeUrl . $keywordURL);
    } // End Method


    public function getShopProducts(Request $request)
    {
        $products = Product::query()->where('product_status', 'product');


        // Category filter
        if ($request->has('category')) {
            $catslugs = $request->input('category');
            if (is_array($catslugs)) {
                $catslugs = explode(',', implode(',', $catslugs));
            }
            $catIds = Category::whereIn('slug', $catslugs)->pluck('id')->toArray();
            $products->whereIn('cat_id', $catIds);
        }


        // Sub-category filter
        if ($request->has('sub_category')) {
            $subcatslugs = $request->input('sub_category');
            if (is_array($subcatslugs)) {
                $subcatslugs = explode(',', implode(',', $subcatslugs));
            }
            $sub_catIds = SubCategory::whereIn('slug', $subcatslugs)->pluck('id')->toArray();
            $products->whereIn('sub_cat_id', $sub_catIds);
        }


        // Sub-sub-category filter
        if ($request->has('sub_sub_category')) {
            $subsubcatslugs = $request->input('sub_sub_category');
            if (is_array($subsubcatslugs)) {
                $subsubcatslugs = explode(',', implode(',', $subsubcatslugs));
            }
            $sub_sub_catIds = SubSubCategory::whereIn('slug', $subsubcatslugs)->pluck('id')->toArray();
            $products->whereIn('sub_sub_cat_id', $sub_sub_catIds);
        }


        // Brand filter
        if ($request->has('brand')) {
            $brandslugs = $request->input('brand');
            if (is_array($brandslugs)) {
                $brandslugs = explode(',', implode(',', $brandslugs));
            }
            $brandIds = Brand::whereIn('slug', $brandslugs)->pluck('id')->toArray();
            $products->whereIn('brand_id', $brandIds);
        }


        // Keyword filter
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $products->where('name', 'LIKE', '%' . $keyword . '%');
        }


        // Sorting
        if ($request->has('sortBy')) {
            $sortBy = $request->input('sortBy');
            if ($sortBy == 'titleASC') {
                $products->orderBy('name', 'ASC');
            } elseif ($sortBy == 'priceASC') {
                $products->orderBy('price', 'ASC');
            } elseif ($sortBy == 'titleDESC') {
                $products->orderBy('name', 'DESC');
            } elseif ($sortBy == 'priceDESC') {
                $products->orderBy('price', 'DESC');
            } elseif ($sortBy == 'newProduct') {
                $products->orderBy('created_at', 'DESC');
            } elseif ($sortBy == 'priceAvailable') {
                $products->where('price_status', 'price');
            }
        }


        // Price range filter
        if ($request->has('price_range') && !empty($request->input('price_range'))) {
            // $priceRange = explode(',', $request->input('price_range'));
            $priceRange = explode('-', $request->input('price_range'));
            $products->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        }


        // Pagination
        $perPage = $request->has('show') ? $request->input('show') : 10;
        $products = $products->paginate($perPage);

        //     if ($request->has('brand')) {
        // $brandslugs = $request->input('brand');
        // if (is_array($brandslugs)) {
        //     $brandslugs = explode(',', implode(',', $brandslugs));
        // }
        // $brands = Brand::whereIn('slug', $brandslugs)->get(['id', 'slug', 'title'])->pluck('title', 'slug')->toArray();
        // // dd($brands);
        // $filteredBrandsHtml = view('frontend.pages.product.partials.selected_brands', compact('brands'))->render();

        //         // Return the filtered brands HTML along with the product list as a JSON response
        //         return response()->json([
        //             'filteredBrandsHtml' => $filteredBrandsHtml,
        //             'productListHtml' => view('frontend.pages.product.list', compact('products'))->render()
        //         ]);
        //     }

        //     // If 'brand' is not present in the request, only return the product list HTML
        //     return response()->json([
        //         'productListHtml' => view('frontend.pages.product.list', compact('products'))->render()
        //     ]);



        //     // return response()->json($products);
        // }
        // Pagination


        if ($request->has('brand')) {
            $brandslugs = $request->input('brand');
            if (is_array($brandslugs)) {
                $brandslugs = explode(',', implode(',', $brandslugs));
            }
            $brands = Brand::whereIn('slug', $brandslugs)->get(['id', 'slug', 'title'])->pluck('title', 'slug')->toArray();
            // dd($brands);
            $filteredBrandsHtml = view('frontend.pages.product.partials.selected_brands', compact('brands'))->render();

            // Return the filtered brands HTML along with the product list and pagination as a JSON response
            return response()->json([
                'filteredBrandsHtml' => $filteredBrandsHtml,
                'productListHtml' => view('frontend.pages.product.list', compact('products'))->render(),
                'pagination' => [
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage()
                    // Add any other pagination data you may need
                ]
            ]);
        }

        // If 'brand' is not present in the request, only return the product list and pagination HTML
        return response()->json([
            'productListHtml' => view('frontend.pages.product.list', compact('products'))->render(),
            'pagination' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage()
                // Add any other pagination data you may need
            ]
        ]);

        // return response()->json($products);
    }



    public function brandSearch(Request $request)
    {
        $searchText = $request->input('searchText');


        // Perform brand search based on the provided searchText


        // Retrieve the filtered brands
        $brands = Brand::where('title', 'LIKE', '%' . $searchText . '%')->get(['id', 'slug', 'title']);


        // Return the filtered brands as a JSON response
        // return response()->json(view('frontend.pages.product.partials.brand_search',  compact('brands'))->render());
        $filteredBrandsHtml = view('frontend.pages.product.partials.brand_search', compact('brands'))->render();


        // Return the filtered brands HTML as a JSON response
        return response()->json(['html' => $filteredBrandsHtml]);
    }
}
