<?php

namespace App\Models\Accounts;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory,HasSlug;
    protected $slugSourceColumn = 'name';
    protected $guarded = [];
    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class,'expense_type','id');
    }
}
