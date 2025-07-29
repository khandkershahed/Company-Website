<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Row;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\BrandPage;
use App\Models\Admin\MultiImage;
use App\Models\Admin\TechGlossy;
use App\Models\Admin\ClientStory;
use App\Models\Admin\DocumentPdf;
use App\Models\Admin\SolutionCard;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\MultiIndustry;
use App\Models\Admin\MultiSolution;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Pagination\LengthAwarePaginator;

class PageController extends Controller
{
    public function overview($id)
    {
        $data['brand'] = Brand::where('slug', $id)->where('status', '!=', 'inactive')->select('id', 'slug', 'title', 'image')->first();
        $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->where('status', '!=', 'inactive')->first();
        if (!empty($data['brandpage'])) {
            if ($data['brandpage']) {
                $data['row_one'] = Row::where('id', $data['brandpage']->row_four_id)->first();
                $data['row_three'] = Row::where('id', $data['brandpage']->row_five_id)->first();
                $data['row_four'] = Row::where('id', $data['brandpage']->row_seven_id)->first();
                $data['row_five'] = Row::where('id', $data['brandpage']->row_eight_id)->first();
                $data['card1'] = SolutionCard::where('id', $data['brandpage']->solution_card_one_id)->first();
                $data['card2'] = SolutionCard::where('id', $data['brandpage']->solution_card_two_id)->first();
                $data['card3'] = SolutionCard::where('id', $data['brandpage']->solution_card_three_id)->first();
            }

            return view('frontend.pages.kukapages.overview', $data);
        } else {
            Toastr::error('No Details information found for this Brand.');
            return redirect()->back();
        }
    }
    // public function brandProducts($id, Request $request)
    // {
    //     $data['brand'] = Brand::where('slug', $id)->where('status', '!=', 'inactive')->select('id', 'slug', 'title', 'image')->first();
    //     $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->where('status', '!=', 'inactive')->first(['id', 'banner_image', 'brand_logo', 'header']);

    //     if (!empty($data['brandpage'])) {

    //         $productIds = Product::where('brand_id', $data['brand']->id)
    //             ->where('product_status', '=', 'product')
    //             ->distinct()
    //             ->pluck('id');
    //         // $productIds = $data['products']->pluck('id')->all(); // Extracting product IDs
    //         $data['products'] = Product::whereIn('id', $productIds)
    //             ->select('id', 'brand_id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'price_status', 'cat_id', 'sku_code', 'mf_code', 'product_code')
    //             ->paginate(10);
    //         // dd($data['products']);
    //         $industryIds = MultiIndustry::whereIn('product_id', $productIds)
    //             ->pluck('industry_id')
    //             ->unique();

    //         $data['industries'] = Industry::whereIn('id', $industryIds)->get();
    //         foreach ($data['industries'] as $industry) {
    //             // Fetch product IDs for the current industry
    //             $productIdsForIndustry = MultiIndustry::where('industry_id', $industry->id)
    //                 ->whereIn('product_id', $productIds)
    //                 ->pluck('product_id')
    //                 ->toArray();

    //             // Filter products collection for the current industry
    //             $productsForIndustry = $data['products']->whereIn('id', $productIdsForIndustry)->all();

    //             // Assign the products to the industry
    //             $industry->products = $productsForIndustry;
    //         }

    //         $solutionIds = MultiSolution::whereIn('product_id', $productIds)
    //             ->pluck('solution_id')
    //             ->unique();

    //         $data['solutions'] = SolutionDetail::whereIn('id', $solutionIds)->get();
    //         foreach ($data['solutions'] as $solution) {
    //             // Fetch product IDs for the current industry
    //             $productIdsForSolution = MultiSolution::where('solution_id', $solution->id)
    //                 ->whereIn('product_id', $productIds)
    //                 ->pluck('product_id')
    //                 ->toArray();
    //             $productsForSolution = $data['products']->whereIn('id', $productIdsForSolution)->all();
    //             $solution->products = $productsForSolution;
    //         }

    //         $data['related_search'] = [
    //             'categories' =>  Category::inRandomOrder()->limit(2)->get(),
    //             'brands' =>  Brand::inRandomOrder()->limit(4)->get(),
    //             'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
    //             'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
    //         ];
    //         // dd($data['related_search']['categories']);

    //         if ($request->ajax()) {
    //             return view('frontend.pages.kukapages.partial.product_pagination', $data);
    //         }

