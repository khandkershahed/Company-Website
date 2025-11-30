<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Income;
use App\Models\Accounts\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccountsReportController extends Controller
{
    public function overview()
    {
        // 1. Summary Cards (All Time)
        $totalIncome = Income::sum('amount');
        $totalExpense = Expense::sum('amount');
        $netProfit = $totalIncome - $totalExpense;

        // 2. Monthly Trends (Last 12 Months)
        $months = [];
        $incomeData = [];
        $expenseData = [];
        $netProfitData = []; // NEW: For Trend Chart

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthNum = $date->month;
            $year = $date->year;

            $months[] = $date->format('M Y');
            
            $inc = Income::whereYear('date', $year)->whereMonth('date', $monthNum)->sum('amount');
            $exp = Expense::whereYear('date', $year)->whereMonth('date', $monthNum)->sum('amount');

            $incomeData[] = (float) $inc;
            $expenseData[] = (float) $exp;
            $netProfitData[] = (float) ($inc - $exp); // Calculate monthly profit
        }

        // 3. Expense Category Breakdown (Pie)
        $expenseCats = Expense::with('expenseCategoryRelation')
            ->select('expense_category', DB::raw('sum(amount) as total'))
            ->groupBy('expense_category')
            ->get();
        
        $catLabels = [];
        $catData = [];
        foreach($expenseCats as $cat) {
            $name = $cat->expenseCategoryRelation ? $cat->expenseCategoryRelation->name : 'Uncategorized';
            $catLabels[] = $name;
            $catData[] = (float) $cat->total;
        }

        // 4. Income Type Breakdown (Donut)
        $incomeTypes = Income::select('type', DB::raw('sum(amount) as total'))
            ->whereNotNull('type')
            ->groupBy('type')
            ->get();
            
        $typeLabels = $incomeTypes->pluck('type')->map(fn($t) => ucfirst($t))->toArray();
        $typeData = $incomeTypes->pluck('total')->toArray();

        // 5. NEW: Top 5 Clients (by Revenue)
        $topClients = Income::select('client_name', DB::raw('sum(amount) as total'))
            ->whereNotNull('client_name')
            ->groupBy('client_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();
        $clientLabels = $topClients->pluck('client_name')->toArray();
        $clientData = $topClients->pluck('total')->toArray();

        // 6. NEW: Top 5 Expense Types (Specific items)
        $topExpenses = Expense::with('expenseTypeRelation')
            ->select('expense_type', DB::raw('sum(amount) as total'))
            ->groupBy('expense_type')
            ->orderByDesc('total')
            ->take(5)
            ->get();
        
        $topExpLabels = [];
        $topExpData = [];
        foreach($topExpenses as $exp) {
            $name = $exp->expenseTypeRelation ? $exp->expenseTypeRelation->name : 'General';
            $topExpLabels[] = $name;
            $topExpData[] = (float) $exp->total;
        }

        return view('metronic.pages.accounts.overview', compact(
            'totalIncome', 'totalExpense', 'netProfit',
            'months', 'incomeData', 'expenseData', 'netProfitData',
            'catLabels', 'catData',
            'typeLabels', 'typeData',
            'clientLabels', 'clientData',
            'topExpLabels', 'topExpData'
        ));
    }

    // Ledger method remains the same as before...
    public function ledger(Request $request)
    {
        $incomes = Income::with('rfq')->get()->map(function ($item) {
            $item->txn_type = 'Income';
            $item->ref = $item->po_reference ?? $item->rfq->rfq_code ?? '-';
            $item->desc = $item->particulars ?? 'Income Received';
            return $item;
        });

        $expenses = Expense::with(['expenseCategoryRelation', 'expenseTypeRelation'])->get()->map(function ($item) {
            $item->txn_type = 'Expense';
            $item->client_name = $item->expenseCategoryRelation->name ?? 'General';
            $item->ref = $item->voucher ?? '-';
            $item->desc = $item->particulars ?? 'Expense Paid';
            return $item;
        });

        $ledger = $incomes->concat($expenses)->sortByDesc('date');

        if ($request->has('start_date') && $request->has('end_date')) {
            $ledger = $ledger->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        return view('metronic.pages.accounts.ledger', compact('ledger'));
    }
}