<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    use HasFactory, HasSlug;
    protected $slugSourceColumn = 'name';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function solutionProducts()
    {
        return $this->belongsToMany(Product::class, 'multi_solutions', 'solution_id', 'product_id')
            ->where('product_status', 'product');
    }
    public function solutionsoftwareProducts()
    {
        return $this->belongsToMany(Product::class, 'multi_solutions', 'solution_id', 'product_id')
            ->where('product_status', 'product')
            ->where('product_type', 'software');
    }
    public function solutionhardwareProducts()
    {
        return $this->belongsToMany(Product::class, 'multi_solutions', 'solution_id', 'product_id')
            ->where('product_status', 'product')
            ->where('product_type', 'hardware');
    }


}
