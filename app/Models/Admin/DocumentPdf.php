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
        return $this->belongsTo(Brand::class);
    }

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship to Industry
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    // Relationship to Solution
    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    // Helper methods for Blade conditional logic
    public function getBrandName()
    {
        return optional($this->brand)->name;
    }

    public function getProductName()
    {
        return optional($this->product)->name;
    }

    public function getIndustryName()
    {
        return optional($this->industry)->name;
    }

    public function getSolutionName()
    {
        return optional($this->solution)->name;
    }
}
