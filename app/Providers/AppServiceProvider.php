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
        // Share default nulls
        $viewVars = [
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
        foreach ($viewVars as $var) {
            View::share($var, null);
        }

        // Force HTTPS in production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Custom Blade directive (defined only once)
        Blade::directive('limit_words', function ($expression) {
            [$string, $limit] = explode(',', $expression);
            return "<?php echo implode(' ', array_slice(explode(' ', $string), 0, $limit)); ?>";
        });

        // Use Bootstrap pagination
        Paginator::useBootstrap();

        try {
            // Combine table checks
            $requiredTables = [
                'sites',
                'industries',
                'solution_details',
                'categories',
                'brands',
                'features',
                'blog',
                'techglossy',
                'users',
                'products'
            ];

            $existingTables = collect($requiredTables)->filter(fn($table) => Schema::hasTable($table))->flip();

            // Helper function to cache shared data
            $cacheDuration = 60 * 60; // 1 hour

            if ($existingTables->has('sites')) {
                View::share('setting', Cache::remember('site_setting', $cacheDuration, fn() => Site::first()));
            }

            if ($existingTables->has('industries')) {
                View::share('header_industrys', Cache::remember(
                    'header_industries',
                    $cacheDuration,
                    fn() =>
                    Industry::with('industryPage')->latest('id')->limit(12)->get(['id', 'title', 'slug'])
                ));
            }

            if ($existingTables->has('solution_details')) {
                View::share('header_solutions', Cache::remember(
                    'header_solutions',
                    $cacheDuration,
                    fn() =>
                    SolutionDetail::inRandomOrder()->where('status', 'active')->limit(4)->get(['id', 'name', 'slug'])
                ));
            }

            if ($existingTables->has('categories')) {
                View::share('header_categories', Cache::remember(
                    'header_categories',
                    $cacheDuration,
                    fn() =>
                    Category::with('subCategorys.subsubCategorys.subsubsubCategorys')
                        ->orderBy('id', 'asc')->limit(10)->get(['id', 'slug', 'title'])
                ));
            }

            if ($existingTables->has('brands')) {
                View::share('header_brands', Cache::remember(
                    'header_brands',
                    $cacheDuration,
                    fn() =>
                    Brand::with('brandPage')->inRandomOrder()->limit(20)->get(['id', 'slug', 'title'])
                ));
            }

            if ($existingTables->has('features')) {
                View::share('header_features', Cache::remember(
                    'header_features',
                    $cacheDuration,
                    fn() =>
                    Feature::inRandomOrder()->limit(4)->get(['id', 'title', 'image', 'created_at', 'badge'])
                ));
            }

            if ($existingTables->has('blog')) {
                View::share('header_blog', Cache::remember(
                    'header_blog',
                    $cacheDuration,
                    fn() =>
                    Blog::where('featured', '1')->inRandomOrder()->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by'])
                ));
            }

            if ($existingTables->has('techglossy')) {
                View::share('header_techglossy', Cache::remember(
                    'header_techglossy',
                    $cacheDuration,
                    fn() =>
                    TechGlossy::where('featured', '1')->inRandomOrder()->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by'])
                ));
            }

            // Global view data
            if ($existingTables->has('users') && $existingTables->has('products')) {
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
        } catch (\Exception $e) {
            Log::error('AppServiceProvider boot error: ' . $e->getMessage());
        }
    }
}
