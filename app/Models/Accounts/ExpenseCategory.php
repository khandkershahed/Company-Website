<?php

namespace App\Models\Accounts;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory,HasSlug;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $slugSourceColumn = 'name';
    protected $guarded = [];
    public function expenseTypes()
    {
        return $this->hasMany(ExpenseType::class,'expense_category_id','id');
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class,'expense_category','id');
    }
}
