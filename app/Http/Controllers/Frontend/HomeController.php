<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Site;
use App\Models\User;
use App\Mail\TestMail;
use App\Models\Admin\Faq;
use App\Models\Admin\Rfq;
use App\Models\Admin\Row;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\Policy;
use Illuminate\Http\Request;
use App\Models\Admin\AboutUs;
use App\Models\Admin\Country;
use App\Models\Admin\Feature;
use App\Models\Admin\Product;
use App\Models\Admin\Setting;
use App\Models\Admin\Success;
use App\Models\Admin\Category;
use App\Models\Admin\Homepage;
use App\Models\Admin\Industry;
use App\Models\Admin\BrandPage;
use App\Models\Admin\LearnMore;
use App\Models\Admin\RfqProduct;
use App\Models\Admin\TechGlossy;
use App\Models\Admin\ClientStory;
use App\Models\Admin\DocumentPdf;
use App\Models\Admin\SubCategory;
use App\Models\Admin\IndustryPage;
use App\Models\Admin\RfqQuotation;
use App\Models\Admin\SolutionCard;
use App\Models\Admin\TrainingPage;
use App\Models\Admin\WhatWeDoPage;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\MultiIndustry;
use App\Models\Admin\PortfolioPage;
use App\Models\Admin\PortfolioTeam;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\OfficeLocation;
use App\Models\Admin\SolutionDetail;
use App\Models\Admin\SubSubCategory;
use App\Models\Admin\TechnologyData;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\PortfolioClient;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\Models\Admin\HardwareInfoPage;
use App\Models\Admin\PortfolioDetails;
use App\Models\Admin\SoftwareInfoPage;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioChooseUs;
use App\Models\Admin\SubSubSubCategory;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Admin\PortfolioClientFeedback;

class HomeController extends Controller
{

    //Client Authentication

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function quotationLink($id)
    {
        $quotation = DB::table('rfq_quotations')->where('rfq_code', $id)->first();

        if (!$quotation) {
            abort(404);
        }

        $data['filePath'] = $quotation->quotation_pdf;
        return view('frontend.quotaion.link', $data);
    }

    //Homepage

    // public function index()
    // {
    //     // Load the latest homepage with all relationships eager-loaded
    //     $data['home'] = Homepage::with(['feature1', 'feature2', 'feature3', 'feature4', 'feature5', 'success1', 'success2', 'success3', 'story1', 'story2', 'story3', 'story4', 'techglossy'])->latest('id')->first();

    //     // Prepare the features, stories, and successItems arrays directly from the loaded homepage
    //     $data['features'] = [
    //         'feature1' => $data['home']->feature1,
    //         'feature2' => $data['home']->feature2,
    //         'feature3' => $data['home']->feature3,
    //         'feature4' => $data['home']->feature4,
    //         'feature5' => $data['home']->feature5,
    //     ];
    //     $data['storys'] = [
    //         'story1' => $data['home']->story1,
    //         'story2' => $data['home']->story2,
    //         'story3' => $data['home']->story3,
    //         'story4' => $data['home']->story4,
    //     ];
    //     $data['successItems'] = [
    //         '1' => $data['home']->success1,
    //         '2' => $data['home']->success2,
    //         '3' => $data['home']->success3,
    //     ];
    //     $data['techglossy'] = $data['home']->techglossy;

    //     // Fetch 10 random products (software + hardware) without using RAND() in the query
    //     $productColumns = ['id', 'brand_id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'price_status', 'product_type'];

    //     // Fetch software and hardware products in one query
    //     $softwareProducts = DB::table('products')
    //         ->select($productColumns)
    //         ->where('product_status', 'product')
    //         ->where('product_type', 'software')
    //         ->orderByRaw('RAND()')
    //         ->limit(10) // Fetch 10 software products at once
    //         ->get();

    //     $hardwareProducts = DB::table('products')
    //         ->select($productColumns)
    //         ->where('product_status', 'product')
    //         ->where('product_type', 'hardware')
    //         ->orderByRaw('RAND()')
    //         ->limit(10) // Fetch 10 hardware products at once
    //         ->get();

    //     $data['products'] = $softwareProducts->merge($hardwareProducts)->shuffle()->take(10);
    //     $data['productCount'] = Product::where('product_status', 'product')->count();
    //     $data['brandCount'] = Brand::where('status', 'active')->count();
    //     // Return the view with the optimized data
    //     return view('frontend.pages.home.index', $data);
    // }

    public function index()
    {
        // Attempt to load from cache first (for homepage content)
        $home = Cache::remember('homepage.latest', 60, function () {
            return Homepage::with([
                'feature1',
                'feature2',
                'feature3',
                'feature4',
                'feature5',
                'success1',
                'success2',
                'success3',
                'story1',
                'story2',
                'story3',
                'story4',
                'techglossy'
            ])->latest('id')->first();
        });

        if (!$home) {
            return view('frontend.pages.home.index', [
                'home' => null,
                'features' => [],
                'storys' => [],
                'successItems' => [],
                'techglossy' => null,
                'products' => collect(),
                'productCount' => 0,
                'brandCount' => 0,
            ]);
        }

        // Use collection transformation
        $features = collect(range(1, 5))->mapWithKeys(fn($i) => ["feature{$i}" => $home->{"feature{$i}"}]);
        $storys = collect(range(1, 4))->mapWithKeys(fn($i) => ["story{$i}" => $home->{"story{$i}"}]);
        $successItems = collect(range(1, 3))->mapWithKeys(fn($i) => ["$i" => $home->{"success{$i}"}]);

        // Cache product IDs to avoid repeated random selects
        $productIds = Cache::remember('homepage.random_products', 30, function () {
            $softwareIds = Product::where('product_status', 'product')
                ->where('product_type', 'software')
                ->inRandomOrder()
                ->limit(8)
                ->pluck('id')
                ->values();

            $hardwareIds = Product::where('product_status', 'product')
                ->where('product_type', 'hardware')
                ->inRandomOrder()
                ->limit(8)
                ->pluck('id')
                ->values();

            $merged = collect();
            $max = max($softwareIds->count(), $hardwareIds->count());

            for ($i = 0; $i < $max; $i++) {
                if (isset($softwareIds[$i])) {
                    $merged->push($softwareIds[$i]);
                }
                if (isset($hardwareIds[$i])) {
                    $merged->push($hardwareIds[$i]);
                }
            }

            return $merged->take(10); // optional limit to 10
        });

        $products = Product::select([
            'id',
            'brand_id',
            'rfq',
            'slug',
            'name',
            'thumbnail',
            'price',
            'discount',
            'price_status',
            'product_type'
        ])
            ->whereIn('id', $productIds)
            ->get()
            ->keyBy('id'); // key products by ID to preserve order

        // Reorder the products based on the original interleaved ID sequence
        $orderedProducts = $productIds->map(fn($id) => $products[$id])->filter();
        // Cache counts as they're unlikely to change frequently
        $productCount = Cache::remember('homepage.product_count', 60, fn() => Product::where('product_status', 'product')->count());
        $brandCount = Cache::remember('homepage.brand_count', 60, fn() => Brand::where('status', 'active')->count());

        return view('frontend.pages.home.index', [
            'home' => $home,
            'features' => $features,
            'storys' => $storys,
            'successItems' => $successItems,
            'techglossy' => $home->techglossy,
            'products' => $orderedProducts,
            'productCount' => $productCount,
            'brandCount' => $brandCount,
        ]);
    }




