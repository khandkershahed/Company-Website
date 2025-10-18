<?php

namespace App\Http\Controllers\Attendance;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\KPI\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LeaveApplication;

class AttendanceController extends Controller
{

    public function index()
    {
        //
    }
    public function attendanceApi()
    {
        return response()->json(["success" => true, 'attendances' => Attendance::all()], 200); // Get all Attendances
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    public function attendanceDataCurrentMonth($id)
    {
        $data = [
            'attendances' => Attendance::where('user_id', $id)
                ->whereMonth('date', now()->month)
                ->whereYear('date', now()->year)
                ->get(),
            'title' => 'Attendance Sheet(' . date('F') . ') | ' . (User::where('id', $id)->first()->name ?? 'Unknown User'),
        ];

        return view('metronic.pages.attendance.attendanceCurrentMonth', $data);
    }
    // lastmonth
    public function attendanceDataLastMonth($id)
    {
        $data = [
            'attendances' => Attendance::where('user_id', $id)
                ->whereMonth('date', now()->subMonth()->month)
                ->whereYear('date', now()->subMonth()->year)
                ->get(),
            'title' => 'Attendance Sheet(' . date('F', strtotime('last month')) . ') | ' . (User::where('id', $id)->first()->name ?? 'Unknown User'),
        ];
        return view('metronic.pages.attendance.attendanceLatMonth', $data);
    }
    public function attendanceDataSingle($id)
    {
        $attendances = Attendance::where('user_id', $id)
            ->get();
        return response()->json(["success" => true, 'attendances' => $attendances], 200);
    }

    public function attendanceHistory(Request $request)
    {
        $userId = auth()->user()->id;

        // Accept month input (name or number), default to current month
        $monthInput = $request->input('month', now()->format('F')); // e.g. “October” or “10”
        $year = now()->year;  // default to current year

        // Convert month name/format into numeric month (1–12) 
        if (is_numeric($monthInput)) {
            $month = intval($monthInput);
            if ($month < 1 || $month > 12) {
                abort(400, 'Invalid month number.');
            }
        } else {
            // Try parsing month name
            $timestamp = strtotime("1 " . $monthInput);
            if ($timestamp === false) {
                abort(400, 'Invalid month name.');
            }
            $month = intval(date('m', $timestamp));
        }
        $leaveApplications = LeaveApplication::where('employee_id', $userId)->get();
        $sicks = $leaveApplications->where('type_of_leave','sick');
        $earneds = $leaveApplications->where('type_of_leave','earned');
        $casuals = $leaveApplications->where('type_of_leave','casual');
        $pendings = $leaveApplications->where('status','pending');
        $attendances = Attendance::where('user_id', $userId)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();



        return view('metronic.pages.attendance.attendanceHistory', [
            'attendances'   => $attendances,
            'selectedMonth' => $monthInput,
            'sicks'         => $sicks,
            'earneds'       => $earneds,
            'casuals'       => $casuals,
            'pendings'      => $pendings,
        ]);
    }
}
