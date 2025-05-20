<?php

namespace App\Http\Controllers\KPI;

use App\Http\Controllers\Controller;
use App\Models\KPI\Task;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeTaskController extends Controller
{

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $data = [
                'employees' => User::get(),
            ];
            return view('admin.pages.employeeTask.index',$data);
        }

        public function employeeTasks($employeeId)
        {
            $data = [
                'tasks' => '',
                // 'tasks' => Task::where('employee_id' , $employeeId)->get(),
            ];
            $view = view('admin.pages.employeeTask.partials.monthly_task_table', $data)->render();
            return response()->json(['html' => $view]);

        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $data = [
                'employees' => User::get(),
            ];
            return view('admin.pages.employeeTask.create',$data);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
}
