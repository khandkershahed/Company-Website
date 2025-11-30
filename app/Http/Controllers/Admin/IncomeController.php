<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rfq;
use App\Models\Accounts\Income;
use App\Models\Accounts\Expense;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class IncomeController extends Controller
{
    public function index()
    {
        $data['incomes'] = Income::with('rfq')->latest()->get();
        // Fetch RFQ data for dropdown
        $data['rfqs'] = Rfq::select('id', 'rfq_code', 'name', 'company_name')
                           ->where('rfq_type', 'delivery_completed')
                           ->get();
        return view('metronic.pages.income.index', $data);
    }

    // AJAX for autofill
    public function getRfqDetails($id)
    {
        $rfq = Rfq::find($id);
        if ($rfq) {
            return response()->json([
                'success' => true,
                'client_name' => $rfq->name,
                'company_name' => $rfq->company_name,
            ]);
        }
        return response()->json(['success' => false]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'date'         => 'required|date',
                'rfq_id'       => 'nullable|exists:rfqs,id',
                'amount'       => 'required|numeric|min:0',
                'client_name'  => 'nullable|string|max:255',
                'type'         => 'nullable|in:corporate,online', // Matches ENUM
                'po_reference' => 'nullable|string|max:255',
            ]
        );

        if ($validator->passes()) {
            $monthName = Carbon::parse($request->date)->format('F');

            Income::create([
                'rfq_id'       => $request->rfq_id,
                'date'         => $request->date,
                'month'        => $monthName,
                'po_reference' => $request->po_reference,
                'type'         => $request->type,
                'client_name'  => $request->client_name,
                'amount'       => $request->amount,
            ]);
            
            Toastr::success('Income Added Successfully');
        } else {
            foreach ($validator->errors()->all() as $message) {
                Toastr::error($message);
            }
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'date'         => 'required|date',
                'rfq_id'       => 'nullable|exists:rfqs,id',
                'amount'       => 'required|numeric|min:0',
            ]
        );

        if ($validator->passes()) {
            $monthName = Carbon::parse($request->date)->format('F');

            $income->update([
                'rfq_id'       => $request->rfq_id,
                'date'         => $request->date,
                'month'        => $monthName,
                'po_reference' => $request->po_reference,
                'type'         => $request->type,
                'client_name'  => $request->client_name,
                'amount'       => $request->amount,
            ]);

            Toastr::success('Income Updated Successfully');
        } else {
            foreach ($validator->errors()->all() as $message) {
                Toastr::error($message);
            }
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        Income::find($id)->delete();
        // Toastr::success('Income Deleted Successfully');
        // return redirect()->back();
    }

    public function Overview()
    {
        $data['incomesTotalAmount']  = Income::sum('amount');
        $data['expensesTotalAmount'] = Expense::sum('amount');

        $months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        
        foreach ($months as $month) {
            $data['expense' . ucfirst($month) . 'Amount'] = Expense::where('month', $month)->pluck('amount');
            $data['income' . ucfirst($month) . 'Amount'] = Income::where('month', $month)->pluck('amount');
        }

        return view('metronic.pages.income.overview', $data);
    }
}