    public function softwareInfo()
    {
        $data['software_info'] = SoftwareInfoPage::where('type', 'info')->latest()->firstOrFail();
        $data['tab_one'] = Row::where('id', $data['software_info']->row_five_tab_one_id)->first();
        if (!empty($data['software_info'])) {
            $data['tabIds'] = [
                'tab_two' => Row::where('id', $data['software_info']->row_five_tab_two_id)->first(),
                'tab_three' => Row::where('id', $data['software_info']->row_five_tab_three_id)->first(),
                'tab_four' => Row::where('id', $data['software_info']->row_five_tab_four_id)->first(),
            ];
        }
        $data['categories'] = DB::table('sub_categories')->join('products', 'sub_categories.id', '=', 'products.sub_cat_id')
            ->where('products.product_type', '=', 'software')
            ->select('sub_categories.id', 'sub_categories.slug', 'sub_categories.title', 'sub_categories.image')
            ->distinct()->inRandomOrder()->limit(12)->get();

        $brandIds = Product::where('product_status', 'product')->where('product_type', 'software')->distinct()->pluck('brand_id')->toArray();

        $data['brands'] = Brand::whereIn('id', $brandIds)->where('status', 'active')->limit(12)->get();

        $data['blogs'] = Blog::inRandomOrder()->limit(4)->get();

        $data['tech_glossies'] = TechGlossy::inRandomOrder()->limit(3)->get();
        // dd($data['tech_glossies']);
        $data['tech_glossy1'] = $data['tech_glossies']->first();
        $data['tech_glossy2'] = $data['tech_glossies']->get(1);
        $data['tech_glossy3'] = $data['tech_glossies']->get(2);
        $data['tech_datas'] = TechnologyData::where('category', 'software')->orderBy('id', 'ASC')->get();
        //dd($data['categories']);
        return view('frontend.pages.software.software_info', $data);
    }

    public function hardwareInfo()
    {
        $data['hardware_info'] = HardwareInfoPage::where('type', 'info')->latest()->firstOrFail();

        $data['tab_one'] = Row::where('id', $data['hardware_info']->row_five_tab_one_id)->first();
        if (!empty($data['hardware_info'])) {
            $data['tabIds'] = [
                'tab_two' => Row::where('id', $data['hardware_info']->row_five_tab_two_id)->first(),
                'tab_three' => Row::where('id', $data['hardware_info']->row_five_tab_three_id)->first(),
                'tab_four' => Row::where('id', $data['hardware_info']->row_five_tab_four_id)->first(),
            ];
        }

        // $data['categories'] = Category::with('subCathardwareProducts')
        //     ->join('products', 'categories.id', '=', 'products.cat_id')
        //     ->where('products.product_type', '=', 'hardware')
        //     ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
        //     ->distinct()->inRandomOrder()->limit(12)->get();
        $data['categories'] = DB::table('categories')->join('products', 'categories.id', '=', 'products.cat_id')
            ->where('products.product_type', '=', 'hardware')
            ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
            ->distinct()->inRandomOrder()->limit(12)->get();

        $data['products'] = Product::where('product_type', 'hardware')->where('product_status', 'product')
            ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
            ->inRandomOrder()
            ->limit(16)
            ->get();


        $data['brands'] = Brand::with('brandhardwareProducts')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->where('products.product_type', '=', 'hardware')
            ->select('brands.id', 'brands.slug', 'brands.title', 'brands.image')
            ->where('brands.status', 'active')->distinct()->inRandomOrder()->limit(12)->get();
        $data['industrys'] = Industry::orderBy('id', 'ASC')->limit(8)->get(['id', 'slug', 'logo', 'title']);
        $data['tech_datas'] = TechnologyData::where('category', 'hardware')->orderBy('id', 'ASC')->get();
        $data['blogs'] = Blog::inRandomOrder()->limit(4)->get();
        $data['tech_glossies'] = TechGlossy::inRandomOrder()->limit(3)->get();
        $data['tech_glossy1'] = $data['tech_glossies']->first();
        $data['tech_glossy2'] = $data['tech_glossies']->get(1);
        $data['tech_glossy3'] = $data['tech_glossies']->get(2);
        $data['random_industries'] = Industry::orderBy('id', 'DESC')->limit(4)->get(['id', 'slug', 'title']);
        return view('frontend.pages.hardware.hardware_info', $data);
    }




    public function softwareCommon()
    {
        $data['software_info'] = SoftwareInfoPage::where('type', 'common')->latest()->firstOrFail();
        $data['tab_one'] = Row::where('id', $data['software_info']->row_five_tab_one_id)->first();
        if (!empty($data['software_info'])) {
            $data['tabIds'] = [
                'tab_two' => Row::where('id', $data['software_info']->row_five_tab_two_id)->first(),
                'tab_three' => Row::where('id', $data['software_info']->row_five_tab_three_id)->first(),
                'tab_four' => Row::where('id', $data['software_info']->row_five_tab_four_id)->first(),
            ];
        }



        $data['categories'] = SubCategory::with('subCatsoftwareProducts')
            ->whereHas('products', function ($query) {
                $query->where('product_type', 'software');
            })
            ->select('id', 'slug', 'title', 'image')
            ->inRandomOrder()
            ->distinct()
            ->limit(12)
            ->get();


        $data['products'] = Product::where('product_type', 'software')
            ->where('product_status', 'product')
            ->orderByRaw('RAND()')
            ->limit(16)
            ->get(['id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount']);
        $brandIds = Product::where('product_status', 'product')->where('product_type', 'software')->distinct()->pluck('brand_id')->toArray();

        $data['brands'] = Brand::whereIn('id', $brandIds)->where('status', 'active')->limit(12)->get();

        $data['blogs'] = Blog::inRandomOrder()->limit(4)->get();

        $data['tech_glossies'] = TechGlossy::inRandomOrder()->limit(3)->get();
        // dd($data['tech_glossies']);
        $data['tech_glossy1'] = $data['tech_glossies']->first();
        $data['tech_glossy2'] = $data['tech_glossies']->get(1);
        $data['tech_glossy3'] = $data['tech_glossies']->get(2);
        $data['tech_datas'] = TechnologyData::where('category', 'software')->orderBy('id', 'ASC')->get();
        $data['solutions'] = SolutionDetail::orderBy('id', 'DESC')->where('status', 'active')->limit(10)->get(['id', 'name']);
        $data['tech_datas'] = TechnologyData::where('category', 'software')->orderBy('id', 'ASC')->get();
        $data['industrys'] = Industry::orderBy('id', 'ASC')->limit(8)->get(['id', 'logo', 'title', 'slug']);
        $data['random_industries'] = Industry::orderBy('id', 'DESC')->limit(4)->get(['id', 'title', 'slug']);

        return view('frontend.pages.software.allsoftware', $data);
    }

