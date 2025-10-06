<?php

namespace App\Http\Controllers\Marketing;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\MarketingPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MarketingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = MarketingPlan::query();

        if (Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }

        if ($request->filled('month')) {
            $query->where('month', $request->month);
        }

        $plans = $query->get();

        // Group by marketing_type
        $grouped = $plans->groupBy('marketing_type');
        // e.g. $grouped['site_visit'] => Collection of plans with type site_visit

        // Define types in the order you want
        $types = [
            'site_visit' => 'Site Visit',
            'client_visit' => 'Client Visit',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'social' => 'Social',
        ];

        return view('metronic.pages.marketingPlan.index', [
            'grouped' => $grouped,
            'types' => $types,
            'selected_month' => $request->month,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metronic.pages.marketingPlan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'maketingPlans' => 'required|array|min:1',
            'maketingPlans.*.month' => 'nullable|string',
            'maketingPlans.*.date' => 'nullable|date_format:m/d/Y',
            'maketingPlans.*.marketing_type' => 'nullable|string',
            'maketingPlans.*.title' => 'nullable|string|max:255',
            'maketingPlans.*.contact_name' => 'nullable|string|max:255',
            'maketingPlans.*.contact_number' => 'nullable|string|max:50',
            'maketingPlans.*.contact_email' => 'nullable|email|max:255',
            'maketingPlans.*.contact_address' => 'nullable|string',
            'maketingPlans.*.contact_website' => 'nullable|string',
            'maketingPlans.*.contact_social' => 'nullable|string',
        ]);

        $plans = $request->input('maketingPlans');
        $userId = $request->input('user_id') ?? Auth::id();

        DB::beginTransaction();

        try {
            foreach ($plans as $plan) {
                // Parse date
                $formattedDate = !empty($plan['date']) ? \Carbon\Carbon::createFromFormat('m/d/Y', $plan['date'])->format('Y-m-d') : null;
                $year = $formattedDate ? date('Y', strtotime($formattedDate)) : null;

                MarketingPlan::create([
                    'user_id' => $userId,
                    'year' => $year,
                    'month' => $plan['month'] ?? null,
                    'date' => $formattedDate,
                    'title' => $plan['title'] ?? null,
                    'marketing_type' => $plan['marketing_type'] ?? null,
                    'status' => 'pending', // default status
                    'contact_name' => $plan['contact_name'] ?? null,
                    'contact_number' => $plan['contact_number'] ?? null,
                    'contact_email' => $plan['contact_email'] ?? null,
                    'contact_address' => $plan['contact_address'] ?? null,
                    'contact_website' => $plan['contact_website'] ?? null,
                    'contact_social' => $plan['contact_social'] ?? null,
                    'notes' => $plan['notes'] ?? null,
                ]);
            }

            DB::commit();
            Session::flash('success', 'Marketing plans saved successfully.');
            return redirect()->route('admin.marketing-plan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plan = MarketingPlan::findOrFail($id);

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'status' => 'nullable|string|in:pending,processing,done,not_done',
            'contact_name' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
            'year' => 'nullable|integer',
            'month' => 'nullable|string',
            'marketing_type' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'contact_website' => 'nullable|string',
            'contact_social' => 'nullable|string',
        ]);

        $plan->update($data);

        return redirect()->back()->with('success', 'Marketing Plan updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = MarketingPlan::findOrFail($id);
        $plan->delete();
    }

    public function toggleStatus(Request $request, $id)
    {
        $plan = MarketingPlan::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:done,pending',
        ]);

        $plan->status = $validated['status'];
        $plan->save();

        return response()->json([
            'message' => 'Status updated successfully.',
            'status' => $plan->status,
        ]);
    }
}