    //         // dd($data['industry_ids']);
    //         return view('frontend.pages.kukapages.products', $data);
    //     } else {
    //         $productIds = Product::where('brand_id', $data['brand']->id)
    //             ->where('product_status', '=', 'product')
    //             ->distinct()
    //             ->pluck('id');
    //         // $productIds = $data['products']->pluck('id')->all(); // Extracting product IDs
    //         $data['products'] = Product::whereIn('id', $productIds)
    //             ->select('id', 'brand_id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'price_status', 'cat_id', 'sku_code', 'mf_code', 'product_code')
    //             ->paginate(10);
    //         // dd($data['products']);
    //         $industryIds = MultiIndustry::whereIn('product_id', $productIds)
    //             ->pluck('industry_id')
    //             ->unique();

    //         $data['industries'] = Industry::whereIn('id', $industryIds)->get();
    //         foreach ($data['industries'] as $industry) {
    //             // Fetch product IDs for the current industry
    //             $productIdsForIndustry = MultiIndustry::where('industry_id', $industry->id)
    //                 ->whereIn('product_id', $productIds)
    //                 ->pluck('product_id')
    //                 ->toArray();

    //             // Filter products collection for the current industry
    //             $productsForIndustry = $data['products']->whereIn('id', $productIdsForIndustry)->all();

    //             // Assign the products to the industry
    //             $industry->products = $productsForIndustry;
    //         }

    //         $solutionIds = MultiSolution::whereIn('product_id', $productIds)
    //             ->pluck('solution_id')
    //             ->unique();

    //         $data['solutions'] = SolutionDetail::whereIn('id', $solutionIds)->get();
    //         foreach ($data['solutions'] as $solution) {
    //             // Fetch product IDs for the current industry
    //             $productIdsForSolution = MultiSolution::where('solution_id', $solution->id)
    //                 ->whereIn('product_id', $productIds)
    //                 ->pluck('product_id')
    //                 ->toArray();

    //             // Filter products collection for the current industry
    //             $productsForSolution = $data['products']->whereIn('id', $productIdsForSolution)->all();

    //             // Assign the products to the industry
    //             $solution->products = $productsForSolution;
    //         }

    //         $data['related_search'] = [
    //             'categories' =>  Category::inRandomOrder()->limit(2)->get(),
    //             'brands' =>  Brand::inRandomOrder()->limit(4)->get(),
    //             'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
    //             'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
    //         ];

    //         if ($request->ajax()) {
    //             return view('frontend.pages.kukapages.partial.product_pagination', $data);
    //         }
    //         // dd($data['industry_ids']);
    //         return view('frontend.pages.kukapages.products_no_brandpage', $data);
    //     }
    // }