    //Hardware All Pge

    public function hardwareCommon()
    {
        $hardwareInfo = HardwareInfoPage::where('type', 'common')->latest()->firstOrFail();

        $data['hardware_info'] = $hardwareInfo;
        $data['tab_one'] = Row::find($hardwareInfo->row_five_tab_one_id);

        $data['tabIds'] = [
            'tab_two' => Row::find($hardwareInfo->row_five_tab_two_id),
            'tab_three' => Row::find($hardwareInfo->row_five_tab_three_id),
            'tab_four' => Row::find($hardwareInfo->row_five_tab_four_id),
        ];


        // $data['categories']  = DB::table('categories')
        //     ->join('products', 'categories.id', '=', 'products.cat_id')
        //     ->where('products.product_type', 'hardware')
        //     ->select('id', 'slug', 'title', 'image')
        //     ->distinct()
        //     ->inRandomOrder()
        //     ->limit(12)
        //     ->get();

        $data['categories'] = DB::table('categories')->join('products', 'categories.id', '=', 'products.cat_id')
            ->where('products.product_type', '=', 'hardware')
            ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
            ->distinct()->inRandomOrder()->limit(12)->get();




        // $data['categories'] = Category::with(['catHardwareProducts' => function ($query) {
        //     $query->where('product_type', 'hardware')
        //         ->where('product_status', 'product');
        // }])->whereHas('catHardwareProducts', function ($query) {
        //     $query->where('product_type', 'hardware')
        //         ->where('product_status', 'product');
        // })->get();

        // dd($data['categories']);

        // Products
        $data['products'] = Product::where([
            ['product_type', '=', 'hardware'],
            ['product_status', '=', 'product']
        ])
            ->inRandomOrder()
            ->limit(16)
            ->get(['id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount']);

        // Brand IDs used in products
        $brandIds = Product::where([
            ['product_type', '=', 'hardware'],
            ['product_status', '=', 'product']
        ])
            ->distinct()
            ->pluck('brand_id');

        // Blogs and Brands
        $data['blogs'] = Blog::inRandomOrder()->limit(4)->get();
        $data['brands'] = Brand::whereIn('id', $brandIds)
            ->where('status', 'active')
            ->limit(12)
            ->get();

        // Solutions
        $data['solutions'] = SolutionDetail::where('status', 'active')
            ->orderByDesc('id')
            ->limit(10)
            ->get(['id', 'name']);

        // Tech Glossies
        $techGlossies = TechGlossy::inRandomOrder()->limit(3)->get();
        $data['tech_glossies'] = $techGlossies;
        $data['tech_glossy1'] = $techGlossies->get(0);
        $data['tech_glossy2'] = $techGlossies->get(1);
        $data['tech_glossy3'] = $techGlossies->get(2);

        // Technology Data and Industries
        $data['tech_datas'] = TechnologyData::where('category', 'hardware')->orderBy('id')->get();
        $data['industrys'] = Industry::orderBy('id')->limit(8)->get(['id', 'logo', 'title', 'slug']);
        $data['random_industries'] = Industry::orderByDesc('id')->limit(4)->get(['id', 'title', 'slug']);

        return view('frontend.pages.hardware.allhardware', $data);
    }

    //Learn More
    public function LearnMore()
    {
        $learnmore = LearnMore::with([
            'successStoryOne',
            'successStoryTwo',
            'successStoryThree',
        ])->orderBy('id', 'DESC')->first();

        if ($learnmore) {
            $data['learnmore'] = $learnmore;
            $data['story1'] = $learnmore->successStoryOne;
            $data['story2'] = $learnmore->successStoryTwo;
            $data['story3'] = $learnmore->successStoryThree;
        }

        $data['industrys'] = Industry::orderBy('id', 'ASC')->limit(8)->get(['id', 'slug', 'logo', 'title']);
        $data['random_industries'] = Industry::orderBy('id', 'DESC')->limit(4)->get(['id', 'slug', 'title']);

        return view('frontend.pages.learnmore.view', $data);
    }


    //About
    public function about()
    {
        $data['about'] = AboutUs::latest('id', 'desc')->firstOrFail();
        if ($data['about']) {

            $data['row1'] = Row::where('id', $data['about']->row_one_id)->first();
            $data['row2'] = Row::where('id', $data['about']->row_two_id)->first();
            $data['row3'] = Row::where('id', $data['about']->row_three_id)->first();
        }
        $data['pdfs'] = DocumentPdf::where('category', 'company')->latest('id', 'desc')->limit(4)->get(['document', 'button_name', 'button_link']);
        return view('frontend.pages.about.about', $data);
    }

    //What We Do

    public function whatWeDo()
    {
        $data['whatwedo'] = WhatWeDoPage::latest('id', 'desc')->firstOrFail();
        $data['productCount'] = Product::where('product_status', 'product')->count();
        $data['brandCount'] = Brand::where('status', 'active')->count();
        if (!empty($data['whatwedo'])) {
            $data['row_two'] = Row::where('id', $data['whatwedo']->row_two_id)->first();
            $data['row_three'] = Row::where('id', $data['whatwedo']->row_three_id)->first();
        }
        return view('frontend.pages.whatwedo.whatwedo', $data);
    }


