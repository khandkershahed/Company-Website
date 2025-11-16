<?php

namespace App\Models\Admin;

use App\Models\Solution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentPdf extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // Relationship to Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relationship to Industry
    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    // Relationship to Solution
    public function solution()
    {
        return $this->belongsTo(Solution::class, 'solution_id');
    }

    // Helper methods for Blade conditional logic
   
}
