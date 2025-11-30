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
        $pendingSecurities = TenderSecurity::where('status', 'Pending')->count();
        $returnedSecurities = TenderSecurity::where('status', 'Returned')->count();

        // Get Data (Latest first)
        $tenderSecurities = $query->latest()->paginate(10);

        return view('metronic.pages.tender_security.index', compact(
            'tenderSecurities',
            'totalSecurities',
            'pendingSecurities',
            'returnedSecurities'
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
