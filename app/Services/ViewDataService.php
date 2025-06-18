<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Site;
use App\Models\User;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\Feature;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\TechGlossy;
use App\Models\Admin\SolutionDetail;

class ViewDataService
{
    public static function getGlobalViewData(): array
    {
        return [
            'all_employees' => Cache::remember('all_employees', 60, function () {
                return User::all();
            }),

            'setting' => Cache::remember('setting', 60, function () {
                return Site::first();
            }),

            'header_industrys' => Cache::remember('header_industrys', 60, function () {
                return Industry::with('industryPage')->latest('id')->get(['id', 'title', 'slug']);
            }),

            'header_solutions' => Cache::remember('header_solutions', 60, function () {
                return SolutionDetail::inRandomOrder()
                    ->where('status', 'active')
                    ->take(4)
                    ->get(['id', 'name', 'slug']);
            }),

            'header_categories' => Cache::remember('header_categories', 60, function () {
                return Category::with('subCategorys.subsubCategorys.subsubsubCategorys')
                    ->orderBy('id', 'asc')->limit(10)
                    ->get(['id', 'slug', 'title']);
            }),

            'header_brands' => Cache::remember('header_brands', 60, function () {
                return Brand::with('brandPage')
                    ->inRandomOrder()
                    ->take(20)
                    ->get(['id', 'slug', 'title']);
            }),

            'header_features' => Cache::remember('header_features', 60, function () {
                return Feature::inRandomOrder()
                    ->take(4)
                    ->get(['id', 'title', 'image', 'created_at', 'badge']);
            }),

            'header_blog' => Cache::remember('header_blog', 60, function () {
                return Blog::where('featured', '1')
                    ->inRandomOrder()
                    ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);
            }),

            'header_techglossy' => Cache::remember('header_techglossy', 60, function () {
                return TechGlossy::where('featured', '1')
                    ->inRandomOrder()
                    ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);
            }),
        ];
    }
}
