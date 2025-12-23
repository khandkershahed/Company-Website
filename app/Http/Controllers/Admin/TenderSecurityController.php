<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TenderSecurity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TenderSecurityController extends Controller
{
    public function index(Request $request)
    {
        // Query Builder for Filter
        $query = TenderSecurity::query();

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        // Stats Calculation
        $totalSecurities = TenderSecurity::count();
        $totalValue = TenderSecurity::where('status', 'Pending')->sum('amount');
        $returnedSecurities = TenderSecurity::where('status', 'Returned')->sum('amount');

        // -------------------------------
        // 🔥 NEW: THIS MONTH & NEXT MONTH
        // -------------------------------

        $startThisMonth = now()->startOfMonth();
        $endThisMonth   = now()->endOfMonth();

        $startNextMonth = now()->addMonth()->startOfMonth();
        $endNextMonth   = now()->addMonth()->endOfMonth();

        // THIS MONTH PENDING
        $thisMonthPending = TenderSecurity::where('status', 'Pending')
            ->whereBetween('issue_date', [$startThisMonth, $endThisMonth])
            ->sum('amount');

        // NEXT MONTH PENDING
        $nextMonthPending = TenderSecurity::where('status', 'Pending')
            ->whereBetween('issue_date', [$startNextMonth, $endNextMonth])
            ->sum('amount');

        // THIS MONTH RETURNED
        $thisMonthReturned = TenderSecurity::where('status', 'Returned')
            ->whereBetween('return_date', [$startThisMonth, $endThisMonth])
            ->sum('amount');

        // NEXT MONTH RETURNED
        $nextMonthReturned = TenderSecurity::where('status', 'Returned')
            ->whereBetween('return_date', [$startNextMonth, $endNextMonth])
            ->sum('amount');

        // Get Data (Latest first)
        $tenderSecurities = $query->latest()->paginate(10);

        return view('metronic.pages.tender_security.index', compact(
            'tenderSecurities',
            'totalSecurities',
            'totalValue',
            'returnedSecurities',
            'thisMonthPending',
            'nextMonthPending',
            'thisMonthReturned',
            'nextMonthReturned'
        ));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenderer_name' => 'required|string|max:255',
            'tender_description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'pay_order_number' => 'nullable|string|max:255',
            'issue_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:issue_date',
            'bank_name' => 'nullable|string|max:255',
            'security_type' => 'nullable|string|max:255',
            'reference_no' => 'nullable|string|max:255',
            'contact_person_details' => 'nullable|string',
            'status' => 'required|string|in:Pending,Returned',
        ]);

        TenderSecurity::create($validated);
        Session::flash('success', 'Tender Security added successfully.');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $security = TenderSecurity::findOrFail($id);

        $validated = $request->validate([
            'tenderer_name' => 'required|string|max:255',
            'tender_description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'pay_order_number' => 'nullable|string|max:255',
            'issue_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:issue_date',
            'bank_name' => 'nullable|string|max:255',
            'security_type' => 'nullable|string|max:255',
            'reference_no' => 'nullable|string|max:255',
            'contact_person_details' => 'nullable|string',
            'status' => 'required|string|in:Pending,Returned',
        ]);

        $security->update($validated);
        Session::flash('success', 'Tender Security Updated successfully.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $security = TenderSecurity::findOrFail($id);
        $security->delete();
    }
}