    //Feature Details
    public function featureDetails($slug)
    {
        $data['learnmore'] = LearnMore::orderBy('id', 'DESC')->select('learn_mores.industry_header', 'learn_mores.consult_title', 'learn_mores.consult_short_des', 'learn_mores.background_image')->firstOrFail();
        $data['feature'] = Feature::with(['rowOne', 'rowTwo'])->where('slug', $slug)->firstOrFail();
        $data['row_one'] = $data['feature']->rowOne;
        $data['row_two'] = $data['feature']->rowTwo;
        $data['features'] = Feature::with('rowOne', 'rowTwo')
            ->where('slug', '!=', $slug)->select('logo', 'id', 'slug', 'badge', 'header')->get();
        return view('frontend.pages.feature.feature_details', $data);
    }

    public function allSolution()
    {
        $data['learnmore'] = LearnMore::orderBy('id', 'DESC')->select('learn_mores.industry_header', 'learn_mores.consult_title', 'learn_mores.consult_short_des', 'learn_mores.background_image')->first();
        $data['solutions'] = SolutionDetail::orderBy('id', 'DESC')->where('status', 'active')->select('id', 'name', 'header', 'thumbnail_image', 'slug')->get();
        $data['story3'] = ClientStory::inRandomOrder()->first();
        $data['story4'] = ClientStory::inRandomOrder()->where('id', '!=', $data['story3']->id)->first();
        $data['story1'] = Blog::inRandomOrder()->first();
        $data['story2'] = Blog::inRandomOrder()->where('id', '!=', $data['story1']->id)->first();
        $data['techglossy'] = TechGlossy::inRandomOrder()->first();
        $data['tech_datas'] = TechnologyData::where('category', 'solution')->orderBy('id', 'ASC')->get();
        $data['industrys'] = Industry::orderBy('id', 'ASC')->limit(8)->get(['id', 'slug', 'logo', 'title']);
        $data['random_industries'] = Industry::orderBy('id', 'DESC')->limit(4)->get(['id', 'slug', 'title']);


        return view('frontend.pages.solution.allsolution', $data);
    }

    //Feature Details
    public function SolutionDetails($id)
    {
        $data['solution'] = SolutionDetail::with('rowOne', 'solutionProducts', 'card1', 'card2', 'card3', 'card4', 'card5', 'card6', 'card7', 'card8', 'rowFour')->where('slug', $id)->firstOrFail();
        $data['solutions'] = SolutionDetail::where('id', '!=', $id)->where('status', 'active')->get();
        $solution_id = json_encode($data['solution']->id);
        $data['products'] = $data['solution']->solutionProducts;
        $data['features'] = Feature::whereJsonContains('solution_id', $solution_id)->get();
        $data['blogs'] = Blog::whereJsonContains('solution_id', $solution_id)->get();
        // dd(json_encode($data['solution']->id));
        // dd($data['blogs'] );
        $data['industry'] = SolutionDetail::where('id', '!=', $id)->where('status', 'active')->get();
        // dd($data['solution']);
        if ($data['solution']->solution_template == 'template_one') {
            return view('frontend.pages.solution.solution_details-1', $data);
        } elseif ($data['solution']->solution_template == 'template_two') {
            return view('frontend.pages.solution.solution_details-2', $data);
        } elseif ($data['solution']->solution_template == 'template_three') {
            return view('frontend.pages.solution.solution_details-3', $data);
        } elseif ($data['solution']->solution_template == 'template_four') {
            return view('frontend.pages.solution.solution_details-4', $data);
        }
    }




    //Contact, Support, Location, RFQ
    public function location()
    {
        $data['setting'] = Site::latest()->first();
        $data['locations'] = OfficeLocation::orderBy('name', 'ASC')->get();
        $country_ids = $data['locations']->pluck('country_id')->unique()->toArray();
        $data['countries']  = Country::whereIn('id', $country_ids)->get();
        $data['tech_datas'] = TechnologyData::where('category', 'location')->orderBy('id', 'desc')->limit(6)->get();
        return view('frontend.pages.contact.location', $data);
    }

    public function contact()
    {
        $data['setting'] = Site::latest()->first();
        return view('frontend.pages.contact.contact', $data);
    }

    public function Support()
    {
        $data['setting'] = Site::latest()->first();
        return view('frontend.pages.contact.support', $data);
    }

    public function rfqSuccess($id)
    {
        $rfq = Rfq::where('rfq_code', $id)->first();
        $data = [
            'name'         => $rfq->name,
            // 'product_name' => $productNames,
            'phone'        => $rfq->phone,
            'company_name' => $rfq->company_name,
            'address'      => $rfq->address,
            'message'      => $rfq->message,
            'category'      => $rfq->category,
            'brand'      => $rfq->brand,
            'rfq_code'     => $id,
            'email'        => $rfq->email,
            'rq_products'  => RfqProduct::where('rfq_id', $rfq->id)->get(),

        ];
        return view('frontend.pages.common.rfq_common', $data);
    }




    //Client Story All Controller
    public function AllStory()
    {
        $data['tag'] = DB::table('client_stories')->pluck('tags');
        $data['tag_items'] = json_decode($data['tag'], true);
        $data['featured_storys'] = ClientStory::where('featured', '=', '1')->inRandomOrder()->limit(4)->get();
        $data['client_storys'] = ClientStory::orderBy('id', 'Desc')->paginate(3);
        $data['industries'] = Industry::latest()->select('id', 'title')->limit(6)->get();
        $data['categories'] = Category::latest()->select('id', 'title', 'slug')->limit(6)->get();
        $data['brands'] = Brand::latest()->select('id', 'title', 'slug')->where('status', 'active')->limit(6)->get();

        return view('frontend.pages.story.all_story', $data);
    }

    public function StoryDetails($slug)
    {
        $data['blog'] = ClientStory::where('slug', $slug)->firstOrFail();
        $data['storys'] = ClientStory::inRandomOrder()->limit(4)->get();
        return view('frontend.pages.story.story_details', $data);
    }


    //Blogs All Controller

    public function AllBlog()
    {
        $data['tag'] = DB::table('blogs')->pluck('tags');
        $data['tag_items'] = json_decode($data['tag'], true);
        $data['featured_storys'] = Blog::where('featured', '=', '1')->inRandomOrder()->limit(4)->get();
        $data['client_storys'] = Blog::orderBy('id', 'Desc')->paginate(3);
        $data['industries'] = Industry::latest()->select('id', 'title')->limit(6)->get();
        $data['categories'] = Category::latest()->select('id', 'title', 'slug')->limit(6)->get();
        $data['brands'] = Brand::latest()->select('id', 'title', 'slug')->where('status', 'active')->limit(6)->get();
        return view('frontend.pages.blogs.blogs_all', $data);
    }

    public function BlogDetails($id)
    {
        $data['blog'] = Blog::where('id', $id)->firstOrFail();
        $data['storys'] = Blog::inRandomOrder()->limit(4)->get();
        return view('frontend.pages.blogs.blog_details', $data);
    }

