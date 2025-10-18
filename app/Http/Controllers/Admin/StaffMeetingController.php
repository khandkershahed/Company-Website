<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\StaffMeeting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'lead_by' => 'required|exists:users,id',
            'type' => 'required|in:office,out_of_office',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            // 'participants' => 'nullable|array',
            // 'participants.*' => 'exists:users,id',
        ]);

        try {
            // 2. Prepare Data
            // $participants = User::whereIn('id', $validated['participants'] ?? [])
            //     ->get(['id', 'name'])
            //     ->toJson();

            // Combine date and time fields to create full datetime objects for the database
            $startDateTime = Carbon::parse($validated['date'] . ' ' . $validated['start_time']);
            $endDateTime = Carbon::parse($validated['date'] . ' ' . $validated['end_time']);

            // 3. Create Meeting
            StaffMeeting::create([
                'staff_id' => auth()->id(), // Assign the current authenticated user as the staff_id
                'lead_by' => $validated['lead_by'],
                'title' => $validated['title'],
                'date' => $validated['date'],
                'start_time' => $startDateTime,
                'end_time' => $endDateTime,
                // 'participants' => $validated['participants'],
                'type' => $validated['type'],
            ]);
            Session::flash('success',  'Meeting "' . $validated['title'] . '" created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'Error:' . $e->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function update(Request $request, StaffMeeting $meeting)
    {
        // 1. Validation (Using the $meeting model instance passed by route model binding)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'lead_by' => 'required|exists:users,id',
            'type' => 'required|in:office,out_of_office',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            // 'participants' => 'nullable|array',
            // 'participants.*' => 'exists:users,id',
        ]);

        try {
            // 2. Prepare Data
            // Fetch names for JSON participants field
            $participants = User::whereIn('id', $validated['participants'] ?? [])
                ->get(['id', 'name'])
                ->toJson();

            $startDateTime = Carbon::parse($validated['date'] . ' ' . $validated['start_time']);
            $endDateTime = Carbon::parse($validated['date'] . ' ' . $validated['end_time']);

            // 3. Update Meeting
            $meeting->update([
                'lead_by' => $validated['lead_by'],
                'title' => $validated['title'],
                'date' => $validated['date'],
                'start_time' => $startDateTime,
                'end_time' => $endDateTime,
                // 'participants' => $validated['participants'],
                'type' => $validated['type'],
            ]);
            Session::flash('success',  'Meeting "' . $validated['title'] . '" updated successfully.');
            return redirect()->back();
        } catch (\Exception $e) {

            Session::flash('error', 'Error:' . $e->getMessage());

            return redirect()->back()
                ->withInput();
        }
    }

    // ----------------------------------------------------------------------
    // 3. DESTROY (Delete Meeting)
    // ----------------------------------------------------------------------
    public function destroy(StaffMeeting $meeting)
    {
        $meeting->delete();
    }
}
