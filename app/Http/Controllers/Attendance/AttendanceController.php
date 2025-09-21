<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\KPI\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

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
}
