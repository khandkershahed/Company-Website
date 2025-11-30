<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts\ExpenseType;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Accounts\ExpenseCategory;
use Illuminate\Support\Facades\Validator;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $data['expenseCategorys'] = ExpenseCategory::select('id', 'name')->where('status', 'active')->get();
        $data['expenseTypes'] = ExpenseType::with('expenseCategory')->latest()->get();
        
        return view('metronic.pages.expenseType.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'expense_category_id' => 'required|integer|exists:expense_categories,id',
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
            ExpenseType::create([
                'expense_category_id' => $request->expense_category_id,
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'status'   => $request->status,
                'notes'    => $request->notes,
                'comments' => $request->comments,
                'custom'   => $request->custom,
            ]);
            Toastr::success('Expense Type Created Successfully.');
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
                'expense_category_id' => 'required|integer|exists:expense_categories,id',
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
            ExpenseType::find($id)->update([
                'expense_category_id' => $request->expense_category_id,
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'status'   => $request->status,
                'notes'    => $request->notes,
                'comments' => $request->comments,
                'custom'   => $request->custom,
            ]);
            Toastr::success('Expense Type Updated Successfully.');
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
        $type = ExpenseType::find($id);
        $type->delete();
        
        return redirect()->back();
    }
}