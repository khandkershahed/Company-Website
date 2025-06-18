<?php

namespace App\Models\Admin;

use App\Traits\HasSlug;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, HasSlug;
    protected $slugSourceColumn = 'title';
    protected $guarded = [];

    public function scopeTop($query)
    {
        return $query->where('category', 'Top');
    }

    public function scopeFeatured($query)
    {
        return $query->where('category', 'Featured');
    }

    public function brandsoftwareProducts()
    {
        return $this->hasMany(Product::class, 'brand_id')
            ->where('product_status', 'product')
            ->where('product_type', 'software');
    }
    public function brandhardwareProducts()
    {
        return $this->hasMany(Product::class, 'brand_id')
            ->where('product_status', 'product')
            ->where('product_type', 'hardware');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
    public function Brandproducts()
    {
        return $this->hasMany('App\Models\Admin\Product', 'brand_id', 'id');
    }
    public static function getProductByBrand($slug)
    {
        // dd($slug);
        return Brand::with('Brandproducts')->where('slug', $slug)->first();
    }
    public function brandPage()
    {
        return $this->hasOne(BrandPage::class);
    }
}
