<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'date' => 'date',
    ];

    // Explicitly specify the foreign key 'expense_category'
    public function expenseCategoryRelation()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category');
    }

    // Explicitly specify the foreign key 'expense_type'
    public function expenseTypeRelation()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type');
    }
}
