<?php

namespace App\Http\Controllers\Marketing;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\MarketingPlan;
use App\Http\Controllers\Controller;

class MarketingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('metronic.pages.marketingPlan.index');
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
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'year' => 'nullable|integer',
            'month' => 'nullable|string',
            'date' => 'nullable|date',
            'title' => 'nullable|string|max:255',
            'marketing_type' => 'nullable|string',
            'status' => 'nullable|string',
            'contact_name' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'contact_address' => 'nullable|string',
            'contact_website' => 'nullable|string',
            'contact_social' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Ensure date is in correct format
        if (!empty($data['date'])) {
            $data['date'] = date('Y-m-d', strtotime($data['date']));
        }

        // Ensure user_id is valid
        if (!empty($data['user_id']) && !User::find($data['user_id'])) {
            $data['user_id'] = null;
        }

        MarketingPlan::create($data);

        return redirect()->route('marketing-plans.index')->with('success', 'Marketing Plan created successfully.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
