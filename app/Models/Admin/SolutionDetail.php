<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionDetail extends Model
{
    use HasFactory;

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
    public function rowOne()
    {
        return $this->belongsTo(Row::class, 'row_one_id');
    }

    public function card1()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_one_id');
    }

    public function card2()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_two_id');
    }

    public function card3()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_three_id');
    }

    public function card4()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_four_id');
    }

    public function card5()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_five_id');
    }

    public function card6()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_six_id');
    }

    public function card7()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_seven_id');
    }

    public function card8()
    {
        return $this->belongsTo(SolutionCard::class, 'solution_card_eight_id');
    }

    public function rowFour()
    {
        return $this->belongsTo(Row::class, 'row_four_id');
    }
    public function multiSolution()
    {
        return $this->hasMany(MultiSolution::class, 'solution_id');
    }
}
