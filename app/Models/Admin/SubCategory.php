<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categorys()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function subsubCategorys()
    {
        return $this->hasMany(SubSubCategory::class,'sub_cat_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_cat_id')->where('product_status', 'product');
    }

    public function subCatsoftwareProducts()
    { 
        return $this->products()->where('product_type', 'software')->inRandomOrder(11);
    }

    public function SubCatproducts()
    {
        return $this->products();
    }
    public static function getProductBySubCat($slug)
    {
        return self::with('SubCatproducts')->where('slug', $slug)->first();
    }
    public static function getSubSubcatBySubCat($slug)
    {

        return SubSubCategory::where('sub_cat_id', $slug)->get();
    }
}