    public function brandProducts($id, Request $request)
    {
        $brand = Brand::where('slug', $id)
            ->where('status', '!=', 'inactive')
            ->select('id', 'slug', 'title', 'image')
            ->firstOrFail();

        $brandpage = BrandPage::where('brand_id', $brand->id)
            ->where('status', '!=', 'inactive')
            ->first(['id', 'banner_image', 'brand_logo', 'header']);

        $productIds = Product::where('brand_id', $brand->id)
            ->where('product_status', 'product')
            ->pluck('id');

        $products = Product::whereIn('id', $productIds)
            ->select('id', 'brand_id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'price_status', 'cat_id', 'sku_code', 'mf_code', 'product_code')
            ->paginate(10);

        // Fetch all industries once
        $industryIds = MultiIndustry::whereIn('product_id', $productIds)
            ->pluck('industry_id')
            ->unique();

        $industries = Industry::whereIn('id', $industryIds)->get();

        // Group product_id by industry_id in one query
        $industryProductMap = MultiIndustry::whereIn('industry_id', $industryIds)
            ->whereIn('product_id', $productIds)
            ->get()
            ->groupBy('industry_id')
            ->map(fn($items) => $items->pluck('product_id')->all());

        foreach ($industries as $industry) {
            $ids = $industryProductMap->get($industry->id, []);
            $industry->products = $products->whereIn('id', $ids)->all();
        }

        // Fetch all solutions once
        $solutionIds = MultiSolution::whereIn('product_id', $productIds)
            ->pluck('solution_id')
            ->unique();

        $solutions = SolutionDetail::whereIn('id', $solutionIds)->get();

        // Group product_id by solution_id in one query
        $solutionProductMap = MultiSolution::whereIn('solution_id', $solutionIds)
            ->whereIn('product_id', $productIds)
            ->get()
            ->groupBy('solution_id')
            ->map(fn($items) => $items->pluck('product_id')->all());

        foreach ($solutions as $solution) {
            $ids = $solutionProductMap->get($solution->id, []);
            $solution->products = $products->whereIn('id', $ids)->all();
        }

        $related_search = [
            'categories' => Category::inRandomOrder()->limit(2)->get(['id', 'slug', 'title']),
            'brands' => Brand::inRandomOrder()->limit(4)->get(['id', 'slug', 'title']),
            'solutions' => SolutionDetail::inRandomOrder()->limit(4)->get(['id', 'slug', 'name']),
            'industries' => Industry::inRandomOrder()->limit(4)->get(['id', 'slug', 'title']),
        ];

        $data = compact('brand', 'brandpage', 'products', 'industries', 'solutions', 'related_search');

        if ($request->ajax()) {
            return view('frontend.pages.kukapages.partial.product_pagination', $data);
        }

        $view = $brandpage ? 'frontend.pages.kukapages.products' : 'frontend.pages.kukapages.products_no_brandpage';
        return view($view, $data);
    }

    public function productDetails($id)
    {

        $data['sproduct'] = Product::join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.slug', $id)
            ->where('products.product_status', 'product')
            ->where('brands.status', 'active')
            ->select('products.id as product_id', 'products.*') // Explicitly select product ID and all other fields
            ->firstOrFail();

        $data['multi_images'] = MultiImage::where('product_id', '=', $data['sproduct']->product_id)->get();

        if (!empty($data['sproduct']->cat_id)) {
            $data['products'] = Product::where('cat_id', $data['sproduct']->cat_id)
                ->where('product_status', 'product')
                ->select('id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'sku_code', 'mf_code', 'product_code', 'cat_id', 'brand_id')
                ->limit(12)
                ->distinct()
                ->get();
        } else {
            $data['products'] = Product::inRandomOrder()->where('product_status', 'product')->limit(12)->get();
        }

        $data['brand'] = Brand::where('id', $data['sproduct']->brand_id)->where('status', '!=', 'inactive')->select('id', 'slug', 'title', 'image')->first();
        $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->first(['id', 'banner_image', 'brand_logo', 'header']);
        $data['related_search'] = [
            'categories' =>  Category::where('id', '!=', $data['sproduct']->cat_id)->inRandomOrder()->limit(2)->get(),
            'brands' =>  Brand::where('id', '!=', $data['sproduct']->brand_id)->inRandomOrder()->limit(20)->get(),
            'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
            'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
        ];
        $data['brand_products'] = Product::where('brand_id', $data['sproduct']->brand_id)->where('id', '!=', $data['sproduct']->id)->inRandomOrder()->where('product_status', 'product')->limit(20)->get();

        $data['documents'] = DocumentPdf::where('product_id', $data['sproduct']->id)->get();

        if (!empty($data['brandpage'])) {
            return view('frontend.pages.kukapages.product_details', $data);
        } else {
            return view('frontend.pages.kukapages.product_details_single', $data);
            // return view('frontend.pages.product.product_details', $data);
        }
    }

    public function brandPdf($id)
    {

        $data['brand'] = Brand::where('slug', $id)->where('status', '!=', 'inactive')->select('id', 'slug', 'title', 'image')->firstOrFail();
        $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->firstOrFail(['id', 'banner_image', 'brand_logo', 'header']);
        if (!empty($data['brandpage'])) {

            $brandId = $data['brand']->id;
            $brandDocuments = DocumentPdf::where('brand_id', $brandId)->get();

            $productDocuments = DocumentPdf::join('products', 'document_pdfs.product_id', '=', 'products.id')
                ->where('products.brand_id', '=', $brandId)
                ->select('document_pdfs.id', 'document_pdfs.title', 'document_pdfs.document')
                ->distinct()
                ->get();

            $mergedData = $brandDocuments->concat($productDocuments);

            $perPage = 16;
            $page = request()->get('page', 1);
            $offset = ($page - 1) * $perPage;
            $data['documents'] = $mergedData->slice($offset, $perPage)->all();

            $total = $mergedData->count();
            $data['documents'] = new LengthAwarePaginator($data['documents'], $total, $perPage, $page);

            $data['documents']->withPath(url()->current());

            $data['related_search'] = [
                'categories' =>  Category::inRandomOrder()->limit(2)->get(),
                'brands' =>  Brand::inRandomOrder()->limit(4)->get(),
                'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
                'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
            ];
            return view('frontend.pages.kukapages.catalogs', $data);
        } else {
            Toastr::error('No Details information found for this Brand.');
            return redirect()->back();
        }
    }


    public function brandContents($id)
    {
        $data['brand'] = Brand::where('slug', $id)->where('status', '!=', 'inactive')->select('id', 'slug', 'title', 'image')->first();
        $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->first(['id', 'banner_image', 'brand_logo', 'header']);
        if (!empty($data['brandpage'])) {

            $id = json_encode($data['brand']->id);
            $data['techglossys'] = TechGlossy::whereJsonContains('brand_id', $id)->get();
            $data['blogs'] = Blog::whereJsonContains('brand_id', $id)->get();
            $data['clientStories'] = ClientStory::whereJsonContains('brand_id', $id)->get();

            $mergedData = $data['blogs']->concat($data['clientStories']);

            $data['contents'] = $mergedData->toArray();


            $data['related_search'] = [
                'categories' =>  Category::inRandomOrder()->limit(2)->get(),
                'brands' =>  Brand::inRandomOrder()->limit(4)->get(),
                'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
                'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
            ];
            return view('frontend.pages.kukapages.contents', $data);
        } else {
            Toastr::error('No Details information found for this Brand.');
            return redirect()->back();
        }
    }
    public function blogDetails($id)
    {
        $data['content'] = Blog::where('id', $id)->first();
        $data['items'] = Blog::inRandomOrder()->limit(4)->get();


        $data['related_search'] = [
            'categories' =>  Category::inRandomOrder()->limit(2)->get(),
            'brands' =>  Brand::inRandomOrder()->limit(4)->get(),
            'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
            'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
        ];
        return view('frontend.pages.kukapages.content_single', $data);
    }
    public function storyDetails($id)
    {
        $data['blog'] = Blog::where('id', $id)->first();
        $data['storys'] = Blog::inRandomOrder()->limit(4)->get();


        $data['related_search'] = [
            'categories' =>  Category::inRandomOrder()->limit(2)->get(),
            'brands' =>  Brand::inRandomOrder()->limit(4)->get(),
            'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
            'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
        ];
        return view('frontend.pages.blogs.blog_details', $data);
    }
























    // public function brandProducts($id)
    // {
    //     $data['brand'] = Brand::where('slug', $id)->where('status', '!=', 'inactive')->select('id', 'slug', 'title', 'image')->first();
    //     $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->first(['id', 'banner_image', 'brand_logo', 'header']);
    //     if (!empty($data['brandpage'])) {
    //         $products = Product::where('brand_id', $data['brand']->id)
    //             ->where('product_status', '=', 'product')
    //             ->distinct()
    //             ->paginate(8);

    //         $productIds = $products->pluck('id')->all();

    //         $industriesWithProducts = Industry::with(['multiIndustry' => function ($query) use ($productIds) {
    //             $query->whereIn('product_id', $productIds);
    //         }])
    //             ->whereIn('id', function ($query) use ($productIds) {
    //                 $query->select('industry_id')
    //                     ->from('multi_industries')
    //                     ->whereIn('product_id', $productIds);
    //             })
    //             ->get();

    //         foreach ($industriesWithProducts as $industry) {
    //             $productIdsForIndustry = $industry->multiIndustry->pluck('product_id')->toArray();
    //             $industry->products = Product::whereIn('id', $productIdsForIndustry)->paginate(8);
    //         }

    //         $solutionsWithProducts = SolutionDetail::with(['multiSolution' => function ($query) use ($productIds) {
    //             $query->whereIn('product_id', $productIds);
    //         }])
    //             ->whereIn('id', function ($query) use ($productIds) {
    //                 $query->select('solution_id')
    //                     ->from('multi_solutions')
    //                     ->whereIn('product_id', $productIds);
    //             })
    //             ->get();

    //         foreach ($solutionsWithProducts as $solution) {
    //             $productIdsForSolution = $solution->multiSolution->pluck('product_id')->toArray();
    //             $solution->products = Product::whereIn('id', $productIdsForSolution)->paginate(8);
    //         }

    //         $data['industries'] = $industriesWithProducts;
    //         $data['solutions'] = $solutionsWithProducts;
    //         $data['products'] = $products;

    //         return view('frontend.pages.kukapages.products', $data);
    //     } else {
    //         Toastr::error('No Details information found for this Brand.');
    //         return redirect()->back();
    //     }
    // }

    public function ajaxBrandProductsPagination($slug, Request $request)
    {
        dd($request);
        $brand = Brand::where('slug', $slug)->first();
        $products = Product::where('brand_id', $brand->id)
            ->where('product_status', 'product')
            ->distinct()
            ->select('id', 'brand_id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'price_status', 'cat_id')
            ->paginate(8);

        return response()->json([
            'products' => view('frontend.pages.kukapages.partial.product_pagination', compact('products'))->render(),

        ]);
    }
}
