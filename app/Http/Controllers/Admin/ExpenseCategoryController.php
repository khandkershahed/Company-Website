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
    public function index()
    {
        $data['expenseCategories'] = ExpenseCategory::latest()->get();
        return view('metronic.pages.expenseCategory.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|string|max:255',
                'status'   => 'required|string',
                'notes'    => 'nullable|string',
                'comments' => 'nullable|string',
                'custom'   => 'nullable|string',
            ],
            [
                'required' => 'The :attribute field is required.',
            ]
        );

        if ($validator->passes()) {
            ExpenseCategory::create([
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'status'   => $request->status,
                'notes'    => $request->notes,
                'comments' => $request->comments,
                'custom'   => $request->custom,
            ]);
            Toastr::success('Expense Category Created Successfully.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|string|max:255',
                'status'   => 'required|string',
                'notes'    => 'nullable|string',
                'comments' => 'nullable|string',
                'custom'   => 'nullable|string',
            ],
            [
                'required' => 'The :attribute field is required.',
            ]
        );

        if ($validator->passes()) {
            ExpenseCategory::find($id)->update([
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'status'   => $request->status,
                'notes'    => $request->notes,
                'comments' => $request->comments,
                'custom'   => $request->custom,
            ]);
            Toastr::success('Expense Category Updated Successfully.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = ExpenseCategory::find($id);
        $category->delete();
    }
}