    //Tech Glossy All Controller

    public function AllTechGlossy()
    {
        $data['tag'] = DB::table('tech_glossies')->pluck('tags');
        $data['tag_items'] = json_decode($data['tag'], true);
        $data['featured_storys'] = TechGlossy::where('featured', '=', '1')->inRandomOrder()->limit(4)->get();
        $data['client_storys'] = TechGlossy::orderBy('id', 'Desc')->paginate(3);
        $data['industries'] = Industry::latest()->select('id', 'title')->limit(6)->get();
        $data['categories'] = Category::latest()->select('id', 'title', 'slug')->limit(6)->get();
        $data['brands'] = Brand::latest()->select('id', 'title', 'slug')->where('status', 'active')->limit(6)->get();
        return view('frontend.pages.tech.techglossy_all', $data);
    }

    public function TechGlossyDetails($id)
    {
        $data['techglossy'] = TechGlossy::where('id', $id)->first();
        //$data['industry'] = Industry::where('id',$id)->first();
        //$data['industry_page'] = IndustryPage::where('industry_id', $data['industry']->id)->get();
        $data['storys'] = TechGlossy::inRandomOrder()->limit(7)->get();
        return view('frontend.pages.tech.techglossy_details', $data);
    }

    //Shop All Controller

    public function shop_html()
    {
        $data['products'] = Product::inRandomOrder()->where('product_status', 'product')
            ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
            ->limit(16)
            ->get();
        $data['all_categories'] = Category::orderBy('id', 'DESC')->limit(8)->get();
        $data['software_categories'] = DB::table('sub_categories')
            ->join('products', 'sub_categories.id', '=', 'products.sub_cat_id')
            ->where('products.product_type', '=', 'software')
            ->select('sub_categories.id', 'sub_categories.slug', 'sub_categories.title', 'sub_categories.image')
            ->distinct()->get();
        $data['hardware_categories'] = DB::table('sub_categories')
            ->join('products', 'sub_categories.id', '=', 'products.sub_cat_id')
            ->where('products.product_type', '=', 'hardware')
            ->select('sub_categories.id', 'sub_categories.slug', 'sub_categories.title', 'sub_categories.image')
            ->distinct()->get();
        // dd($data['hardware_categories']);
        $data['training_categories'] = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.cat_id')
            ->where('products.product_type', '=', 'training')
            ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
            ->distinct()->get();
        $data['book_categories'] = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.cat_id')
            ->where('products.product_type', '=', 'book')
            ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
            ->distinct()->get();
        $data['categories'] = Category::latest()
            ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
            ->get();
        $data['brands'] = Brand::top()->latest('id')->where('status', 'active')->paginate(18, ['*'], 'top_brands');
        $data['techglossy'] = Blog::inRandomOrder()->first();
        return view('frontend.pages.product.shop_html', $data);
    }


    //Tech Deals
    public function TechDeal()
    {

        $data['products'] = Product::where('refurbished', '1')->where('product_status', 'product')->paginate(10);
        $data['brands'] = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->where('products.refurbished', '=', '1')
            ->select('brands.id', 'brands.slug', 'brands.title', 'brands.image')
            ->where('brands.status', 'active')->distinct()->get();
        $data['categories'] = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.cat_id')
            ->where('products.refurbished', '=', '1')
            ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
            ->distinct()->get();
        //dd($data['categories']);
        $data['techdeal_products'] = Product::whereNotNull('deal')->where('product_status', 'product')->get();
        return view('frontend.pages.tech.deal', $data);
    }

    public function Refurbished()
    {
        $data['products'] = Product::where('refurbished', '1')->where('product_status', 'product')->paginate(10);
        $data['brands'] = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->where('products.refurbished', '=', '1')
            ->select('brands.id', 'brands.slug', 'brands.title', 'brands.image')
            ->where('brands.status', 'active')->distinct()->get();
        $data['categories'] = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.cat_id')
            ->where('products.refurbished', '=', '1')
            ->select('categories.id', 'categories.slug', 'categories.title', 'categories.image')
            ->distinct()->get();
        //dd($data['categories']);
        $data['techdeal_products'] = Product::whereNotNull('deal')->where('product_status', 'product')->get();
        return view('frontend.pages.tech.refurbished', $data);
    }


    //Product Details


    //Category All PAge


    public function CategoryCommon($category)
    {
        if ((Category::where('slug', $category)->count()) > 0) {
            $data['category'] = Category::where('slug', $category)->firstOrFail();
            $data['sub_cats'] = SubCategory::where('cat_id', $data['category']->id)->get();
            $data['sub_sub_cats'] = SubSubCategory::where('cat_id', $data['category']->id)->get();
            //$data['sub_sub_sub_cats'] = SubSubSubCategory::where('cat_id',$data['category']->id)->get();

            $data['products'] = Product::where('cat_id', $data['category']->id)->where('product_status', 'product')
                ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                ->paginate(8);

            $data['brands'] = DB::table('brands')
                ->join('products', 'brands.id', '=', 'products.brand_id')
                ->join('categories', 'products.cat_id', '=', 'categories.id')
                ->where('categories.id', '=', $data['category']->id)
                ->select('brands.id', 'brands.title', 'brands.image', 'brands.slug')
                ->where('brands.status', 'active')
                ->distinct()
                ->paginate(18);
            $data['condition'] = 'category';
            $data['cat_title'] = '';
        } elseif ((SubCategory::where('slug', $category)->count()) > 0) {
            $data['category'] = SubCategory::where('slug', $category)->firstOrFail();
            $data['sub_cats'] = SubSubCategory::where('sub_cat_id', $data['category']->id)->get();
            $data['sub_sub_cats'] = SubSubSubCategory::where('sub_sub_cat_id', $data['category']->id)->get();
            //$data['sub_sub_sub_cats'] = SubSubSubCategory::where('cat_id',$data['category']->id)->get();

            $data['products'] = Product::where('sub_cat_id', $data['category']->id)->where('product_status', 'product')
                ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                ->paginate(8);
            $data['brands'] = DB::table('brands')
                ->join('products', 'brands.id', '=', 'products.brand_id')
                ->join('sub_categories', 'products.sub_cat_id', '=', 'sub_categories.id')
                ->where('sub_categories.id', '=', $data['category']->id)
                ->select('brands.id', 'brands.title', 'brands.image', 'brands.slug')
                ->where('brands.status', 'active')->distinct()
                ->paginate(18);
            $data['condition'] = 'subcategory';
            $data['cat_title'] = Category::where('id', $data['category']->cat_id)->select('title', 'slug')->first();
        } elseif ((SubSubCategory::where('slug', $category)->count()) > 0) {
            $data['category'] = SubSubCategory::where('slug', $category)->firstOrFail();
            $data['sub_cats'] = '';
            $data['sub_sub_cats'] = '';
            //$data['sub_sub_sub_cats'] = SubSubSubCategory::where('cat_id',$data['category']->id)->get();

            $data['products'] = Product::where('sub_sub_cat_id', $data['category']->id)->where('product_status', 'product')
                ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
                ->paginate(8);
            $data['brands'] = DB::table('brands')
                ->join('products', 'brands.id', '=', 'products.brand_id')
                ->join('sub_sub_categories', 'products.sub_sub_cat_id', '=', 'sub_sub_categories.id')
                ->where('sub_sub_categories.id', '=', $data['category']->id)
                ->select('brands.id', 'brands.title', 'brands.image', 'brands.slug')
                ->where('brands.status', 'active')->distinct()
                ->paginate(18);
            $data['condition'] = 'subsubcategory';
            $data['cat_title'] = Category::where('id', $data['category']->cat_id)->select('title', 'slug')->first();
            $data['sub_cat_title'] = SubCategory::where('id', $data['category']->sub_cat_id)->select('title', 'slug')->first();
        }

        return view('frontend.pages.category.category', $data);
    }


