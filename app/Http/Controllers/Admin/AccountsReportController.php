<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Income;
use App\Models\Accounts\Expense;
use App\Models\Accounts\ExpenseCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccountsReportController extends Controller
{
    public function overview()
    {
        // 1. Summary Cards
        $totalIncome = Income::sum('amount');
        $totalExpense = Expense::sum('amount');
        $netProfit = $totalIncome - $totalExpense;

        // 2. Monthly Comparison Chart Data (Last 12 Months)
        $months = [];
        $incomeData = [];
        $expenseData = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->format('M Y');
            $monthNum = $date->month;
            $year = $date->year;

            $months[] = $monthName;
            
            $incomeData[] = Income::whereMonth('date', $monthNum)->whereYear('date', $year)->sum('amount');
            $expenseData[] = Expense::whereMonth('date', $monthNum)->whereYear('date', $year)->sum('amount');
        }

        // 3. Expense Category Breakdown (Pie Chart)
        $expenseCats = Expense::select('expense_category', DB::raw('sum(amount) as total'))
            ->with('expenseCategoryRelation') // Ensure this relationship exists in Expense Model
            ->groupBy('expense_category')
            ->get();
        
        $catLabels = $expenseCats->map(fn($e) => $e->expenseCategoryRelation->name ?? 'Uncategorized')->toArray();
        $catData = $expenseCats->pluck('total')->toArray();

        // 4. Income Type Breakdown (Donut Chart)
        $incomeTypes = Income::select('type', DB::raw('sum(amount) as total'))
            ->groupBy('type')
            ->get();
            
        $typeLabels = $incomeTypes->pluck('type')->map(fn($t) => ucfirst($t))->toArray();
        $typeData = $incomeTypes->pluck('total')->toArray();

        return view('metronic.pages.accounts.overview', compact(
            'totalIncome', 'totalExpense', 'netProfit',
            'months', 'incomeData', 'expenseData',
            'catLabels', 'catData',
            'typeLabels', 'typeData'
        ));
    }

    public function ledger(Request $request)
    {
        // Fetch Incomes and Expenses
        $incomes = Income::with('rfq')->get()->map(function ($item) {
            $item->txn_type = 'Income';
            $item->ref = $item->po_reference ?? $item->rfq->rfq_code ?? '-';
            $item->desc = $item->particulars ?? 'Income Received';
            return $item;
        });

        $expenses = Expense::with(['expenseCategoryRelation', 'expenseTypeRelation'])->get()->map(function ($item) {
            $item->txn_type = 'Expense';
            $item->client_name = $item->expenseCategoryRelation->name ?? 'General'; // Use Category as "Party" for expense
            $item->ref = $item->voucher ?? '-';
            $item->desc = $item->particulars ?? 'Expense Paid';
            return $item;
        });

        // Merge and Sort by Date Descending
        $ledger = $incomes->concat($expenses)->sortByDesc('date');

        // Optional: Filter by Date Range if request has it
        if ($request->has('start_date') && $request->has('end_date')) {
            $ledger = $ledger->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        return view('metronic.pages.accounts.ledger', compact('ledger'));
    }
}