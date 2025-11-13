<?php

namespace App\Providers;

use Exception;
use App\Models\Site;
use App\Models\User;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\Feature;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\TechGlossy;
use App\Services\ViewDataService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Models\Admin\SolutionDetail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 🧭 Use Bootstrap for pagination
        Paginator::useBootstrap();

        // 🛡️ Force HTTPS in production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // ✂️ Custom Blade directive (word limiter)
        Blade::directive('limit_words', function ($expression) {
            [$string, $limit] = explode(',', $expression);
            return "<?php echo implode(' ', array_slice(explode(' ', $string), 0, $limit)); ?>";
        });

        // ⚙️ Shared default variables to avoid undefined notices
        $sharedVars = [
            'all_employees',
            'limit_words',
            'setting',
            'header_industrys',
            'header_solutions',
            'header_categories',
            'header_brands',
            'header_features',
            'header_blog',
            'header_techglossy'
        ];
        foreach ($sharedVars as $var) {
            View::share($var, null);
        }

        // 🧩 Cache duration (1 hour)
        $cacheDuration = 60 * 60;

        try {
            // ✅ Check which tables exist (to avoid breaking on missing migrations)
            $tables = [
                'sites',
                'industries',
                'solution_details',
                'categories',
                'brands',
                'features',
                'blogs',
                'tech_glossies',
                'users',
                'products'
            ];
            $existing = collect($tables)->filter(fn($t) => Schema::hasTable($t))->flip();

            // ✅ Share global cached data only for existing tables
            if ($existing->has('sites')) {
                View::share('setting', Cache::remember('site_setting', $cacheDuration, fn() => Site::first()));
            }

            if ($existing->has('industries')) {
                View::share('header_industrys', Cache::remember(
                    'header_industries',
                    $cacheDuration,
                    fn() =>
                    Industry::with('industryPage')->latest('id')->limit(12)->get(['id', 'title', 'slug'])
                ));
            }

            if ($existing->has('solution_details')) {
                View::share('header_solutions', Cache::remember(
                    'header_solutions',
                    $cacheDuration,
                    fn() =>
                    SolutionDetail::where('status', 'active')->inRandomOrder()->limit(4)->get(['id', 'name', 'slug'])
                ));
            }

            if ($existing->has('categories')) {
                View::share('header_categories', Cache::remember(
                    'header_categories',
                    $cacheDuration,
                    fn() =>
                    Category::with('subCategorys.subsubCategorys.subsubsubCategorys')
                        ->orderBy('id', 'asc')->limit(10)->get(['id', 'slug', 'title'])
                ));
            }

            if ($existing->has('brands')) {
                View::share('header_brands', Cache::remember(
                    'header_brands',
                    $cacheDuration,
                    fn() =>
                    Brand::with('brandPage')->where('status', 'active')
                        ->inRandomOrder()->limit(20)->get(['id', 'slug', 'title'])
                ));
            }

            if ($existing->has('features')) {
                View::share('header_features', Cache::remember(
                    'header_features',
                    $cacheDuration,
                    fn() =>
                    Feature::inRandomOrder()->limit(4)
                        ->get(['id', 'slug', 'title', 'image', 'created_at', 'badge'])
                ));
            }

            if ($existing->has('blogs')) {
                View::share('header_blog', Cache::remember(
                    'header_blog',
                    $cacheDuration,
                    fn() =>
                    Blog::where('featured', '1')->inRandomOrder()
                        ->first(['id', 'slug', 'badge', 'title', 'image', 'created_at', 'created_by'])
                ));
            }

            if ($existing->has('tech_glossies')) {
                View::share('header_techglossy', Cache::remember(
                    'header_techglossy',
                    $cacheDuration,
                    fn() =>TechGlossy::where('featured', '1')->inRandomOrder()
                        ->first(['id', 'badge', 'slug', 'title', 'image', 'created_at', 'created_by'])
                ));
            }

            if ($existing->has('users')) {
                View::share('all_employees', Cache::remember('all_employees', $cacheDuration, fn() => User::all()));
            }

            if ($existing->has('products')) {
                View::share('productCount', Cache::remember(
                    'productCount',
                    $cacheDuration,
                    fn() =>
                    Product::where('product_status', 'product')->count()
                ));
            }

            if ($existing->has('brands')) {
                View::share('brandCount', Cache::remember(
                    'brandCount',
                    $cacheDuration,
                    fn() =>
                    Brand::count()
                ));
            }

            // 🗓️ Shared static data (months, sectors)
            View::share('months', [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ]);

            View::share('sectors', [
                'Banks',
                'Group of Companies',
                'Small & Medium',
                'NGOs',
                'Government',
                'Education',
                'Enterprises',
                'Garments',
                'Manufacturing'
            ]);

            // 🌍 Load additional global data service if relevant tables exist
            if ($existing->has('users') && $existing->has('products')) {
                $globalData = Cache::remember(
                    'global_view_data',
                    $cacheDuration,
                    fn() =>
                    ViewDataService::getGlobalViewData()
                );
                foreach ($globalData as $key => $value) {
                    View::share($key, $value);
                }
            }
        } catch (\Throwable $e) {
            \Log::error('AppServiceProvider boot error: ' . $e->getMessage());
        }
    }
}