    public function AllCategory()
    {
        $data['categorys'] = Category::orderBy('title', 'ASC')->limit(12)->get();
        $data['others'] = Category::orderBy('title', 'ASC')->select('categories.id', 'categories.slug', 'categories.title')->get();
        $data['sub_cats'] = SubCategory::orderBy('title', 'ASC')->select('sub_categories.id', 'sub_categories.slug', 'sub_categories.title', 'sub_categories.image')->get();
        $data['sub_sub_cats'] = SubSubCategory::orderBy('title', 'ASC')->select('sub_sub_categories.id', 'sub_sub_categories.slug', 'sub_sub_categories.title', 'sub_sub_categories.image')->get();
        $data['sub_sub_sub_cats'] = SubSubSubCategory::orderBy('title', 'ASC')->select('sub_sub_sub_categories.id', 'sub_sub_sub_categories.slug', 'sub_sub_sub_categories.title', 'sub_sub_sub_categories.image')->get();

        $data['products'] = DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
            ->where('brands.category', '=', 'Top')
            ->limit(16)
            ->get();

        return view('frontend.pages.category.category_all', $data);
    }



    ///Brand All Page

    // public function BrandPage($id)
    // {
    //     $data['brand'] = Brand::where('slug', $id)->select('id', 'slug', 'title')->firstOrFail();
    //     $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->first();
    //     if (!empty($data['brandpage'])) {
    //         $data['storys'] = ClientStory::inRandomOrder()->limit(4)->get();

    //         $data['products'] = Product::where('brand_id', $data['brand']->id)
    //             ->where('product_status', '=', 'product')
    //             ->distinct()
    //             ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
    //             ->limit(12)
    //             ->get();


    //         if ($data['brandpage']) {
    //             $data['row_one'] = Row::where('id', $data['brandpage']->row_four_id)->first();
    //             $data['row_three'] = Row::where('id', $data['brandpage']->row_five_id)->first();
    //             $data['row_four'] = Row::where('id', $data['brandpage']->row_seven_id)->first();
    //             $data['row_five'] = Row::where('id', $data['brandpage']->row_eight_id)->first();
    //             $data['card1'] = SolutionCard::where('id', $data['brandpage']->solution_card_one_id)->first();
    //             $data['card2'] = SolutionCard::where('id', $data['brandpage']->solution_card_two_id)->first();
    //             $data['card3'] = SolutionCard::where('id', $data['brandpage']->solution_card_three_id)->first();
    //         }

    //         return view('frontend.pages.brand.brand_page', $data);
    //     } else {
    //         Toastr::error('No Details information found for this Brand.');
    //         return redirect()->back();
    //     }
    // }

    public function AllBrand()
    {
        $data['top_brands'] = Brand::top()->latest('id')->where('status', 'active')->paginate(18, ['*'], 'top_brands');
        $data['featured_brands'] = Brand::featured()->latest('id')->where('status', 'active')->paginate(18, ['*'], 'featured_brands');
        $data['others'] = Brand::orderBy('title', 'ASC')->select('id', 'slug', 'title')->where('status', 'active')->get();
        return view('frontend.pages.brand.brand', $data);
    }

    //Industry All Page

    public function AllIndustry()
    {

        $data = [];

        $data['learnmore'] = LearnMore::latest()->first(['industry_header', 'consult_title', 'consult_short_des', 'background_image']);


        $data['industrys'] = Industry::orderBy('id')->limit(8)->get(['id', 'slug', 'logo', 'title']);
        $data['random_industries'] = Industry::latest()->limit(4)->get(['id', 'slug', 'title']);

        // Use Eloquent for Random Client Stories
        $data['story3'] = ClientStory::inRandomOrder()->first();
        $data['story4'] = ClientStory::inRandomOrder()->skip(1)->first();

        // Use Eloquent for Random Blog Posts
        $data['story1'] = Blog::inRandomOrder()->first();
        $data['story2'] = Blog::inRandomOrder()->skip(1)->first();

        // Use Eloquent for Random TechGlossy
        $data['techglossy'] = TechGlossy::inRandomOrder()->first();

        // Use Eloquent for Technology Data
        $data['tech_datas'] = TechnologyData::where('category', 'industry')->orderBy('id')->get();

        return view('frontend.pages.industry.all_industry', $data);
    }

