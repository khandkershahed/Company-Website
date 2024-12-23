<?php

namespace App\Providers;


use App\Models\Site;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\Feature;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\BrandPage;
use App\Models\Admin\TechGlossy;
use App\Models\Admin\ClientStory;
use App\Models\Admin\IndustryPage;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\SolutionDetail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;

class HeaderComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // if (Schema::hasTable('sites')) {
        //     View::composer('frontend.partials.header', function ($view) {
        //         // Load industries with eager loading
        //         // $industrys = Industry::with('industryPage')
        //         //     ->inRandomOrder()
        //         //     // ->limit(12)
        //         //     ->latest('id')
        //         //     ->get(['id', 'title', 'slug']);

        //         // Load features with eager loading and caching
        //         // $features = Feature::take(4)
        //         //     ->inRandomOrder()
        //         //     ->get(['id', 'title', 'image', 'created_at', 'badge']);



        //         // Load solution details with eager loading and caching
        //         // $solutions = SolutionDetail::take(4)
        //         //     ->inRandomOrder()
        //         //     ->get(['id', 'name', 'slug']);

        //         // Load brand pages with eager loading and caching
        //         // $brands = Brand::with('brandPage')->take(10)
        //         //     ->inRandomOrder()
        //         //     ->get(['id', 'slug', 'title']);

        //         // Load categories with caching
        //         // $categorys = Category::take(5)
        //         //     ->inRandomOrder()
        //         //     ->get(['id', 'slug', 'title']);

        //         // Load featured blogs with caching
        //         // $blog = Blog::where('featured', '1')
        //         //     ->inRandomOrder()
        //         //     ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);


        //         // Load featured tech glossies with caching
        //         // $techglossy = TechGlossy::where('featured', '1')
        //         //     ->inRandomOrder()
        //         //     ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);

        //         $cart_qty = Cart::count();

        //         // Load latest categories



        //         $view->with(compact(
        //             // 'industrys',
        //             // 'features',
        //             // 'solutions',
        //             // 'brands',
        //             // 'categorys',
        //             // 'blog',
        //             // 'techglossy',
        //             'cart_qty'
        //         ));
        //     });
        // }
    }
}
