<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Accounts\ExpenseCategory;
use Illuminate\Support\Facades\Validator;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['expenseCategories'] = ExpenseCategory::latest()->get();
        return view('metronic.pages.expenseCategory.index', $data);
        // return view('admin.pages.expenseCategory.all', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|string',
                'status'   => 'required|string',
                'notes'    => 'required|string',
            ],
            [
                'required' => 'This :attribute field is needed.',
            ]
        );

        if ($validator->passes()) {
            ExpenseCategory::create([
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'status'   => $request->status,
                'notes'    => $request->notes,
            ]);
            Toastr::success('Data Insert Successfully.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
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
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|string',
                'status'   => 'required|string',
                'notes'    => 'required|string',
            ],
            [
                'required' => 'This :attribute field is needed.',
            ]
        );

        if ($validator->passes()) {
            ExpenseCategory::find($id)->update([
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'status'   => $request->status,
                'notes'    => $request->notes,
            ]);
            Toastr::success('Data Updated Successfully.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpenseCategory::find($id)->delete();
    }
}
