<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\IndustrialSector;
use App\Models\Marketing\ClientContact;

class ClientContactController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $isSuperAdmin = $user->myDepartments(['super_admin']);

        // 1. Start Query
        $query = ClientContact::with(['permittedUsers', 'sector', 'subSector'])->latest();

        // 2. Apply Security
        if (!$isSuperAdmin) {
            $query->whereHas('permittedUsers', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        // 3. Advanced Filtering
        if ($request->filled('sector_id')) {
            $query->where('sector_id', $request->sector_id);
        }
        if ($request->filled('sub_sector_id')) {
            $query->where('sub_sector_id', $request->sub_sector_id);
        }
        if ($request->filled('company_name')) {
            $query->where('company_name', 'like', '%' . $request->company_name . '%');
        }
        if ($request->filled('contact_person')) {
            $query->where('contact_person', 'like', '%' . $request->contact_person . '%');
        }
        if ($request->filled('designation')) {
            $query->where('designation', 'like', '%' . $request->designation . '%');
        }
        if ($request->filled('phone')) {
            $query->where(function ($q) use ($request) {
                $q->where('official_phone', 'like', '%' . $request->phone . '%')
                    ->orWhere('personal_phone', 'like', '%' . $request->phone . '%');
            });
        }

        // 4. Get Data
        $allContacts = $query->get();

        // 5. Group by Company Name
        $groupedContacts = $allContacts->groupBy('company_name');

        // 6. Statistics & Dropdowns
        $totalClients = $allContacts->count();
        $totalCompanies = $groupedContacts->count();

        $sectors = IndustrialSector::whereNull('parent_id')->where('status', 'active')->orderBy('name')->get();
        $subSectors = IndustrialSector::whereNotNull('parent_id')->where('status', 'active')->orderBy('name')->get();
        $users = $isSuperAdmin ? User::orderBy('name')->get() : collect([]);

        // Count for Sector Grid
        $sectorStats = $allContacts->groupBy('sector_id')->map->count();

        return view('metronic.pages.clientContact.index', compact(
            'groupedContacts',
            'totalClients',
            'totalCompanies',
            'sectors',
            'subSectors',
            'sectorStats',
            'users',
            'isSuperAdmin'
        ));
    }

    // AJAX Company Search for Select2
    public function searchCompanies(Request $request)
    {
        $search = $request->term;
        $companies = ClientContact::select('company_name')
            ->where('company_name', 'LIKE', "%{$search}%")
            ->distinct()
            ->limit(20)
            ->pluck('company_name');

        $results = $companies->map(function ($name) {
            return ['id' => $name, 'text' => $name];
        });

        return response()->json(['results' => $results]);
    }

    // Helper to Standardize Company Name (Avoids duplicates like "ABC" vs "abc")
    private function standardizeCompanyName($name)
    {
        $existing = ClientContact::where('company_name', 'LIKE', $name)->first();
        return $existing ? $existing->company_name : $name;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'       => 'required|string|max:255',
            'sector_id'          => 'nullable|exists:industrial_sectors,id',
            'sub_sector_id'      => 'nullable|exists:industrial_sectors,id',
            'contact_person'     => 'nullable|string',
            'designation'        => 'nullable|string',
            'department'         => 'nullable|string',
            'official_phone'     => 'nullable|string',
            'personal_phone'     => 'nullable|string',
            'email'              => 'nullable|email',
            'area'               => 'nullable|string',
            'address'            => 'nullable|string',
            'status'             => 'nullable|string',
            'tier'               => 'nullable|string',
            'comments'           => 'nullable|string',

            // This should NOT be saved to contacts table
            'permitted_users'    => 'nullable|array',
            'permitted_users.*'  => 'exists:users,id',
        ]);

        // Remove permitted_users before inserting
        $permittedUsers = $validated['permitted_users'] ?? [];
        unset($validated['permitted_users']);

        // Standardize company name
        $validated['company_name'] = $this->standardizeCompanyName($request->company_name);

        // Insert contact
        $contact = ClientContact::create($validated);

        // Save permitted users to pivot table
        $contact->permittedUsers()->sync($permittedUsers);

        return redirect()->back()->with('success', 'Client contact added successfully.');
    }


    public function update(Request $request, $id)
    {
        $contact = ClientContact::findOrFail($id);

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'sector_id' => 'nullable|exists:industrial_sectors,id',
            'sub_sector_id' => 'nullable|exists:industrial_sectors,id',
            'contact_person' => 'nullable|string',
            'designation' => 'nullable|string',
            'department' => 'nullable|string',
            'official_phone' => 'nullable|string',
            'personal_phone' => 'nullable|string',
            'email' => 'nullable|email',
            'area' => 'nullable|string',
            'address' => 'nullable|string',
            'status' => 'nullable|string',
            'tier' => 'nullable|string',
            'comments' => 'nullable|string',
            'permitted_users' => 'nullable|array',
            'permitted_users.*' => 'exists:users,id',
        ]);

        // Extract & remove permitted users
        $permittedUsers = $validated['permitted_users'] ?? [];
        unset($validated['permitted_users']);

        // Standardize company name
        $validated['company_name'] = $this->standardizeCompanyName($validated['company_name']);

        // Update main client
        $contact->update($validated);

        // Only super admin can update permissions
        if (Auth::user()->myDepartments(['super_admin'])) {
            $contact->permittedUsers()->sync($permittedUsers);
        }

        return redirect()->back()->with('success', 'Client contact updated successfully.');
    }


    public function destroy($id)
    {
        ClientContact::find($id)->delete();
        return redirect()->back()->with('success', 'Client contact deleted successfully.');
    }
}
