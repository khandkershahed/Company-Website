<?php

namespace App\Providers;

use App\Models\Site;
use App\Models\User;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\Feature;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\TechGlossy;
use Illuminate\Support\Facades\URL;
use App\Models\Admin\SolutionDetail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
        // // Use Bootstrap for pagination
        // Paginator::useBootstrap();

        // // Custom blade directive
        

        // // Force HTTPS in production
        // if (app()->environment('production')) {
        //     URL::forceScheme('https');
        // }

        // View::composer('*', function ($view) {
        //     // Safe-checks with schema are optional if migrations are done
        //     if (!Schema::hasTable('users')) return;

        //     $view->with('all_employees', Cache::remember('all_employees', 3600, function () {
        //         return User::all();
        //     }));

        //     $view->with('productCount', Cache::remember('productCount', 3600, function () {
        //         return Product::where('product_status', 'product')->count();
        //     }));

        //     $view->with('brandCount', Cache::remember('brandCount', 3600, function () {
        //         return Brand::count();
        //     }));

        //     $view->with('setting', Cache::remember('site_setting', 3600, function () {
        //         return Site::first();
        //     }));

        //     $view->with('header_industrys', Cache::remember('header_industrys', 3600, function () {
        //         return Industry::with('industryPage')->latest('id')->get(['id', 'title', 'slug']);
        //     }));

        //     $view->with('header_solutions', Cache::remember('header_solutions', 3600, function () {
        //         return SolutionDetail::inRandomOrder()->where('status', 'active')->take(4)->get(['id', 'name', 'slug']);
        //     }));

        //     $view->with('header_categories', Cache::remember('header_categories', 3600, function () {
        //         return Category::with('subCategorys.subsubCategorys.subsubsubCategorys')
        //             ->orderBy('id', 'asc')->limit(10)->get(['id', 'slug', 'title']);
        //     }));

        //     $view->with('header_brands', Cache::remember('header_brands', 3600, function () {
        //         return Brand::with('brandPage')->inRandomOrder()->take(20)->get(['id', 'slug', 'title']);
        //     }));

        //     $view->with('header_features', Cache::remember('header_features', 3600, function () {
        //         return Feature::take(4)->inRandomOrder()->get(['id', 'title', 'image', 'created_at', 'badge']);
        //     }));

        //     $view->with('header_blog', Cache::remember('header_blog', 3600, function () {
        //         return Blog::where('featured', '1')->inRandomOrder()->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);
        //     }));

        //     $view->with('header_techglossy', Cache::remember('header_techglossy', 3600, function () {
        //         return TechGlossy::where('featured', '1')->inRandomOrder()->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);
        //     }));
        // });
    }
}