    public function IndustryDetails($id)
    {
        $data['industry'] = Industry::where('slug', $id)->with(['industryPage.rowOne', 'industryPage.rowThree', 'industryPage.rowFive', 'industryPage.solutionCardOne', 'industryPage.solutionCardTwo', 'industryPage.solutionCardThree', 'industryPage.solutionCardFour',])->firstOrFail();

        if (isset($data['industry']->industryPage)) {
            if (!empty($data['industry']->industryPage)) {
                $data['storys'] = Blog::inRandomOrder()
                    ->whereJsonContains('industry_id', $data['industry']->id)
                    ->limit(4)
                    ->get();

                $data['techglossy'] = Techglossy::whereJsonContains('industry_id', $data['industry']->id)->first();

                $data['solutions'] = SolutionDetail::where('industry_id', $data['industry']->id)->where('status', 'active')->get();

                $data['product_ids'] = MultiIndustry::where('industry_id', $data['industry']->id)->pluck('product_id');

                $data['products'] = Product::whereIn('id', $data['product_ids'])
                    ->limit(16)
                    ->get(['id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'price_status', 'brand_id']);
            }



            return view('frontend.pages.industry.industry_details', $data);
        } else {
            Toastr::error('No Details information found for this Industry.');
            return redirect()->back();
        }
    }


    //Search All Controller

    public function search(Request $request)
    {
        if ($request->keyword != '') {
            $sproducts = Product::where('title', 'LIKE', '%' . $request->keyword . '%')->where('product_status', 'product')->get();
        }
        return response()->json([
            'sproducts' => $sproducts
        ]);
    }


    // Product Seach
    public function ProductSearch(Request $request)
    {

        $request->validate(["search" => "required"]);

        $item = $request->search;
        //dd($request->search);
        // echo "$item";
        //$categories = Category::orderBy('title','ASC')->get();
        if (Product::where('name', $item)->where('product_status', 'product')->where('product_status', 'product')->first()) {
            $data['sproduct'] = Product::where('name', $item)->where('product_status', 'product')->where('product_status', 'product')->first();
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

            $data['brand'] = Brand::where('id', $data['sproduct']->brand_id)->select('id', 'slug', 'title', 'image')->first();
            $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->first(['id', 'banner_image', 'brand_logo', 'header']);
            $data['related_search'] = [
                'categories' =>  Category::where('id', '!=', $data['sproduct']->cat_id)->inRandomOrder()->limit(2)->get(),
                'brands' =>  Brand::where('id', '!=', $data['sproduct']->brand_id)->inRandomOrder()->where('status', 'active')->limit(20)->get(),
                'solutions' =>  SolutionDetail::inRandomOrder()->where('status', 'active')->limit(4)->get('id', 'slug', 'name'),
                'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
            ];
            $data['brand_products'] = Product::where('brand_id', $data['sproduct']->brand_id)->where('id', '!=', $data['sproduct']->id)->inRandomOrder()->where('product_status', 'product')->limit(20)->get();

            $data['documents'] = DocumentPdf::where('product_id', $data['sproduct']->id)->get();

            return view('frontend.pages.kukapages.product_details', $data);
        } else {
            $data['categories'] = Category::orderBy('title', 'ASC')->get();
            $data['brands'] = Brand::orderBy('title', 'ASC')->where('status', 'active')->get();
            $data['newProduct'] = Product::orderBy('id', 'DESC')->where('product_status', 'product')->limit(3)->get();
            $data['products'] = Product::where('name', 'LIKE', '%' . $item . '%')->where('product_status', 'product')->paginate(10);
            return view('frontend.pages.product.shop_page', $data);
        }
    } // end method


    /// Advance Search Options
    // public function globalSearch(Request $request)
    // {
    //     $query = $request->get('term', '');
    //     $data['products'] = Product::join('brands', 'products.brand_id', '=', 'brands.id')
    //         ->where('products.name', 'LIKE', '%' . $query . '%')
    //         ->where('products.product_status', 'product')
    //         ->where('brands.status', 'active')
    //         ->limit(10)
    //         ->get(['products.id', 'products.name', 'products.slug', 'products.thumbnail', 'products.price', 'products.discount', 'products.sku_code', 'products.rfq', 'products.qty', 'products.stock']);

    //     $data['solutions'] = SolutionDetail::where('name', 'LIKE', '%' . $query . '%')->where('status', 'active')->limit(5)->get(['id', 'name', 'slug']);
    //     $data['industries'] = Industry::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title', 'slug']);
    //     $data['blogs'] = Blog::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title']);
    //     $data['categorys'] = Category::where('title', 'LIKE', '%' . $query . '%')->limit(2)->get(['id', 'title', 'slug']);
    //     $data['subcategorys'] = SubCategory::where('title', 'LIKE', '%' . $query . '%')->limit(2)->get(['id', 'title', 'slug']);
    //     $data['subsubcategorys'] = SubSubCategory::where('title', 'LIKE', '%' . $query . '%')->limit(1)->get(['id', 'title', 'slug']);
    //     $data['brands'] = Brand::where('title', 'LIKE', '%' . $query . '%')->where('status', 'active')->limit(5)->get(['id', 'title', 'slug']);
    //     $data['storys'] = ClientStory::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title', 'slug']);
    //     $data['tech_glossys'] = TechGlossy::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title']);
    //     // dd($query);

    //     return response()->json(view('frontend.partials.search', $data)->render());
    // } // end method

    public function globalSearch(Request $request)
    {
        try {
            $query = $request->get('term', '');

            $data['products'] = Product::join('brands', 'products.brand_id', '=', 'brands.id')
                ->where('products.name', 'LIKE', '%' . $query . '%')
                ->where('products.product_status', 'product')
                ->where('brands.status', 'active')
                ->limit(10)
                ->get(['products.id', 'products.name', 'products.slug', 'products.thumbnail', 'products.price', 'products.discount', 'products.sku_code', 'products.rfq', 'products.qty', 'products.stock']);

            $data['solutions'] = SolutionDetail::where('name', 'LIKE', '%' . $query . '%')
                ->where('status', 'active')
                ->limit(5)
                ->get(['id', 'name', 'slug']);

            $data['industries'] = Industry::where('title', 'LIKE', '%' . $query . '%')
                ->limit(5)
                ->get(['id', 'title', 'slug']);

            $data['blogs'] = Blog::where('title', 'LIKE', '%' . $query . '%')
                ->limit(5)
                ->get(['id', 'title']);

            $data['categorys'] = Category::where('title', 'LIKE', '%' . $query . '%')
                ->limit(2)
                ->get(['id', 'title', 'slug']);

            $data['subcategorys'] = SubCategory::where('title', 'LIKE', '%' . $query . '%')
                ->limit(2)
                ->get(['id', 'title', 'slug']);

            $data['subsubcategorys'] = SubSubCategory::where('title', 'LIKE', '%' . $query . '%')
                ->limit(1)
                ->get(['id', 'title', 'slug']);

            $data['brands'] = Brand::where('title', 'LIKE', '%' . $query . '%')
                ->where('status', 'active')
                ->limit(5)
                ->get(['id', 'title', 'slug']);

            $data['storys'] = ClientStory::where('title', 'LIKE', '%' . $query . '%')
                ->limit(5)
                ->get(['id', 'title', 'slug']);

            $data['tech_glossys'] = TechGlossy::where('title', 'LIKE', '%' . $query . '%')
                ->limit(5)
                ->get(['id', 'title']);

            return response()->json(view('frontend.partials.search', $data)->render());
        } catch (\Exception $e) {
            // Log the error for debugging
            return response()->json([
                'error' => 'Global search error: ' . $e->getMessage()
            ], 500);
        }
    }



    //Terms & Policy
    public function TermsPolicy()
    {
        $data['terms'] = Policy::where('condition', 'terms')->get();
        $data['sale_terms'] = Policy::where('condition', 'sale_terms')->get();
        $data['service_terms'] = Policy::where('condition', 'service_terms')->get();
        return view('frontend.pages.policy.terms_policy', $data);
    }
    public function PrivacyPolicy()
    {
        $data['policy'] = Policy::where('condition', 'policy')->get();
        return view('frontend.pages.policy.privacy_policy', $data);
    }
    public function faq()
    {
        $faqs = Faq::select('category', 'id', 'question', 'answer')
            ->orderBy('category')
            ->get()
            ->groupBy('category'); // Group in PHP, reduce queries

        $data['faq_categories'] = $faqs->keys();
        $data['faqs_by_category'] = $faqs;

        return view('frontend.pages.policy.faq', $data);
    }



    public function Portfolio()
    {
        $data['portfolio'] = PortfolioPage::latest('id', 'desc')->first();
        $data['categories'] = PortfolioCategory::orderBy('id', 'ASC')->get();
        $data['teams'] = PortfolioTeam::orderBy('id', 'ASC')->get();
        $data['chooses'] = PortfolioChooseUs::orderBy('id', 'ASC')->get();
        $data['clients'] = PortfolioClient::orderBy('id', 'ASC')->get();
        $data['feedbacks'] = PortfolioClientFeedback::orderBy('id', 'ASC')->get();
        return view('frontend.pages.portfolio.portfolio', $data);
    }

    public function portfolioDetails($id)
    {
        $data['portfolio'] = PortfolioDetails::findOrFail($id);
        if (!empty($data['portfolio'])) {
            $data['clients'] = PortfolioClientFeedback::where('portfolio_details_id', $id)->get();
        } else {
            $data['clients'] = null;
        }

        return view('frontend.pages.portfolio.portfolio_details', $data);
    }





    public function rfqCreate(Request $request)
    {
        $data['countries'] = Country::orderBy('country_name', 'ASC')->get(['id', 'country_name']);
        $cart_items = Cart::content();
        $data['cart_products'] = $cart_items;
        return view('frontend.pages.rfq.rfq', $data);
    }
    public function rfqProduct(Request $request, $slug)
    {
        $product = Product::select('id', 'name')->where('slug', $slug)->first();
        $id = $product->id;
        $quantity = 1;

        // If the product doesn't exist, add it to the cart
        Cart::add([
            'id'      => $id,
            'name'    => $product->name,
            'qty'     => $quantity,
            'price'   => 0,
            'weight'  => 1,
        ]);

        $data['countries'] = Country::orderBy('country_name', 'ASC')->get(['id', 'country_name']);
        $cart_items = Cart::content();
        $data['cart_products'] = $cart_items;
        return view('frontend.pages.rfq.rfq', $data);
    }

    public function training()
    {
        $data['training'] = TrainingPage::latest('id')->firstOrFail();
        $data['tab_one'] = Row::where('id', $data['training']->row_two_tab_one_id)->first();
        $data['row_one'] = Row::where('id', $data['training']->row_one_id)->first();
        $data['row_five'] = Row::where('id', $data['training']->row_five_id)->first();
        if (!empty($data['training'])) {
            $data['tabIds'] = [
                'tab_two' => Row::where('id', $data['training']->row_two_tab_two_id)->first(),
                'tab_three' => Row::where('id', $data['training']->row_two_tab_three_id)->first(),
                'tab_four' => Row::where('id', $data['training']->row_two_tab_four_id)->first(),
            ];
        }

        $data['tech_datas'] = TechnologyData::where('category', 'software')->orderBy('id', 'ASC')->get();
        return view('frontend.pages.commonPage.training', $data);
    }

    public function books()
    {
        $data['software_info'] = SoftwareInfoPage::where('type', 'info')->latest()->firstOrFail();
        $data['tab_one'] = Row::where('id', $data['software_info']->row_five_tab_one_id)->first();
        if (!empty($data['software_info'])) {
            $data['tabIds'] = [
                'tab_two' => Row::where('id', $data['software_info']->row_five_tab_two_id)->first(),
                'tab_three' => Row::where('id', $data['software_info']->row_five_tab_three_id)->first(),
                'tab_four' => Row::where('id', $data['software_info']->row_five_tab_four_id)->first(),
            ];
        }
        $data['categories'] = DB::table('sub_categories')->join('products', 'sub_categories.id', '=', 'products.sub_cat_id')
            ->where('products.product_type', '=', 'software')
            ->select('sub_categories.id', 'sub_categories.slug', 'sub_categories.title', 'sub_categories.image')
            ->distinct()->inRandomOrder()->limit(12)->get();

        $brandIds = Product::where('product_status', 'product')->where('product_type', 'software')->distinct()->pluck('brand_id')->toArray();

        $data['brands'] = Brand::whereIn('id', $brandIds)->where('status', 'active')->limit(12)->get();

        $data['blogs'] = Blog::inRandomOrder()->limit(4)->get();

        $data['tech_glossies'] = TechGlossy::inRandomOrder()->limit(3)->get();
        // dd($data['tech_glossies']);
        $data['tech_glossy1'] = $data['tech_glossies']->first();
        $data['tech_glossy2'] = $data['tech_glossies']->get(1);
        $data['tech_glossy3'] = $data['tech_glossies']->get(2);
        $data['tech_datas'] = TechnologyData::where('category', 'software')->orderBy('id', 'ASC')->get();
        return view('frontend.pages.commonPage.books', $data);
    }

    public function socialImage($path)
    {
        $imagePath = storage_path('app/public/' . $path);

        if (!file_exists($imagePath)) {
            abort(404);
        }

        $img = Image::make($imagePath)
            ->resize(1200, 630, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->resizeCanvas(1200, 630, 'center', false, 'ffffff'); // Optional: Add padding color if needed

        return $img->response('jpg');
    }

    public function testEmail()
    {
        return view('frontend.pages.testEmail');
    }

    public function emailSend(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            $message = $request->message;
            try {
                Mail::to($request->email)->send(new TestMail($message));

                Session::flash('success', 'Test email sent successfully to ' . $request->email);
                return redirect()->back();
            } catch (\Exception $e) {
                Session::flash('error', 'Failed to send test email: ' . $e->getMessage());
                Toastr::error('Failed to send test email: ' . $e->getMessage());
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Failed to send test email: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
