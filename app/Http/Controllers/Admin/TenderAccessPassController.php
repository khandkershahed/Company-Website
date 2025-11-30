<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TenderAccessPass;
use App\Http\Controllers\Controller;
use App\Models\Admin\IndustrialSector;
use Illuminate\Support\Facades\Session;

class TenderAccessPassController extends Controller
{
    public function index()
    {
        // Fetch Passes with Sector relationship
        $tenderAccessPasses = TenderAccessPass::with('sector')->latest()->paginate(10);
        
        // Fetch Sectors for the Dropdown
        $sectors = IndustrialSector::where('status', 'active')->orderBy('name')->get();

        return view('metronic.pages.tender_access_pass.index', compact('tenderAccessPasses', 'sectors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sector_id' => 'nullable|exists:industrial_sectors,id',
            'organization' => 'required|string|max:255',
            'login_url' => 'nullable|url|max:255',
            'username' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'verification_details' => 'nullable|string',
            'recovery_email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        TenderAccessPass::create($validated);
        Session::flash('success', 'Access Pass added successfully.');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $pass = TenderAccessPass::findOrFail($id);

        $validated = $request->validate([
            'sector_id' => 'nullable|exists:industrial_sectors,id',
            'organization' => 'required|string|max:255',
            'login_url' => 'nullable|url|max:255',
            'username' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'verification_details' => 'nullable|string',
            'recovery_email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        $pass->update($validated);
        Session::flash('success', 'Access Pass updated successfully.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $pass = TenderAccessPass::findOrFail($id);
        $pass->delete();
    }
}