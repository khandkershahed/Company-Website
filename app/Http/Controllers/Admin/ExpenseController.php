<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Rfq;
use App\Models\Admin\Income;
use Illuminate\Http\Request;
use App\Models\Accounts\Expense;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['expenses'] = Expense::latest('id')->get();
        return view('metronic.pages.expense.index', $data);
        return view('admin.pages.expense.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'voucher'   => 'nullable|file|mimes:pdf|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type:pdf'
            ],
        );

        if ($validator->passes()) {
            $mainFile = $request->file('voucher');
            if (empty($mainFile)) {
                Expense::create([
                    'date'        => date('Y-m-d H:i:s', strtotime($request->date)),
                    'month'       => $request->month,
                    'category'    => $request->category,
                    'type'        => $request->type,
                    'particulars' => $request->particulars,
                    'amount'      => $request->amount,
                    'comment'     => $request->comment,
                ]);
            } else {
                $globalFunImg =  Helper::singleFileUpload($mainFile);
                if ($globalFunImg['status'] == 1) {
                    Expense::create([
                        'date'        => date('Y-m-d H:i:s', strtotime($request->date)),
                        'month'       => $request->month,
                        'category'    => $request->category,
                        'type'        => $request->type,
                        'particulars' => $request->particulars,
                        'voucher'     => $globalFunImg['file_name'],
                        'amount'      => $request->amount,
                        'comment'     => $request->comment,
                    ]);
                } else {
                    Toastr::warning('File upload failed! plz try again.');
                }
            }
            Toastr::success('Data Inserted Successfully');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
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
        $data['expense'] = Expense::find($id);
        return view('admin.pages.expense.edit', $data);
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
        $expense = Expense::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'voucher'      => 'nullable|file|mimes:pdf|max:5000',
            ],
            [
                'mimes' => 'the :attribute is must be type of pdf',
            ]
        );

        if ($validator->passes()) {
            $mainFile = $request->voucher;
            ///$uploadPath = storage_path('app/public/files');

            if (isset($mainFile)) {
                $globalFunVaucher = Helper::singleFileUpload($mainFile);
            } else {
                $globalFunVaucher['status'] = 0;
            }

            if (!empty($expense)) {
                if ($globalFunVaucher['status'] == 1) {
                    File::delete(public_path('storage/files/') . $expense->voucher);
                }

                $expense->update([
                    'date'        => date('Y-m-d H:i:s', strtotime($request->date)),
                    'month'       => $request->month,
                    'category'    => $request->category,
                    'type'        => $request->type,
                    'particulars' => $request->particulars,
                    'voucher' => $globalFunVaucher['status'] == 1 ? $globalFunVaucher['file_name'] : $expense->voucher,
                    'amount'      => $request->amount,
                    'comment'     => $request->comment,
                ]);
            }
            Toastr::success('Data has been updated');
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
        $expense = Expense::find($id);

        if (File::exists(public_path('storage/files/') . $expense->voucher)) {
            File::delete(public_path('storage/files/') . $expense->voucher);
        }

        $expense->delete();
    }

    public function Ledger()
    {
        $data['incomes']  = Income::get();
        $data['expenses'] = Expense::get();
        $data['rfqs'] = Rfq::select('rfqs.id', 'rfqs.name')->get();

        $data['expenseJanuaryAmount']   = Expense::where('month', 'january')->pluck('amount');
        $data['expenseFebruaryAmount']  = Expense::where('month', 'february')->pluck('amount');
        $data['expenseMarchAmount']     = Expense::where('month', 'march')->pluck('amount');
        $data['expenseAprilAmount']     = Expense::where('month', 'april')->pluck('amount');
        $data['expenseMayAmount']       = Expense::where('month', 'may')->pluck('amount');
        $data['expenseJuneAmount']      = Expense::where('month', 'june')->pluck('amount');
        $data['expenseJulyAmount']      = Expense::where('month', 'july')->pluck('amount');
        $data['expenseAugustAmount']    = Expense::where('month', 'august')->pluck('amount');
        $data['expenseSeptemberAmount'] = Expense::where('month', 'september')->pluck('amount');
        $data['expenseOctoberAmount']   = Expense::where('month', 'october')->pluck('amount');
        $data['expenseNovemberAmount']  = Expense::where('month', 'november')->pluck('amount');
        $data['expenseDecemberAmount']  = Expense::where('month', 'december')->pluck('amount');

        $data['incomeJanuaryAmount']   = Income::where('month', 'january')->pluck('amount');
        $data['incomeFebruaryAmount']  = Income::where('month', 'february')->pluck('amount');
        $data['incomeMarchAmount']     = Income::where('month', 'march')->pluck('amount');
        $data['incomeAprilAmount']     = Income::where('month', 'april')->pluck('amount');
        $data['incomeMayAmount']       = Income::where('month', 'may')->pluck('amount');
        $data['incomeJuneAmount']      = Income::where('month', 'june')->pluck('amount');
        $data['incomeJulyAmount']      = Income::where('month', 'july')->pluck('amount');
        $data['incomeAugustAmount']    = Income::where('month', 'august')->pluck('amount');
        $data['incomeSeptemberAmount'] = Income::where('month', 'september')->pluck('amount');
        $data['incomeOctoberAmount']   = Income::where('month', 'october')->pluck('amount');
        $data['incomeNovemberAmount']  = Income::where('month', 'november')->pluck('amount');
        $data['incomeDecemberAmount']  = Income::where('month', 'december')->pluck('amount');

        return view('admin.pages.expense.ledger', $data);
    }
}
