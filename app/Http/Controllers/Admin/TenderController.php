<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('clear')) {
            return redirect()->route('admin.tender.index');
        }
        $query = Tender::query();

        // Date range filter
        if ($request->filled('date_range')) {
            [$startDate, $endDate] = explode(' - ', $request->input('date_range'));
            $query->whereBetween('last_date_of_submission', [$startDate, $endDate]);
        }

        // Fetch all tenders after filters
        $tenders = $query->get();

        // Categorized tender collections
        $live_tenders = $tenders->where('tender_status', 'Live');
        $won_tenders = $tenders->where('tender_status', 'Won');
        $lost_tenders = $tenders->where('tender_status', 'Lost');
        $submitted_tenders = $tenders->where('tender_status', 'Submitted');
        $participating_tenders = $tenders->where('tender_status', 'Participating');

        return view('metronic.pages.tender.index', [
            'users' => User::select('id', 'name')->get(),
            'tenders' => $tenders,
            'live_tenders' => $live_tenders,
            'lost_tenders' => $lost_tenders,
            'won_tenders' => $won_tenders,
            'submitted_tenders' => $submitted_tenders,
            'participating_tenders' => $participating_tenders,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'users' => User::select('id', 'name')->get(),
        ];

        return view('metronic.pages.tender.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'tender_type' => 'nullable|string|max:50',
    //         'responsible_person_id' => 'nullable|exists:users,id',
    //         'last_date_of_submission' => 'nullable|date',
    //         'submission_day' => 'nullable|string|max:20',
    //         'action' => 'nullable|string|max:100',
    //         'participate' => 'nullable|in:Yes,No,May Be,Need Discussion',
    //         'submitted' => 'nullable|in:Yes,No',
    //         'tender_status' => 'nullable|string|max:50',
    //         'purchase' => 'nullable|in:Yes,No,May Be',
    //         'tenderer' => 'nullable|string|max:255',
    //         'tender_reference' => 'nullable|string',
    //         'mode_of_submission' => 'nullable|string|max:50',
    //         'submission_medium' => 'nullable|string|max:100',
    //         'egp_id' => 'nullable|string|max:50',
    //         'pre_bid_meeting' => 'nullable|string|max:50',
    //         'schedule_value_tk' => 'nullable|numeric',
    //         'security' => 'nullable|numeric',
    //         'time_over' => 'nullable|boolean',
    //         'client_name' => 'nullable|string|max:255',
    //         'contact_name' => 'nullable|string|max:255',
    //         'contact_number' => 'nullable|string|max:50',
    //         'contact_email' => 'nullable|email|max:255',
    //         'contact_address' => 'nullable|string',
    //         'client_website' => 'nullable|url|max:255',
    //         'comments_by_manager' => 'nullable|string',
    //         'comments_by_md' => 'nullable|string',
    //         'general_comments' => 'nullable|string',
    //     ]);

    //     // Auto-generate tender code: TD-dmy-N
    //     $today = now()->format('dmY');
    //     $countToday = Tender::whereDate('created_at', now()->toDateString())->count() + 1;
    //     $data['tender_code'] = "TD-{$today}-{$countToday}";

    //     $data['time_over'] = $request->has('time_over') ? 1 : 0;

    //     Tender::create($data);
    //     Session::flash('success', 'Tender created successfully.');
    //     return redirect()->back();
    // }


    public function store(Request $request)
    {
        try {
            // Validate the request
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'tender_type' => 'nullable|string|max:50',
                'responsible_person_id' => 'nullable|exists:users,id',
                'last_date_of_submission' => 'nullable|date',
                'submission_day' => 'nullable|string|max:20',
                'action' => 'nullable|string|max:100',
                'participate' => 'nullable|in:Yes,No,May Be,Need Discussion',
                'submitted' => 'nullable|in:Yes,No',
                'tender_status' => 'nullable|string|max:50',
                'purchase' => 'nullable|in:Yes,No,May Be',
                'tenderer' => 'nullable|string|max:255',
                'tender_reference' => 'nullable|string',
                'mode_of_submission' => 'nullable|string|max:50',
                'submission_medium' => 'nullable|string|max:100',
                'egp_id' => 'nullable|string|max:50',
                'pre_bid_meeting' => 'nullable|string|max:50',
                'schedule_value_tk' => 'nullable|numeric',
                'security' => 'nullable|numeric',
                'time_over' => 'nullable|boolean',
                'client_name' => 'nullable|string|max:255',
                'contact_name' => 'nullable|string|max:255',
                'contact_number' => 'nullable|string|max:50',
                'contact_email' => 'nullable|email|max:255',
                'contact_address' => 'nullable|string',
                'client_website' => 'nullable|url|max:255',
                'comments_by_manager' => 'nullable|string',
                'comments_by_md' => 'nullable|string',
                'general_comments' => 'nullable|string',
            ]);

            DB::beginTransaction();

            // Auto-generate tender code: TD-dmy-N
            $today = now()->format('dmY');
            $countToday = Tender::whereDate('created_at', now()->toDateString())->count() + 1;
            $data['tender_code'] = "TD-{$today}-{$countToday}";

            // Checkbox value fix
            $data['time_over'] = $request->has('time_over') ? 1 : 0;

            // Create Tender
            Tender::create($data);

            DB::commit();

            Session::flash('success', 'Tender created successfully.');
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors handled automatically by Laravel
            // but we can still catch and customize if needed
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error for debugging
            Log::error('Tender Store Error: ' . $e->getMessage());

            // Show error message to user
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
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
    public function edit(Tender $tender)
    {
        $users = User::select('id', 'email')
            ->get()
            ->map(function ($user) {
                $user->display_name = $user->name ?? $user->username ?? $user->email;
                return $user;
            });

        return view('metronic.pages.tender.edit', compact('tender', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tender $tender)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'tender_type' => 'nullable|string|max:50',
                'responsible_person_id' => 'nullable|exists:users,id',
                'last_date_of_submission' => 'nullable|date',
                'submission_day' => 'nullable|string|max:20',
                'action' => 'nullable|string|max:100',
                'participate' => 'nullable|in:Yes,No,May Be,Need Discussion',
                'submitted' => 'nullable|in:Yes,No',
                'tender_status' => 'nullable|string|max:50',
                'purchase' => 'nullable|in:Yes,No,May Be',
                'tenderer' => 'nullable|string|max:255',
                'tender_reference' => 'nullable|string',
                'mode_of_submission' => 'nullable|string|max:50',
                'submission_medium' => 'nullable|string|max:100',
                'egp_id' => 'nullable|string|max:50',
                'pre_bid_meeting' => 'nullable|string|max:50',
                'schedule_value_tk' => 'nullable|numeric',
                'security' => 'nullable|numeric',
                'time_over' => 'nullable|boolean',
                'client_name' => 'nullable|string|max:255',
                'contact_name' => 'nullable|string|max:255',
                'contact_number' => 'nullable|string|max:50',
                'contact_email' => 'nullable|email|max:255',
                'contact_address' => 'nullable|string',
                'client_website' => 'nullable|url|max:255',
                'comments_by_manager' => 'nullable|string',
                'comments_by_md' => 'nullable|string',
                'general_comments' => 'nullable|string',
            ]);
            DB::beginTransaction();
            $data['time_over'] = $request->has('time_over') ? 1 : 0;

            $tender->update($data);
            DB::commit();
            Session::flash('success', 'Tender updated successfully.');
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error for debugging
            Log::error('Tender Store Error: ' . $e->getMessage());

            // Show error message to user
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tender $tender)
    {
        $tender->delete();
    }
}
