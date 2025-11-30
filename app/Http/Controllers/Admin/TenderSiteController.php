<?php

namespace App\Http\Controllers\Admin;

use App\Models\TenderSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\IndustrialSector;

class TenderSiteController extends Controller
{
    public function index(Request $request)
    {

        $sectors = IndustrialSector::latest()->get();
        $query = TenderSite::query();
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Get paginated results (10 per page) ordered by newest
        $tenderSites = $query->latest()->paginate(10);

        return view('metronic.pages.tender_site.index', compact('tenderSites','sectors'));
    }

    public function create()
    {
        $data = [
            'sectors' => IndustrialSector::latest()->get(),
        ];
        return view('metronic.pages.tender_site.create',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'site_url' => 'required|url|max:255',
            'site_contact' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'enlisted' => 'required|boolean',
            'eprocure' => 'required|boolean',
            'participated' => 'required|boolean',
            'contact_no' => 'required|string|max:50',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|string|in:Active,Pending,Completed',
            'address' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        TenderSite::create($validated);

        return redirect()->route('admin.tender-sites.index')
            ->with('success', 'Tender Site created successfully.');
    }

    public function edit(TenderSite $tenderSite)
    {
        $sectors = IndustrialSector::latest()->get();
        return view('metronic.pages.tender_site.edit', compact('tenderSite','sectors'));
    }

    public function update(Request $request, TenderSite $tenderSite)
    {
        $validated = $request->validate([
            'organization' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'site_url' => 'required|url|max:255',
            'site_contact' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'enlisted' => 'required|boolean',
            'eprocure' => 'required|boolean',
            'participated' => 'required|boolean',
            'contact_no' => 'required|string|max:50',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|string|in:Active,Pending,Completed',
            'address' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $tenderSite->update($validated);

        return redirect()->route('admin.tender-sites.index')
            ->with('success', 'Tender Site updated successfully.');
    }

    public function destroy(TenderSite $tenderSite)
    {
        $tenderSite->delete();

    }
}
