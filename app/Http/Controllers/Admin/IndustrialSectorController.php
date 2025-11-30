<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\IndustrialSector;
use Illuminate\Support\Facades\Session;

class IndustrialSectorController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = IndustrialSector::with('parent')->latest()->get();
        $parentSectors = IndustrialSector::whereNull('parent_id')->with('children')->get();

        return view('metronic.pages.industrialSector.index', compact('sectors', 'parentSectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:industrial_sectors,id',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string'
        ]);

        IndustrialSector::create([
            'name'        => $request->name,
            'parent_id'   => $request->parent_id,
            'description' => $request->description,
            'status'      => $request->status,
        ]);
        Session::flash('success', 'Sector created successfully.');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sector = IndustrialSector::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:industrial_sectors,id',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string'
        ]);

        $sector->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        Session::flash('success', 'Sector updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sector = IndustrialSector::findOrFail($id);
        $sector->delete();
    }
}
