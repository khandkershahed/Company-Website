<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Http\Controllers\Controller;
use App\Models\Accounts\Expense;
use App\Models\Accounts\ExpenseCategory;
use App\Models\Accounts\ExpenseType;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ExpenseController extends Controller
{
    public function index()
    {
        // Load with relationships
        $data['expenses'] = Expense::with(['expenseCategoryRelation', 'expenseTypeRelation'])->latest()->get();
        
        // Dropdown data
        $data['categories'] = ExpenseCategory::where('status', 'active')->orderBy('name')->get();
        $data['types'] = ExpenseType::where('status', 'active')->orderBy('name')->get();

        return view('metronic.pages.expense.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'date'             => 'required|date',
                'expense_category' => 'required|exists:expense_categories,id', // Column name fixed
                'expense_type'     => 'nullable|exists:expense_types,id',      // Column name fixed
                'amount'           => 'required|numeric|min:0',
                'voucher'          => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:10240',
                'particulars'      => 'nullable|string|max:255',
                'comment'          => 'nullable|string',
            ]
        );

        if ($validator->passes()) {
            // File Upload
            $voucherPath = null;
            if ($request->hasFile('voucher')) {
                $upload = Helper::singleFileUpload($request->file('voucher'));
                if ($upload['status'] == 1) {
                    $voucherPath = $upload['file_name'];
                }
            }

            $monthName = Carbon::parse($request->date)->format('F');
            
            // Get string names for redundancy columns
            $catName = ExpenseCategory::find($request->expense_category)->name ?? null;
            $typeName = ExpenseType::find($request->expense_type)->name ?? null;

            Expense::create([
                'date'             => $request->date,
                'month'            => $monthName,
                'expense_category' => $request->expense_category, // Fixed
                'expense_type'     => $request->expense_type,     // Fixed
                'category'         => $catName,                   // String column
                'type'             => $typeName,                  // String column
                'particulars'      => $request->particulars,
                'amount'           => $request->amount,
                'voucher'          => $voucherPath,
                'comment'          => $request->comment,
            ]);

            Toastr::success('Expense Added Successfully');
        } else {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error);
            }
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'date'             => 'required|date',
            'expense_category' => 'required|exists:expense_categories,id', // Fixed
            'expense_type'     => 'nullable|exists:expense_types,id',      // Fixed
            'amount'           => 'required|numeric|min:0',
            'voucher'          => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:10240',
        ]);

        if ($validator->passes()) {
            $voucherPath = $expense->voucher;
            if ($request->hasFile('voucher')) {
                if ($voucherPath && File::exists(public_path('storage/files/' . $voucherPath))) {
                    File::delete(public_path('storage/files/' . $voucherPath));
                }
                $upload = Helper::singleFileUpload($request->file('voucher'));
                if ($upload['status'] == 1) {
                    $voucherPath = $upload['file_name'];
                }
            }

            $monthName = Carbon::parse($request->date)->format('F');
            $catName = ExpenseCategory::find($request->expense_category)->name ?? null;
            $typeName = ExpenseType::find($request->expense_type)->name ?? null;

            $expense->update([
                'date'             => $request->date,
                'month'            => $monthName,
                'expense_category' => $request->expense_category, // Fixed
                'expense_type'     => $request->expense_type,     // Fixed
                'category'         => $catName,
                'type'             => $typeName,
                'particulars'      => $request->particulars,
                'amount'           => $request->amount,
                'voucher'          => $voucherPath,
                'comment'          => $request->comment,
            ]);

            Toastr::success('Expense Updated Successfully');
        } else {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error);
            }
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        if ($expense->voucher && File::exists(public_path('storage/files/' . $expense->voucher))) {
            File::delete(public_path('storage/files/' . $expense->voucher));
        }
        $expense->delete();
        // Toastr::success('Expense Deleted Successfully');
        // return redirect()->back();
    }
}