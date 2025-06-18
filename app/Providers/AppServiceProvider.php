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
        View::share('all_employees', null);
        View::share('productCount', null);
        View::share('brandCount', null);
        View::share('limit_words', null);
        View::share('setting', null);
        View::share('header_industrys', null);
        View::share('header_solutions', null);
        View::share('header_categories', null);
        View::share('header_brands', null);
        View::share('header_features', null);
        View::share('header_blog', null);
        View::share('header_techglossy', null);

        try {
            if (Schema::hasTable('users')) {
                View::share('all_employees', User::get());
            }
            if (Schema::hasTable('products')) {
                View::share('productCount', Product::where('product_status', 'product')->count());
            }
            if (Schema::hasTable('brands')) {
                View::share('brandCount', Brand::count());
            }

            if (Schema::hasTable('sites')) {
                View::share('setting', Site::first());
            }
            if (Schema::hasTable('industries')) {
                View::share('header_industrys', Industry::with('industryPage')->latest('id')->get(['id', 'title', 'slug']));
            }
            if (Schema::hasTable('solution_details')) {
                View::share('header_solutions', SolutionDetail::inRandomOrder()->where('status', 'active')->take(4)->get(['id', 'name', 'slug']));
            }
            if (Schema::hasTable('categories')) {
                View::share('header_categories', Category::with('subCategorys.subsubCategorys.subsubsubCategorys')
                    ->orderBy('id', 'asc')->limit(10)
                    ->get(['id', 'slug', 'title']));
            }
            if (Schema::hasTable('brands')) {
                View::share('header_brands', Brand::with('brandPage')->inRandomOrder()->take(20)->get(['id', 'slug', 'title']));
            }
            if (Schema::hasTable('features')) {
                View::share('header_features', Feature::take(4)
                    ->inRandomOrder()
                    ->get(['id', 'title', 'image', 'created_at', 'badge']));
            }
            if (Schema::hasTable('blog')) {
                View::share('header_blog', Blog::where('featured', '1')
                    ->inRandomOrder()
                    ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']));
            }
            if (Schema::hasTable('techglossy')) {
                View::share('header_techglossy', TechGlossy::where('featured', '1')
                    ->inRandomOrder()
                    ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']));
            }

            if (app()->environment('production')) {
                URL::forceScheme('https');
            }



            Blade::directive('limit_words', function ($expression) {
                list($string, $limit) = explode(',', $expression);
        return "<?php echo implode(' ', array_slice(explode(' ', $string), 0, $limit)); ?f>";
            });
        } catch (Exception $e) {
        }

        Paginator::useBootstrap();
        try {
            if (
                Schema::hasTable('users') &&
                Schema::hasTable('products') &&
                Schema::hasTable('brands') &&
                Schema::hasTable('sites') &&
                Schema::hasTable('industries') &&
                Schema::hasTable('solution_details') &&
                Schema::hasTable('categories') &&
                Schema::hasTable('features') &&
                Schema::hasTable('blog') &&
                Schema::hasTable('techglossy')
            ) {
                $globalData = ViewDataService::getGlobalViewData();
                // dd($globalData);
                foreach ($globalData as $key => $value) {
                    View::share($key, $value);
                }
            }

            if (app()->environment('production')) {
                URL::forceScheme('https');
            }

            Blade::directive('limit_words', function ($expression) {
                list($string, $limit) = explode(',', $expression);
                return "<?php echo implode(' ', array_slice(explode(' ', $string), 0, $limit)); ?>";
            });
        } catch (\Exception $e) {

            Log::error('AppServiceProvider boot error: ' . $e->getMessage());
        }

        Paginator::useBootstrap();
    }
}



