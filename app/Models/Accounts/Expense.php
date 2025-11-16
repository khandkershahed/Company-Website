<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class,'expense_category','id');
    }
    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class,'expense_type','id');
    }
}
